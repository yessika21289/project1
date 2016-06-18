<?php

class Merchandise_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($merchandise_id = NULL, $show = 'active') {
        if(!empty($merchandise_id)) $this->db->where('id', $merchandise_id);
        if($show == 'active') $this->db->where('is_active', 1);
        $this->db->order_by('updated_at', 'desc');
        $query = $this->db->get('merchandise');
        $results = $query->result();

        return $results;
    }

    function add($user, $post, $merchandise_file) {
        $data = array(
            'title' => $post['title'],
            'price' => $post['price'],
            'description' => $post['desc'],
            'image' => !empty($merchandise_file) ? $merchandise_file : NULL,
            'created_at' => time(),
            'created_by' => $user,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );
        $this->db->insert('merchandise', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    function update($user, $post, $merchandise_file) {
        $data = array(
            'title' => $post['title'],
            'price' => $post['price'],
            'description' => $post['desc'],
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );

        if(!empty($merchandise_file))
            $data['image'] = $merchandise_file;

        $this->db->where('id', $post['merchandise_id']);
        $this->db->update('merchandise', $data);

        return $post['merchandise_id'];
    }

    function set_active($user, $post) {
        $data = array(
            'is_active' => $post['is_active'],
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->where('id', $post['merchandise_id']);
        $update = $this->db->update('merchandise', $data);
        if($post['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($merchandise_id) {
        $this->db->where('id', $merchandise_id);
        $query = $this->db->get('merchandise');
        $result = $query->result();
        if(!empty($result)) {
            unlink($result[0]->image);
        }

        $this->db->where('id', $merchandise_id);
        $delete = $this->db->delete('merchandise');
        return $delete;
    }

    function get_howtobuy($type) {
        $this->db->where('type', $type);
        $query = $this->db->get('howtobuy');
        $result = $query->result();
        if(!empty($query->result())) return $result[0]->list;
        else return false;
    }

    function add_howtobuy($user, $post, $type) {
        $list = trim(strip_tags($post['howtobuy'], $this->allowed_tags));

        $data = array(
            'list' => $list,
            'type' => $type,
            'created_at' => time(),
            'created_by' => $user,
            'updated_at' => time(),
            'updated_by' => $user
        );
        $this->db->where('type', $type);
        $this->db->delete('howtobuy');

        $insert = $this->db->insert('howtobuy', $data);
        return $insert;
    }

    function update_howtobuy($user, $post, $type) {
        $list = trim(strip_tags($post['howtobuy'], $this->allowed_tags));

        $data = array(
            'list' => $list,
            'type' => $type,
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->where('type', $type);
        $update = $this->db->update('howtobuy', $data);
        return $update;
    }
}