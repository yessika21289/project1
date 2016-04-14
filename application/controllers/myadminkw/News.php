<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller
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

            $this->load->model('News_model');
            $news = $this->News_model->getData();
            if (!empty($news)) $data['news'] = $news;

            $data['menu_active'] = 'news';

            $this->load->view('admin/admin_header', $data);
            $this->load->view('admin/admin_left_menu');
            $this->load->view('admin/admin_news');
            $this->load->view('admin/admin_footer');
        } else {
            redirect('myadminkw');
        }
    }

    function add($news_id = NULL)
    {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $user = $this->session->userdata('username');
            $this->load->model('News_model');

            if (!empty($_POST)) {
                if (empty($_POST['news_id'])) {
                    $added_id = $this->News_model->add($user, $_POST);
                    if ($added_id) $this->session->set_flashdata('added_id', $added_id);
                }
                else {
                    $updated_id = $this->News_model->update($user, $_POST);
                    if ($updated_id) $this->session->set_flashdata('updated_id', $updated_id);
                }
                redirect('myadminkw/News');
            }
            elseif ($this->input->get('is_active') != NULL) {
                $post['news_id'] = $this->input->get('id');
                $post['is_active'] = $this->input->get('is_active');
                $set_active = $this->News_model->set_active($user, $post);
                $this->session->set_flashdata('set_active', $set_active);
                $this->session->set_flashdata('set_active_id', $post['news_id']);

                redirect('myadminkw/News');
            }
            else {
                $data['name'] = $this->session->userdata('username');
                $data['is_authorized'] = $this->session->userdata('is_authorized');
                if (!empty($news_id)) {
                    $data['news'] = $this->News_model->getData($news_id);
                }
                $data['menu_active'] = 'add_news';
                $this->load->view('admin/admin_header', $data);
                $this->load->view('admin/admin_left_menu');
                $this->load->view('admin/admin_add_news');
                $this->load->view('admin/admin_footer');
            }
        } else {
            redirect('myadminkw');
        }
    }

    function delete($news_id = NULL) {
        $user = $this->session->userdata('logged_in');
        if (isset($user)) {
            $this->load->model('News_model');
            if (!empty($news_id)) {
                $delete = $this->News_model->delete($news_id);
                if ($delete) $this->session->set_flashdata('delete_confirm', $delete);
                redirect('myadminkw/News');
            }
            else redirect('myadminkw/News');
        } else {
            redirect('myadminkw');
        }
    }
}
