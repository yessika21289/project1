<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct()
    {
            parent::__construct();
            $this->load->helper('html');
            $this->load->helper('url');
    }

	public function index()
	{
		$this->load->helper('form');
		$data['form_nama'] = array(
              'name'        => 'nama',
              'id'          => 'nama',
              'style'       => 'width:100%',
            );
		$data['form_email'] = array(
              'name'        => 'email',
              'id'          => 'email',
              'style'       => 'width:100%',
            );
		$data['form_subject'] = array(
              'name'        => 'subject',
              'id'          => 'subject',
              'style'       => 'width:100%',
            );
		$data['form_msg'] = array(
              'name'        => 'message',
              'id'          => 'message',
              'style'       => 'width:100%',
              'rows'		=> '10'
            );
		$data['form_submit'] = array(
              'name'        => 'send_msg',
              'value'       => 'Kirim Pesan',
              'style'		=> 'padding:5px 10px'
			);
		$data['title'] = 'Kontak Kami';
		$this->load->view('tag_open',$data);
		$this->load->view('contact_us');
		$this->load->view('tag_close');
	}
}
