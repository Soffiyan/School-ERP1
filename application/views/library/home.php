
<?php
$this->load->view('header_footer/header');
?>
<style>
    .bg-aqua{
        background-color: #fdc93e !important;
    }
    .bg-green{
        background-color: #5f737b !important;
    }
    .bg-yellow{
        background-color: #974035 !important;
    }.overviewbox {
        padding: 0px;
        background: #f4f4f6;
        float: left;
        margin: 5px;
        width: 221px;
    }
    .overview {
        padding: 0px 0px 21px 0px;
        margin: 0px 0px 0px 0px;
        width: 100%;
        height: 100px;
        position: relative;
    }.overviewbox {
        width: 226px;
    }.overviewbox h1 {
        background: #4f5560;
        color: #fff;
        font-size: 12px;
        font-weight: normal;
        margin: 0;
        padding: 10px 0;
        text-align: center;
    }.ovrBtm {
        color: #666;
        font-size: 31px;
        padding: 20px 0px;
        text-align: center;
        font-weight: bold;
        text-shadow: 1px 1px white, -1px -1px #fff;
    } .recent{
        color: black;
        font-size: 12px;
        font-weight: normal;
        margin: 0;
    }
</style>
<div class="nav-tabs-custom">
    <div class="box-header with-border"><h3 class="box-title">Dashboard</h3></div>
    <div class="nav-tabs-custom">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class='row'>
                    <div class="overview" style="padding-top:0px;">
                        <div class="col-lg-6">
                            <?php $base = base_url(); ?>
                            <div class="overviewbox ovbox1" style="margin-left:0px;width: 100%!important;">
                                <h1><strong>Total Book's</strong></h1>
                                <?php
                                $list2 = $this->library_model->count_book();
                                ?>
                                <div class="ovrBtm"><?php
                                    foreach ($list2 as $tot1) {
                                        
                                    } echo $tot1->count
                                    ?></div>
                            </div>
                        </div>
                        <div class="overview" style="padding-top:0px;">
                            <div class="col-lg-6">
                                <?php $base = base_url(); ?>
                                <div class="overviewbox ovbox1" style="margin-left:0px;width: 100%!important;">
                                    <h1><strong>Book's Available</strong></h1>
                                    <?php
                                    $list2 = $this->library_model->count_b_a();
                                    ?>
                                    <div class="ovrBtm"><?php
                                        foreach ($list2 as $tot1) {
                                            
                                        } echo $tot1->count
                                        ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="overview" style="padding-top:0px;">
                        <div class="col-lg-4 col-xs-8">
                            <?php $base = base_url(); ?>
                            <a href = "<?php echo $base ?>/index.php/library_controller/Library/total_due"><div class="overviewbox ovbox1" style="margin-left:0px;">
                                    <h1><strong>Total Due's</strong></h1>
                                    <?php
                                    $list2 = $this->library_model->total_due();
                                    ?>
                                    <div class="ovrBtm"><?php
                                        foreach ($list2 as $tot1) {
                                            
                                        } echo $tot1->count
                                        ?></div>
                                </div></a>
                        </div>


                        <!-------------------------Start ---------------------------->
                        <div class="col-lg-4 col-xs-8">
                            <?php $base = base_url(); ?>
                            <a href = "<?php echo $base ?>/index.php/library_controller/Library/total_returned"><div class="overviewbox ovbox3">
                                    <h1><strong>Total Returned</strong></h1>
                                    <?php
                                    $todays_date = date('Y-m-d');
                                    $list2 = $this->library_model->total_borrow_return($todays_date);
                                    ?>
                                    <div class="ovrBtm"><?php
                                        foreach ($list2 as $tot2) {
                                            
                                        } echo $tot2->count
                                        ?></div>

                                </div></a>
                        </div>
                        <!-------------------------End------------------------------->

                        <div class="col-lg-4 col-xs-8">
                            <?php $base = base_url(); ?>
                            <a href = "<?php echo $base ?>/index.php/library_controller/Library/total_borrow_list"><div class="overviewbox ovbox3">
                                    <h1><strong>Total Borrowed</strong></h1>
                                    <?php
                                    $todays_date = date('Y-m-d');
                                    $list1 = $this->library_model->total_borrow_list($todays_date);
                                    ?>
                                    <div class="ovrBtm"><?php
                                        foreach ($list1 as $tot) {
                                            
                                        } echo $tot->count
                                        ?></div>

                                </div></a>
                        </div>
                        <div class="clear"></div>

                    </div>
                </div>

                <div class="row">
                    <div class="overview" style="padding-top:0px;">
                        <div class="col-lg-4 col-xs-8">
                            <?php $base = base_url(); ?>
                            <a href = "<?php echo $base ?>/index.php/library_controller/Library/due_borrow_list"><div class="overviewbox ovbox1" style="margin-left:0px;">
                                    <h1><strong>Due Today</strong></h1>
                                    <?php
                                    $today_date = date('Y-m-d');
                                    $list2 = $this->library_model->borrowed_today_due($today_date);
                                    ?>
                                    <div class="ovrBtm"><?php
                                        foreach ($list2 as $tot1) {
                                            
                                        } echo $tot1->count
                                        ?></div>
                                </div></a>
                        </div>
                        <div class="col-lg-4 col-xs-8">
                            <?php $base = base_url(); ?>
                            <a href = "<?php echo $base ?>/index.php/library_controller/Library/returned_today">
                                <div class="overviewbox ovbox2">
                                    <h1><strong>Returned Today</strong></h1>
                                    <?php
                                    $todays_date = date('Y-m-d');
                                    $list1 = $this->library_model->total_today_borrow_return($todays_date);
                                    ?>
                                    <div class="ovrBtm"><?php
                                        foreach ($list1 as $tot) {
                                            
                                        } echo $tot->count
                                        ?></div>
                                </div></a>
                        </div>
                        <div class="col-lg-4 col-xs-8">
                            <?php $base = base_url(); ?>
                            <a href = "<?php echo $base ?>/index.php/library_controller/Library/borrow_list"><div class="overviewbox ovbox3">
                                    <h1><strong>Borrowed Today</strong></h1>
                                    <?php
                                    $todays_date = date('Y-m-d');
                                    $list1 = $this->library_model->borrowed_today($todays_date);
                                    ?>
                                    <div class="ovrBtm"><?php
                                        foreach ($list1 as $tot) {
                                            
                                        } echo $tot->count
                                        ?></div>

                                </div></a>
                        </div>
                        <div class="clear"></div>

                    </div>
                </div>
            </div>
            <?php
            $list = $this->library_model->select_book();
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Recent Book's</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover" id="tab1">
                                <tr>
                                    <th>ISBN</th>
                                    <th>Book Name</th>
                                    <th>Author</th>
                                    <th>Edition</th>
                                    <th>Publisher</th>
                                    <th>Acc No</th>
                                    <th>Copies</th>

                                    <th>No Of Copies Available</th>
                                </tr>
                                <?php
                                $i = 1;
                                foreach ($list as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row->isbn_no ?></td>
                                        <td><?php echo $row->title ?></td>
                                        <td style='color: red;'><?php echo $row->author ?></td>
                                        <td><?php echo $row->edition ?></td>
                                        <td><?php echo $row->publications ?></td>
                                        <td><?php echo $row->accession_no ?></td>
                                        <td><a href="#"class="acopy" style="text-align: center;cursor:pointer"><?php echo $row->no_copies ?></a></td>
                                        <?php
                                        $list1 = $this->library_model->copies_available($row->accession_no);
                                        foreach ($list1 as $tot) {
                                            
                                        }
                                        ?>
                                        <td style="text-align: center"><a href='#' class="abcopy"><?php echo $tot->count ?></a></td>
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div

            <!--***************************************************Todays Due *************************************-->
            <?php
            $tdates = date('Y-m-d');
            $list = $this->library_model->due_borrow_list($tdates);
            if ($list == true) {
                ?><br><br>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Todays Due</h3>

                                <div class="box-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control pull-right" onkeyup="Function()" id="myInput" placeholder="Search">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover" id="tab">
                                    <thead>
                                        <tr>
                                            <th>SI.No</th>
                                            <th>Class</th>
                                            <th>Student</th>
                                            <th>Subject</th>
                                            <th>Issue Date</th>
                                            <th>Due Date</th>
                                            <th>Total Days</th>
                                            <th>Days Remaining</th>
                                            <th>Due Fees</th>
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
                                                    
                                                    ?>
                                                <td><?php echo $r3->title ?></td>
                                                <td><?php echo $row->issue_date ?></td>
                                                <td><?php echo $row->due_date ?></td>

                                                <td><?php echo $row->total_days ?></td>
                                                <td><a href="#" style="cursor: pointer" class="acopy"><?php echo $dayss ?></td>
                                                <?php
                                                if ($dayss <= 0) {
                                                    $x = $dayss;
                                                    $abs = $x * 10;
                                                    $abs_v = abs($abs);
                                                    ?>
                                                    <td><a href="#" style="cursor: pointer" class="abcopy"><?php echo $abs_v ?>&nbsp;Rupees</a></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><a href="#" style="cursor: pointer" class="abcopy">0 Rupees</a></td>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            <?php
                                            $i = $i + 1;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <script>
                                    var $rows = $('#tab tr');
                                    $('#myInput').keyup(function () {
                                        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                                        $rows.show().filter(function () {
                                            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                                            return !~text.indexOf(val);
                                        }).hide();
                                    });
                                </script>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <?php
            } else {
                
            }
            ?>



        </div>
    </div>
</div> 
<?php
$this->load->view('header_footer/footer');
?>
