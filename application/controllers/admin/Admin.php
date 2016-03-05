<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function index()
	{
		$user = $this->session->userdata('logged_in');

		if(isset($user)) {
			$data['menu_active'] = 'dashboard';
			$this->load->view('admin_header');
			$this->load->view('admin_left_menu', $data);
			$this->load->view('dashboard', $data);
			$this->load->view('admin_footer');
		} else {

			$data['msg'] = $this->session->flashdata('login_failed_msg');
			$this->load->view('admin_login', $data);
		}
	}

	function to($link) {
		$data['menu_active'] = $link;
		$this->load->view('admin_header');
		$this->load->view('admin_left_menu', $data);
		$this->load->view($link, $data);
		$this->load->view('admin_footer');
	}

	function login() {
		$username = $this->security->xss_clean($this->input->post('username'));

		if (!empty($username)) {
			$this->load->model('Admin_model');
			$result = $this->Admin_model->login();

			if ($result) {
				redirect('admin');
			} else {
				$msg =
					"<div class='alert alert-danger' role='alert'>
					<strong>Login gagal!</strong>
					<br/>Username/Password tidak cocok.
				</div>";
				$this->session->set_flashdata('login_failed_msg', $msg);
				redirect('admin');
			}
		} else {
			redirect('admin');
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('admin');
	}
}