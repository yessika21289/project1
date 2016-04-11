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

    function set_active($user, $post) {
        $data = array(
            'is_active' => $post['is_active'],
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->where('id', $post['news_id']);
        $update = $this->db->update('news', $data);
        if($data['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($news_id) {
        $this->db->where('id', $news_id);
        $delete = $this->db->delete('news');
        return $delete;
    }
}