<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

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
    function index() {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $data['name'] = $this->session->userdata('username');
            $data['added_id'] = $this->session->flashdata('added_id');
            $data['updated_id'] = $this->session->flashdata('updated_id');
            $data['set_active'] = $this->session->flashdata('set_active');
            $data['set_active_id'] = $this->session->flashdata('set_active_id');
            $data['delete_confirm'] = $this->session->flashdata('delete_confirm');

            $this->load->model('Videos_model');
            $videos = $this->Videos_model->getData();
            if (!empty($videos)) $data['videos'] = $videos;

            $data['menu_active'] = 'videos';

            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_left_menu');
            $this->load->view('admin/admin_videos');
            $this->load->view('admin/admin_footer');
        }
        else {
            redirect('myadminkw');
        }
    }

    function add($video_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $user = $this->session->userdata('username');
            $this->load->model('Videos_model');

            if (!empty($_POST)) {
                if (empty($_POST['video_id'])) {
                    $added_id = $this->Videos_model->add($user, $_POST);
                    if ($added_id) $this->session->set_flashdata('added_id', $added_id);
                }
                else {
                    $updated_id = $this->Videos_model->update($user, $_POST);
                    if ($updated_id) $this->session->set_flashdata('updated_id', $updated_id);
                }
                redirect('myadminkw/Videos');
            }
            elseif ($this->input->get('is_active') != NULL) {
                $post['video_id'] = $this->input->get('id');
                $post['is_active'] = $this->input->get('is_active');
                $set_active = $this->Videos_model->set_active($user, $post);
                $this->session->set_flashdata('set_active', $set_active);
                $this->session->set_flashdata('set_active_id', $post['video_id']);

                redirect('myadminkw/Videos');
            }
            else {
                $data['name'] = $this->session->userdata('username');
                if (!empty($video_id)) {
                    $data['video'] = $this->Videos_model->getData($video_id);
                }
                $data['menu_active'] = 'add_videos';
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/admin_left_menu');
                $this->load->view('admin/admin_add_videos');
                $this->load->view('admin/admin_footer');

            }
        } else {
            redirect('myadminkw');
        }
    }

    function delete($video_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $this->load->model('Videos_model');
            if (!empty($video_id)) {
                $delete = $this->Videos_model->delete($video_id);
                if ($delete) $this->session->set_flashdata('delete_confirm', $delete);
                redirect('myadminkw/Videos');
            }
            else redirect('myadminkw/Videos');
        } else {
            redirect('myadminkw');
        }
    }
}