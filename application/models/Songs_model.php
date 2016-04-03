<?php

class Songs_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->allowed_tags = '<p><div><br><span><strong><em><sub><sup><ul><ol><li><a><blockquote><iframe><img>';
    }

    function getData($song_id = NULL) {
        if(!empty($song_id)) $this->db->where('id', $song_id);
        $this->db->order_by('updated_at', 'desc');
        $query = $this->db->get('songs');
        return $query->result();
    }

    function add($user, $post, $cover_file, $song_file) {
        $title = $post['title'];
        $lyric = $post['lyric'];
        $artist = $post['artist'];
        $release_date = strtotime($post['release_date']);

        $data = array(
            'title' => $title,
            'lyric' => $lyric,
            'artist' => $artist,
            'release_date' => $release_date,
            'song_cover_path' => (!empty($cover_file)) ? $cover_file : NULL,
            'song_path' => (!empty($song_file)) ? $song_file : NULL,
            'created_at' => time(),
            'created_by' => $user,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );
        $this->db->insert('songs', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update($user, $post, $cover_file, $song_file) {
        $title = $post['title'];
        $lyric = $post['lyric'];
        $artist = $post['artist'];
        $release_date = $post['release_date'];

        $data = array(
            'title' => $title,
            'lyric' => $lyric,
            'artist' => $artist,
            'release_date' => $release_date,
            'song_cover_path' => (!empty($cover_file)) ? $cover_file : NULL,
            'song_path' => (!empty($song_file)) ? $song_file : NULL,
            'updated_at' => time(),
            'updated_by' => $user,
            'is_active' => 1
        );

        $this->db->where('id', $post['song_id']);
        $update = $this->db->update('songs', $data);
        if($update) return $post['song_id'];
        else return false;
    }

    function set_active($user, $post) {
        $data = array(
            'is_active' => $post['is_active'],
            'updated_at' => time(),
            'updated_by' => $user
        );

        $this->db->where('id', $post['song_id']);
        $update = $this->db->update('songs', $data);
        if($post['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($song_id) {
        $this->db->where('id', $song_id);
        $query = $this->db->get('songs');
        $result = $query->result();
        if(!empty($result)) {
            unlink($result[0]->song_cover_path);
            unlink($result[0]->song_path);
        }

        $this->db->where('id', $song_id);
        $delete = $this->db->delete('songs');
        return $delete;
    }
}