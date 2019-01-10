<?php
$this->load->view('header_footer/header');
?>
<style>
    .acopy
    {
        color: white!important;
        cursor: pointer;
        background: #ff0000;
        padding: 4px 7px 5px 7px;
        border-radius: 4px;
    }

</style>
<div class="box-header with-border"><h3 class="box-title">Total Borrow List </h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
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
                        <th>Return Date</th>
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
                            <td><?php echo $row->return_date ?></td>
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
