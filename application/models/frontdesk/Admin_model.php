<?php

class Admin_model extends CI_Model {

   function decrypt_password_callback($value) {
        $this->load->library('encrypt');
        $key = 'super-secret-key';
        $decrypted_password = $this->encrypt->decode($value, $key);
        return $decrypted_password;
    }

   
    
    public function admin_user_login($username, $password) {
        /*         * ********************************* */
        //$h_pass = $this->decrypt_password_callback($password);
        $query = $this->db->query("select * from `admin_user` where username='$username'");
        $data = $query->result();
        foreach ($data as $dataa) {
            
        }
        $h_pass = $this->decrypt_password_callback($dataa->password);
        //echo"$h_pass";
        if ($h_pass == $password) {
            return $query->result();
        } else {
            return false;
        }
        /*         * ********************************* */
    }
    
    public function setting(){
        $query = $this->db->query("SELECT * FROM company_information order by id desc limit 1");
        return $query->result();
    }
}
