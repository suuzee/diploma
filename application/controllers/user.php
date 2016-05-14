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
        $this -> user_model -> addAccount($email, $password);
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
}
