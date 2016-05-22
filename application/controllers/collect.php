<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collect extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this -> load -> model('collect_model');
	}

    public function collect() {
        $status = 0;
        $message = '';
        $userId = $this -> input -> get('userId');
        $questionId = $this -> input -> get('questionId');

        $collect = $this -> collect_model -> collect(array(
            'user_id' => $userId,
            'question_id' => $questionId
        ));

        if (!!$collect) {
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

    public function canCelcollect() {
        $status = 0;
        $message = '';
        $userId = $this -> input -> get('userId');
        $questionId = $this -> input -> get('questionId');

        $collect = $this -> collect_model -> cancelCollect(array(
            'user_id' => $userId,
            'question_id' => $questionId
        ));

        if (!!$collect) {
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
