<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php
            foreach ($setting as $set) {
                
            }
            $title = strtoupper($main_content);
            echo"$set->company_name | $title";
            ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/font-awesome-4.7.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/load.css">

        <?php if ($main_content != 'inward') { ?>
            <script src="<?php echo base_url(); ?>assets/dist/js/jquery.js"></script>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/js/select2.min.css">
            <script src="<?php echo base_url(); ?>assets/dist/js/select2.min.js"></script>

            <?php foreach ($output->css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach; ?>
            <?php foreach ($output->js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>
        <?php } ?>

        <!-- Ajax La-->
       <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
        .content-wrapper, .right-side, .main-footer {
            margin-left: 0px;
            z-index: 820;
        }
        /* .select2{
             width:100% !important;
         }
         .login-box-msg{
             font-size:18px !important;
         }
         .login-page, .register-page {
             background: #353e50 !important;
         }
         .login-logo a{
             color:#fff !important;
         }
         .content-wrapper, .right-side, .main-footer{
             margin-left: 0px;
         }
         .skin-blue .main-header .logo {
             background-color: #03363d !important;
         }*/

        .flexigrid {
            color: #474747 !important;
            font-weight: 100 !important;;
        }

        .sidebar-menu .treeview-menu>li>a {
            font-weight: 400 !important;
        }
        .red{
            color:red;
        }
        .vir_line{
            border-left:1px solid #e5e5e5;
        }
        table td{
            font-weight:400;
        }
        body{
            background-color: #222d32;
        }

        .box {
            position: relative;
            border-radius: 0px !important;
            background: #ffffff;
            border-top: 1px solid #d2d6de !important;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        .box.box-default {
            margin-top: 16px;
        }

        .nav-stacked li{
            padding: 0px 0px;
        }

        .box.box-solid {
            border-top: 0;
            margin-top: 0px;
        }
        .box.box-default {
            margin-top: 0px;
        }

        .box{
            border:none !important;
            margin-bottom :0px !important;
        }

        .col-md-3{
            padding-right: 0px !important;
            padding-left: 0px !important;
        }
        .col-md-12{
            padding-right: 0px !important;
            padding-left: 0px !important;
        }
        .col-md-9{
            padding-right: 0px !important;
            padding-left: 0px !important;
        }

        .box-body{
            padding:0px !important;
        }
      

    </style>
    <script>
        function PrintElem(elem)
        {
            Popup($(elem).html());
        }

        function Popup(data, title)
        {
            var mywindow = window.open('', 'Report', 'height=700,width=1100');
            mywindow.document.write('<html><head><title>' + title + '</title>');
            /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
            mywindow.document.write('</head><body >');
            mywindow.document.write(data);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10

            mywindow.print();
            mywindow.close();

            return true;
        }
    </script>

    <!---***********************************************************************************8-->
    <!----***************This part is not working because of ajax file upload ***************-->
    <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js" /></script>-->
    <div class="loading" id="loading-image" style="display:none;">Loading&#8230;</div>


