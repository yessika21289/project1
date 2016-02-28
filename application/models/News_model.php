<?php

class News_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($news_id = NULL) {
        if(!empty($news_id)) $this->db->where('id', $news_id);
        $query = $this->db->get('news');
        $this->db->order_by('updated_at', 'DESC');
        return $query->result();
    }

    function add($post) {
        $title = $post['title'];
        $content = trim(strip_tags($post['content'], $this->allowed_tags));
        $data = array(
            'title' => $title,
            'content' => $content,
            'created_at' => time(),
            'created_by' => 'superadmin',
            'updated_at' => time(),
            'updated_by' => 'superadmin',
            'is_active' => 1
        );
        $this->db->insert('news', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update($post) {
        $content = trim(strip_tags($post['content'], $this->allowed_tags));
        $data = array(
            'title' => $post['title'],
            'content' => $content,
            'updated_at' => time(),
            'updated_by' => 'superadmin',
            'is_active' => 1
        );

        $this->db->where('id', $post['news_id']);
        $update = $this->db->update('news', $data);
        if($update) return $post['news_id'];
        else return false;
    }

    function set_active($post) {
        $data['is_active'] = $post['is_active'];
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