<?php

class Videos_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($video_id = NULL) {
        if(!empty($video_id)) $this->db->where('id', $video_id);
        $this->db->order_by('updated_at', 'desc');
        $query = $this->db->get('videos');
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
        $this->db->insert('videos', $data);
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

        $this->db->where('id', $post['videos_id']);
        $update = $this->db->update('videos', $data);
        if($update) return $post['video_id'];
        else return false;
    }

    function set_active($user, $post) {
        $data = array(
            'is_active' => $post['is_active'],
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->where('id', $post['video_id']);
        $update = $this->db->update('videos', $data);
        if($data['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($video_id) {
        $this->db->where('id', $video_id);
        $delete = $this->db->delete('videos');
        return $delete;
    }
}