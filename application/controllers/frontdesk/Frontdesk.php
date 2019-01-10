<?php

error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
global $inward, $outward, $doc, $report;

class Frontdesk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model(array('frontdesk/admin_model'));
        $this->load->library('grocery_CRUD');
    }
    
    public function home() {
        if (($this->session->userdata['logged_in']['user']) or ( $this->session->userdata['logged_in']['admin_user'])) {
            $cantonment = $this->session->userdata['logged_in']['cantonment'];
            $data = array(
                'main_content' => 'frontdesk/studentdetails_form',
                'setting' => $this->admin_model->setting(),
            );
            $this->load->view('template', $data);
        } else {
            $this->login();
        }
    }
    
    public function parentdetails(){
        if (($this->session->userdata['logged_in']['user']) or ( $this->session->userdata['logged_in']['admin_user'])) {
            $cantonment = $this->session->userdata['logged_in']['cantonment'];
            $data = array(
                'main_content' => 'frontdesk/parentdetails_form',
                'setting' => $this->admin_model->setting(),
            );
            $this->load->view('template', $data);
        } else {
            $this->login();
        }
    }

}
