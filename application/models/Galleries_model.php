<?php

class Galleries_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getAlbums($album_id = NULL) {
        if(!empty($album_id)) $this->db->where('id', $album_id);
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('albums');
        return $query->result();
    }

    function addAlbum($user, $post, $album_dir) {
        $data = array(
            'title' => !empty($post['album_title']) ? $post['album_title'] : '',
            'directory' => $album_dir,
            'album_date' => !empty($post['album_date']) ? strtotime($post['album_date']) : '',
            'created_at' => time(),
            'created_by' => $user,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1

        );

        $this->db->insert('albums', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function editAlbum($post, $user, $old_album_dir, $new_album_dir) {
        $data = array(
            'title' => !empty($post['album_title']) ? $post['album_title'] : '',
            'directory' => $new_album_dir,
            'album_date' => !empty($post['album_date']) ? strtotime($post['album_date']) : '',
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );
        rename($old_album_dir, $new_album_dir);
        $this->db->where('id', $post['album_id']);
        $update = $this->db->update('albums', $data);
        if($update) return $post['album_id'];
        else return false;
    }

    function getPhotos($album_id = NULL) {
        if(!empty($album_id)) $this->db->where('album_id', $album_id);

        $this->db->order_by('id', 'desc');
        $query = $this->db->get('photos');
        return $query->result();
    }

    function deletePhotos($album_id) {
        $this->db->where('album_id', $album_id);
        $delete = $this->db->delete('photos');
        return $delete;
    }

    function getPhotoFile($photo_id) {
        $this->db->where('id', $photo_id);
        $query = $this->db->get('photos');
        return $query->result();
    }

    function addPhotos($user, $photo_file, $album_id) {
        $data = array(
            'album_id' => $album_id,
            'photo' => $photo_file,
            'created_at' => time(),
            'created_by' => $user,
            'updated_at' => time(),
            'updated_by' => $user
        );
        $this->db->insert('photos', $data);
        return $album_id;
    }

    function editPhotos($user, $photo_id, $new_photo) {
        $data = array(
            'photo' => $new_photo,
            'updated_at' => time(),
            'updated_by' => $user
        );
        $this->db->where('id', $photo_id);
        if($this->db->update('photos', $data)) return true;
        else return false;
    }

    function deletePhoto($photo_id) {
        $this->db->where('id', $photo_id);
        $delete = $this->db->delete('photos');
        return $delete;
    }

    function set_active($user, $post) {
        $data = array(
            'is_active' => $post['is_active'],
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->where('id', $post['album_id']);
        $update = $this->db->update('albums', $data);
        if($data['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($album_id) {
        $this->db->where('id', $album_id);
        $delete = $this->db->delete('albums');
        return $delete;
    }
}