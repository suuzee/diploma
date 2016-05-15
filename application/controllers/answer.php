<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this -> load -> model('answer_model');
	}

    public function getAnswerNum() {
        // $status = 0;
        // $message = '';
        // $questions = $this -> question_model -> getQuestions();
        // if (!!!$questions) {
        //     $status = 1;
        //     $message = '获取列表失败';
        // } else {
        //     // 查标签
        //     foreach ($questions as $question) {
        //         $questionId = $question -> question_id;
        //         $question -> question_tags = $this -> question_model -> getQuestionTag($questionId);
        //     }
        //     // 查评论数
        // }
        // echo json_encode(
        //     array(
        //         "status" => $status,
        //         "message" => $message,
        //         "data" => array(
        //             "questions" => $questions
        //         )
        //     )
        // );
    }
}
