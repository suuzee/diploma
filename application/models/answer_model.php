<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_model extends CI_Model {

    public function getQuestionAnswerNum($id) {
        $query = $this -> db -> get_where('t_answers', array(
            'question_id' => $id,
            'answer_show' => 0
        ));
        return !!($query -> num_rows()) ? $query -> num_rows() : 0;
    }

    public function getAnswers($id) {
        $this -> db -> select('*');
        $this -> db -> from('t_answers a');
        $this -> db -> join('t_users u', 'u.user_id=a.answer_author');
        $this -> db -> where('a.question_id', $id);
        $this -> db -> where('a.answer_show', 0);
        $this -> db -> order_by('a.answer_date', 'desc');
        return $this -> db -> get() -> result();
    }

    public function saveAnswer($answer) {
        $this -> db -> insert('t_answers', $answer);
        return $this -> db -> insert_id();
    }

    public function getAllAnswerNum() {
        $query = $this -> db -> get('t_answers');
        return !!($query -> num_rows()) ? $query -> num_rows() : 0;
    }

    public function getInformAnswerNum() {
        $this -> db -> select('*');
        $this -> db -> from('t_informas i');
        $this -> db -> join('t_answers a', 'i.answer_id=a.answer_id');
        $this -> db -> where('a.answer_show', 0);
        $num = $this -> db -> get() -> num_rows();
        return !!($num) ? $num : 0;
    }

    public function getInformAnswerPage($start, $pagesize){
		$this -> db -> select('i.*, a.*, q.*, u.user_name');
        $this -> db -> from('t_informas i');
        $this -> db -> join('t_answers a', 'a.answer_id=i.answer_id');
        $this -> db -> join('t_questions q', 'q.question_id=a.question_id');
        $this -> db -> join('t_users u', 'u.user_id=i.user_id');
        $this -> db -> where('a.answer_show', 0);
		$this -> db -> limit($pagesize, $start);
		return $this -> db -> get() -> result();
	}

    public function getShieldAnswerNum() {
        $query = $this -> db -> get_where('t_answers', array(
            'answer_show' => 1
        ));
        return !!($query -> num_rows()) ? $query -> num_rows() : 0;
    }

    public function getShieldAnswerPage($start, $pagesize){
		$this -> db -> select("a.*, q.*, u.user_name");
		$this -> db -> from("t_answers a");
		$this -> db -> join("t_users u", "u.user_id=a.answer_author");
		$this -> db -> join("t_questions q", "q.question_id=a.question_id");
        $this -> db -> where('a.answer_show', 1);
		$this -> db -> limit($pagesize, $start);
		return $this -> db -> get() -> result();
	}

    public function shieldAnswer($id) {
        $this -> db -> set('answer_show', 1);
        $this -> db -> where('answer_id', $id);
        $this -> db -> update('t_answers');
        return $this -> db -> affected_rows();
    }

    public function regainAnswer($id) {
        $this -> db -> set('answer_show', 0);
        $this -> db -> where('answer_id', $id);
        $this -> db -> update('t_answers');
        return $this -> db -> affected_rows();
    }

}
