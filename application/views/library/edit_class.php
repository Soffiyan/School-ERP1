<?php
foreach ($user_data as $row) {
    
}
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Add Class</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <!--******************************Form StArt***************************** -->
            <?php echo form_open('library_controller/Library/edit_class'); ?>
            <div class="row">
                <div class="form-group has-feedback" style="display:none">
                    <label for="id">Id</label><input type="text" value="<?php echo $row->id; ?>" name="id" id="id" required="required" class="form-control">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"style="">
                    <div class="form-group has-feedback">
                        <label for="Add-Class">Add Class</label><input type="text" value="<?php echo $row->class; ?>" name="clas" id="clas" required="required" class="form-control" placeholder="Add Category">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"style="margin-top: 24px;">
                    <div class="form-group">
                        <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat">
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
