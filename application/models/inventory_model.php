<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class inventory_model extends CI_Model {

    public function add_product($data) {

        $q = $this->db->insert('product', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_supplier($data1) {

        $q = $this->db->insert('product_supplier', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_receiver($data2) {

        $q = $this->db->insert('product_receiver', $data2);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_cost_center($data3) {

        $q = $this->db->insert('cost_center', $data3);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function select_product() {
        $query = $this->db->query("SELECT * FROM product order by id asc");
        return $query->result();
    }

    public function select_supplier() {
        $query = $this->db->query("SELECT * FROM product_supplier order by id asc");
        return $query->result();
    }

    public function select_receiver() {
        $query = $this->db->query("SELECT * FROM product_receiver order by id asc");
        return $query->result();
    }

    public function select_cost_center() {
        $query = $this->db->query("SELECT * FROM cost_center order by id asc");
        return $query->result();
    }
    
        public function delete_products($id) {
        $this->db->where('id',$id);
          $this->db->delete('product');
    }

    public function get_data($id) {
        $query = $this->db->query("SELECT * FROM product where id='$id' order by id asc");
        return $query->result();
    }

    public function update_model($data,$id){
        
        $q = $this->db->update('product',$data,"id='$id'");
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function delete_supplier1($id) {
        $this->db->where('id',$id);
          $this->db->delete('product_supplier');
    }
    
    public function get_data1($id) {
        $query = $this->db->query("SELECT * FROM product_supplier where id='$id' order by id asc");
        return $query->result();
    }

    public function update_supplier($data,$id){
        
        $q = $this->db->update('product_supplier',$data,"id='$id'");
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
        
    }
    
     public function delete_receiver1($id) {
        $this->db->where('id',$id);
          $this->db->delete('product_receiver');
    }
    
    public function get_data2($id) {
        $query = $this->db->query("SELECT * FROM product_receiver where id='$id' order by id asc");
        return $query->result();
    }

    public function update_receiver($data,$id){
        
        $q = $this->db->update('product_receiver',$data,"id='$id'");
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
        
    }
    
    
        public function delete_cost_center1($id) {
        $this->db->where('id',$id);
          $this->db->delete('cost_center');
    }
    
    public function get_data3($id) {
        $query = $this->db->query("SELECT * FROM cost_center where id='$id' order by id asc");
        return $query->result();
    }

    public function update_cost_center($data,$id){
        
        $q = $this->db->update('cost_center',$data,"id='$id'");
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
        
    }

}
