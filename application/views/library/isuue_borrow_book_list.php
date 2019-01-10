<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Borrower List</h3></div>

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
            $tdates = date('Y-m-d');
            $list = $this->library_model->isuue_borrow_book_list();
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
                        <th>Total Days</th>
                        <th>Days</th>
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
                            $i_date = DateTime::createFromFormat('Y-m-d', $row->issue_date)->format('d-m-Y'); 
                            $d_date = DateTime::createFromFormat('Y-m-d', $row->due_date)->format('d-m-Y');  
                                ?>
                            
                            <td><?php echo $r3->title ?></td>
                            <td><?php echo $i_date ?></td>
                            <td><?php echo $d_date ?></td>
                            <td><?php echo $row->total_days ?></td>
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
