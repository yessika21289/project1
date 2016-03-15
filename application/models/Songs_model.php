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

    function add($post, $files) {
        $title = $post['title'];
        $lyric = $post['lyric'];
        $author = $post['author'];
        $release_date = $post['release_date'];

        if(!empty($files['song_cover'])) {
            $ext = pathinfo($files['song_cover']['name'], PATHINFO_EXTENSION);
            $song_cover_path = 'assets/songs/cover/'.$title.'.'.$ext;
        }
        if(!empty($files['song'])) {
            $ext = pathinfo($files['song']['name'], PATHINFO_EXTENSION);
            $song_path = 'assets/songs/'.$title.'.'.$ext;
        }

        $data = array(
            'title' => $title,
            'lyric' => $lyric,
            'author' => $author,
            'release_date' => $release_date,
            'song_cover_path' => (!empty($song_cover_path)) ? $song_cover_path : NULL,
            'song_path' => (!empty($song_path)) ? $song_path : NULL,
            'created_at' => time(),
            'created_by' => 'superadmin',
            'updated_at' => time(),
            'updated_by' => 'superadmin',
            'is_active' => 1
        );
        $this->db->insert('songs', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update($post, $files) {
        $title = $post['title'];
        $lyric = $post['lyric'];
        $author = $post['author'];
        $release_date = $post['release_date'];
        if(!empty($files['song_cover'])) {
            $ext = pathinfo($files['song_cover']['name'], PATHINFO_EXTENSION);
            $song_cover_path = 'assets/songs/cover/'.$title.'.'.$ext;
        }
        if(!empty($files['song'])) {
            $ext = pathinfo($files['song']['name'], PATHINFO_EXTENSION);
            $song_path = 'assets/songs/'.$title.'.'.$ext;
        }

        $data = array(
            'title' => $title,
            'lyric' => $lyric,
            'author' => $author,
            'release_date' => $release_date,
            'song_cover_path' => (!empty($song_cover_path)) ? $song_cover_path : NULL,
            'song_path' => (!empty($song_path)) ? $song_path : NULL,
            'updated_at' => time(),
            'updated_by' => 'superadmin',
            'is_active' => 1
        );

        $this->db->where('id', $post['song_id']);
        $update = $this->db->update('songs', $data);
        if($update) return $post['song_id'];
        else return false;
    }

    function set_active($post) {
        $data = array(
            'is_active' => $post['is_active'],
            'updated_at' => time(),
            'updated_by' => 'superadmin'
        );

        $this->db->where('id', $post['song_id']);
        $update = $this->db->update('songs', $data);
        if($post['is_active'] == 1) return 'published';
        else return 'unpublished';
    }

    function delete($song_id) {
        $this->db->wherea('id', $song_id);
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