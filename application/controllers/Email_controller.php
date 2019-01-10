<?php

class Email_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function index() {

        $this->load->helper('form');
        $this->load->view('email_form');
    }

    public function send_mail() {
         $to_email = $this->input->post('email'); 
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.yourdomainname.com.',
            'smtp_port' => 465,
            'smtp_user' => 'soffiyan.pathan@gmail.com', // change it to yours
            'smtp_pass' => 'computerscience', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->from('soffiyan.pathan@gmail.com', "Admin Team");
        $this->email->to("$to_email");
        $this->email->cc("soffiyan.pathan@gmail.com");
        $this->email->subject("This is test subject line");
        $this->email->message("Mail sent test message...");

        $data['message'] = "Sorry Unable to send email...";
        if ($this->email->send()) {
            $data['message'] = "Mail sent...";
        }

        // forward to index page
        $this->load->view('email_form');
    }

}
?>