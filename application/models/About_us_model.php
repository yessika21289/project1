<?php

class About_us_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    public function getData() {
        $query = $this->db->get('about_us');
        return $query->result();
    }


}