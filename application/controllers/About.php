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
		$data['title'] = 'Tentang Kami';
		$this->load->view('tag_open',$data);
		$this->load->view('about_us');
		$this->load->view('tag_close');
	}
}
