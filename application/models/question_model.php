<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question_model extends CI_Model {

    public function saveQuestion($question) {
        $this -> db -> insert('t_questions', $question);
        return $this -> db -> insert_id();
	}

    public function saveQuestionTag($data) {
        $this -> db -> insert('t_tag_item', $data);
    }

    public function getQuestions() {
        $this -> db -> select('q.*, u.user_name, u.user_avatar, q.question_look lookNum');
        $this -> db -> from('t_questions q');
        $this -> db -> join('t_users u', 'q.question_author=u.user_id');
        $this -> db -> order_by('q.question_date', 'desc');
        return $this -> db -> get() -> result();
    }

    public function getQuestionTag($id) {
        $this -> db -> select('*');
        $this -> db -> from('t_tag_item i');
        $this -> db -> join('t_tags t', 't.tag_id=i.tag_id');
        $this -> db -> where('i.question_id', $id);
        return $this -> db -> get() -> result();
    }

}
