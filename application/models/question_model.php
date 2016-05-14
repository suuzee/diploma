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
}
