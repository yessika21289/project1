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
		$data['meta_description'] = 'Acara, pentas, maupun konser Kawandasawolu';
		$data['title'] = 'Event';
		$data['active']= 'event';
		$this->load->model('Events_model');
        $events = $this->Events_model->getData();
        if(!empty($events)) $data['events'] = $events;

		$this->load->view('tag_open',$data);
		$this->load->view('event_list');
		$this->load->view('tag_close');
	}

	public function event_detail($event_id = NULL)
	{
		$data['active']= 'event';
		$this->load->model('Events_model');
        $event = $this->Events_model->getData($event_id);
        if(!empty($event)) $data['event'] = $event;

        $data['meta_description'] = $event[0]->title.'; event Kawandasawolu';
		$data['title'] = $event[0]->title;

		$this->load->view('tag_open',$data);
		$this->load->view('event_detail');
		$this->load->view('tag_close');
	}
}
