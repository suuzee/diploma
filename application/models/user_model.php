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

    public function  getUser($id) {
        $query = $this -> db -> get_where('t_users', array(
            'user_id' => $id
        ));
        return $query -> row();
    }

    public function getUserNum() {
        $query = $this -> db -> get('t_users');
        return !!($query -> num_rows()) ? $query -> num_rows() : 0;
    }

    public function getUserPage($start, $pagesize){
		$this -> db -> select("*");
		$this -> db -> from("t_users");
		$this -> db -> limit($pagesize, $start);
		return $this -> db -> get() -> result();
	}

    public function checkEmail($email) {
        $query = $this -> db -> get_where('t_users', array(
            'user_email' => $email
        ));
        return $query -> row();
    }
}
