<?php

class News_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($news_id = NULL) {
        if(!empty($news_id)) $this->db->where('id', $news_id);
        $this->db->order_by('updated_at', 'desc');
        $query = $this->db->get('news');
        return $query->result();
    }

    function add($user, $post) {
        $title = $post['title'];
        $content = trim(strip_tags($post['content'], $this->allowed_tags));
        $data = array(
            'title' => $title,
            'content' => $content,
            'created_at' => time(),
            'created_by' => $user,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );
        $this->db->insert('news', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update($user, $post) {
        $content = trim(strip_tags($post['content'], $this->allowed_tags));
        $data = array(
            'title' => $post['title'],
            'content' => $content,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );

        $this->db->where('id', $post['news_id']);
        $update = $this->db->update('news', $data);
        if($update) return $post['news_id'];
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