<?php
$this->load->view('header_footer/header');
foreach ($user_data as $rows) {
    
}
?>
<div class="box-header with-border"><h3 class="box-title">Update Student</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo form_open('library_controller/Library/edit_student'); ?>
            <input type="text" style="display: none" name="id" value="<?php echo $rows->id ?>" id="id" class="form-control">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <label>Select Class</label>
                        <select class="form-control select2" name="sclass" id="sclass">
                            <option value="<?php echo $rows->class ?>"><?php echo $rows->class ?></option>
                            <?php
                            $select = $this->library_model->select_class();
                            foreach ($select as $row) {
                                echo"<option value='$row->class_code'>$row->class</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <label>Enter Student Name</label>
                        <input type="text" name="sname" value="<?php echo $rows->student_name ?>" id="sname" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"style="margin-top: 24px;">
                    <div class="form-group">

                        <input type="submit" value="SAVE AND CONTINUE" class="btn btn-warning">
                        <a href="<?php echo base_url("index.php/library_controller/Library/add_student") ?>"class="btn btn-warning">BACK</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            </form>  

        </div>
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
