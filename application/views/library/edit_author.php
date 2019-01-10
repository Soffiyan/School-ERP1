<?php
$this->load->view('header_footer/header');
foreach ($user_data as $row) {
    
}
?>
<div class="box-header with-border"><h3 class="box-title">Edit Author</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo form_open('library_controller/Library/edit_authors'); ?>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="c_code">ID</label>
                        <input type="text" name="id" value = "<?php echo $row->id ?>"  id="id" class="form-control">                           
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="category">Add Author</label><input type="text" name="author" id="author" class="form-control" value='<?php echo $row->author ?>'>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6"style="margin-top: 24px;">
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-block btn-warning btn-flat">
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6"style="margin-top: 24px;">
                    <div class="form-group">
                        <?php $base = base_url();
                        ?>
                        <a href="http://localhost/School-ERP1/index.php/library_controller/Library/view_author" class='btn btn-block btn-warning btn-flat'>Go Back</a>
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
