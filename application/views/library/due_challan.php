<?php
$this->load->view('header_footer/header');
    foreach ($user_data as $row) {
        
    }
    ?>
    <script>
        $(function () {
            $("#idate").datepicker(
                    {
                        format: 'dd-mm-yyyy'
                    });
        });
        $(function () {
            $("#ddate").datepicker(
                    {
                        format: 'dd-mm-yyyy'
                    });
        });
    </script>


    <div class="nav-tabs-custom">

        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> Library Management Due Reciept
                                <small class="pull-right"><?php echo $row->return_date ?></small>
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Library Management</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br>
                                Email: info@almasaeedstudio.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <?php
                                $list = $this->library_model->select_student_borrow($row->select_student);
                                foreach ($list as $t1) {
                                    
                                }
                                ?>
                                <strong><?php echo $t1->student_name ?></strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br>
                                Email: john.doe@example.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice No :<?php echo $row->id ?></b><br>
                            <br>
                            <b>Payment Due:</b> <?php echo $row->return_date ?><br>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                        <th>Issue Date</th>
                                        <th>Due Date</th>
                                        <th>Return Date</th>
                                        <th>Due Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
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
                                            
                                        }
                                        ?>
                                        <td><?php echo $to2->title ?></td>
                                        <td><?php echo $row->issue_date ?></td>
                                        <td><?php echo $row->due_date ?></td>
                                        <td><?php echo $row->return_date ?></td>
                                        <td><?php echo $row->due_amt ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <label>Total Amount</label> : <?php echo $row->due_amt ?>&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>In Words</label> : <?php echo getIndianCurrency($row->due_amt) ?>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->


                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">

                            <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>

                        </div>
                    </div>
                </section>
            </div>
            <!-- /.tab-content -->
            <?php
            $this->load->view('header_footer/footer');
            ?>

