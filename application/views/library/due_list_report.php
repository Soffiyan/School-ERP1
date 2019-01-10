<?php
$this->load->view('header_footer/header');
?>
<script>
    function get_classes(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/due_list_report_class/" + val;

        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }

</script>
<script>
    $(function () {
        $("#fdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
    $(function () {
        $("#tdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });

    function get_all_due(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_all_due/" + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }

    function get_due_report(val) {
        var from_date = document.getElementById('fdate').value;
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_due_report/" + from_date + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }

</script>
<div class="box-header with-border"><h3 class="box-title">Due List Report</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">    
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <select class="form-control select2" name="select_class" id="select_class" onchange="get_classes(this.value);">
                            <option value="">Select Class</option>
                            <?php
                            $select = $this->library_model->select_book1();
                            foreach ($select as $row) {
                                echo"<option value='$row->class_code'>$row->class</option>";
                            }
                            ?>
                        </select>
                    </div>                               
                </div>
            
                <div class="col-lg-3">
                    <div class="form-group has-feedback">
                        <select  name="select_book_data" id="select_book_data" class="form-control select2" onchange="get_all_due(this.value);">
                            <option>Select All Dues Or Today's Due</option>

                            <option value="<?php echo date('Y-m-d') ?>">All Dues</option>
                            <option value="due_date">Todays Due</option>
                        </select>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group has-feedback">
                        <input type="text" name="from_date" placeholder="Select From Date" id="fdate" class="form-control" > 
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group has-feedback">
                        <input type="text" name="to_date" placeholder="Select To Date" id="tdate" class="form-control"onchange="get_due_report(this.value);"> 
                    </div>
                </div>

            </div>
        </div>
        <div id="his"></div>
    </div>
</div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
