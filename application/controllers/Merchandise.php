<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchandise extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
    }

	public function index()
	{
		$data['title'] = 'Merchandise';
		$this->load->view('tag_open',$data);
		$this->load->view('merchandise_list');
		$this->load->view('tag_close');
	}
}
