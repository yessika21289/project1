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
    $data['meta_description'] = 'Kontak manajemen Kawandasawolu';
		$data['title'] = 'Kontak Kami';
    $data['send_mail'] = $this->session->userdata('send_mail');
		$this->load->view('tag_open',$data);
		$this->load->view('contact_us');
		$this->load->view('tag_close');
	}

  public function send()
  {
    $this->load->library('session');
    $this->load->library('email');

    $nama     = $this->input->post('nama');
    $email    = $this->input->post('email');
    $subject  = $this->input->post('subject');
    $message  = $this->input->post('message');

    $config['smtp_host'] = 'rejodani.kawandasawolu.com';
    $config['smtp_user'] = 'management@kawandasawolu.com';
    $config['smtp_pass'] = 'K4waNdasaw0lu';
    $config['smtp_port'] = '465';
    $config['wordwrap'] = TRUE;

    $this->email->initialize($config);

    $this->email->from($email, $nama);
    $this->email->to('management@kawandasawolu.com');

    $this->email->subject($subject);
    $this->email->message($message);

    if($this->email->send())
      $this->session->set_flashdata('send_mail', 'success');
    else
      $this->session->set_flashdata('send_mail', 'failed');

    redirect('contact');
  }
}
