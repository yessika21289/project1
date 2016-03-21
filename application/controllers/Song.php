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
		$this->load->view('tag_open',$data);
		$this->load->view('song_list');
		$this->load->view('tag_close');
	}

	public function lirik()
	{
		$data['title'] = 'Lagu';
		$this->load->view('tag_open',$data);
		$this->load->view('song_lyric');
		$this->load->view('tag_close');
	}
}
