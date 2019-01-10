<?php $this->load->view('header'); ?>
<?php if(($main_content != 'login') && ($main_content != 'admin/login') && ($main_content != 'hod/login')){ $this->load->view('menu');} ?>
<?php $this->load->view($main_content); ?>
<?php $this->load->view('footer'); ?>