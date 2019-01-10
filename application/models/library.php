<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class library extends CI_Model {

    public function add_supplier($data1) {
        $q = $this->db->insert('add_supplier', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
