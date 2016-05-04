<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
    }

	public function index()
	{
		$data['title'] = 'Kawandasawolu';
		$data['meta_description'] = 'Kawandasawolu, sekumpulan para lelaki dari Yogyakarta pengcover lagu 48 group';
		$data['meta_keywords'] = 'kawandasawolu, empat puluh delapan, 48, JKT48, AKB48';
		
		$this->load->model('About_us_model');
        $about_us = $this->About_us_model->getData();
        if(!empty($about_us)) {
            $data['about_us'] = $about_us[0]->about;
            $data['tagline'] = $about_us[0]->tagline;
        }

		$this->load->model('News_model');
        $news = $this->News_model->getData();
        if(!empty($news)) $data['news'] = $news;

        $this->load->model('Events_model');
        $events = $this->Events_model->getData();
        if(!empty($events)) $data['events'] = $events;

        $this->load->model('Songs_model');
        $songs = $this->Songs_model->getData();
        if (!empty($songs)) $data['songs'] = $songs;

        $this->load->model('Videos_model');
        $videos = $this->Videos_model->getData();
        if(!empty($videos)) $data['videos'] = $videos;

        $this->load->model('Galleries_model');
        $photos = $this->Galleries_model->getPhotos();
        if (!empty($photos)) $data['photos'] = $photos;

        $this->load->model('Merchandise_model');
        $merchandise = $this->Merchandise_model->getData();
        if (!empty($merchandise)) $data['merchandise'] = $merchandise;

        $this->load->model('Members_model');
        $members = $this->Members_model->getData();

        if (!empty($members)) $data['members'] = $members;

		$this->load->view('home', $data);
	}
}
