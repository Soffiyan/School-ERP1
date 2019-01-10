<?php
$this->load->view('header_footer/header');
?>
<script src="<?php echo base_url(); ?>assets/js/jquery.min_3.1.0.js"></script>
<?php
foreach ($user_data as $row) {
    
}
?>
<div class="box-header with-border"><h3 class="box-title">Update Book</h3></div>

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
            <?php echo form_open('library_controller/Library/edit_book'); ?>
            <input type="text" name="id" value="<?php echo $row->id ?>" id="id" class="form-control" style="display: none;">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group has-feedback">
                    <label for="title">Title</label><input type="text" name="title" value="<?php echo $row->title ?>" id="title" class="form-control" placeholder="Enter Title">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="author">Author</label><input type="text" name="author" value="<?php echo $row->author ?>" id="author" class="form-control" placeholder="Enter Author Name">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="publication">Publication</label><input type="text" name="publication" value="<?php echo $row->publications ?>" id="publication" class="form-control" placeholder="Enter Publication">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="yop">Year Of Passing</label><input type="text" name="yop" value="<?php echo $row->year_passing ?>" id="yop" class="form-control" placeholder="Enter Year Of Publication">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="nop">No Of Pages</label><input type="text" name="nop" value="<?php echo $row->no_pages ?>" id="nop" class="form-control" placeholder="Enter No Of Pages">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group has-feedback">
                    <label for="isbn">ISBN No</label><input type="text" name="isbn" value="<?php echo $row->isbn_no ?>" id="isbn" class="form-control" placeholder="Enter ISBN-No">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="volume">Volume</label><input type="text" name="vol" value="<?php echo $row->volume ?>" id="vol" class="form-control" placeholder="Enter Volume">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="edition">Edition</label><input type="text" name="edition" value="<?php echo $row->edition ?>" id="edition" class="form-control" placeholder="Enter Edition">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="pdate">Purchasing Date</label><input type="date" name="pdate" value="<?php echo $row->purchasing_date ?>" id="datepicker" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="pridate">Printing Date</label><input type="date" name="pridate" value="<?php echo $row->printing_date ?>" id="datepicker" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="ncopy">No Of Copies</label><input type="text" name="ncopy" value="<?php echo $row->no_copies ?>" id="ncopy" class="form-control" placeholder="No Of Copies">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="billno">Bill No</label><input type="text" name="billno" value="<?php echo $row->bill_no ?>" id="billno" class="form-control" placeholder="Enter Bill No">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="singlecopy">Purchasing Price of Single Copy</label><input type="text" name="singlecopy" value="<?php echo $row->purchasing_prince_single_copy ?>" id="singlecopy" class="form-control" placeholder="Purchasing Price of Single Copy">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="loc">Location(e.g. Rack 1, Rack 2, etc)</label><input type="text" name="loc" value="<?php echo $row->location ?>" id="loc" class="form-control" placeholder="Enter Location">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group has-feedback">
                    <label>Select Supplier Name</label>
                    <select class="form-control select2" name="sup" id="sup">
                        <option value="<?php echo $row->supplier ?>"><?php echo $row->supplier ?></option>
                        <?php
                        $sup = $this->library_model->select_supplier();
                        foreach ($sup as $r) {
                            echo"<option>$r->supplier_name</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group has-feedback">
                    <label>Select Book Category</label>
                    <select class="form-control select2" name="category" id="category">
                        <option value="<?php echo $row->category ?>"><?php echo $row->category ?></option>
                        <?php
                        $cat = $this->library_model->select_cat();
                        foreach ($cat as $ro) {
                            echo"<option>$ro->category</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label for="acsno">Accession No</label><input type="text" name="acsno" value="<?php echo $row->accession_no ?>" id="acsno" class="form-control" placeholder="Accession No">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">

                <div class="form-group has-feedback">
                    <label>Tilte Brief</label>
                    <textarea style="height: 10%!important;" rows="3" class="form-control" cols="50" name="titlebrief" id="titlebrief"><?php echo $row->title_brief ?></textarea>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="submit" value="UPDATE AND CONTINUE" class="btn btn-block btn-warning btn-flat"/>
                </div>
            </div>
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <!-- /.tab-content -->
</div>

<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<?php
$this->load->view('header_footer/footer');
?>