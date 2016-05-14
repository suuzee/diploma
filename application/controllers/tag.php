<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this -> load -> model('tag_model');
	}

    public function getTags() {
        $status = 0;
        $tags = $this -> tag_model -> getTags();
        $message = '';

        echo json_encode(
            array(
                "status" => $status,
                "message" => $message,
                "data" => $tags
            )
        );
    }

    public function addTag() {
        $status = 0;
        $tag = $this -> input -> get('tagName');
        $isHasTag = $this -> tag_model -> checkTag($tag);
        $message = '';
        $newTagId = null;
        if (!!!$isHasTag) {
            $newTagId = $this -> tag_model -> addTag($tag);
        } else {
            $status = 1;
            $message = '已经有这个标签了！';
        }

        echo json_encode(
            array(
                "status" => $status,
                "message" => $message,
                "data" => array(
                    "tag_name" => $tag,
                    "tag_id" => $newTagId
                )
            )
        );
    }
}
