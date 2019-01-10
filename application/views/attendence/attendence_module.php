<?php
$this->load->view('header_footer/attendence_header');
?>
<div class="box-header with-border"><h3 class="box-title"></h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php
            $list = $this->attendence_model->select_student();
            $classes = $row->class;
            ?>
            <table id="" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SI.No</th>
                        <th>Student-Code</th>
                        <th>Class</th>
                        <th>Student-Name</th>
                        
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
                            $lis = $this->attendence_model->select_stud($row->class);
                            foreach ($lis as $r)
                                
                                ?>
                            <td><?php echo $r->class ?></td>
                            <td><?php echo $row->student_name ?></td>
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
