<?php

class Users_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($user_id = NULL) {
        if(!empty($user_id)) $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->result();
    }

    function add($post) {
        $username = $this->security->xss_clean($post['username']);
        $password = $this->security->xss_clean($post['password']);
        $password = sha1(md5($password));

        $data = array(
            'username' => $username,
            'password' => $password,
            'is_authorized' => 0
        );
        $this->db->insert('users', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update($post) {
        $password = $this->security->xss_clean($post['password']);
        $password = sha1(md5($password));

        $data = array(
            'password' => $password
        );

        $this->db->where('id', $post['user_id']);
        $update = $this->db->update('users', $data);
        if($update) return $post['user_id'];
        else return false;
    }

    function pass_key($logged_in_id, $post) {
        $this->db->where('id', $post['user_id']);
        $set_authorized = $this->db->update('users', array('is_authorized' => $post['is_authorized']));

        $this->db->where('id', $logged_in_id);
        $un_authorized = $this->db->update('users', array('is_authorized' => 0));

        if($set_authorized && $un_authorized) return true;
        else return false;

    }

    function delete($user_id) {
        $this->db->where('id', $user_id);
        $delete = $this->db->delete('users');
        return $delete;
    }
}