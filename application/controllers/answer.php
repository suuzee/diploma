<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this -> load -> model('answer_model');
		$this -> load -> model('like_model');
		$this -> load -> model('comment_model');
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

    public function getAnswers() {
        $status = 0;
        $message = '';
        $questionId = $this -> input -> get('questionId');
        $answers = $this -> answer_model -> getAnswers($questionId);
        $answerLength = count($answers);
        $userId = $this -> session -> userdata('login_user') -> user_id;
        if (!!$answers || $answerLength == 0) {
            foreach ($answers as $answer) {
                $answerId = $answer -> answer_id;
                // 查评论数
                $answer -> commentNum = $this -> comment_model -> getAnswerCommentNum($answerId);
                // 查点赞数
                $answer -> likeNum = $this -> like_model -> getAnswerLikeNum($answerId);
                // 查看是否还可以点赞
                $like = array(
                    'user_id' => $userId,
                    'answer_id' => $answerId
                );
                $isLike = $this -> like_model -> checkIsLike($like);
                $answer -> isLike = !! $isLike ? 'disabled' : '';
            }
        } else {
            $status = 1;
            $message = '获取答案列表失败';
        }
        echo json_encode(
            array(
                "status" => $status,
                "message" => $message,
                "data" => array(
                    "answers" => $answers
                )
            )
        );
    }

    public function saveAnswer() {
        $status = 0;
        $message = '';
        $author = $this -> session -> userdata('login_user') -> user_id;
        $questionId = $this -> input -> post('questionId');
        $desc = $this -> input -> post('answerDesc');
        $date = date("Y-m-d h:i:s", time());
        $answer = array(
            'question_id' => $questionId,
            'answer_desc' => $desc,
            'answer_date' => $date,
            'answer_author' => $author
        );
        $answerId = $this -> answer_model -> saveAnswer($answer);
        if (!!$answerId) {
            $message = '回答成功';
        } else {
            $status = 1;
            $message = '回答失败';
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
