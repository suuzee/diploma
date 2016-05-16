<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this -> load -> model('like_model');
	}

    public function like () {
        $status = 0;
        $message = '';
        $userId = $this -> session -> userdata('login_user') -> user_id;
        $answerId = $this -> input -> get('answerId');
        $like = array(
            'user_id' => $userId,
            'answer_id' => $answerId
        );
        $likeId = $this -> like_model -> like($like);
        if (!!$likeId) {
            $message = '点赞成功';
        } else {
            $status = 1;
            $message = '点赞失败';
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
