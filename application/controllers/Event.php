<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
            $this->load->helper('text');
    }

	public function index()
	{
		$data['title'] = 'Event';
		$this->load->model('Events_model');
        $events = $this->Events_model->getData();
        if(!empty($events)) $data['events'] = $events;

		$this->load->view('tag_open',$data);
		$this->load->view('event_list');
		$this->load->view('tag_close');
	}
}
