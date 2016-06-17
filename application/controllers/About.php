<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
    }

	public function index()
	{
		$data['meta_description'] = 'Informasi mengenai profile dari kawandasawolu';
		$data['title'] = 'Tentang Kami';
		$data['active']= 'about';
		$this->load->model('About_us_model');
        $about_us = $this->About_us_model->getData();
        if(!empty($about_us)) {
            $data['about_us'] = $about_us[0]->about;
            $data['tagline'] = $about_us[0]->tagline;
        }
		$this->load->view('tag_open',$data);
		$this->load->view('about_us');
		$this->load->view('tag_close');
	}
}
