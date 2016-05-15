<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_model extends CI_Model {

    public function getQuestionAnswerNum($id) {
        $query = $this -> db -> get_where('t_answers', array(
            'question_id' => $id
        ));
        return !!($query -> num_rows()) ? $query -> num_rows() : 0;
    }
}
