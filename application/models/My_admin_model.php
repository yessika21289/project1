<?php

class MyAdminMpdels extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }
}