<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
            $this->load->helper('text');
    }

	public function index()
	{
		$data['meta_description'] = 'Berita terbaru terkait Kawandasawolu';
		$data['title'] = 'Berita';
		$this->load->model('News_model');
        $news = $this->News_model->getData();
        if(!empty($news)) $data['news'] = $news;

		$this->load->view('tag_open',$data);
		$this->load->view('news_list');
		$this->load->view('tag_close');
	}

	public function news_detail($news_id = NULL)
	{
		$this->load->model('News_model');
        $news = $this->News_model->getData($news_id);
        if(!empty($news)) $data['news'] = $news;

        $data['meta_description'] = $news[0]->title.'; berita Kawandasawolu';
		$data['title'] = $news[0]->title;

		$this->load->view('tag_open',$data);
		$this->load->view('news_detail');
		$this->load->view('tag_close');
	}
}
