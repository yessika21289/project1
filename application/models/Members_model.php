<?php

class Members_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($member_id = NULL) {
        $members = array();
        if(!empty($member_id)) $this->db->where('id', $member_id);
        $this->db->order_by('updated_at', 'desc');
        $query = $this->db->get('members');
        $results = $query->result();

        foreach($results as $result) {
            $this->db->where('id_member', $result->id);
            $query2 = $this->db->get('members_socmed');
            $results2 = $query2->result();

            foreach($results2 as $result2) {
                $members[$result->id]['id'] = $result->id;
                $members[$result->id]['name'] = $result->name;
                $members[$result->id]['avatar'] = $result->avatar;
                $members[$result->id][$result2->type] = $result2->id_socmed;
            }
        }

        return $members;
    }

    function add($post, $files) {
        $data = array(
            'name' => $post['name'],
            'created_at' => time(),
            'created_by' => 'superadmin',
            'updated_at' => time(),
            'updated_by' => 'superadmin'
        );
        $this->db->insert('members', $data);
        $insert_id = $this->db->insert_id();

        if(!empty($files['avatar'])) {
            $ext = pathinfo($files['avatar']['name'], PATHINFO_EXTENSION);
            $avatar_path = 'assets/members/'.$insert_id.'_'.$post['name'].'.'.$ext;
            $this->db->where('id', $insert_id);
            $this->db->update('members', array('avatar' => $avatar_path));
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
                $this->db->insert('members_socmed', $socmed);
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
        $this->db->update('members', $data);

        if(!empty($files['avatar'])) {
            $ext = pathinfo($files['avatar']['name'], PATHINFO_EXTENSION);
            $avatar_path = 'assets/members/'.$post['member_id'].'_'.$post['name'].'.'.$ext;
            $this->db->where('id', $post['member_id']);
            $this->db->update('members', array('avatar' => $avatar_path));
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
                $this->db->update('members_socmed', $socmed);
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
        $update = $this->db->update('members', $data);
        if($post['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($song_id) {
        $this->db->where('id', $song_id);
        $query = $this->db->get('members');
        $result = $query->result();
        if(!empty($result)) {
            unlink($result[0]->song_cover_path);
            unlink($result[0]->song_path);
        }

        $this->db->where('id', $song_id);
        $delete = $this->db->delete('members');
        return $delete;
    }
}