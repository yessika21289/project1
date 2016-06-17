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
		$data['meta_description'] = 'Lagu-lagu yang sudah dicover oleh Kawandasawolu';
		$data['title'] = 'Lagu';
		$data['active']= 'song';
		$this->load->model('Songs_model');
        $songs = $this->Songs_model->getData();
        if (!empty($songs)) $data['songs'] = $songs;
        
		$this->load->view('tag_open',$data);
		$this->load->view('song_list');
		$this->load->view('tag_close');
	}

	public function lyric($song_id = 0)
	{
		$data['active']= 'song';
		$this->load->model('Songs_model');
        $songs = $this->Songs_model->getData($song_id);
        if (!empty($songs)) {
        	$data['songs'] = $songs;
	        $data['meta_description'] = $data['songs'][0]->title.'; lagu Kawandasawolu';
			$data['title'] = $data['songs'][0]->title;
		}
		else{
			$data['meta_description'] = 'lagu Kawandasawolu';
			$data['title'] = 'Lagu';
		}

		$this->load->view('tag_open',$data);
		$this->load->view('song_lyric');
		$this->load->view('tag_close');
	}

	public function add_count()
	{
		$this->load->model('Songs_model');
		$updated_id = $this->Songs_model->add_count($_POST);
		return $updated_id;
	}
}
