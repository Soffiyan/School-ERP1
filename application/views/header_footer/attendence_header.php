
<style>
    .modal {
        background: rgba(0, 0, 0, 0.3)!important;

    }
    .edit_bttns {
        margin: 0px;
        padding: 0px;
        position: absolute;
        top: 10px;
        right: 10px;
    }.edit_bttns ul {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }.edit_bttns li {
        margin: 0px 5px;
        padding: 0px;
        float: left;
    }.edit_bttns li a {
        margin: 0px;
        font-size: 12px;
        border-right: #c6c4c4 0px solid;
        display: block;
        color: #fff;
        font-weight: bold;
        background: #f38108;
        padding: 6px 20px;
        transition-duration: 0.9s;
        border: 1px solid #e97a05;
    }.acopy
    {
        color: white!important;
        cursor: pointer;
        background: #ff0000;
        padding: 4px 7px 5px 7px!important;
        border-radius: 4px;
    }
    .abcopy
    {
        color: white!important;
        cursor: pointer;
        background: green;
        padding: 4px 7px 5px 7px!important;
        border-radius: 4px;
    }
</style>
<script src="<?php echo base_url(); ?>assets/js/jquery.min_3.1.0.js">
    
</script>

<div class="container">
    <style>
        #files { font-family: Verdana, sans-serif; font-size: 11px; }
        #files strong { font-size: 13px; }
        #files a { float: right; margin: 0 0 5px 10px; }
        #files ul { list-style: none; padding-left: 0; }
        #files li { width: 280px; font-size: 12px; padding: 5px 0; border-bottom: 1px solid #CCC; }
    </style>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 box box-solid">
                <div class="pad_left_right">
                    Home&nbsp;&nbsp;>&nbsp;&nbsp;Attendence <a href='' class='fa fa-eye' data-toggle='modal' onclick='get_inward_data($inward_s - > document_no);' data-target='.bs-example-modal-lg'></a>
                </div>
            </div>
            <div class="col-md-12 box box-solid">
                <div class="col-md-3">
                    <div class="box box-solid" style="background:#fbfbfb">
                        <!-- Menu -->
                        <?php
                        $this->load->view('attendence_menu/att_menu');
                        ?>
                        <!-- Menu end -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box box-default"> 
                        <div class="box" id="rec_doc">