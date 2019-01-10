<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Add Class</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo form_open('library_controller/Library/add_class'); ?>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="c_code">Class Code</label>
                        <?php
                        $list = $this->library_model->select_class_code();
                        foreach ($list as $row) {
                            $codes = $row->class_code;
                        }
                        if (empty($codes)) {
                            $class_code = 1000;
                            ?>
                            <input type="text" name="c_code" value = "<?php echo $class_code ?>"  id="c_code" required="required" class="form-control">
                            <?php
                        } else {
                            $start_code = $codes + 1;
                            ?>
                            <input type="text" name="c_code" value = "<?php echo $start_code ?>"  id="c_code" required="required" class="form-control">
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="class">Add Class</label><input type="text" name="clas" value="" id="clas" required="required" class="form-control" placeholder="Add Class">
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

            <?php
            $list = $this->library_model->select_class();
            ?>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SI.No</th>
                        <th>Class Code</th>
                        <th>Class</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row->class_code ?></td>
                            <td><?php echo $row->class ?></td>
                            <td><a href="<?php echo base_url("index.php/library_controller/Library/edit_class/" . $row->id) ?>">
                                    <i style="color: red;" class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                </a>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url("index.php/library_controller/Library/delete_class/" . $row->id) ?>">
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
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
