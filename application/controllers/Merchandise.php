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
		$this->load->model('Merchandise_model');
        $merchandise = $this->Merchandise_model->getData();
        if (!empty($merchandise)) $data['merchandise'] = $merchandise;

		$this->load->view('tag_open',$data);
		$this->load->view('merchandise_list');
		$this->load->view('tag_close');
	}
}
