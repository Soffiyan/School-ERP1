<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php foreach ($setting as $set) {
    
} echo $set->company_name; ?> | USERLOGIN</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/font-awesome-4.7.0/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/ionicons.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/load.css">

 <!--<script src="assets/dist/js/select2.min.js"></script>-->   
    </head>
    <body class="hold-transition login-page">
        <div class="login-box-body-new margin-top">
            <div class="login-logo">
                <a href=""><b><?php echo $set->company_name; ?></b></a><br>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body left_part">
                <p class="login-box-msg"><img src="<?php echo base_url(); ?>assets/uploads/files/<?php echo $set->company_logo; ?>" width="150px"/></p>

                <form action="<?php echo base_url() ?>index.php/core/admin_login_check" method="post">

                    <div class="form-group has-feedback">
                        <?php
                        $data_username = array(
                            'name' => 'username',
                            'id' => 'username',
                            'required' => 'required',
                            'class' => 'form-control',
                            'value' => set_value('username'),
                            'placeholder' => 'Username'
                        );

                        echo form_input($data_username);
                        ?>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <?php
                        $data_pass = array(
                            'type' => 'password',
                            'name' => 'password',
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => 'Password'
                        );

                        echo form_input($data_pass);
                        ?>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <?php
                        if (($this->session->flashdata('login_error'))) {
                            echo"Please check the username or Password";
                        }
                        echo validation_errors();
                        ?>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <input type="submit" value="Submit" class='btn btn-primary btn-block btn-flat'/>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <div class="right_part">
                <h3>Instruction</h3>
                <ul class="list">
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    <li>Vivamus commodo tortor id pretium ornare.</li>
                    <li>Vestibulum quis velit non nulla tristique gravida ac finibus enim.</li>
                    <li>Donec vulputate ex quis ullamcorper gravida.</li>
                    <li>In vitae orci vulputate, efficitur lacus ut, pretium dui.</li>
                    
                </ul>
            </div>
            <!-- /.login-box-body -->

        </div>

    </body>
</html>