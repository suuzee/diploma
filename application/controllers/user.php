<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this -> load -> model('user_model');
	}

	public function doRegister() {

		$email = $this -> input -> post('email');
        $password = $this -> input -> post('password');
        $user = array(
            'user_email' => $email,
            'user_pwd' => $password,
            'user_name' => $email,
            'user_avatar' => 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg',
            'user_desc' => '这个人很懒...',
            'user_date' => date("Y-m-d h:i:s", time())
        );
        $this -> user_model -> addAccount($user);
        echo json_encode(
            array(
                "status" => 0,
                "message" => "",
                "data" => array(
                    "message" => "注册成功！"
                )
            )
        );
	}

    public function doLogin() {

        $status = 0;
		$email = $this -> input -> post('email');
        $password = $this -> input -> post('password');
        $user = $this -> user_model -> checkLogin($email, $password);


        if (!!$user) {
            $this -> session -> set_userdata('login_user', $user);
            $message = "登陆成功！";
        } else {
            $status = 1;
            $user = array();
            $message = "用户名或密码错误！";
        }
        echo json_encode(
            array(
                "status" => $status,
                "message" => $message,
                "data" => array(
                    "message" => $message,
                    "user" => $user
                )
            )
        );
	}

    public function logout() {
        $this -> session -> unset_userdata('login_user');
        redirect('//q.qunarzz.com/diploma');
    }

    public function getUser() {
        $status = 0;
        $message = '';
        $userId = $this -> input -> get('userId');
        $user = $this -> user_model -> getUser($userId);

        if (!!!$user) {
            $status = 1;
            $message = '获取信息失败';
        }
        echo json_encode(
            array(
                "status" => $status,
                "message" => $message,
                "data" => $user
            )
        );
    }

    public function checkEmail() {
        $status = 0;
        $message = '';
        $email = $this -> input -> get('email');
        $result = $this -> user_model -> checkEmail($email);
        if (!!!$result) {
            $message = 'success';
        } else {
            $message = 'fail';
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
