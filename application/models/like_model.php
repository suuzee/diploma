<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like_model extends CI_Model {

    public function getAnswerLikeNum($id) {
        $query = $this -> db -> get_where('t_likes', array(
            'answer_id' => $id
        ));
        return !!($query -> num_rows()) ? $query -> num_rows() : 0;
    }

    public function like ($like) {
        $this -> db -> insert('t_likes', $like);
        return $this -> db -> insert_id();
    }

    public function checkIsLike ($like) {
        $query = $this -> db -> get_where('t_likes', $like);
        return $query -> row();
    }
}
