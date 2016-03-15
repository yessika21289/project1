<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
    }

	public function index()
	{
		$data['title'] = 'Video';
		$this->load->view('tag_open',$data);
		$this->load->view('video_list');
		$this->load->view('tag_close');
	}
}
