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

    function get_returning(val) {
<?php $base = base_url(); ?>
        var first = document.getElementById("select_class").value;
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_returning/" + first + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }

</script>
<div class="box-header with-border"><h3 class="box-title">Return Book</h3></div>
<div class="edit_bttns" style="top:4px; right:0px;">
    <ul>
        <li>
            <a id="add_author" class="cbut"  data-toggle="modal" data-target="#myModal" href="#">Borrow List</a>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Borrow List</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            $tdates = date('Y-m-d');
                            $list = $this->library_model->total_borrow_list1($tdates);
                            ?>
                            <table id="" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Student</th>
                                        <th>Sub</th>
                                        <th>Issue-Date</th>
                                        <th>Due Date</th>
                                        <th>Reg Date</th>
                                        <th>Total Days</th>
                                        <th>Days Remaining</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($list as $row) {
                                        $tdate = date('d-m-Y');
                                        $due_date = $row->due_date;
                                        $from1 = strtotime($tdate);
                                        $tos = strtotime($due_date);
                                        $date_diff = ($tos - strtotime($tdate)) / 86400;
                                        $dayss = round($date_diff, 0);
                                        ?>
                                        <tr>
                                            <?php
                                            $lis = $this->library_model->select_class_borrow($row->select_class);
                                            foreach ($lis as $r1)
                                                
                                                ?>
                                            <td><?php echo $r1->class ?></td>

                                            <?php
                                            $li = $this->library_model->select_student_borrow($row->select_student);
                                            foreach ($li as $r2)
                                                
                                                ?>
                                            <td><?php echo $r2->student_name ?></td>
                                            <?php
                                            $liss = $this->library_model->select_subject_borrow($row->select_subject);
                                            foreach ($liss as $r3)
                                                
                                                ?>
                                            <td><?php echo $r3->title ?></td>
                                            <td><?php echo $row->issue_date ?></td>
                                            <td><?php echo $row->due_date ?></td>
                                            <td><?php echo $row->reg_date ?></td>
                                            <td><?php echo $row->total_days ?></td>
                                            <?php
                                            if ($dayss < 0) {
                                                ?>
                                                <td><?php echo $dayss ?> Days Ago</td>
                                                <?php
                                            } else {
                                                ?>
                                                <td><?php echo $dayss ?> Days Left</td>
                                            <?php }
                                            ?>
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
            </div>
            </div>
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('library_controller/Library/returning_book'); ?>
                        <div class="row">

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
                                    <label>Select Student</label>
                                    <select class="form-control select2" name="select_student" id="select_student" onchange="get_returning(this.value);">
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    </form>  
                    <div id="his"></div>
                </div>
            </div>
            <!-- /.tab-content -->
            <?php
            $this->load->view('header_footer/footer');
            ?>
