<?php
$this->load->view('header_footer/header');
?>


<?php

foreach ($user_data as $row) {
    
}
?>
<div class="box-header with-border"><h3 class="box-title">Complete Book Details</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php
            $list = $this->library_model->select_acc_sn($row->accession_no);
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
                        <th>Return Date</th>
                        <th>Days Remaining</th>
                    </tr>
                </thead>
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
                            $i_date = DateTime::createFromFormat('Y-m-d', $row->issue_date)->format('d-m-Y');
                        $d_date = DateTime::createFromFormat('Y-m-d', $row->due_date)->format('d-m-Y');
                        ?>

                        <td><?php echo $r3->title ?></td>
                        <td><?php echo $i_date ?></td>
                        <td><?php echo $d_date ?></td>
                        <td><?php echo $row->return_date ?></td>
                        <?php
                        if ($dayss < 0) {
                            ?>
                            <td>
                                <?php if ($row->return_date != '') { ?>
                                    <a href="#" class="acopy" style='background: #143c5f!important'>Book Returned</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="#" class="acopy"><?php echo $dayss ?> Days Ago</a> 
                                <?php }
                                ?>
                            </td>
                            <?php
                        } else {
                            ?>
                            <td>
                                <?php if ($row->return_date != '') { ?>
                                    <a href="#" class="acopy" style='background: #143c5f!important'>Book Returned</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="#" class="abcopy"><?php echo $dayss ?> Days Left</a> 
                                <?php }
                                ?>
                            </td>

                        <?php }
                        ?>


                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>

                <tbody>  

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

