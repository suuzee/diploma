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
        $this -> db -> select('q.*, u.user_name, u.user_avatar, u.user_desc, q.question_look lookNum');
        $this -> db -> from('t_questions q');
        $this -> db -> join('t_users u', 'q.question_author=u.user_id');
        $this -> db -> order_by('q.question_date', 'desc');
        return $this -> db -> get() -> result();
    }

    public function getHotQuestions() {
        $this -> db -> select('*');
        $this -> db -> from('t_questions');
        $this -> db -> order_by('question_look', 'desc');
        $this -> db -> limit(5);
        return $this -> db -> get() -> result();
    }

    public function getQuestionsByTag($id) {
        $this -> db -> select('q.*, u.user_name, u.user_avatar, u.user_desc, q.question_look lookNum');
        $this -> db -> from('t_questions q');
        $this -> db -> join('t_users u', 'q.question_author=u.user_id');
        $this -> db -> join('t_tag_item i', 'i.question_id=q.question_id');
        $this -> db -> where('i.tag_id', $id);
        $this -> db -> order_by('q.question_date', 'desc');
        return $this -> db -> get() -> result();
    }

    public function getQuestionsById($id) {
        $this -> db -> select('q.*, u.user_name, u.user_avatar, u.user_desc, q.question_look lookNum');
        $this -> db -> from('t_questions q');
        $this -> db -> join('t_users u', 'q.question_author=u.user_id');
        $this -> db -> where('q.question_author', $id);
        $this -> db -> order_by('q.question_date', 'desc');
        return $this -> db -> get() -> result();
    }

    public function getQuestion($questionId) {
        $this -> db -> select('q.*, u.user_name, u.user_avatar, u.user_desc, q.question_look lookNum');
        $this -> db -> from('t_questions q');
        $this -> db -> join('t_users u', 'q.question_author=u.user_id');
        $this -> db -> where('q.question_id', $questionId);
        return $this -> db -> get() -> row();
    }

    public function getQuestionTag($id) {
        $this -> db -> select('*');
        $this -> db -> from('t_tag_item i');
        $this -> db -> join('t_tags t', 't.tag_id=i.tag_id');
        $this -> db -> where('i.question_id', $id);
        return $this -> db -> get() -> result();
    }

    public function getQuestionNumByUser($id) {
        $query = $this -> db -> get_where('t_questions', array(
            'question_author' => $id
        ));
        return !!($query -> num_rows()) ? $query -> num_rows() : 0;
    }

    public function getQuestionByUser($id) {
        $query = $this -> db -> get_where('t_questions', array(
            'question_author' => $id
        ));
        return $query -> result();
    }

    public function getAnswerNumByUser($id) {
        $this -> db -> select('*');
        $this -> db -> from('t_answers a');
        $this -> db -> join('t_questions q', 'a.question_id=q.question_id');
        $this -> db -> where('a.answer_author', $id);
        $num = $this -> db -> get() -> num_rows();
        return !!$num ? $num : 0;
    }

    public function getAnswerByUser($id) {
        $this -> db -> select('*, q.question_look lookNum');
        $this -> db -> from('t_answers a');
        $this -> db -> join('t_questions q', 'a.question_id=q.question_id');
        $this -> db -> join('t_users u', 'u.user_id=a.answer_author');
        $this -> db -> where('a.answer_author', $id);
        return $this -> db -> get() -> result();
    }

    public function getCollectByUser($id) {
        $this -> db -> select('*, q.question_look lookNum');
        $this -> db -> from('t_collects c');
        $this -> db -> join('t_questions q', 'c.question_id=q.question_id');
        $this -> db -> join('t_users u', 'u.user_id=c.user_id');
        $this -> db -> where('c.user_id', $id);
        return $this -> db -> get() -> result();
    }

    public function addLook($id) {
        $this -> db -> set("question_look", "question_look+1", FALSE);
		$this -> db -> where("question_id", $id);
		$this -> db -> update("t_questions");
    }

}
