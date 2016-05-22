<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generations extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function index()
    {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $data['added_id'] = $this->session->flashdata('added_id');
            $data['updated_id'] = $this->session->flashdata('updated_id');
            $data['delete_confirm'] = $this->session->flashdata('delete_confirm');

            $this->load->model('Generations_model');
            $generations = $this->Generations_model->getData();
            if (!empty($generations)) {
                $data['generations'] = $generations;
            }
            $data['name'] = $this->session->userdata('username');
            $data['is_authorized'] = $this->session->userdata('is_authorized');
            $data['menu_active'] = 'generations';
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_left_menu');
            $this->load->view('admin/admin_generations');
            $this->load->view('admin/admin_footer');
        } else {
            redirect('myadminkw');
        }
    }

    function edit($generation_id = NULL)
    {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $data['name'] = $this->session->userdata('username');
            $data['is_authorized'] = $this->session->userdata('is_authorized');
            $data['menu_active'] = 'generations';

            $this->load->model('Generations_model');
            $generations = $this->Generations_model->getData();
            if (!empty($generations)) {
                $data['generations'] = $generations;
            }

            $generation = $this->Generations_model->getData($generation_id);
            $data['generation_name'] = $generation[0]->name;
            $data['generation_id'] = $generation[0]->id;

            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_left_menu');
            $this->load->view('admin/admin_generations');
            $this->load->view('admin/admin_footer');

        } else {
            redirect('myadminkw');
        }
    }

    function add()
    {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $user = $this->session->userdata('username');

            $this->load->model('Generations_model');
            if (!empty($_POST['generation_id'])) {
                $updated_id = $this->Generations_model->update($_POST, $user);
                if ($updated_id) $this->session->set_flashdata('updated_id', $updated_id);
            } else {
                $added_id = $this->Generations_model->add($_POST, $user);
                if($added_id) $this->session->set_flashdata('added_id', $added_id);
            }
            redirect('myadminkw/Generations');
        } else {
            redirect('myadminkw');
        }
    }

    function delete($generation_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $this->load->model('Generations_model');
            if (!empty($generation_id)) {
                $delete = $this->Generations_model->delete($generation_id);
                if ($delete) $this->session->set_flashdata('delete_confirm', $delete);
                redirect('myadminkw/Generations');
            }
            else redirect('myadminkw/Generations');
        } else {
            redirect('myadminkw');
        }
    }
}
