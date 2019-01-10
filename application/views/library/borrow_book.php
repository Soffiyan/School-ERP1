<?php
$this->load->view('header_footer/header');
?>
<style>
    .acopy
    {
        color: white!important;
        cursor: pointer;
        background: #ff0000;
        padding: 1px 4px 1px 4px;
        border-radius: 4px;
    }
</style>

<script>

    $(function () {
        $("#idate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
    $(function () {
        $("#ddate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
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

    function get_acsn_no(val)
    {
<?php $base = base_url(); ?>
      var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_acsn_no/" + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("acc_no").innerHTML = response;
            }
        });
    }

    function get_days(val)
    {
        var from = document.getElementById('idate').value;
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_book_days/" + from + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("tdays").innerHTML = response;
            }
        });

    }

</script>
<div class="box-header with-border"><h3 class="box-title">Borrow-Book</h3></div>
<div class="edit_bttns" style="top:4px; right:0px;">
    <ul>
        <li>
            <a id="add_author" class="cbut"  data-toggle="modal" data-target="#myModal" href="#">View Borrower</a>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Borrower List</h4>
                            <?php
                            $tdates = date('Y-m-d');
                            $list = $this->library_model->total_borrow_list1($tdates);
                            ?>
                            <table id="" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SI.No</th>
                                        <th>Class</th>
                                        <th>Student</th>
                                        <th>Subject</th>
                                        <th>Issue Date</th>
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
                                            <td><?php echo $i ?></td>
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
                                                $r_date = DateTime::createFromFormat('Y-m-d', $row->reg_date)->format('d-m-Y');
                                            $i_date = DateTime::createFromFormat('Y-m-d', $row->issue_date)->format('d-m-Y');
                                            $d_date = DateTime::createFromFormat('Y-m-d', $row->due_date)->format('d-m-Y');
                                            ?>
                                            <td><?php echo $r3->title ?></td>
                                            <td><?php echo $i_date ?></td>
                                            <td><?php echo $d_date ?></td>
                                            <td><?php echo $r_date ?></td>
                                            <td><?php echo $row->total_days ?></td>
                                            <td><a href="#" ><?php echo $dayss ?></a></td>

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
                        <?php echo form_open('library_controller/Library/borrow_book'); ?>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Select Class</label>
                                    <select class="form-control select2" name="select_class" id="select_class" onchange="get_student(this.value);get_student_code(this.value);">
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
                                    <select class="form-control select2" name="select_student" id="select_student">
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group has-feedback">
                                    <label>Select Subject</label>
                                    <select class="form-control select2" name="select_sub" id="select_sub" onchange='get_acsn_no(this.value);'>
                                        <option value="">Subject's</option>
                                        <?php
                                        $cat = $this->library_model->select_subject();
                                        foreach ($cat as $row) {
                                            $title = $row->title;
                                            $caty = $this->library_model->select_sub($title);
                                            foreach ($caty as $r) {}
                                            echo"<option value='$r->id'>$row->title</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group has-feedback">
                                    <label>Accession No</label>
                                    <select class="form-control select2" name="acc_no" id="acc_no">     
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="idate">Issue Date</label><input type="text" name="idate" value="" id="idate" class="form-control">
                                </div> 
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="ddate">Due Date</label><input type="text" name="ddate" value="" id="ddate" class="form-control" onchange="get_days(this.value)">
                                </div> 
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="tdays">Total Days</label>
                                    <span id="tdays"class="form-control"></span>
                                </div> 
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12"style="margin-top: 24px;">
                                <div class="form-group">
                                    <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    </form>  
                </div>
            </div>
            <!-- /.tab-content -->
            <?php
            $this->load->view('header_footer/footer');
            ?>
