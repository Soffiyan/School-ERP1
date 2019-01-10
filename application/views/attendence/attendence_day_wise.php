<?php
$this->load->view('header_footer/attendence_header');
?>
<script>
    $(function () {
        $("#tdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
</script>
<div class="box-header with-border"><h3 class="box-title">Attendence Day Wise</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <form action='http://localhost/School-ERP1/index.php/attendence_controller/Attendence/save_day_wise' method='post' accept-charset='utf-8'>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Select Batch</label>
                            <select class="form-control select2" name="select_batch" id="select_batch" onchange="get_student_attendence_list(this.value)">
                                <?php $result = $this->attendence_model->select_class(); ?>
                                <option>Select Batch</option>
                                <?php
                                foreach ($result as $row) {
                                    echo "<option value='$row->class_code'>$row->class</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Select Date</label>
                            <input name="tdate" type="text" class="form-control" id="tdate">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 24px">
                        <div class="form-group">
                            <input type="submit" value="Get Attendence" class="btn btn-block btn-warning btn-flat"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>
