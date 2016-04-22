<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

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

            $this->load->model('Members_model');
            $members = $this->Members_model->getData(NULL, 'all');

            if (!empty($members)) {
                $data['members'] = $members;
            }

            $data['menu_active'] = 'members';

            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_left_menu');
            $this->load->view('admin/admin_members');
            $this->load->view('admin/admin_footer');
        } else {
            redirect('myadminkw');
        }
    }

    function add($member_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $user = $this->session->userdata('username');
            $this->load->model('Members_model');
            $data['menu_active'] = 'add_members';

            if (!empty($_POST)) {
                $now = time();
                $error = '';
                $avatar_dir = '';
                $avatar_file = '';

                $member = array(
                    'name' => $_POST['name'],
                    'socmed' => array(
                        'facebook' => $_POST['facebook'],
                        'twitter' => $_POST['twitter'],
                        'instagram' => $_POST['instagram'],
                        'web' => $_POST['web']
                    ),
                );
                $this->session->set_flashdata('member ', $member);

                // ======================================= UPLOAD IMAGE COVER =========================================== //
                if (!empty($_FILES['avatar']['tmp_name'])) {
                    $avatar_dir = "assets/members/";
                    $avatar_ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
                    $avatar_file = $avatar_dir . time() . '.' . $avatar_ext;

                    if (is_dir($avatar_dir) == 0) {
                        $error = $avatar_dir . ' folder is not exist';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('myadminkw/Members/add');
                    }

                    else if (!in_array($avatar_ext, array('jpg', 'jpeg', 'png'))) {
                        $error = 'Only jpg/jpeg/png which are allowed.';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('myadminkw/Members/add');
                    }

                    else {
                        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar_file)) {
                            $this->load->library('image_lib');
                            
                            $size = getimagesize($avatar_file);
                            $img_width = $size[0];
                            $img_height = $size[1];

                            $crop1_config['image_library'] = 'gd2';
                            $crop1_config['source_image']  = $avatar_file;

                            //---------ratio (135/180) = 0.75-----------

                            if($img_width <= $img_height){
                                $crop1_config['width']  = 180;
                            }
                            else{
                                $crop1_config['height'] = 180;
                            }

                            $this->image_lib->initialize($crop1_config);

                            $this->image_lib->resize();

                            $size = getimagesize($avatar_file);
                            $img_width = $size[0];
                            $img_height = $size[1];

                            $crop2_config['image_library'] = 'gd2';
                            $crop2_config['source_image']   = $avatar_file;
                            $crop2_config['maintain_ratio'] = FALSE;
                            if($img_width <= $img_height){
                                $crop2_config['x_axis'] = ($img_width - 180) / 2;
                            }
                            else{
                                $crop2_config['y_axis'] = ($img_height- 180) / 2;
                            }
                            $crop2_config['width']  = 180;
                            $crop2_config['height'] = 180;

                            $this->image_lib->initialize($crop2_config);

                            $this->image_lib->crop();
                        }
                        else {
                            $error = 'Upload avatar failed!';
                            $this->session->set_flashdata('error_upload', $error);
                            redirect('myadminkw/Members/add');
                        }
                    }
                }

                // ========================================= ADD NEW MEMBER ============================================= //
                if (empty($_POST['member_id'])) {

                    $added_member_id = $this->Members_model->add($user, $_POST, $avatar_file);
                    if ($added_member_id) {
                        $this->session->set_flashdata('added_id', $added_member_id);
                    }
                    else {
                        if (!empty($avatar_file)) unlink($avatar_file);
                    }
                }
                // ======================================== UPDATE A MEMBER ============================================ //
                else {
                    /*$member = $this->Members_model->getData($_POST['member_id']);

                    if (!empty($_FILES['avatar']['tmp_name'])) {
                        if (!empty($member[0]['avatar'])) {
                            unlink($member[0]['avatar']);
                        }
                    }*/

                    $updated_member_id = $this->Members_model->update($user, $_POST, $avatar_file);
                    if ($updated_member_id) {
                        $this->session->set_flashdata('updated_id', $updated_member_id);
                    }
                    else {
                        if (!empty($avatar_file)) unlink($avatar_file);
                    }
                }

                redirect('myadminkw/Members');
            }
            // ========================================= PUBLISH / UNPUBLISH ============================================= //
            elseif ($this->input->get('is_active') != NULL) {
                $post['member_id'] = $this->input->get('id');
                $post['is_active'] = $this->input->get('is_active');
                $set_active = $this->Members_model->set_active($user, $post);
                $this->session->set_flashdata('set_active', $set_active);
                $this->session->set_flashdata('set_active_id', $post['member_id']);

                redirect('myadminkw/Members');
            }
            // ========================================= goto MEMBER's form ============================================= //
            else {
                $data['name'] = $this->session->userdata('username');
                $data['is_authorized'] = $this->session->userdata('is_authorized');
                if (!empty($member_id)) {
                    $member = $this->Members_model->getData($member_id);

                    $data['member'] = array(
                        'id' => $member[0]['id'],
                        'name' => $member[0]['name'],
                        'avatar' => $member[0]['avatar'],
                        'is_active' => $member[0]['is_active'],
                    );

                    if(!empty($member[0]['socmed'])){
                        foreach(array_keys($member[0]['socmed']) as $socmed) {
                            $data['member']['socmed'][$socmed] = $member[0]['socmed'][$socmed];
                        }
                    }
                }

                if (!empty($this->session->flashdata('error_upload'))) {
                    $data['error_upload'] = $this->session->flashdata('error_upload');
                    $data['member'] = $this->session->flashdata('member');
                }

                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/admin_left_menu');
                $this->load->view('admin/admin_add_members');
                $this->load->view('admin/admin_footer');

            }
        } else {
            redirect('myadminkw');
        }
    }

    function delete($member_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $this->load->model('Members_model');

            if (!empty($member_id)) {
                $delete = $this->Members_model->delete($member_id);
                if ($delete) {
                    $this->session->set_flashdata('delete_confirm', $delete);
                }
                redirect('myadminkw/Members');
            }
            else {
                redirect('myadminkw/Members');
            }
        } else {
            redirect('myadminkw');
        }
    }
}