<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collect_model extends CI_Model {

    public function checkIsCollect($data) {
        $query = $this -> db -> get_where('t_collects', $data);
        return $query -> row();
	}

    public function collect($data) {
        $this -> db -> insert('t_collects', $data);
        return $this -> db -> affected_rows();
    }

    public function cancelCollect($data) {
        $this -> db -> delete('t_collects', $data);
        return $this -> db -> affected_rows();
    }

}
