<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this -> load -> model('comment_model');
	}

    public function getComments() {
        $status = 0;
        $message = '';
        $answerId = $this -> input -> get('answerId');
        $comments = $this -> comment_model -> getComments($answerId);
        $commentLength = count($comments);
        $userId = $this -> session -> userdata('login_user') -> user_id;
        if (!!$comments || $commentLength === 0) {
            $message = '获取评论列表成功';
        } else {
            $status = 1;
            $message = '获取评论列表失败';
        }
        echo json_encode(
            array(
                "status" => $status,
                "message" => $message,
                "data" => array(
                    "message" => $message,
                    "comments" => $comments
                )
            )
        );
    }

    public function saveComment() {
        $status = 0;
        $message = '';
        $author = $this -> session -> userdata('login_user') -> user_id;
        $answerId = $this -> input -> post('answerId');
        $desc = $this -> input -> post('commentDesc');
        $date = date("Y-m-d h:i:s", time());
        $comment = array(
            'answer_id' => $answerId,
            'comment_desc' => $desc,
            'comment_date' => $date,
            'comment_author' => $author
        );
        $commentId = $this -> comment_model -> saveComment($comment);
        if (!!$commentId) {
            $message = '评论成功';
        } else {
            $status = 1;
            $message = '评论失败';
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
