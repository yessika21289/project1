<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
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
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $data['name'] = $this->session->userdata('username');
            $data['is_authorized'] = $this->session->userdata('is_authorized');
            $data['added_id'] = $this->session->flashdata('added_id');
            $data['updated_id'] = $this->session->flashdata('updated_id');
            $data['set_active'] = $this->session->flashdata('set_active');
            $data['set_active_id'] = $this->session->flashdata('set_active_id');
            $data['delete_confirm'] = $this->session->flashdata('delete_confirm');

            $this->load->model('Users_model');
            $users = $this->Users_model->getData();
            if (!empty($users)) $data['users'] = $users;

            $data['menu_active'] = 'users';

            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_left_menu');
            $this->load->view('admin/admin_users');
            $this->load->view('admin/admin_footer');
        } else {
            redirect('myadminkw');
        }
    }

    function add($users_id = NULL)
    {
        $user = $this->session->userdata('logged_in');
        $is_authorized = $this->session->userdata('is_authorized');
        $post_user_id = !empty($_POST['user_id']) ? $_POST['user_id'] : '';

        if (isset($user) && ($is_authorized == 1 || $users_id == $this->session->userdata('user_id') || $post_user_id == $this->session->userdata('user_id'))) {
            $user = $this->session->userdata('username');
            $data['name'] = $user;
            $data['is_authorized'] = $is_authorized;
            $this->load->model('Users_model');

            if (!empty($_POST)) {
                if (empty($post_user_id)) {
                    $added_id = $this->Users_model->add($_POST);
                    if ($added_id) $this->session->set_flashdata('added_id', $added_id);
                }
                else {
                    $user_existed = $this->Users_model->getData($post_user_id);
                    if($user_existed[0]->password != sha1(md5($_POST['old_password']))) {
                        $this->session->set_flashdata('error', 'Incorrect password!');
                        redirect('myadminkw/Users/add/'.$post_user_id);
                    } else {
                        $updated_id = $this->Users_model->update($_POST);
                        if ($updated_id) $this->session->set_flashdata('updated_id', $updated_id);
                    }
                }
                redirect('myadminkw/Users');
            }
            elseif ($this->input->get('is_active') != NULL) {
                $post['users_id'] = $this->input->get('id');
                $post['is_active'] = $this->input->get('is_active');
                $set_active = $this->Users_model->set_active($user, $post);
                $this->session->set_flashdata('set_active', $set_active);
                $this->session->set_flashdata('set_active_id', $post['Users_id']);

                redirect('myadminkw/Users');
            }
            else {
                if (!empty($users_id)) $data['users'] = $this->Users_model->getData($users_id);
                $data['error'] = !empty($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
                $data['menu_active'] = 'add_users';
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/admin_left_menu');
                $this->load->view('admin/admin_add_users');
                $this->load->view('admin/admin_footer');
            }
        } else {
            redirect('myadminkw');
        }
    }

    function delete($users_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $this->load->model('Users_model');
            if (!empty($users_id)) {
                $delete = $this->users_model->delete($users_id);
                if ($delete) $this->session->set_flashdata('delete_confirm', $delete);
                redirect('myadminkw/users');
            }
            else redirect('myadminkw/users');
        } else {
            redirect('myadminkw');
        }
    }
}
