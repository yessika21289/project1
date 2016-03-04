<?php

class Admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function login() {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        $this->db->where('username', $username);
        $query = $this->db->get('user');

        if($query->result() != null)
        {
            $row = $query->row();

            if($row->password == md5($password))
            {
                $data = array(
                    'username' => $row->username,
                    'logged_in' => true
                );
                $this->session->set_userdata($data);

                if(!empty($this->input->post('remember_me')) && $this->input->post('remember_me') == 1) {
                    $this->load->helper('cookie');
                    $this->input->set_cookie($data);
                }
                return 1;
            }
        }
        return 0;
    }
}