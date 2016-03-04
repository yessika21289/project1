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
		$this->load->view('song_list');
	}

	public function lirik()
	{
		$this->load->view('song_lyric');
	}
}
