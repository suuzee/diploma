<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_model extends CI_Model {

    public function getQuestionAnswerNum($id) {
        $query = $this -> db -> get_where('t_answers', array(
            'question_id' => $id
        ));
        return !!($query -> num_rows()) ? $query -> num_rows() : 0;
    }

    public function getAnswers($id) {
        $this -> db -> select('*');
        $this -> db -> from('t_answers a');
        $this -> db -> join('t_users u', 'u.user_id=a.answer_author');
        $this -> db -> where('a.question_id', $id);
        $this -> db -> order_by('a.answer_date', 'desc');
        return $this -> db -> get() -> result();
    }

    public function saveAnswer($answer) {
        $this -> db -> insert('t_answers', $answer);
        return $this -> db -> insert_id();
    }
}
