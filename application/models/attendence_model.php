<?php

class attendence_model extends CI_Model {

    public function select_student() {
        $query = $this->db->query("SELECT * FROM lib_add_student order by id asc");
        return $query->result();
    }

    public function select_stud($classes) {
        $query = $this->db->query("SELECT * FROM lib_add_class where class_code='$classes' order by id asc");
        return $query->result();
    }

    public function select_class() {
        $query = $this->db->query("SELECT * FROM lib_add_class order by id asc");
        return $query->result();
    }

    public function get_student_attendence_list($val) {
        $query = $this->db->query("SELECT * FROM lib_add_student where class='$val' order by id asc");
        return $query->result();
    }

    public function save_day_wise($data1) {
        $q = $this->db->insert('attendence_attend', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_attend($class_codes, $atten_date) {
        $query = $this->db->query("SELECT * FROM attendence_attend where classs='$class_codes' and date='$atten_date'");
        return $query->result();
    }

    public function update_day_wise($data1) {
        $this->db->update('attendence_attend', $data1);
    }
    public function delete_day_wise($classss,$datess)
    {
        $array = array('classs' => $classss, 'date' => $datess);
        $this->db->where($array);
        $this->db->delete('attendence_attend');
    }

}

?>