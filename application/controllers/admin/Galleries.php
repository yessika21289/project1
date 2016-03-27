<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleries extends CI_Controller {

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
        $data['added_id'] = $this->session->flashdata('added_id');
        $data['updated_id'] = $this->session->flashdata('updated_id');
        $data['set_active'] = $this->session->flashdata('set_active');
        $data['set_active_id'] = $this->session->flashdata('set_active_id');
        $data['delete_confirm'] = $this->session->flashdata('delete_confirm');

        $this->load->model('Galleries_model');
        $albums = $this->Galleries_model->getAlbums();
        if (!empty($albums)) $data['albums'] = $albums;

        $data['menu_active'] = 'galleries';

        $this->load->view('admin_header');
        $this->load->view('admin_left_menu', $data);
        $this->load->view('admin_galleries');
        $this->load->view('admin_footer');
    }

    function add_album() {
        $user = $this->session->userdata('username');
        $this->load->model('Galleries_model');

        $path = 'assets/galleries/';
        $album_dir = $path . strtolower($_POST['album_title']) . '/';

        if (!is_dir($path)) {
            $error = $path . ' folder is not exist';
            $this->session->set_flashdata('error_upload', $error);
            redirect('admin/Galleries/add');
        }
        elseif (is_dir($album_dir)) {
            $error = $album_dir . ' already exist';
            $this->session->set_flashdata('error_upload', $error);
            redirect('admin/Galleries/add');
        }
        elseif (!is_dir($album_dir)) {
            mkdir($album_dir, 0777, TRUE);
        }

        $added_id = $this->Galleries_model->addAlbum($user, $_POST, $album_dir);
        if ($added_id) $this->session->set_flashdata('added_id', $added_id);
        redirect('admin/Galleries/add');
    }

    function add($gallery_id = NULL) {
        $user = $this->session->userdata('username');
        $this->load->model('Galleries_model');

        if (!empty($_POST)) {
//            print_r($_POST);
//            print_r($_FILES);
//            exit;
            $album_id = $_POST['album_id'];
            $album = $this->Galleries_model->getAlbums($album_id);
            $album_dir = $album[0]->directory;

            if (!is_dir($album_dir)) {
                $error = $album_dir . ' folder is not exist';
                $this->session->set_flashdata('error_upload', $error);
                redirect('admin/Galleries/add');
            }
            else if (!empty($_FILES['photos']['tmp_name'])) {
                for ($i = 0; $i < count($_FILES['photos']['name']); $i++) {
                    $photo_ext = strtolower(pathinfo($_FILES['photos']['name'][$i], PATHINFO_EXTENSION));
                    $photo_file = $album_dir . time() . '_' . ($i + 1) . '.' . $photo_ext;

                    if (!in_array($photo_ext, array('jpg', 'jpeg', 'png'))) {
                        $error = 'Only jpg/jpeg/png which are allowed.';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('admin/Galleries/add');
                    }
                    else if (move_uploaded_file($_FILES['photos']['tmp_name'][$i], $photo_file)) {
                        $this->load->library('image_lib');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $photo_file;
                        $config['width'] = 180;
                        $config['height'] = 135;

                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();

                        $added_id = $this->Galleries_model->addPhotos($user, $photo_file, $album_id);
                    }
                    else {
                        $error = 'Upload photos failed!';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('admin/Galleries/add');
                    }
                }
            }

            if ($added_id) $this->session->set_flashdata('added_id', $added_id);
            redirect('admin/Galleries');
        }
        elseif ($this->input->get('is_active') != NULL) {
            $post['gallery_id'] = $this->input->get('id');
            $post['is_active'] = $this->input->get('is_active');
            $set_active = $this->Galleries_model->set_active($user, $post);
            $this->session->set_flashdata('set_active', $set_active);
            $this->session->set_flashdata('set_active_id', $post['gallery_id']);

            redirect('admin/Galleries');
        }
        else {
            if (!empty($this->session->flashdata('error_upload'))) {
                $data['error_upload'] = $this->session->flashdata('error_upload');
            }

            $data['albums'] = $this->Galleries_model->getAlbums();
            $data['menu_active'] = 'add_galleries';
            $this->load->view('admin_header');
            $this->load->view('admin_left_menu', $data);
            $this->load->view('admin_add_galleries');
            $this->load->view('admin_footer');
        }
    }

    function edit($album_id = NULL) {
        $user = $this->session->userdata('username');
        $this->load->model('Galleries_model');

        $data['album'] = $this->Galleries_model->getAlbums($album_id);
        $data['photos'] = $this->Galleries_model->getPhotos($album_id);

        $data['menu_active'] = 'edit_galleries';
        $this->load->view('admin_header');
        $this->load->view('admin_left_menu', $data);
        $this->load->view('admin_edit_galleries');
        $this->load->view('admin_footer');
    }

    function delete($gallery_id = NULL) {
        $this->load->model('Galleries_model');
        if (!empty($gallery_id)) {
            $delete = $this->Galleries_model->delete($gallery_id);
            if ($delete) $this->session->set_flashdata('delete_confirm', $delete);
            redirect('admin/Galleries');
        }
        else redirect('admin/Galleries');
    }
}
