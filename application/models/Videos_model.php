<?php

class Videos_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($video_id = NULL, $show = 'active') {
        if(!empty($video_id)) $this->db->where('id', $video_id);
        if($show == 'active') $this->db->where('is_active', 1);
        $this->db->order_by('updated_at', 'desc');
        $query = $this->db->get('videos');
        return $query->result();
    }

    function add($user, $post) {
        $title = $post['title'];
        $link = trim(strip_tags($post['youtube_id'], $this->allowed_tags));
        $description = trim(strip_tags($post['description'], $this->allowed_tags));
        $data = array(
            'title' => $title,
            'link' => $link,
            'description' => $description,
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
        $link = trim(strip_tags($post['youtube_id'], $this->allowed_tags));
        $description = trim(strip_tags($post['description'], $this->allowed_tags));
        $data = array(
            'title' => $post['title'],
            'link' => $link,
            'description' => $description,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );

        $this->db->where('id', $post['video_id']);
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