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

    function getPhotos($album_id) {
        $this->db->where('album_id', $album_id);
        $this->db->order_by('id', 'desc');
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

    function update($user, $post) {
//        $link = trim(strip_tags($post['youtube_id'], $this->allowed_tags));
//        $data = array(
//            'title' => $post['title'],
//            'link' => $link,
//            'updated_at' => time(),
//            'updated_by' => $user,
//            'is_active' => 1
//        );
//
//        $this->db->where('id', $post['gallery_id']);
//        $update = $this->db->update('galleries', $data);
//        if($update) return $post['gallery_id'];
//        else return false;
    }

    function set_active($user, $post) {
//        $data = array(
//            'is_active' => $post['is_active'],
//            'updated_at' => time(),
//            'updated_by' => $user
//        );
//
//        $this->db->where('id', $post['gallery_id']);
//        $update = $this->db->update('galleries', $data);
//        if($data['is_active'] == 1) return 'published';
//        else return 'unpublished';
    }

    function delete($gallery_id) {
//        $this->db->where('id', $gallery_id);
//        $delete = $this->db->delete('galleries');
//        return $delete;
    }
}