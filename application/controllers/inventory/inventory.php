<?php

error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
global $inward, $outward, $doc, $report;

class inventory extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model(array('admin_model'));
        $this->load->model(array('inventory_model'));
        $this->load->library('grocery_CRUD');



//if($inward !== false){
    }

    public function index() {
        $base = base_url();
    }
    
    public function save1() {
        $data = array(
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $this->load->view('inventory/productform');

        $prodname = $this->input->post('prodname');
        $proddes = $this->input->post('proddes');
        $prodtype = $this->input->post('prodtype');
        $unitcost = $this->input->post('unitcost');
        $uom = $this->input->post('uom');
        $place = $this->input->post('place');
        $openingstock = $this->input->post('openingstock');
        $date = $this->input->post('date');
        $adate = date('Y-m-d');

        $this->form_validation->set_rules('prodname', 'Product Name', 'required');
        $this->form_validation->set_rules('proddes', 'Product Description', 'required');
        $this->form_validation->set_rules('prodtype', 'Product Type', 'required');
        $this->form_validation->set_rules('unitcost', 'Unit Cost', 'required');
        $this->form_validation->set_rules('uom', 'Unit of  Measurement', 'required');
        $this->form_validation->set_rules('place', 'Place', 'required');
        $this->form_validation->set_rules('openingstock', 'Opening stock', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('adate', 'Date1');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'prodname' => $prodname,
                'proddes' => $proddes,
                'prodtype' => $prodtype,
                'unitcost' => $unitcost,
                'uom' => $uom,
                'place' => $place,
                'openingstock' => $openingstock,
                'date' => $date,
                'adate' => $adate
            );
            $result = $this->inventory_model->add_product($data);
            $base = base_url();
            if ($result == true) {
                echo"<script>alert('Data has been saved'); window.location.href='$base/index.php/inventory/inventory/save1';</script>";
            } else {
                echo"<script>alert('Data Insertion failed'); window.location.href='$base/index.php/inventory/inventory/save1';</script>";
            }
        }
    }

    public function supplier() {
        $data = array(
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $this->load->view('inventory/supplier');

        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $phno = $this->input->post('phno');
        $date = $this->input->post('date');
        $adate = date('Y-m-d');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phno', 'Phone No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('adate', 'Date1');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $name,
                'address' => $address,
                'phno' => $phno,
                'date' => $date,
                'adate' => $adate
            );
            $result = $this->inventory_model->add_supplier($data);
            $base = base_url();
            if ($result == true) {
                echo"<script>alert('Data has been saved'); window.location.href='$base/index.php/inventory/inventory/supplier';</script>";
            } else {
                echo"<script>alert('Data Insertion failed'); window.location.href='$base/index.php/inventory/inventory/supplier';</script>";
            }
        }
    }

    public function receiver() {
        $data = array(
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $this->load->view('inventory/receiver');

        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $phno = $this->input->post('phno');
        $date = $this->input->post('date');
        $adate = date('Y-m-d');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phno', 'Phone No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('adate', 'Date1');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $name,
                'address' => $address,
                'phno' => $phno,
                'date' => $date,
                'adate' => $adate
            );
            $result = $this->inventory_model->add_receiver($data);
            $base = base_url();
            if ($result == true) {
                echo"<script>alert('Data has been saved'); window.location.href='$base/index.php/inventory/inventory/receiver';</script>";
            } else {
                echo"<script>alert('Data Insertion failed'); window.location.href='$base/index.php/inventory/inventory/receiver';</script>";
            }
        }
    }

    public function cost_center() {
        $data = array(
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $this->load->view('inventory/cost_center');

        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $date = $this->input->post('date');
        $adate = date('Y-m-d');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('adate', 'Date1');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $name,
                'description' => $description,
                'date' => $date,
                'adate' => $adate
            );
            $result = $this->inventory_model->add_cost_center($data);
            $base = base_url();
            if ($result == true) {
                echo"<script>alert('Data has been saved'); window.location.href='$base/index.php/inventory/inventory/cost_center';</script>";
            } else {
                echo"<script>alert('Data Insertion failed'); window.location.href='$base/index.php/inventory/inventory/cost_center';</script>";
            }
        }
    }

    public function delete_product($id) {
        $data = array(
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $result = $this->inventory_model->delete_products($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Product deleted successfully');window.location.href='$base/index.php/inventory/inventory/save1'</script>";
        } else {
            echo "<script>alert('Failed');window.location.href='$base/index.php/inventory/inventory/save1'</script>";
        }
    }

    public function edit_product($id) {
        $user_data = $this->inventory_model->get_data($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $this->load->view('inventory/edit_product');
        $id = $this->input->post('id');
        $prodname = $this->input->post('prodname');
        $proddes = $this->input->post('proddes');
        $prodtype = $this->input->post('prodtype');
        $unitcost = $this->input->post('unitcost');
        $uom = $this->input->post('uom');
        $place = $this->input->post('place');
        $openingstock = $this->input->post('openingstock');
        $date = $this->input->post('date');

        $this->form_validation->set_rules('prodname', 'Product Name', 'required');
        $this->form_validation->set_rules('proddes', 'Product Description', 'required');
        $this->form_validation->set_rules('prodtype', 'Product Type', 'required');
        $this->form_validation->set_rules('unitcost', 'Unit Cost', 'required');
        $this->form_validation->set_rules('uom', 'Unit of  Measurement', 'required');
        $this->form_validation->set_rules('place', 'Place', 'required');
        $this->form_validation->set_rules('openingstock', 'Opening stock', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data1 = array(
                
              'prodname' => $prodname,
                'proddes' => $proddes,
                'prodtype' => $prodtype,
                'unitcost' => $unitcost,
                'uom' => $uom,
                'place' => $place,
                'openingstock' => $openingstock,
                'date' => $date,
            );
            $result = $this->inventory_model->update_model($data1,"$id");
            $base = base_url();
            if ($result == true) {
                echo"<script>alert('Data has been updated'); window.location.href='$base/index.php/inventory/inventory/save1';</script>";
            } else {
                echo"<script>alert('Data update failed'); window.location.href='$base/index.php/inventory/inventory/save1';</script>";
            }
        }
    }
    
    public function delete_supplier($id) {
        $data = array(
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $result = $this->inventory_model->delete_supplier1($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Product deleted successfully');window.location.href='$base/index.php/inventory/inventory/supplier'</script>";
        } else {
            echo "<script>alert('Failed');window.location.href='$base/index.php/inventory/inventory/supplier'</script>";
        }
    }
    
    
    public function edit_supplier($id) {
        $user_data = $this->inventory_model->get_data1($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $this->load->view('inventory/edit_supplier');
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $phno = $this->input->post('phno');
        $date = $this->input->post('date');
        

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phno', 'Phone No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
      

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $name,
                'address' => $address,
                'phno' => $phno,
                'date' => $date,
               
            );
            $result = $this->inventory_model->update_supplier($data,"$id");
            $base = base_url();
            if ($result == true) {
                echo"<script>alert('Data has been Updated'); window.location.href='$base/index.php/inventory/inventory/supplier';</script>";
            } else {
                echo"<script>alert('Data Update failed'); window.location.href='$base/index.php/inventory/inventory/supplier';</script>";
            }
        }
    }
    
    
    public function delete_receiver($id) {
        $data = array(
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $result = $this->inventory_model->delete_receiver1($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Product deleted successfully');window.location.href='$base/index.php/inventory/inventory/receiver'</script>";
        } else {
            echo "<script>alert('Failed');window.location.href='$base/index.php/inventory/inventory/receiver'</script>";
        }
    }
    
    
    public function edit_receiver($id) {
        $user_data = $this->inventory_model->get_data2($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $this->load->view('inventory/edit_receiver');
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $phno = $this->input->post('phno');
        $date = $this->input->post('date');
        

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phno', 'Phone No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
      

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $name,
                'address' => $address,
                'phno' => $phno,
                'date' => $date,
               
            );
            $result = $this->inventory_model->update_receiver($data,"$id");
            $base = base_url();
            if ($result == true) {
                echo"<script>alert('Data has been Updated'); window.location.href='$base/index.php/inventory/inventory/receiver';</script>";
            } else {
                echo"<script>alert('Data Update failed'); window.location.href='$base/index.php/inventory/inventory/receiver';</script>";
            }
        }
    }
    
    public function delete_cost_center($id) {
        $data = array(
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $result = $this->inventory_model->delete_cost_center1($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Cost Center deleted successfully');window.location.href='$base/index.php/inventory/inventory/cost_center'</script>";
        } else {
            echo "<script>alert('Failed');window.location.href='$base/index.php/inventory/inventory/cost_center'</script>";
        }
    }
    
    
    public function edit_cost_center($id) {
        $user_data = $this->inventory_model->get_data3($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'home',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('common_template', $data);
        $this->load->view('inventory/edit_cost_center');
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $date = $this->input->post('date');
        

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $name,
                'description' => $description,
                'date' => $date,
                
            );
            
            $result = $this->inventory_model->update_cost_center($data,"$id");
            $base = base_url();
            if ($result == true) {
                echo"<script>alert('Data has been Updated'); window.location.href='$base/index.php/inventory/inventory/cost_center';</script>";
            } else {
                echo"<script>alert('Data Update failed'); window.location.href='$base/index.php/inventory/inventory/cost_center';</script>";
            }
        }
    }
}
    
    


