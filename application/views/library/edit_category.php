<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Edit Category</h3></div>

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
            <?php
            foreach ($user_data as $row) {
                
            }
            ?>
            <!--******************************Form StArt***************************** -->
            <?php echo form_open('library_controller/Library/edit_category'); ?>
            <div class="row">
                <input type="text" style="display: none;" value="<?php echo $row->id; ?>" name="id" id="id" required="required" class="form-control">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <div class="form-group has-feedback">
                            <label for="category">Add Category</label><input type="text" value="<?php echo $row->category; ?>" name="category" value="" id="category" required="required" class="form-control" placeholder="Add Category">
                        </div>
                    </div>
                </div>

                    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 24px">
                        <div class="form-group">
                            <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                </form>  
            </div>
        </div>
        <!-- /.tab-content -->
        <!--******************************Form End***************************** -->
        <?php
        $this->load->view('header_footer/footer');
        ?>
