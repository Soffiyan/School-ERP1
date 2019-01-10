<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Add Student</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <!--******************************Form StArt***************************** -->
            <?php echo form_open('library_controller/Library/add_student'); ?>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="c_code">Student Code</label>
                        <?php
                        $list = $this->library_model->select_student_code();
                        foreach ($list as $row) {
                            $codes = $row->student_code;
                        }
                        if (empty($codes)) {
                            $class_code = 100;
                            ?>
                            <input readonly type="text" name="c_code" value = "<?php echo $class_code ?>"  id="c_code" required="required" class="form-control">
                            <?php
                        } else {
                            $start_code = $codes + 1;
                            ?>
                            <input readonly type="text" name="c_code" value = "<?php echo $start_code ?>"  id="c_code" required="required" class="form-control">
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <label>Select Class</label>
                        <select class="form-control select2" name="sclass" id="sclass">
                            <option value="">Select Class</option>
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
                        <input type="text" name="sname" id="sname" class="form-control">
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
            $list = $this->library_model->select_student();
            $classes = $row->class;
            ?>
            <table id="" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SI.No</th>
                        <th>Student-Code</th>
                        <th>Class</th>
                        <th>Student-Name</th>
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
                            <td><?php echo $row->student_code ?></td>
                            <?php
                            $lis = $this->library_model->select_stud($row->class);
                            foreach ($lis as $r)
                                
                                ?>
                            <td><?php echo $r->class ?></td>
                            <td><?php echo $row->student_name ?></td>
                            <td><a href="<?php echo base_url("index.php/library_controller/Library/edit_student/" . $row->id) ?>">
                                    <i style="color: red;" class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                </a>&nbsp;<a href="<?php echo base_url("index.php/library_controller/Library/delete_student/" . $row->id) ?>">
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
