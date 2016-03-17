<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Songs extends CI_Controller {

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

        $this->load->model('Songs_model');
        $songs = $this->Songs_model->getData();
        if (!empty($songs)) {
            $data['songs'] = $songs;
        }

        $data['menu_active'] = 'songs';

        $this->load->view('admin_header');
        $this->load->view('admin_left_menu', $data);
        $this->load->view('admin_songs');
        $this->load->view('admin_footer');
    }

    function add($song_id = NULL) {
        $this->load->model('Songs_model');
        $data['menu_active'] = 'add_songs';

        if (!empty($_POST)) {
            $now = time();
            $error = array();
            $cover_file = '';
            $song_file = '';

            // ======================================= UPLOAD IMAGE COVER =========================================== //
            if (!empty($_FILES['song_cover']['tmp_name'])) {
                $cover_folder = "assets/songs/cover/";
                $cover_ext = strtolower(pathinfo($_FILES['song_cover']['name'], PATHINFO_EXTENSION));
                $cover_file = $cover_folder . $now . '.' . $cover_ext;

                if (file_exists($cover_file)) {
                    $error = 'Cover already exist.';
                }
                if (!in_array($cover_ext, array('jpg', 'jpeg', 'png'))) {
                    $error = 'Only jpg/jpeg/png which are allowed.';
                }

                if (empty($error)) {
                    if (move_uploaded_file($_FILES['song_cover']['tmp_name'], $cover_file)) {
                        $this->load->library('image_lib');
                        $config_cover['image_library'] = 'gd2';
                        $config_cover['source_image'] = $cover_file;
                        $config_cover['width'] = 135;
                        $config_cover['height'] = 135;

                        $this->image_lib->initialize($config_cover);
                        $this->image_lib->resize();
                    }
                    else {
                        $error = 'Upload cover failed!';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('admin/Songs/add');
                    }
                }
                else {
                    $this->session->set_flashdata('error_upload', $error);
                    redirect('admin/Songs/add');
                }
            }

            // ======================================= UPLOAD SONG =========================================== //
            if (!empty($_FILES['song']['tmp_name'])) {

                $song_folder = "assets/songs/";
                $song_ext = pathinfo($_FILES['song']['name'], PATHINFO_EXTENSION);

                $song_file = $song_folder . $now . '.' . $song_ext;

                if (file_exists($song_file)) {
                    $error = 'Song already exist.';
                }
                if (!in_array($song_ext, array('mp3', 'wav'))) {
                    $error = 'Only mp3/wav which are allowed.';
                }

                if (empty($error)) {
                    if(move_uploaded_file($_FILES['song']['tmp_name'], $song_file)) {}
                    else {
                        $error = 'Upload song failed!';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('admin/Songs/add');
                    }
                }
                else {
                    $this->session->set_flashdata('error_upload', $error);
                    redirect('admin/Songs/add');
                }
            }

            if (empty($_POST['song_id'])) {
                $added_id = $this->Songs_model->add($_POST, $cover_file, $song_file);
                if ($added_id) {
                    $this->session->set_flashdata('added_id', $added_id);
                }
            }
            else {
                $songs = $this->Songs_model->getData($_POST['song_id']);
                if (!empty($cover_file)) {
                    if (!empty($songs[0]->song_cover_path)) {
                        unlink($songs[0]->song_cover_path);
                    }
                }
                else {
                    $cover_file = !empty($songs[0]->song_cover_path) ? $songs[0]->song_cover_path : '';
                }

                if (!empty($song_file)) {
                    if (!empty($songs[0]->song_path)) {
                        unlink($songs[0]->song_path);
                    }
                }
                else {
                    $song_file = !empty($songs[0]->song_path) ? $songs[0]->song_path : '';
                }

                $updated_id = $this->Songs_model->update($_POST, $cover_file, $song_file);
                if ($updated_id) {
                    $this->session->set_flashdata('updated_id', $updated_id);
                }
            }

            redirect('admin/Songs');
        }
        elseif ($this->input->get('is_active') != NULL) {
            $post['song_id'] = $this->input->get('id');
            $post['is_active'] = $this->input->get('is_active');
            $set_active = $this->Songs_model->set_active($post);
            $this->session->set_flashdata('set_active', $set_active);
            $this->session->set_flashdata('set_active_id', $post['songs_id']);

            redirect('admin/Songs');
        }
        else {
            if (!empty($song_id)) {
                $data['songs'] = $this->Songs_model->getData($song_id);
            }
            $data['error_upload'] = $this->session->flashdata('error_upload');
            $this->load->view('admin_header');
            $this->load->view('admin_left_menu', $data);
            $this->load->view('admin_add_songs');
            $this->load->view('admin_footer');

        }
    }

    function delete($songs_id = NULL) {
        $this->load->model('Songs_model');

        if (!empty($songs_id)) {
            $delete = $this->Songs_model->delete($songs_id);
            if ($delete) {
                $this->session->set_flashdata('delete_confirm', $delete);
            }
            redirect('admin/Songs');
        }
        else {
            redirect('admin/Songs');
        }
    }
}
