<?php
$this->load->view('header_footer/attendence_header');
$resu = $this->attendence_model->select_stud($select_batch);
foreach ($resu as $r) {
    
}
?>
<style>
    
    input[type="text"]{
        height: 33px!important;
    }
</style>
<div class="box-header with-border"><h3 class="box-title">Attendence</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">


            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Select Batch</label>
                        <select class="form-control " name="select_batch" id="select_batch">
                            <option value="<?php echo $r->class_code ?>"><?php echo $r->class ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Select Date</label>
                        <input name="txtDate" type="text" readonly="readonly" class="form-control" id="txtDate" name="atten_date" value='<?php echo $atten_date ?>'/>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
            $qry = $this->attendence_model->check_attend($r->class_code, $atten_date);
            if ($qry == true) {
                ?>
                <?php echo form_open('attendence_controller/Attendence/update_day_wise'); ?>
                <div class="row">

                    <div class="col-lg-12"><h4 class="abcopy"> Attendence Have Already Taken</h4></div>
                </div>
                <table id='' class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th width='20%'>SI.No</th>
                            <th style="display: none" width='10%'>Class</th>
                            <th style="display: none" width='10%'>Date</th>
                            <th width='20%'>Name</th>
                            <th width='40%'>Action</th>
                            <th width='20%'>Reason</th>
                        </tr>
                    </thead>
                    <tbody><?php
                        $base = base_url();
                        $i = 1;
                        foreach ($qry as $r1) {
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td style="display: none"><select class="form-control " name="select_batch1" id="select_batch">
                                        <option value="<?php echo $r->class_code ?>"><?php echo $r->class_code ?></option>
                                    </select></td>
                                <td style="display: none"><input name="txtDate1" type="text" readonly="readonly" class="form-control" id="txtDate" name="atten_date1" value='<?php echo $atten_date ?>'/></td>
                                <td style="display: none"><input style='border: none;background: #fafaff;'type='text'  name='attend_class1<?php echo $i ?>' id='attend_class1' value='<?php echo $r1->classs ?>'></td>
                                <td style="display: none"><input style='border: none;background: #fafaff;'type='text'  name='attend_date1<?php echo $i ?>' id='attend_date1' readonly value='<?php echo $r1->date ?>'></td>
                                <td><input style='border: none;background: #fafaff;'type='text' name='student_name1<?php echo $i ?>' readonly id='student_name1' value='<?php echo $r1->name ?>'></td>
                                <td><select  style='width: 70%;' class='form-control select2' name = 'actions1<?php echo $i ?>' class='form-control select2' id='actions1'><option value="<?php echo $r1->attendence; ?>" style='color:green!important;'><?php echo $r1->attendence; ?></option><option value='Present' style='color:green!important;'>Present</option><option style='color:red!important;' value='Absent'>Absent</option><option value='Half-day'>Half Day</option></select></td>
                                <td><input type="text" name="reason<?php echo $i ?>" value="<?php echo $r1->reason; ?>" id="reason"></td>
                                
                                
                            </tr>
                            <?php
                            $i += 1;
                        }
                        $v2 = $i -= 1;
                        ?>
                    <input type="hidden" value="<?php echo $v2 ?>" name="i2">
                    </tbody>
                </table>
                <input type="submit" value="Update Attendence" class="btn btn-block btn-warning btn-flat"/>
                </form>
                <?php
            } else {
                ?>

                <div class="row">
                    <div class="col-lg-12">
                        <?php $re = $this->attendence_model->get_student_attendence_list($r->class_code); ?>
    <?php echo form_open('attendence_controller/Attendence/submit_day_wise'); ?>

                        <table id='' class='table table-bordered table-hover'>
                            <thead>
                                <tr>
                                    <th width='20%'>SI.No</th>
                                    <th width='10%' style='display: none'>Class</th>
                                    <th width='10%' style='display: none'>Date</th>
                                    <th width='20%'>Name</th>
                                    <th width='40%'>Action</th>
                                    <th width='20%'>Reason</th>
                                </tr>
                            </thead>
                            <tbody><?php
                                $base = base_url();
                                $i = 1;
                                foreach ($re as $rows) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td  style='display: none'><input style='border: none;background: #fafaff;'type='text'  name='attend_class<?php echo $i ?>' id='attend_class' value='<?php echo $r->class_code ?>'></td>
                                        <td  style='display: none'><input style='border: none;background: #fafaff;'type='text'  name='attend_date<?php echo $i ?>' id='attend_date' value='<?php echo $atten_date ?>'></td>
                                        <td><input style='border: none;background: #fafaff;'type='text' name='student_name<?php echo $i ?>' readonly id='student_name' value='<?php echo $rows->student_name ?>'></td>
                                        <td><select  style='width: 70%;' class='form-control select2' name = 'action<?php echo $i ?>' class='form-control select2' id='action'><option value='Present' style='color:green!important;'>Present</option><option style='color:red!important;' value='Absent'>Absent</option><option value='Half-day'>Half Day</option></select></td>
                                        <td><input type="text" name="reason1<?php echo $i ?>" id="reason1"></td>
                                    </tr>
                                    <?php
                                    $i += 1;
                                }
                                ?>
    <?php $v1 = $i -= 1; ?>
                            <input type="hidden" value="<?php echo $v1 ?>" name="ia">
                            </tbody>
                        </table>
                        <input type="submit" value="Submit Attendence" class="btn btn-block btn-warning btn-flat"/>

                        </form>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>
