<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller
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
        $data['add_confirm'] = $this->session->flashdata('add_confirm');
        $this->load->model('About_us_model');
        $about_us = $this->About_us_model->getData();
        if(!empty($about_us)) {
            $data['about_us'] = $about_us[0]->about;
            $data['tagline'] = $about_us[0]->tagline;
        }

        $data['menu_active'] = 'about_us';
        $this->load->view('admin_header');
        $this->load->view('admin_left_menu', $data);
        $this->load->view('admin_about_us');
        $this->load->view('admin_footer');
    }

    function update() {
        $this->load->model('About_us_model');
        $added = $this->About_us_model->add($_POST);

        if(!empty($added)) $this->session->set_flashdata('add_confirm', $added);
        redirect('admin/AboutUs');
//        $data['menu_active'] = 'about_us';
//        $this->load->view('admin_header');
//        $this->load->view('admin_left_menu', $data);
//        $this->load->view('admin_about_us');
//        $this->load->view('admin_footer');
    }
}
