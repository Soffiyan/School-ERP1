<?php
$this->load->view('header_footer/header');
?>
<script>
    $(function () {
        $("#idate").datepicker(
                {
                    format: 'dd-mm-yyyy'
                });
    });
    $(function () {
        $("#ddate").datepicker(
                {
                    format: 'dd-mm-yyyy'
                });
    });
    function get_student(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_student_ajax/" + val;

        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("select_student").innerHTML = response;
            }
        });
    }

</script>
<div class="box-header with-border"><h3 class="box-title">Borrow-Book</h3></div>

<!-- Form Tab -->
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <!--<ul class="nav nav-tabs">
        <li class="active"><a href="<?php
    $base_url = base_url();
    echo$base_url;
    ?>index.php/library_controller/Library/home">Add Book</a></li>
        <li ><a href="<?php
    $base_url = base_url();
    echo$base_url;
    ?>index.php/frontdesk/frontdesk/parentdetails">Parent Details</a></li>
        <li><a href="#tab_3" >Guardian Details</a></li>
        <li><a href="#tab_4" >Attachement Details</a></li>
        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
    </ul>-->

    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo validation_errors(); ?>
            <form action="http://localhost/School-ERP1/index.php/library_controller/Library/issue_book" method="post" accept-charset="utf-8">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Select Class</label>
                            <select class="form-control select2" name="select_class" id="select_class" onchange="get_student(this.value);get_student_code(this.value);">
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

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group has-feedback">
                            <label>Select Student</label>
                            <select class="form-control select2" name="select_student" id="select_student">
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group has-feedback">
                            <label>Select Subject</label>
                            <select class="form-control select2" name="select_sub" id="select_sub">
                                <option value="">Subject's</option>
                                <?php
                                $cat = $this->library_model->select_subject();
                                foreach ($cat as $row) {

                                    echo"<option value='$row->id'>$row->title</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="idate">Issue Date</label><input type="text" name="idate" value="" id="idate" class="form-control">
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="ddate">Due Date</label><input type="text" name="ddate" value="" id="ddate" class="form-control">
                        </div> 
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12"style="margin-top: 24px;">
                        <div class="form-group">
                            <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

        </div>
        </form>  
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
?>
