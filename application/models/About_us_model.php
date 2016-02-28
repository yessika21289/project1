<?php

class About_us_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData() {
        $query = $this->db->get('about_us');
        return $query->result();
    }

    function add($post) {}

    function update($post) {
        $about = trim(strip_tags($post['about_us'], $this->allowed_tags));
        $data = array(
            'about' => $about,
            'updated_at' => time(),
            'updated_by' => 'superadmin'
        );

        $this->db->where('id', $post['id_about_us']);
        $update = $this->db->update('about_us', $data);
        return $update;
    }
}