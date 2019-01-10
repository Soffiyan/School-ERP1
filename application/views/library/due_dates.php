<?php
$this->load->view('header_footer/header');
?>
<script>
    $(function () {
        $("#fdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
    $(function () {
        $("#tdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });

    function get_all_due(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_all_due/" + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }

    function get_due_report(val) {
        var from_date = document.getElementById('fdate').value;
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_due_report/" + from_date + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }

</script>
<div class="box-header with-border"><h3 class="box-title">Library Management Due Dates</h3></div>
<div class="edit_bttns" style="top:4px; right:0px;">
    <ul>
        <li>
            <a id="add_author" class="cbut"  data-toggle="modal" data-target="#myModal" href="#">Due Reprint</a>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Due Challan Reprint</h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            $list = $this->library_model->due_challans();
                            ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Issue Date</th>
                                        <th>Due Date</th>
                                        <th>Return Date</th>
                                        <th>Due Amount</th>
                                        <th>Challan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($list as $row) {
                                        ?>
                                        <tr>

                                            <td><?php echo $row->id ?></td>
                                            <?php
                                            $list1 = $this->library_model->select_student_borrow($row->select_student);
                                            foreach ($list1 as $t1) {
                                                
                                            }
                                            ?>
                                            <td><?php echo $t1->student_name ?></td>
                                            <?php
                                            $lists = $this->library_model->select_class_borrow($row->select_class);
                                            foreach ($lists as $tot) {
                                                
                                            }
                                            ?>
                                            <td><?php echo $tot->class ?></td>
                                            <?php
                                            $list2 = $this->library_model->select_subject_borrow($row->select_subject);
                                            foreach ($list2 as $to2) {
                                                $base = base_url();
                                            }
                                            ?>
                                            <td><?php echo $to2->title ?></td>
                                            <td><?php echo $row->issue_date ?></td>
                                            <td><?php echo $row->due_date ?></td>
                                            <td><?php echo $row->return_date ?></td>
                                            <td><?php echo $row->due_amt ?></td>
                                            <td><a class="acopy" href="<?php echo "$base/index.php/library_controller/Library/due_challan/$row->id" ?>">
                                                    Reprint</a></td>
                                        </tr>
                                        <?php
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
                        <?php echo form_open(); ?>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group has-feedback">
                                    <select  name="select_book_data" id="select_book_data" class="form-control select2" onchange="get_all_due(this.value);">
                                        <option>Select</option>

                                        <option value="<?php echo date('Y-m-d') ?>">All Dues</option>
                                        <option value="due_date">Todays Due</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group has-feedback">
                                    <input type="text" name="from_date" placeholder="Select From Date" id="fdate" class="form-control" > 
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group has-feedback">
                                    <input type="text" name="to_date" placeholder="Select To Date" id="tdate" class="form-control"onchange="get_due_report(this.value);"> 
                                </div>
                            </div>

                        </div>
                        </form>
                        <div id="his">

                        </div>
                    </div>
                    <!-- /.tab-content -->
                    <?php
                    $this->load->view('header_footer/footer');
                    ?>

