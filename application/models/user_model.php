<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function addAccount($user) {
        $this -> db -> insert('t_users', $user);
	}

    public function checkLogin($email, $password) {
        $query = $this -> db -> get_where('t_users', array(
            'user_email' => $email,
            'user_pwd' => $password
        ));
        return $query -> row();
	}
}
