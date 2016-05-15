<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this -> load -> model('question_model');
		$this -> load -> model('answer_model');
	}

    public function getQuestions() {
        $status = 0;
        $message = '';
        $questions = $this -> question_model -> getQuestions();
        if (!!!$questions) {
            $status = 1;
            $message = '获取列表失败';
        } else {
            foreach ($questions as $question) {
                $questionId = $question -> question_id;
                // 查标签
                $question -> question_tags = $this -> question_model -> getQuestionTag($questionId);
                // 查评论数
                $question -> answerNum = $this -> answer_model -> getQuestionAnswerNum($questionId);
            }
        }
        echo json_encode(
            array(
                "status" => $status,
                "message" => $message,
                "data" => array(
                    "questions" => $questions
                )
            )
        );
    }

    public function saveQuestion() {
        $status = 0;
        $message = '';
        $author = $this -> session -> userdata('login_user') -> user_id;
        $title = $this -> input -> post('title');
        $desc = $this -> input -> post('description');
        $tags = $this -> input -> post('tags');
        $date = date("Y-m-d h:i:s", time());
        $question = array(
            'question_author' => $author,
            'question_title' => $title,
            'question_desc' => $desc,
            'question_date' => $date
        );
        $questionId = $this -> question_model -> saveQuestion($question);
        if (!!$questionId) {
            foreach ($tags as $tag) {
                $data = array(
                    'tag_id' => $tag,
                    'question_id' => $questionId
                );
                $this -> question_model -> saveQuestionTag($data);
            }
            $message = '提问成功';
        } else {
            $status = 1;
            $message = '提问失败';
        }
        echo json_encode(
            array(
                "status" => $status,
                "message" => $message,
                "data" => array(
                    "message" => $message
                )
            )
        );
    }
}
