<?php
$this->load->view('header_footer/header');
?>

<div class="box-header with-border"><h3 class="box-title">View Author</h3></div>
<div class="edit_bttns" style="top:4px; right:0px;">
    <ul>
        <li>
            <a id="add_author" class="cbut"  data-toggle="modal" data-target="#myModal" href="#">Create Author</a>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Author</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('library_controller/Library/add_author'); ?>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <?php echo validation_errors(); ?>

                                <label for="c_code">Author-Code</label>
                                <?php
                                $list = $this->library_model->select_author_code();
                                foreach ($list as $row) {
                                    $codes = $row->author_code;
                                }
                                if (empty($codes)) {
                                    $author_code = 1000;
                                    ?>
                                    <input readonly type="text" name="c_code" value = "<?php echo $author_code ?>"  id="c_code" required="required" class="form-control">
                                    <?php
                                } else {
                                    $start_code = $codes + 1;
                                    ?>
                                    <input readonly type="text" name="c_code" value = "<?php echo $start_code ?>"  id="c_code" required="required" class="form-control">
                                    <?php
                                }
                                ?>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="category">Add Author</label><input type="text" name="author" value="" id="author" class="form-control" placeholder="Add Author">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top: 24px!important;">
                                <div class="form-group">
                                    <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </li>
    </ul>
</div>

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
    ?>
    </ul>-->
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php
            $list = $this->library_model->select_author();
            ?>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Author Code</th>
                        <th>Author Name</th>
                        <th style=color:#f38108!important;>Manage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->author_code ?></td>
                            <td><?php echo $row->author ?></td>
                            <td><a style=color:#f38108!important; data-toggle="modal" data-target="#mModal" href="">View Book's</a>
                                <div class="modal fade" id="mModal" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Book's</h4>
                                            </div>
                                            <div class="modal-body">   
                                                <table id="" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>ISBN</th>
                                                            <th>Publication's</th>
                                                            <th>Copies</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $row->title ?></td>
                                                            <td><?php echo $row->isbn_no ?></td>
                                                            <td><?php echo $row->publications ?></td>
                                                            <td><?php echo $row->no_copies ?></td>

                                                        </tr>
                                                        <?php
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="<?php echo base_url("index.php/library_controller/Library/edit_author/" . $row->id) ?>">
                                    <i style="color: red;" class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                </a>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("index.php/library_controller/Library/delete_author/" . $row->id) ?>">
                                    <i style="color: blue;" class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                </a></td>
                        </tr>
                        <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </form>  
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
?>
