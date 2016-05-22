<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function checkAdmin($data) {
        $query = $this -> db -> get('t_admins', $data);
        return $query -> row();
    }
}
