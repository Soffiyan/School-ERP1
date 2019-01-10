<?php
$this->load->view('header_footer/header');
foreach ($user_data as $row) {
    
}
?>

<div class="box-header with-border"><h3 class="box-title">Update Supplier</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo form_open('library_controller/Library/edit_supplier'); ?>
            <div class="row">
                <div class="form-group has-feedback"  STYLE="display: none">
                    <label for="Supname">Id</label><input type="text" name="id" value="<?php echo $row->id; ?>" id="id" class="form-control">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <div class="form-group has-feedback">
                            <label for="Supname">Supplier Name</label><input type="text" name="Supname" value="<?php echo $row->supplier_name; ?>" id="Supname" required="required" class="form-control" placeholder="Supplier Name">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group has-feedback">
                        <div class="form-group has-feedback">
                            <label for="email">Email</label><input type="email" name="email" value="<?php echo $row->email; ?>" id="email" required="required" class="form-control" placeholder="Enter email">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group has-feedback">
                        <div class="form-group has-feedback">
                            <label for="pno">Phone No</label><input type="text" name="pno" value="<?php echo $row->phone_no; ?>" id="pno" required="required" class="form-control" placeholder="Enter Phone Number">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group has-feedback">
                        <div class="form-group has-feedback">
                            <label for="mobile">Mobile Number</label><input type="text" name="mobile" value="<?php echo $row->mobile; ?>" id="mobile" required="required" class="form-control" placeholder="Enter Mobile No">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group has-feedback">
                        <label>Address</label>
                        <textarea style="height: 10%!important;" rows="3" class="form-control" cols="50" name="address" id="address"><?php echo $row->address; ?></textarea>
                    </div>           
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"style="margin-top: 24px;">
                    <div class="form-group">
                        <input type="submit" value="UPDATE AND CONTINUE" class="btn btn-block btn-warning btn-flat"/>
                    </div>
                </div>
            </div>
            </form> 
        </div>
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
?>
