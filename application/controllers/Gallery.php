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
        $albums = $this->Galleries_model->getAlbumsAndPhotos();
        if (!empty($albums)) $data['albums'] = $albums;

		$this->load->view('tag_open',$data);
		$this->load->view('gallery_album');
		$this->load->view('tag_close');
	}

	public function photo($album_id = NULL)
	{
		if(empty($album_id))
			redirect('gallery');
		
		$data['title'] = 'Galeri Foto';

		$this->load->model('Galleries_model');
        $photos = $this->Galleries_model->getPhotos($album_id);
        if (!empty($photos)) $data['photos'] = $photos;

		$this->load->view('tag_open',$data);
		$this->load->view('gallery_photo');
		$this->load->view('tag_close');
	}
}
