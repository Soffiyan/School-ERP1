<script src="<?php echo base_url(); ?>assets/js/jquery.min_3.1.0.js"></script>
<div class="container">
    <style>
        #files { font-family: Verdana, sans-serif; font-size: 11px; }
        #files strong { font-size: 13px; }
        #files a { float: right; margin: 0 0 5px 10px; }
        #files ul { list-style: none; padding-left: 0; }
        #files li { width: 280px; font-size: 12px; padding: 5px 0; border-bottom: 1px solid #CCC; }
    </style>
    <!-- Model Start -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Document Information</h4>
                </div>
                <div class="modal-body" id="doc_info">
                    Model Body
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Model End -->

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
                                    <li ><a href="<?php $base_url = base_url(); echo$base_url;?>index.php/frontdesk/frontdesk/home">Student Details</a></li>
                                    <li class="active"><a href="<?php $base_url = base_url(); echo$base_url;?>index.php/frontdesk/frontdesk/parentdetails">Parent Details</a></li>
                                    <li><a href="#tab_3" >Guardian Details</a></li>
                                    <li><a href="#tab_4" >Attachement Details</a></li>
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                        <!--------------------------------------------------------->
                                        <!-- Father Details -->
                                        <!--------------------------------------------------------->
                                        <div class="box-header with-border"><h3 class="box-title">Father Details</h3></div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Father Name *</b>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Qualification</b>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Occupation</b>
                                                <input class="form-control"/>
                                            </div>  
                                             <div class="form-group">
                                                <b>Company Name</b>
                                                <input class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                           
                                            <div class="form-group">
                                                <b>Designation</b>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Office Address</b>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <b>Aadhar Card No</b>
                                                <input type="text" class="form-control"/>
                                            </div>  
                                            <div class="form-group">
                                                <b>Office No</b>
                                                <input type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            
                                            
                                            <div class="form-group">
                                                <b>Mobile No *</b>
                                                <input type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Email Id *</b>
                                                <input type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Annual Income</b>
                                                <input type="text" class="form-control"/>
                                            </div>
                                             <div class="form-group">
                                                <b>Hobbies</b>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <!--------------------------------------------------------->
                                        <!-- Father Details End -->
                                        <!--------------------------------------------------------->
                                        
                                        <!--------------------------------------------------------->
                                        <!-- Mother Details -->
                                        <!--------------------------------------------------------->
                                        <div class="box-header with-border"><h3 class="box-title">Mother Details</h3></div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Mother Name *</b>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Qualification</b>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Occupation</b>
                                                <input class="form-control"/>
                                            </div>  
                                             <div class="form-group">
                                                <b>Company Name</b>
                                                <input class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Designation</b>
                                                <input class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Office Address</b>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <b>Aadhar Card No</b>
                                                <input type="text" class="form-control"/>
                                            </div>  
                                            <div class="form-group">
                                                <b>Office No</b>
                                                <input type="text" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <b>Mobile No *</b>
                                                <input type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Email Id *</b>
                                                <input type="text" class="form-control"/>
                                            </div>
                                            <div class="form-group">
                                                <b>Annual Income</b>
                                                <input type="text" class="form-control"/>
                                            </div>
                                             <div class="form-group">
                                                <b>Hobbies</b>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <!--------------------------------------------------------->
                                        <!-- Mother Details end -->
                                        <!--------------------------------------------------------->
                                        
                                       
                                        
                                       
                                        <div class="clearfix"></div>
                                        <!--------------------------------------------------------->
                                        <!-- Other Details end -->
                                        <!--------------------------------------------------------->
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                              <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                              <input type="submit" value="PRECIOUS" class="btn btn-block btn-warning btn-flat"/>
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