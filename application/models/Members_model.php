<?php

class Members_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($member_id = NULL, $show = 'active') {
        $members = array();
        if(!empty($member_id)) $this->db->where('id', $member_id);
        if($show == 'active') $this->db->where('is_active', 1);
        $this->db->order_by('name', 'asc');
        $query = $this->db->get('members');
        $results = $query->result();

        $i = 0;
        foreach($results as $result) {
            $members[$i]['id'] = $result->id;
            $members[$i]['name'] = $result->name;
            $members[$i]['avatar'] = $result->avatar;
            $members[$i]['is_active'] = $result->is_active;

            $this->db->where('id_member', $result->id);
            $query2 = $this->db->get('members_socmed');
            $results2 = $query2->result();

            foreach($results2 as $result2) {
                $members[$i]['socmed'][$result2->type] = $result2->id_socmed;
            }
            $i++;
        }
        return $members;
    }

    function add($user, $post, $avatar_file) {
        $data = array(
            'name' => $post['name'],
            'avatar' => !empty($avatar_file) ? $avatar_file : NULL,
            'created_at' => time(),
            'created_by' => $user,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );
        $this->db->insert('members', $data);
        $insert_id = $this->db->insert_id();

        $keys = array_keys($post);
        foreach($keys as $key) {
            if (in_array($key, array('facebook', 'twitter', 'instagram', 'web')) && !empty($post[$key])) {
                $socmed = array(
                    'id_member' => $insert_id,
                    'type' => $key,
                    'id_socmed' => $post[$key],
                    'created_at' => time(),
                    'created_by' => $user,
                    'updated_at' => time(),
                    'updated_by' => $user
                );
                $this->db->insert('members_socmed', $socmed);
            }
        }

        return $insert_id;
    }

    function update($user, $post, $avatar_file) {
        $data = array(
            'name' => $post['name'],
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );
        
        if(!empty($avatar_file))
            $data['avatar'] = $avatar_file;

        $this->db->where('id', $post['member_id']);
        $this->db->update('members', $data);

        $this->db->where('id_member', $post['member_id']);
        $this->db->delete('members_socmed');

        $keys = array_keys($post);
        foreach($keys as $key) {
            if (in_array($key, array('facebook', 'twitter', 'instagram', 'web')) && !empty($post[$key])) {
                $socmed = array(
                    'id_member' => $post['member_id'],
                    'type' => $key,
                    'id_socmed' => $post[$key],
                    'created_at' => time(),
                    'created_by' => $user,
                    'updated_at' => time(),
                    'updated_by' => $user
                );
                $this->db->insert('members_socmed', $socmed);
            }
        }

        return $post['member_id'];
    }

    function set_active($user, $post) {
        $data = array(
            'is_active' => $post['is_active'],
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->where('id', $post['member_id']);
        $update = $this->db->update('members', $data);
        if($post['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($member_id) {
        $this->db->where('id', $member_id);
        $query = $this->db->get('members');
        $result = $query->result();

        if(!empty($result)) {
            unlink($result[0]->avatar);
        }
        $this->db->where('id_member', $member_id);
        $this->db->delete('members_socmed');

        $this->db->where('id', $member_id);
        $delete = $this->db->delete('members');

        return $delete;
    }
}