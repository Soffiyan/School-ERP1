<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Attendence</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <a class="acopy" href=<?php echo base_url("index.php/attendence_controller/Attendence/attendence_day_wise") ?>>Attendance Day Wise </a>
                </div>
            </div>
        </div>
    </div>
</div>
