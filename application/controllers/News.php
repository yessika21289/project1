<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
    }

	public function index()
	{
		$data['title'] = 'Berita dan Event';
		$this->load->view('tag_open',$data);
		$this->load->view('news_list');
		$this->load->view('tag_close');
	}
}
