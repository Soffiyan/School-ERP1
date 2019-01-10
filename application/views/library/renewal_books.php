<?php
$this->load->view('header_footer/header');
?>

<script>

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
<div class="box-header with-border"><h3 class="box-title">Renewal Book's</h3></div>

<!-- Form Tab -->
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="row">
                <?php echo form_open('library_controller/Library/renewal_book_get_data'); ?>
                
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Select Class</label>
                        <select class="form-control select2" name="select_class" id="select_class" onchange="get_student(this.value);">
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
                        <label>Select Borrower Name</label>
                        <select class="form-control select2" name="select_student" id="select_student">
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 24px">
                    <div class="form-group">
                        <input type="submit" value="Get Book's" class="btn btn-block btn-warning btn-flat"/>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>           
        </div>
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
?>
