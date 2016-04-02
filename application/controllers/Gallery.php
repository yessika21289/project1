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
		$data['title'] = 'Galeri Album';
		
		$this->load->model('Galleries_model');
        $albums = $this->Galleries_model->getAlbums();
        if (!empty($albums)) $data['albums'] = $albums;

		$this->load->view('tag_open',$data);
		$this->load->view('gallery_album');
		$this->load->view('tag_close');
	}

	public function photo()
	{
		$data['title'] = 'Galeri Foto';
		$this->load->view('tag_open',$data);
		$this->load->view('gallery_photo');
		$this->load->view('tag_close');
	}
}
