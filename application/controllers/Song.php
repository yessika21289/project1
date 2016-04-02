<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Song extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
    }

	public function index()
	{
		$data['title'] = 'Lagu';
		$this->load->model('Songs_model');
        $songs = $this->Songs_model->getData();
        if (!empty($songs)) $data['songs'] = $songs;
        
		$this->load->view('tag_open',$data);
		$this->load->view('song_list');
		$this->load->view('tag_close');
	}

	public function lirik($song_id = 0)
	{
		$this->load->model('Songs_model');
        $songs = $this->Songs_model->getData($song_id);
        if (!empty($songs)) $data['songs'] = $songs;

		$data['title'] = $data['songs'][0]->title;
		$this->load->view('tag_open',$data);
		$this->load->view('song_lyric');
		$this->load->view('tag_close');
	}
}
