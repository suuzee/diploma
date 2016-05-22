<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inform_model extends CI_Model {

    public function informq($data) {
        $this -> db -> insert('t_informqs', $data);
        return $this -> db -> affected_rows();
    }

    public function informa($data) {
        $this -> db -> insert('t_informas', $data);
        return $this -> db -> affected_rows();
    }

    public function checkIsInformq($data) {
        $query = $this -> db -> get_where('t_informqs', $data);
        return $query -> row();
	}

    public function checkIsInforma($data) {
        $query = $this -> db -> get_where('t_informas', $data);
        return $query -> row();
	}

}
