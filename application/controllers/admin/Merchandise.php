<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise extends CI_Controller {

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

        $this->load->model('Merchandise_model');
        $merchandise = $this->Merchandise_model->getData();

        if (!empty($merchandise)) $data['merchandise'] = $merchandise;

        $data['menu_active'] = 'merchandise';

        $this->load->view('admin_header');
        $this->load->view('admin_left_menu', $data);
        $this->load->view('admin_merchandise');
        $this->load->view('admin_footer');
    }

    function add($merchandise_id = NULL) {
        $user = $this->session->userdata('username');
        $this->load->model('Merchandise_model');
        $data['menu_active'] = 'add_merchandise';

        if (!empty($_POST)) {
            $now = time();
            $error = '';
            $merchandise_dir = '';
            $merchandise_file = '';

            $merchandise = array(
                'price' => $_POST['price'],
                'title' => $_POST['title'],
                'desc' => $_POST['desc'],
            );
            $this->session->set_flashdata('merchandise', $merchandise);

            // ======================================= UPLOAD ITEM IMAGE ============================================ //
            if (!empty($_FILES['merchandise']['tmp_name'])) {
                $merchandise_dir = "assets/merchandise/";
                $merchandise_ext = strtolower(pathinfo($_FILES['merchandise']['name'], PATHINFO_EXTENSION));
                $merchandise_file = $merchandise_dir . $now . '.' . $merchandise_ext;

                if (is_dir($merchandise_dir) == 0) {
                    $error = $merchandise_dir . ' folder is not exist';
                    $this->session->set_flashdata('error_upload', $error);
                    redirect('admin/Merchandise/add');
                }

                else if (!in_array($merchandise_ext, array('jpg', 'jpeg', 'png'))) {
                    $error = 'Only jpg/jpeg/png which are allowed.';
                    $this->session->set_flashdata('error_upload', $error);
                    redirect('admin/Merchandise/add');
                }

                else {
                    if (move_uploaded_file($_FILES['merchandise']['tmp_name'], $merchandise_file)) {
                        $this->load->library('image_lib');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = $merchandise_file;
                        $config['width'] = 180;
                        $config['height'] = 135;

                        $this->image_lib->initialize($config);
                        $this->image_lib->resize();
                    }
                    else {
                        $error = 'Upload image failed!';
                        $this->session->set_flashdata('error_upload', $error);
                        redirect('admin/Merchandise/add');
                    }
                }
            }

            // ========================================= ADD NEW ITEM ============================================= //
            if (empty($_POST['merchandise_id'])) {
                $added_merchandise_id = $this->Merchandise_model->add($user, $_POST, $merchandise_file);
                if ($added_merchandise_id) {
                    $this->session->set_flashdata('added_id', $added_merchandise_id);
                } else {
                    if(!empty($merchandise_file)) unlink($merchandise_file);
                }
            }
            // ======================================== UPDATE AN ITEM ============================================ //
            else {
                $merchandise = $this->Merchandise_model->getData($_POST['merchandise_id']);

                if(!empty($merchandise_file) && !empty($merchandise[0]['image'])) {
                    unlink($merchandise[0]['image']);
                }

                $updated_merchandise_id = $this->Merchandise_model->update($user, $_POST, $merchandise_file);
                if ($updated_merchandise_id) {
                    $this->session->set_flashdata('updated_id', $updated_merchandise_id);
                } else {
                    if(!empty($merchandise_file)) unlink($merchandise_file);
                }
            }

            redirect('admin/Merchandise');
        }
        // ========================================= PUBLISH / UNPUBLISH ============================================= //
        elseif ($this->input->get('is_active') != NULL) {
            $post['member_id'] = $this->input->get('id');
            $post['is_active'] = $this->input->get('is_active');
            $set_active = $this->Members_model->set_active($post);
            $this->session->set_flashdata('set_active', $set_active);
            $this->session->set_flashdata('set_active_id', $post['members_id']);

            redirect('admin/Members');
        }
        // ========================================= goto MEMBER's form ============================================= //
        else {
            if (!empty($merchandise_id)) {
                $merchandise = $this->Merchandise_model->getData($merchandise_id);
                $data['merchandise'] = array(
                    'id' => $merchandise[0]->id,
                    'price' => $merchandise[0]->price,
                    'title' => $merchandise[0]->title,
                    'desc' => $merchandise[0]->description
                );
            }

            if(!empty($this->session->flashdata('error_upload'))) {
                $data['error_upload'] = $this->session->flashdata('error_upload');
                $data['merchandise'] = $this->session->flashdata('merchandise');
            }

            $this->load->view('admin_header');
            $this->load->view('admin_left_menu', $data);
            $this->load->view('admin_add_merchandise');
            $this->load->view('admin_footer');

        }
    }

    function delete($merchandise_id = NULL) {
        $this->load->model('Merchandise_model');

        if (!empty($merchandise_id)) {
            $delete = $this->Merchandise_model->delete($merchandise_id);
            if ($delete) $this->session->set_flashdata('delete_confirm', $delete);
            redirect('admin/Merchandise');
        }
        else redirect('admin/Merchandise');
    }
}
