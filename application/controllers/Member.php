<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
            $this->load->helper('url');
    }

	public function index()
	{
		$data['meta_description'] = 'Daftar anggota Kawandasawolu';
		$data['title'] = 'Anggota';
		$this->load->model('Members_model');
        $members = $this->Members_model->getData();
        if (!empty($members)) $data['members'] = $members;
        
		$this->load->view('tag_open',$data);
		$this->load->view('member_list');
		$this->load->view('tag_close');
	}
}
