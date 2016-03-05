<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
    }

	public function index()
	{
		$this->load->view('gallery_album');
	}

	public function photo()
	{
		$this->load->view('gallery_photo');
	}
}
