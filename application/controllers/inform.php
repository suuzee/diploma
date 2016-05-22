<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inform extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this -> load -> model('inform_model');
	}

    public function informq() {
        $status = 0;
        $message = '';
        $userId = $this -> input -> get('userId');
        $questionId = $this -> input -> get('questionId');
        $date = date("Y-m-d h:i:s", time());

        $inform = $this -> inform_model -> informq(array(
            'user_id' => $userId,
            'question_id' => $questionId,
            'inform_date' => $date
        ));

        if (!!$inform) {
            $message = '成功';
        } else {
            $status = 1;
            $message = '失败';
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

    public function informa() {
        $status = 0;
        $message = '';
        $userId = $this -> input -> get('userId');
        $answerId = $this -> input -> get('answerId');
        $date = date("Y-m-d h:i:s", time());

        $inform = $this -> inform_model -> informa(array(
            'user_id' => $userId,
            'answer_id' => $answerId,
            'inform_date' => $date
        ));

        if (!!$inform) {
            $message = '成功';
        } else {
            $status = 1;
            $message = '失败';
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
