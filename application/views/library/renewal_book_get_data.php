<?php
$this->load->view('header_footer/header');
?>
<style>
    .select2-container--default .select2-selection--single{
        border: 1px solid #a9a9a9!important;
        border-radius: 0;
        padding: 1px 13px!important;
        height: 25px!important;
    }.select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: relative;
        top: 1000px!important;
        width: 20px;
    }
    input[type="text"]
    {
        width:50%!important;
    }
</style>
<script>
    $(function () {
        $(".fdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
            
                });
                
    });
    function get_days(val, val1) {
        var from = document.getElementById('i_date').value
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_days/" + from + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("new_day" + val1).innerHTML = response;
                document.getElementById("new_day1" + val1).innerHTML = response;
            }
        });
    }
    function get_date(val,val1){
        <?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_date/" + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("renew_date1"+val1).innerHTML = response;
            }
        });
    }
</script>
<div class="box-header with-border"><h3 class="box-title">Renewal Book's</h3></div>

<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">


            <table id='' class='table table-bordered table-hover'>
                <thead>
                    <tr>
                        <!--<th>SI.No</th>-->
                        <th>Class</th>
                        <th>Student</th>
                        <th>Subject</th>
                        <th>Issue</th>
                        <th>Due</th>
                        <th style = 'display: none'>Total Days</th>
                        <th style = 'display: none'>Reg Date</th> 
                        <th>Days Left</th>
                        <th>Renewal Date</th>
                        <th>Days</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($user_data as $row) {
                        $lists = $this->library_model->select_class_borrow($row->select_class);
                        foreach ($lists as $tot) {
                            
                        }
                        $list = $this->library_model->select_subject_borrow($row->select_subject);
                        foreach ($list as $to) {
                            
                        }
                        $list = $this->library_model->select_student_borrow($row->select_student);
                        foreach ($list as $t1) {
                            $tdate = date('d-m-Y');
                            $due_date = $row->due_date;
                            $from1 = strtotime($tdate);
                            $tos = strtotime($due_date);
                            $date_diff = ($tos - strtotime($tdate)) / 86400;
                            $dayss = round($date_diff, 0);
                            $i_date = DateTime::createFromFormat('Y-m-d', $row->issue_date)->format('d-m-Y');
                            $d_date = DateTime::createFromFormat('Y-m-d', $row->due_date)->format('d-m-Y');
                            $r_date = DateTime::createFromFormat('Y-m-d', $row->reg_date)->format('d-m-Y');
                        }
                        ?>

                        <tr>
                            <!--<td><?php echo $i ?></td>-->
                            <td style="display:none"><?php echo $row->id ?></td>
                            <td><?php echo $tot->class ?></td>
                            <td><?php echo $t1->student_name ?></td>
                            <td><?php echo $to->title ?></td>
                            <td><?php echo $i_date ?></td>
                            <td><?php echo $d_date ?></td> 
                            <td style = 'display: none'><?php echo $row->total_days ?></td>
                            <td style = 'display: none'><?php echo $r_date ?></td>
                            <?php
                            if ($dayss < 0) {
                                ?>
                                <td><a href="#" class="acopy"><?php echo $dayss ?> Days Ago</a></td>
                                <?php
                            } else {
                                ?>
                                <td><a href="#"  class="abcopy"><?php echo $dayss ?> Days Left</a></td>
                            <?php }
                            ?>
                            <td><input type='text' style=''  name='renew_date' class='fdate' id='fdate' class='form-control' onchange='get_date(this.value,<?php echo $i ?>);get_days(this.value,<?php echo $i ?>);'></td>
                            <td>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <span id="new_day<?php echo $i ?>" name="new_day" class="form-control" style='border: none;'></span>
                                    </div> 
                                </div>
                            </td>
                            <!--<td><div class="form-group"><select class="form-control select2" name="new_day" id="new_day<?php echo $i ?>"></select></div></td>-->
                            <td><?php echo form_open('library_controller/Library/renewal_extend_books'); ?>
                                <input type='text' style='display:none' name='id' id='ids' value='<?php echo $row->id ?>' class='form-control' readonly>
                                <input type='text' style='display: none' name='class_name' value='<?php echo $row->select_class ?>' class='form-control' readonly>
                                <input type='text' style='display: none'  name='student_name' value='<?php echo $row->select_student ?>' class='form-control' readonly>
                                <input type='text' style='display: none'  name='title' value='<?php echo $row->select_subject ?>' class='form-control' readonly>
                                <input type='text' style='display: none'  name='issue_date' id='i_date' value='<?php echo $row->issue_date ?>' class='form-control' readonly>
                                <input type='text' style='display: none'  name='total_days' value='<?php echo $row->total_days ?>' class='form-control' readonly>
                                <input type='text' style='display: none'  name='due_date' value='<?php echo $row->due_date ?>' class='form-control' readonly>
                                <input type='text' style='display: none'  name='reg_date' value='<?php echo $row->reg_date ?>' class='form-control' readonly>
                                <select name = "renew_date1" id="renew_date1<?php echo $i ?>" style="display: none;"></select>
                                <select name = "new_day1" id="new_day1<?php echo $i ?>" style="display: none;"></select>
                                <input type='submit' style=''  class='acopy' value='Save'>
                                <?php echo form_close() ?>
                            </td>
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
?>
