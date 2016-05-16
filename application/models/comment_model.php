<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    public function getAnswerCommentNum($id) {
        $query = $this -> db -> get_where('t_comments', array(
            'answer_id' => $id
        ));
        return !!($query -> num_rows()) ? $query -> num_rows() : 0;
    }

    public function getComments($id) {
        $this -> db -> select('*');
        $this -> db -> from('t_comments c');
        $this -> db -> join('t_users u', 'u.user_id=c.comment_author');
        $this -> db -> where('c.answer_id', $id);
        $this -> db -> order_by('c.comment_date', 'desc');
        return $this -> db -> get() -> result();
    }

    public function saveComment($comment) {
        $this -> db -> insert('t_comments', $comment);
        return $this -> db -> insert_id();
    }

}
