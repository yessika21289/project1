<?php

class Generations_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($id = NULL) {
        if(!empty($id)) $this->db->where('id', $id);
        $query = $this->db->get('generations');
        return $query->result();
    }

    function add($post, $user) {
        $name = trim(strip_tags($post['generation_name'], $this->allowed_tags));

        $data = array(
            'name' => $name,
            'created_at' => time(),
            'created_by' => $user,
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->insert('generations', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update($post, $user) {
        $name = trim(strip_tags($post['generation_name'], $this->allowed_tags));
        $data = array(
            'name' => $name,
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->where('id', $post['generation_id']);
        $update = $this->db->update('generations', $data);
        if($update) return $post['generation_id'];
        else return false;
    }

    function delete($id) {
        $this->db->where('id', $id);
        $delete = $this->db->delete('generations');
        return $delete;
    }
}