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
        $user = $this->session->userdata('logged_in');
        if(isset($user)) {
            $data['name'] = $this->session->userdata('username');
            $data['added_id'] = $this->session->flashdata('added_id');
            $data['updated_id'] = $this->session->flashdata('updated_id');
            $data['set_active'] = $this->session->flashdata('set_active');
            $data['set_active_id'] = $this->session->flashdata('set_active_id');
            $data['delete_confirm'] = $this->session->flashdata('delete_confirm');

            $this->load->model('Galleries_model');
            $albums = $this->Galleries_model->getAlbums();
            if (!empty($albums)) $data['albums'] = $albums;

            $data['menu_active'] = 'galleries';

            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_left_menu');
            $this->load->view('admin/admin_galleries');
            $this->load->view('admin/admin_footer');
        } else {
            redirect('myadminkw');
        }
    }

    function add_album() {
        $user = $this->session->userdata('logged_in');
        if(isset($user)) {
            $user = $this->session->userdata('username');
            $this->load->model('Galleries_model');

            $path = 'assets/galleries/';
            $album_dir = $path . strtolower($_POST['album_title']) . '/';

            if (!is_dir($path)) {
                $error = $path . ' folder is not exist';
                $this->session->set_flashdata('error_upload', $error);
                redirect('myadminkw/Galleries/add');
            }
            elseif (is_dir($album_dir)) {
                $error = $album_dir . ' already exist';
                $this->session->set_flashdata('error_upload', $error);
                redirect('myadminkw/Galleries/add');
            }
            elseif (!is_dir($album_dir)) {
                mkdir($album_dir, 0777, TRUE);
            }

            $added_id = $this->Galleries_model->addAlbum($user, $_POST, $album_dir);
            if ($added_id) $this->session->set_flashdata('added_id', $added_id);
            redirect('myadminkw/Galleries/add');
        } else {
            redirect('myadminkw');
        }
    }

    function edit_album() {
        $user = $this->session->userdata('logged_in');
        if(isset($user)) {
            $user = $this->session->userdata('username');
            $this->load->model('Galleries_model');
            $path = 'assets/galleries/';
            $new_album_dir = $path . strtolower($_POST['album_title']) . '/';

            if (!empty($_POST)) {
                $album_id = $_POST['album_id'];
                $album = $this->Galleries_model->getAlbums($album_id);
                $photos = $this->Galleries_model->getPhotos($album_id);
                foreach ($photos as $photo) {
                    $photo_file = substr($photo->photo, strrpos($photo->photo, '/') + 1);
                    $new_photo_file = $new_album_dir . $photo_file;
                    $this->Galleries_model->editPhotos($user, $photo->id, $new_photo_file);
                }

                $old_album_dir = $album[0]->directory;
                $updated_id = $this->Galleries_model->editAlbum($_POST, $user, $old_album_dir, $new_album_dir);

                if (!is_dir($new_album_dir)) {
                    $error = $new_album_dir . ' folder is not exist';
                    $this->session->set_flashdata('error_upload', $error);
                    redirect('myadminkw/Galleries/edit/' . $album_id);
                }
                else if (!empty($_FILES['photos']['tmp_name'][0])) {
                    for ($i = 0; $i < count($_FILES['photos']['name']); $i++) {
                        $photo_ext = strtolower(pathinfo($_FILES['photos']['name'][$i], PATHINFO_EXTENSION));
                        $photo_file = $new_album_dir . time() . '_' . ($i + 1) . '.' . $photo_ext;

                        if (!in_array($photo_ext, array('jpg', 'jpeg', 'png'))) {
                            $error = 'Only jpg/jpeg/png which are allowed.';
                            $this->session->set_flashdata('error_upload', $error);
                            redirect('myadminkw/Galleries/edit/' . $album_id);
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
                            redirect('myadminkw/Galleries/edit/' . $album_id);
                        }
                    }
                }

                if ($updated_id) $this->session->set_flashdata('updated_id', $updated_id);
                redirect('myadminkw/Galleries');
            }
        } else {
            redirect('myadminkw');
        }
    }

    function add($album_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if(isset($user)) {
            $user = $this->session->userdata('username');
            $this->load->model('Galleries_model');

            if (!empty($_POST)) {
                $album_id = $_POST['album_id'];
                $album = $this->Galleries_model->getAlbums($album_id);
                $album_dir = $album[0]->directory;

                if (!is_dir($album_dir)) {
                    $error = $album_dir . ' folder is not exist';
                    $this->session->set_flashdata('error_upload', $error);
                    redirect('myadminkw/Galleries/add');
                }
                else if (!empty($_FILES['photos']['tmp_name'][0])) {
                    for ($i = 0; $i < count($_FILES['photos']['name']); $i++) {
                        $photo_ext = strtolower(pathinfo($_FILES['photos']['name'][$i], PATHINFO_EXTENSION));
                        $photo_file = $album_dir . time() . '_' . ($i + 1) . '.' . $photo_ext;

                        if (!in_array($photo_ext, array('jpg', 'jpeg', 'png'))) {
                            $error = 'Only jpg/jpeg/png which are allowed.';
                            $this->session->set_flashdata('error_upload', $error);
                            redirect('myadminkw/Galleries/add');
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
                            redirect('myadminkw/Galleries/add');
                        }
                    }
                }

                if ($added_id) $this->session->set_flashdata('added_id', $added_id);
                redirect('myadminkw/Galleries');
            }
            elseif ($this->input->get('is_active') != NULL) {
                $post['album_id'] = $this->input->get('id');
                $post['is_active'] = $this->input->get('is_active');
                $set_active = $this->Galleries_model->set_active($user, $post);
                $this->session->set_flashdata('set_active', $set_active);
                $this->session->set_flashdata('set_active_id', $post['album_id']);

                redirect('myadminkw/Galleries');
            }
            else {
                $data['name'] = $this->session->userdata('username');
                if (!empty($this->session->flashdata('error_upload'))) {
                    $data['error_upload'] = $this->session->flashdata('error_upload');
                }

                $data['albums'] = $this->Galleries_model->getAlbums();
                $data['menu_active'] = 'add_galleries';
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/admin_left_menu');
                $this->load->view('admin/admin_add_galleries');
                $this->load->view('admin/admin_footer');
            }
        } else {
            redirect('myadminkw');
        }
    }

    function edit($album_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if(isset($user)) {
            $data['name'] = $this->session->userdata('username');
            $user = $data['name'];
            $this->load->model('Galleries_model');

            $data['album'] = $this->Galleries_model->getAlbums($album_id);
            $data['photos'] = $this->Galleries_model->getPhotos($album_id);

            $data['menu_active'] = 'galleries';
            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_left_menu');
            $this->load->view('admin/admin_edit_galleries');
            $this->load->view('admin/admin_footer');
        } else {
            redirect('myadminkw');
        }
    }

    function del_photo($photo_id) {
        $user = $this->session->userdata('logged_in');
        if(isset($user)) {
            $this->load->model('Galleries_model');
            if (!empty($photo_id)) {
                $photo_file = $this->Galleries_model->getPhotoFile($photo_id);
                if (!empty($photo_file[0]->photo)) unlink($photo_file[0]->photo);
                $delete = $this->Galleries_model->deletePhoto($photo_id);
                if ($delete) $this->session->set_flashdata('delete_confirm', $delete);
                redirect('myadminkw/Galleries/edit/' . $photo_file[0]->album_id);
            }
            else redirect('myadminkw/Galleries');
        } else {
            redirect('myadminkw');
        }
    }

    function delete($album_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if(isset($user)) {
            $this->load->model('Galleries_model');
            if (!empty($album_id)) {
                $photos = $this->Galleries_model->getPhotos($album_id);
                if (!empty($photos)) {
                    foreach ($photos as $photo) {
                        unlink($photo->photo);
                    }
                    $this->Galleries_model->deletePhotos($album_id);
                }

                $album = $this->Galleries_model->getAlbums($album_id);
                if (!empty($album)) {
                    rmdir($album[0]->directory);
                    $delete = $this->Galleries_model->delete($album_id);
                }
                if ($delete) $this->session->set_flashdata('delete_confirm', $delete);
                redirect('myadminkw/Galleries');
            }
            else redirect('myadminkw/Galleries');
        } else {
            redirect('myadminkw');
        }
    }
}
