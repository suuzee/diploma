<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this -> load -> model('question_model');
	}

    public function getQuestionList() {
        $question_list = array(
            "status" => 0,
            "message" => "",
            "data" => array(
                array(
                    "title" => "test question",
                    "content" => "description, description, description, description, description",
                    "avatar" => "/diplomafe/src/images/avatar.jpg",
                    "author" => "Thomas",
                    "lookNum" => "10",
                    "answerNum" => "10",
                    "id" => "1"
                ),
                array(
                    "title" => "test question",
                    "content" => "description, description, description, description, description",
                    "avatar" => "/diplomafe/src/images/avatar.jpg",
                    "author" => "Thomas",
                    "lookNum" => "10",
                    "answerNum" => "10",
                    "id" => "1"
                ),
                array(
                    "title" => "test question",
                    "content" => "description, description, description, description, description",
                    "avatar" => "/diplomafe/src/images/avatar.jpg",
                    "author" => "Thomas",
                    "lookNum" => "10",
                    "answerNum" => "10",
                    "id" => "1"
                )
            )
        );
        echo json_encode($question_list);
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
            for ($i = 0; $i < count($tags); $i ++) {
                $data = array(
                    'tag_id' => $tags[$i],
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
