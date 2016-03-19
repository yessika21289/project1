<?php

class Merchandise_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($merchandise_id = NULL) {
        if(!empty($merchandise_id)) $this->db->where('id', $merchandise_id);
        $this->db->order_by('updated_at', 'desc');
        $query = $this->db->get('merchandise');
        $results = $query->result();

        return $results;
    }

    function add($post, $files) {
        $data = array(
            'name' => $post['name'],
            'created_at' => time(),
            'created_by' => 'superadmin',
            'updated_at' => time(),
            'updated_by' => 'superadmin'
        );
        $this->db->insert('merchandise', $data);
        $insert_id = $this->db->insert_id();

        if(!empty($files['avatar'])) {
            $ext = pathinfo($files['avatar']['name'], PATHINFO_EXTENSION);
            $avatar_path = 'assets/merchandise/'.$insert_id.'_'.$post['name'].'.'.$ext;
            $this->db->where('id', $insert_id);
            $this->db->update('merchandise', array('avatar' => $avatar_path));
        }

        $keys = array_keys($post);
        foreach($keys as $key) {
            if (in_array($key, array('facebook', 'twitter', 'instagram', 'path', 'web'))) {
                $socmed = array(
                    'id_member' => $insert_id,
                    'type' => $key,
                    'id_socmed' => $post[$key],
                    'created_at' => time(),
                    'created_by' => 'superadmin',
                    'updated_at' => time(),
                    'updated_by' => 'superadmin'
                );
                $this->db->insert('merchandise_socmed', $socmed);
            }
        }

        return $insert_id;
    }

    function update($post, $files) {
        $data = array(
            'name' => $post['name'],
            'updated_at' => time(),
            'updated_by' => 'superadmin'
        );
        $this->db->where('id', $post['member_id']);
        $this->db->update('merchandise', $data);

        if(!empty($files['avatar'])) {
            $ext = pathinfo($files['avatar']['name'], PATHINFO_EXTENSION);
            $avatar_path = 'assets/merchandise/'.$post['member_id'].'_'.$post['name'].'.'.$ext;
            $this->db->where('id', $post['member_id']);
            $this->db->update('merchandise', array('avatar' => $avatar_path));
        }

        $keys = array_keys($post);
        foreach($keys as $key) {
            if (in_array($key, array('facebook', 'twitter', 'instagram', 'path', 'web'))) {
                $socmed = array(
                    'id_member' => $post['member_id'],
                    'type' => $key,
                    'id_socmed' => $post[$key],
                    'updated_at' => time(),
                    'updated_by' => 'superadmin'
                );
                $this->db->where('id_member', $post['member_id']);
                $this->db->update('merchandise_socmed', $socmed);
            }
        }

        return $post['member_id'];
    }

    function set_active($post) {
        $data = array(
            'is_active' => $post['is_active'],
            'updated_at' => time(),
            'updated_by' => 'superadmin'
        );

        $this->db->where('id', $post['song_id']);
        $update = $this->db->update('merchandise', $data);
        if($post['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($song_id) {
        $this->db->where('id', $song_id);
        $query = $this->db->get('merchandise');
        $result = $query->result();
        if(!empty($result)) {
            unlink($result[0]->song_cover_path);
            unlink($result[0]->song_path);
        }

        $this->db->where('id', $song_id);
        $delete = $this->db->delete('merchandise');
        return $delete;
    }
}