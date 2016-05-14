<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model {

    public function addTag($tag) {
        $this -> db -> insert('t_tags', array(
            'tag_name' => $tag
        ));
        return $this -> db -> insert_id();
    }

    public function getTags() {
        $query = $this -> db -> get('t_tags');
        return $query -> result();
	}

    public function checkTag($tag) {
        $query = $this -> db -> get_where('t_tags', array(
            'tag_name' => $tag
        ));
        return $query -> row();
    }
}
