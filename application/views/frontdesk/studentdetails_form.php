<script src="<?php echo base_url(); ?>assets/js/jquery.min_3.1.0.js"></script>
<div class="container">
    <style>
        #files { font-family: Verdana, sans-serif; font-size: 11px; }
        #files strong { font-size: 13px; }
        #files a { float: right; margin: 0 0 5px 10px; }
        #files ul { list-style: none; padding-left: 0; }
        #files li { width: 280px; font-size: 12px; padding: 5px 0; border-bottom: 1px solid #CCC; }
    </style>
   
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 box box-solid">
                <div class="pad_left_right">
                    Home&nbsp;&nbsp;>&nbsp;&nbsp;Front Desk <a href='' class='fa fa-eye' data-toggle='modal' onclick='get_inward_data($inward_s - > document_no);' data-target='.bs-example-modal-lg'></a>
                </div>
            </div>
            <div class="col-md-12 box box-solid">
                <div class="col-md-3">
                    <div class="box box-solid" style="background:#fbfbfb">
                        <!-- Menu -->
                        <?php
                        $this->load->view('menus/frontdesk');
                        ?>
                        <!-- Menu end -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box box-default"> 
                        <div class="box" id="rec_doc">
                            <div class="box-header with-border"><h3 class="box-title">Student & Parent Details</h3></div>

                            <!-- Form Tab -->
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="<?php $base_url = base_url(); echo$base_url;?>index.php/frontdesk/frontdesk/home">Student Details</a></li>
                                    <li ><a href="<?php $base_url = base_url(); echo$base_url;?>index.php/frontdesk/frontdesk/parentdetails">Parent Details</a></li>
                                    <li><a href="#tab_3" >Guardian Details</a></li>
                                    <li><a href="#tab_4" >Attachement Details</a></li>
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <b>Academic Year</b>
                                                <select class="form-control">
                                                    <option>2015</option>
                                                    <option>2016</option>
                                                    <option>2017</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <b>Admission Date</b>
                                                <input type="date" class="form-control"/>
                                            </div>
                                        </div>
                                        <!--------------------------------------------------------->
                                        <!-- Personal Details -->
                                        <!--------------------------------------------------------->
                                        <div class="box-header with-border"><h3 class="box-title">Personal Details</h3></div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Student Name *</b>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Last Name *</b>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Gender *</b><br>
                                                Male&nbsp;<input type="radio" name="gender" />
                                                Female&nbsp;<input type="radio" name="gender" />
                                            </div>                                        
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Admission No</b>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Class *</b>
                                                <select class="form-control">
                                                    <option>Class</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Date of Birth *</b>
                                                <input type="date" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Aadhar Card No</b>
                                                <input type="text" class="form-control"/>
                                            </div>  
                                        </div>
                                        <div class="clearfix"></div>
                                        <!--------------------------------------------------------->
                                        <!-- Personal Details End -->
                                        <!--------------------------------------------------------->
                                        
                                        <!--------------------------------------------------------->
                                        <!-- Contact Details -->
                                        <!--------------------------------------------------------->
                                        <div class="box-header with-border"><h3 class="box-title">Contact Details</h3></div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Current Residential Address *</b>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <b>Permanent Residential Address *</b>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <b>Roll No</b>
                                                <input class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                               <div class="form-group">
                                                <b>Registration No </b><br>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>    
                                            <div class="form-group">
                                                <b>Group</b><br>
                                                <select class="form-control">
                                                    <option>Group Name</option>
                                                </select>
                                            </div> 
                                            <div class="form-group">
                                                <b>Place Of Birth</b><br>
                                                <input type="text" class="form-control"/>
                                            </div>                               
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Taluk *</b><br>
                                                <input type="text" class="form-control"/>
                                            </div> 
                                            <div class="form-group">
                                                <b>District *</b><br>
                                                <input type="text" class="form-control"/>
                                            </div> 
                                            <div class="form-group">
                                                <b>State *</b><br>
                                                <input type="text" class="form-control"/>
                                            </div>                                       
                                        </div>
                                        <div class="clearfix"></div>
                                        <!--------------------------------------------------------->
                                        <!-- Contact Details end -->
                                        <!--------------------------------------------------------->
                                        
                                        <!--------------------------------------------------------->
                                        <!-- Other Details-->
                                        <!--------------------------------------------------------->
                                        <div class="box-header with-border"><h3 class="box-title">Other Details</h3></div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Blood Group</b>
                                                <select class="form-control">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <b>Mother Tongue</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Nationality</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Religion</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            
                                            <div class="form-group">
                                                <b>Student Mobile No</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Student Email ID</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div> 
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                              <div class="form-group">
                                                <b>Hobbies</b>
                                                <textarea name="gender" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <b>Other Language Know</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Caste</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Subcaste</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>SC/ST</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Minority Community</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>                            
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Other Student Information</b><br>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <b>Last School Attended</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Year Of Passing</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Total Marks</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Class Obtained</b>
                                                <input type="text" name="gender" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <b>Reason For Leaving</b><br>
                                                <textarea class="form-control"></textarea>
                                            </div>                                      
                                        </div>
                                        <div class="clearfix"></div>
                                        <!--------------------------------------------------------->
                                        <!-- Other Details end -->
                                        <!--------------------------------------------------------->
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                              <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat"/>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->
                            <!-- Form Tab End -->
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
                <!-- Tab system end -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>