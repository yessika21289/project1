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
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $data['name'] = $this->session->userdata('username');
            $data['is_authorized'] = $this->session->userdata('is_authorized');
            $data['added_id'] = $this->session->flashdata('added_id');
            $data['updated_id'] = $this->session->flashdata('updated_id');
            $data['set_active'] = $this->session->flashdata('set_active');
            $data['set_active_id'] = $this->session->flashdata('set_active_id');
            $data['delete_confirm'] = $this->session->flashdata('delete_confirm');

            $this->load->model('Songs_model');
            $songs = $this->Songs_model->getData(NULL, 'all');
            if (!empty($songs)) {
                $data['songs'] = $songs;
            }

            $data['menu_active'] = 'songs';

            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_left_menu');
            $this->load->view('admin/admin_songs');
            $this->load->view('admin/admin_footer');
        }
        else {
            redirect('myadminkw');
        }
    }

    function add($song_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $user = $this->session->userdata('username');
            $this->load->model('Songs_model');
            $data['menu_active'] = 'add_songs';

            // ================================================ ADD SONG ================================================ //
            if (!empty($_POST)) {
                $now = time();
                $error = '';
                $cover_dir = '';
                $cover_file = '';
                $song_dir = '';
                $song_file = '';
                $song = array(
                    'title' => (!empty($_POST['title'])) ? $_POST['title'] : '',
                    'artist' => (!empty($_POST['artist'])) ? $_POST['artist'] : '',
                    'release_date' => (!empty($_POST['release_date'])) ? $_POST['release_date'] : '',
                    'lyric' => (!empty($_POST['lyric'])) ? $_POST['lyric'] : ''
                );
                $this->session->set_flashdata('song', $song);

                // ============================================ UPLOAD SONG ============================================ //
                if (!empty($_FILES['song']['tmp_name'])) {

                    $song_folder = "assets/songs/";
                    $song_ext = pathinfo($_FILES['song']['name'], PATHINFO_EXTENSION);
                    $song_file = $song_folder . $now . '.' . $song_ext;

                    if (is_dir($song_folder) == 0) {
                        $error = $song_folder . ' folder is not exist';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('myadminkw/Songs/add');
                    }
                    else if (file_exists($song_file)) {
                        $error = 'Song already exist.';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('myadminkw/Songs/add');
                    }
                    else if (!in_array($song_ext, array('mp3', 'wav'))) {
                        $error = 'Only mp3/wav which are allowed.';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('myadminkw/Songs/add');
                    }
                    else {
                        if (move_uploaded_file($_FILES['song']['tmp_name'], $song_file)) {
                        }
                        else {
                            $error = 'Upload song failed!';
                            $this->session->set_flashdata('error_upload', $error);
                            redirect('myadminkw/Songs/add');
                        }
                    }
                }

                // ====================================== UPLOAD IMAGE COVER =========================================== //
                if (!empty($_FILES['song_cover']['tmp_name'])) {
                    $cover_dir = "assets/songs/cover/";

                    $cover_ext = strtolower(pathinfo($_FILES['song_cover']['name'], PATHINFO_EXTENSION));
                    $cover_file = $cover_dir . $now . '.' . $cover_ext;
                    $cover_file_home = $cover_dir . $now . '_home.' . $cover_ext;

                    if (is_dir($cover_dir) == 0) {
                        $error = $cover_dir . ' folder is not exist';
                        if (!empty($song_file)) unlink($song_file);
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('myadminkw/Songs/add');
                    }
                    else if (file_exists($cover_file)) {
                        $error = 'Cover already exist.';
                        if (!empty($song_file)) unlink($song_file);
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('myadminkw/Songs/add');
                    }
                    else if (!in_array($cover_ext, array('jpg', 'jpeg', 'png'))) {
                        $error = 'Only jpg/jpeg/png which are allowed.';
                        if (!empty($song_file)) unlink($song_file);
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('myadminkw/Songs/add');
                    }
                    else {
                        if (move_uploaded_file($_FILES['song_cover']['tmp_name'], $cover_file)) {
                            $this->load->library('image_lib');

                            $size = getimagesize($cover_file);
                            $img_width = $size[0];
                            $img_height = $size[1];

                            $crop1_config['image_library'] = 'gd2';
                            $crop1_config['source_image']  = $cover_file;

                            //---------ratio (370/370) = 1-----------

                            if($img_width/$img_height <= 1){
                                $crop1_config['width']  = 370;
                            }
                            else{
                                $crop1_config['height'] = 370;
                            }

                            $this->image_lib->initialize($crop1_config);

                            $this->image_lib->resize();

                            $size = getimagesize($cover_file);
                            $img_width = $size[0];
                            $img_height = $size[1];

                            $crop2_config['image_library'] = 'gd2';
                            $crop2_config['source_image']   = $cover_file;
                            $crop2_config['new_image'] = $cover_file_home;
                            $crop2_config['quality'] = '100%';
                            $crop2_config['maintain_ratio'] = FALSE;
                            if($img_width <= $img_height){
                                $crop2_config['y_axis'] = ($img_height- 370) / 2;
                            }
                            else{
                                $crop2_config['x_axis'] = ($img_width - 370) / 2;
                            }
                            $crop2_config['width']  = 370;
                            $crop2_config['height'] = 370;

                            $this->image_lib->initialize($crop2_config);

                            $this->image_lib->crop();

                            $crop3_config['image_library'] = 'gd2';
                            $crop3_config['source_image']  = $cover_file_home;
                            $crop3_config['new_image'] = $cover_file;

                            $crop3_config['width']  = 135;
                            $crop3_config['height'] = 135;

                            $this->image_lib->initialize($crop3_config);

                            $this->image_lib->resize();
                        }
                        else {
                            $error = 'Upload cover failed!';
                            if (!empty($song_file)) unlink($song_file);
                            $this->session->set_flashdata('error_upload', $error);
                            redirect('myadminkw/Songs/add');
                        }
                    }
                }

                // ============================================= NEW SONG ============================================= //
                if (empty($_POST['song_id'])) {
                    $added_id = $this->Songs_model->add($user, $_POST, $cover_file, $song_file);
                    if ($added_id) {
                        $this->session->set_flashdata('added_id', $added_id);
                    }
                    else {
                        if (!empty($song_file)) unlink($song_file);
                        if (!empty($cover_file)) unlink($song_file);
                    }
                }
                // ============================================ UPDATE SONG ============================================ //
                else {
                    /*$song = $this->Songs_model->getData($_POST['song_id']);
                    if (!empty($_FILES['song_cover']['tmp_name'])){
                        if (!empty($song[0]->song_cover_path)) {
                            unlink($song[0]->song_cover_path);
                        }
                    }

                    if (!empty($_FILES['song']['tmp_name'])){
                        if (!empty($song[0]->song_path)) {
                            unlink($song[0]->song_path);
                        }
                    }*/

                    $updated_id = $this->Songs_model->update($user, $_POST, $cover_file, $song_file);
                    if ($updated_id) {
                        $this->session->set_flashdata('updated_id', $updated_id);
                    }
                    else {
                        if (!empty($song_file)) unlink($song_file);
                        if (!empty($cover_file)) unlink($song_file);
                    }
                }

                redirect('myadminkw/Songs');
            }
            // ========================================== PUBLISH / UNPUBLISH ========================================== //
            elseif ($this->input->get('is_active') != NULL) {
                $post['song_id'] = $this->input->get('id');
                $post['is_active'] = $this->input->get('is_active');
                $set_active = $this->Songs_model->set_active($user, $post);
                $this->session->set_flashdata('set_active', $set_active);
                $this->session->set_flashdata('set_active_id', $post['song_id']);

                redirect('myadminkw/Songs');
            }
            // ============================================ goto SONG's FORM ============================================ //
            else {
                $data['name'] = $this->session->userdata('username');
                $data['is_authorized'] = $this->session->userdata('is_authorized');
                if (!empty($song_id)) {
                    $song = $this->Songs_model->getData($song_id);
                    $data['song'] = array(
                        'id' => $song[0]->id,
                        'title' => $song[0]->title,
                        'artist' => $song[0]->artist,
                        'lyric' => $song[0]->lyric,
                        'release_date' => $song[0]->release_date,
                        'song_cover_path' => $song[0]->song_cover_path
                    );
                }

                if (!empty($this->session->flashdata('error_upload'))) {
                    $data['error_upload'] = $this->session->flashdata('error_upload');
                    $data['songs'] = $this->session->flashdata('songs');
                }

                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/admin_left_menu');
                $this->load->view('admin/admin_add_songs');
                $this->load->view('admin/admin_footer');

            }
        }
        else {
            redirect('myadminkw');
        }
    }

    function delete($song_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $this->load->model('Songs_model');

            if (!empty($song_id)) {
                $delete = $this->Songs_model->delete($song_id);
                if ($delete) {
                    $this->session->set_flashdata('delete_confirm', $delete);
                }
                redirect('myadminkw/Songs');
            }
            else {
                redirect('myadminkw/Songs');
            }
        }
        else {
            redirect('myadminkw');
        }
    }
}