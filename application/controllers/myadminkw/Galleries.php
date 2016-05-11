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
            $data['is_authorized'] = $this->session->userdata('is_authorized');
            $data['added_id'] = $this->session->flashdata('added_id');
            $data['updated_id'] = $this->session->flashdata('updated_id');
            $data['set_active'] = $this->session->flashdata('set_active');
            $data['set_active_id'] = $this->session->flashdata('set_active_id');
            $data['delete_confirm'] = $this->session->flashdata('delete_confirm');

            $this->load->model('Galleries_model');
            $albums = $this->Galleries_model->getAlbums(NULL, 'all');
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
            $thumb_dir = $album_dir . '/thumb/';

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
                mkdir($thumb_dir, 0777, TRUE);
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
            $new_album_dir = $path . strtolower($_POST['album_title']);
//            $old_album_dir = $path . strtolower($_POST['old_album_title']);

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
                    $photo_upload = array();
                    $photo_thumb = array();
                    for ($i = 0; $i < count($_FILES['photos']['name']); $i++) {
                        $photo_ext = strtolower(pathinfo($_FILES['photos']['name'][$i], PATHINFO_EXTENSION));
                        $filename = time() . '_' . ($i + 1) . '.' . $photo_ext;
                        $photo_file = $new_album_dir . $filename;
                        $thumb_file = $new_album_dir . '/thumb/thumb_' . $filename;

                        if (!in_array($photo_ext, array('jpg', 'jpeg', 'png'))) {
                            $error = 'Only jpg/jpeg/png which are allowed.';
                            $this->session->set_flashdata('error_upload', $error);
                            redirect('myadminkw/Galleries/edit/' . $album_id);
                        }
                        else if (move_uploaded_file($_FILES['photos']['tmp_name'][$i], $photo_file)) {
                            $added_id = $this->Galleries_model->addPhotos($user, $photo_file, $album_id);

                            array_push($photo_upload, $photo_file);
                            array_push($photo_thumb, $thumb_file);
                        }
                        else {
                            $error = 'Upload photos failed!';
                            $this->session->set_flashdata('error_upload', $error);
                            redirect('myadminkw/Galleries/edit/' . $album_id);
                        }
                    }

                    $this->load->library('image_lib');

                    foreach ($photo_upload as $key => $photo_item) {
                        $size = getimagesize($photo_item);
                        $img_width = $size[0];
                        $img_height = $size[1];

                        if($img_width > 1280 || $img_height > 1280){
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $photo_item;
                            $config['quality'] = '100%';
                            $config['width'] = 1280;
                            $config['height'] = 1280;
                            
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                        }
                    }

                    foreach ($photo_upload as $key => $photo_item) {
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] = $photo_item;
                        $config2['new_image'] = $photo_thumb[$key];
                        $config2['width'] = 250;

                        $this->image_lib->initialize($config2);
                        $this->image_lib->resize();                        
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
                else if (isset($_FILES['photos']['tmp_name']) && count($_FILES['photos']['tmp_name']) > 0) {
                    $photo_upload = array();
                    $photo_thumb = array();
                    for ($i = 0; $i < count($_FILES['photos']['name']); $i++) {
                        $photo_ext = strtolower(pathinfo($_FILES['photos']['name'][$i], PATHINFO_EXTENSION));
                        $filename = time() . '_' . ($i + 1) . '.' . $photo_ext;
                        $photo_file = $album_dir . $filename;
                        $thumb_file = $album_dir . '/thumb/thumb_' . $filename;

                        if (!in_array($photo_ext, array('jpg', 'jpeg', 'png'))) {
                            $error = 'Only jpg/jpeg/png which are allowed.';
                            $this->session->set_flashdata('error_upload', $error);
                            redirect('myadminkw/Galleries/add');
                        }
                        else if (move_uploaded_file($_FILES['photos']['tmp_name'][$i], $photo_file)) {
                            $added_id = $this->Galleries_model->addPhotos($user, $photo_file, $album_id);

                            array_push($photo_upload, $photo_file);
                            array_push($photo_thumb, $thumb_file);
                        }
                        else {
                            $error = 'Upload photos failed!';
                            $this->session->set_flashdata('error_upload', $error);
                            redirect('myadminkw/Galleries/add');
                        }
                    }

                    foreach ($photo_upload as $key => $photo_item) {
                        $this->load->library('image_lib');

                        $size = getimagesize($photo_item);
                        $img_width = $size[0];
                        $img_height = $size[1];

                        if($img_width > 1280 || $img_height > 1280){
                            $config['image_library'] = 'gd2';
                            $config['source_image'] = $photo_item;
                            $config['quality'] = '100%';
                            $config['width'] = 1280;
                            $config['height'] = 1280;
                            
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                        }
                    }

                    foreach ($photo_upload as $key => $photo_item) {
                        $config2['image_library'] = 'gd2';
                        $config2['source_image'] = $photo_item;
                        $config2['new_image'] = $photo_thumb[$key];
                        $config2['width'] = 250;

                        $this->image_lib->initialize($config2);
                        $this->image_lib->resize();                        
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
                $data['is_authorized'] = $this->session->userdata('is_authorized');
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
            $data['is_authorized'] = $this->session->userdata('is_authorized');
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
                if (!empty($photo_file[0]->photo)){
                    unlink($photo_file[0]->photo);

                    //delete thumbnail
                    $path_section = explode('/',$photo_file[0]->photo);
                    $thumb_path = $path_section[0] . '/' . $path_section[1] . '/' . $path_section[2] . '/thumb/thumb_' . $path_section[3];
                    unlink($thumb_path);
                }
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
                        $path_section = explode('/',$photo->photo);
                        $thumb_path = $path_section[0] . '/' . $path_section[1] . '/' . $path_section[2] . '/thumb/thumb_' . $path_section[3];
                        unlink($thumb_path);
                    }
                    $this->Galleries_model->deletePhotos($album_id);
                }

                $album = $this->Galleries_model->getAlbums($album_id);
                if (!empty($album)) {
                    rmdir($album[0]->directory . '/thumb');
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
