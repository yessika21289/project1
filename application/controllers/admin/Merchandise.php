<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise extends CI_Controller
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

        $this->load->model('Merchandise_model');
        $merchandise = $this->Merchandise_model->getData();

        if(!empty($merchandise)) $data['merchandise'] = $merchandise;

        $data['menu_active'] = 'merchandise';

        $this->load->view('admin_header');
        $this->load->view('admin_left_menu', $data);
        $this->load->view('admin_merchandise');
        $this->load->view('admin_footer');
    }

    function add($member_id = NULL)
    {
        $this->load->model('Merchandise_model');
        $data['menu_active'] = 'add_merchandise';
        if(!empty($_POST)) {
            if(empty($_POST['member_id'])) {
                $member_id = $this->Merchandise_model->add($_POST, $_FILES);
                if($member_id) $this->session->set_flashdata('added_id', $member_id);
            }
            else {
                $member_id = $this->Merchandise_model->update($_POST, $_FILES);
                if($member_id) $this->session->set_flashdata('updated_id', $member_id);
            }

            // ======================================= UPLOAD IMAGE COVER =========================================== //
            if(!empty($_FILES['avatar'])) {
                $target_dir = "assets/merchandise/";
                $ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));

                $target_file = $target_dir.$member_id.'_'.$_POST['name'].'.'.$ext;

                $error = array();
                if(file_exists($target_file)) $error['file_exist'] = 1;
                if(!in_array($ext, array('jpg', 'jpeg', 'png'))) $error['not_allowed_filetype'] = 1;

                if(empty($error)) {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                    $this->load->library('image_lib');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $target_file;
                    $config['width'] = 135;
                    $config['height'] = 180;

                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                } else {
                    if($error['file_exist']) echo "File already exist.<br/>";
                    if($error['not_allowed_filetype']) echo "Not allowed file type.";
                }
            }

            redirect('admin/Merchandise');
        }
        elseif($this->input->get('is_active') != NULL) {
            $post['song_id'] = $this->input->get('id');
            $post['is_active'] = $this->input->get('is_active');
            $set_active = $this->Merchandise_model->set_active($post);
            $this->session->set_flashdata('set_active', $set_active);
            $this->session->set_flashdata('set_active_id', $post['merchandise_id']);

            redirect('admin/Merchandise');
        } else {
            if(!empty($member_id)) {
                $data['merchandise'] = $this->Merchandise_model->getData($member_id);
            }

            $this->load->view('admin_header');
            $this->load->view('admin_left_menu', $data);
            $this->load->view('admin_add_merchandise');
            $this->load->view('admin_footer');

        }
    }

    function delete($merchandise_id = NULL) {
        $this->load->model('Merchandise_model');

        if(!empty($merchandise_id)) {
            $delete = $this->Merchandise_model->delete($merchandise_id);
            if($delete) $this->session->set_flashdata('delete_confirm', $delete);
            redirect('admin/Merchandise');
        } else redirect('admin/Merchandise');
    }
}
