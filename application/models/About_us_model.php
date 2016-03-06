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

    function add($post) {
        $about = trim(strip_tags($post['about_us'], $this->allowed_tags));

        $data = array(
            'about' => $about,
            'tagline' => $post['tagline'],
            'created_at' => time(),
            'created_by' => 'superadmin',
            'updated_at' => time(),
            'updated_by' => 'superadmin'
        );
        $this->db->empty_table('about_us');
        $insert = $this->db->insert('about_us', $data);
        return $insert;
    }

    function update($post) {
        $about = trim(strip_tags($post['about_us'], $this->allowed_tags));
        $data = array(
            'about' => $about,
            'tagline' => $post['tagline'],
            'updated_at' => time(),
            'updated_by' => 'superadmin'
        );

        $this->db->where('id', 1);
        $update = $this->db->update('about_us', $data);
        return $update;
    }
}