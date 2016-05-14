<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

    public function __constructor() {
        parent::__constructor();
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
}
