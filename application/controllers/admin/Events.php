<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function index()
    {
        $data['added_id'] = $this->session->flashdata('added_id');
        $data['updated_id'] = $this->session->flashdata('updated_id');
        $data['set_active'] = $this->session->flashdata('set_active');
        $data['set_active_id'] = $this->session->flashdata('set_active_id');
        $data['delete_confirm'] = $this->session->flashdata('delete_confirm');

        $this->load->model('Events_model');
        $events = $this->Events_model->getData();
        if(!empty($events)) $data['events'] = $events;

        $data['menu_active'] = 'events';

        $this->load->view('admin_header');
        $this->load->view('admin_left_menu', $data);
        $this->load->view('admin_events');
        $this->load->view('admin_footer');
    }

    function add($event_id = NULL)
    {
        $user = $this->session->userdata('username');
        $this->load->model('Events_model');

        if(!empty($_POST)) {
            if(empty($_POST['event_id'])) {
                $added_id = $this->Events_model->add($user, $_POST);
                if($added_id) $this->session->set_flashdata('added_id', $added_id);
            }
            else {
                $updated_id = $this->Events_model->update($user, $_POST);
                if($updated_id) $this->session->set_flashdata('updated_id', $updated_id);
            }
            redirect('admin/Events');
        } elseif($this->input->get('is_active') != NULL) {
            $post['event_id'] = $this->input->get('id');
            $post['is_active'] = $this->input->get('is_active');
            $set_active = $this->Events_model->set_active($user, $post);
            $this->session->set_flashdata('set_active', $set_active);
            $this->session->set_flashdata('set_active_id', $post['event_id']);

            redirect('admin/Events');
        } else {
            if(!empty($event_id)) {
                $data['event'] = $this->Events_model->getData($event_id);
            }
            $data['menu_active'] = 'add_events';
            $this->load->view('admin_header');
            $this->load->view('admin_left_menu', $data);
            $this->load->view('admin_add_events');
            $this->load->view('admin_footer');
        }
    }

    function delete($event_id = NULL) {
        $this->load->model('Events_model');
        if(!empty($event_id)) {
            $delete = $this->Events_model->delete($event_id);
            if($delete) $this->session->set_flashdata('delete_confirm', $delete);
            redirect('admin/Events');
        } else redirect('admin/Events');
    }
}
