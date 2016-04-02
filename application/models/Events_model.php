<?php

class Events_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($event_id = NULL) {
        if(!empty($event_id)) $this->db->where('id', $event_id);
        //$this->db->order_by('updated_at', 'desc');
        $this->db->order_by('start_date', 'asc');
        $query = $this->db->get('events');
        return $query->result();
    }

    function add($user, $post) {
        $title = $post['title'];
        $content = trim(strip_tags($post['content'], $this->allowed_tags));
        $start_date = strtotime($post['start_date']);
        $end_date = strtotime($post['end_date']);
        $data = array(
            'title' => $title,
            'content' => $content,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'created_at' => time(),
            'created_by' => $user,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );
        $this->db->insert('events', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update($user, $post) {
        $content = trim(strip_tags($post['content'], $this->allowed_tags));
        $start_date = strtotime($post['start_date']);
        $end_date = strtotime($post['end_date']);
        $data = array(
            'title' => $post['title'],
            'content' => $content,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );

        $this->db->where('id', $post['event_id']);
        $update = $this->db->update('events', $data);
        if($update) return $post['event_id'];
        else return false;
    }

    function set_active($user, $post) {
        $data = array(
            'is_active' => $post['is_active'],
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->where('id', $post['event_id']);
        $update = $this->db->update('events', $data);
        if($data['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($event_id) {
        $this->db->where('id', $event_id);
        $delete = $this->db->delete('events');
        return $delete;
    }
}