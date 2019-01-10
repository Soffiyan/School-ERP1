<?php

error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
global $inward, $outward, $doc, $report;

class Core extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model(array('frontdesk/admin_model'));
        $this->load->library('grocery_CRUD');

//if($inward !== false){
    }

    public function check_dpt_user() {
        $username = $this->session->userdata['logged_in']['user'];
        $adminuser = $this->session->userdata['logged_in']['admin_user'];
        $cantonment = $this->session->userdata['logged_in']['cantonment'];
        if (empty($username)) {
            return $pass_var = $cantonment;
        } else {
            return $pass_var = $username;
        }
    }

    public function usertype() {
        $username = $this->session->userdata['logged_in']['user'];
        $adminuser = $this->session->userdata['logged_in']['admin_user'];
        $cantonment = $this->session->userdata['logged_in']['cantonment'];
        if (empty($username)) {
            return $admin = 'admin';
        } else {
            return $admin = 'user';
        }
    }

    public function admin_login() {
        if (!$this->session->userdata['logged_in']['admin_user']) {
            $data['setting'] = $this->admin_model->setting();
            $this->load->view('admin_login', $data);
        }
        
        if ($this->session->userdata['logged_in']['admin_user']) {
            redirect('core/dashboard');
        }
        //echo $this->session->userdata['logged_in']['admin_user'];
    }

    public function login() {
        if ((!$this->session->userdata['logged_in']['user']) or ( !$this->session->userdata['logged_in']['admin_user'])) {
            $data['setting'] = $this->admin_model->setting();
            $this->load->view('admin_login', $data);
        }
    }

    public function admin_login_check() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $data['main_content'] = 'login';
            $this->load->view('template', $data);
        } else {
            extract($_POST);
            $result = $this->admin_model->admin_user_login($username, $password);
            if (!$result) {
                //login fail
                $this->session->set_flashdata('login_error', true);
                redirect('core/admin_login');
            } else {
                //login in
                foreach ($result As $resul) {
                    
                }
                //echo"$resul->username";
                $pass = array(
                    'type' => 'admin_user',
                    'id' => $resul->id,
                    'admin_user' => $resul->username,
                    'cantonment' => $resul->cantonment,
                    'access_to' => $resul->access_to,
                    'department_assign' => $resul->department_assign
                );

                $this->session->set_userdata('logged_in', $pass);
                redirect('library_controller/Library/home');
            }
        }
    }

    public function admin_logout() {
        $this->session->sess_destroy();
        redirect('core/admin_login');
    }

}
