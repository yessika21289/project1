<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Songs extends CI_Controller
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

        $this->load->model('Songs_model');
        $songs = $this->Songs_model->getData();
        if(!empty($songs)) $data['songs'] = $songs;

        $data['menu_active'] = 'songs';

        $this->load->view('admin_header');
        $this->load->view('admin_left_menu', $data);
        $this->load->view('admin_songs');
        $this->load->view('admin_footer');
    }

    function add($songs_id = NULL)
    {
        $this->load->model('Songs_model');

        if(!empty($_POST)) {
            if(empty($_POST['songs_id'])) {
                $added_id = $this->Songs_model->add($_POST);
                if($added_id) $this->session->set_flashdata('added_id', $added_id);
            }
            else {
                $updated_id = $this->Songs_model->update($_POST);
                if($updated_id) $this->session->set_flashdata('updated_id', $updated_id);
            }
            redirect('Songs');
        } elseif($this->input->get('is_active') != NULL) {
            $post['songs_id'] = $this->input->get('id');
            $post['is_active'] = $this->input->get('is_active');
            $set_active = $this->Songs_model->set_active($post);
            $this->session->set_flashdata('set_active', $set_active);
            $this->session->set_flashdata('set_active_id', $post['songs_id']);

            redirect('Songs');
        } else {
            if(!empty($songs_id)) {
                $data['songs'] = $this->Songs_model->getData($songs_id);
            }
            $data['menu_active'] = 'add_songs';
            $this->load->view('admin_header');
            $this->load->view('admin_left_menu', $data);
            $this->load->view('admin_add_songs');
            $this->load->view('admin_footer');
        }
    }

    function delete($songs_id = NULL) {
        $this->load->model('Songs_model');
        if(!empty($songs_id)) {
            $delete = $this->Songs_model->delete($songs_id);
            if($delete) $this->session->set_flashdata('delete_confirm', $delete);
            redirect('Songs');
        } else redirect('Songs');
    }
}