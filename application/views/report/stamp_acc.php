<!-- Content Wrapper. Contains page content -->
<style>
    p{
        font-weight: 400 !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stamp Account Reg
        </h1>
        <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Advanced Elements</li>
        </ol>-->
        <?php
        if (isset($result_msg)) {
            echo "<div class='alert alert-info alert-dismissible' style='margin-top: 10px;'>";
            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
            echo $result_msg;
            echo "</div>";
        }
        if (validation_errors() != false) {
            echo "<div class='alert alert-danger alert-dismissible' style='margin-top: 10px;'>";
            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
            echo validation_errors();
            echo "</div>";
        }

        $cantonment = $this->session->userdata['logged_in']['cantonment'];
        if (empty($cantonment)) {
            $username = $this->session->userdata['logged_in']['user'];
        } else {
            $username = $this->session->userdata['logged_in']['cantonment'];
        }
        ?>

    </section>
    <!-- Tab System -->
    <style>
        #files { font-family: Verdana, sans-serif; font-size: 11px; }
        #files strong { font-size: 13px; }
        #files a { float: right; margin: 0 0 5px 10px; }
        #files ul { list-style: none; padding-left: 0; }
        #files li { width: 280px; font-size: 12px; padding: 5px 0; border-bottom: 1px solid #CCC; }
    </style>
    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->

        <div class="box box-default">
            <!--<div class="box-header with-border">
                <h3 class="box-title">Select2</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>-->
            <!-- /.box-header -->
            <!-- tab system -->
            <!-- Button trigger modal -->
            <script>
                function getXMLHTTP() { //fuction to return the xml http object
                    var xmlhttp = false;
                    try {
                        xmlhttp = new XMLHttpRequest();
                    } catch (e) {
                        try {
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            try {
                                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                            } catch (e1) {
                                xmlhttp = false;
                            }
                        }
                    }

                    return xmlhttp;
                }
                function get_inward_data(idd) {
                    //var department = $("#department").val();
                    //department = department.join("|");
                    //alert(test);

                    var id = parseInt(idd);
                    var base_url = "<?php echo base_url(); ?>";
                    var base_url_two = "index.php/core/get_inward_user/" + id;

                    var strURL = base_url + base_url_two;

                    var req = getXMLHTTP();
                    if (req) {

                        req.onreadystatechange = function () {
                            if (req.readyState == 4) {
                                // only if "OK"
                                if (req.status == 200) {
                                    document.getElementById('doc_info').innerHTML = req.responseText;
                                    //alert('iam here');
                                } else {
                                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                                }
                            }
                        }
                        req.open("POST", strURL, true);
                        req.send(null);
                    }
                }

                function get_inward_data_img(id, typee) {
                    //var department = $("#department").val();
                    //department = department.join("|");
                    //alert(test);

                    //var department = dpt;
                    var base_url = "<?php echo base_url(); ?>";
                    var base_url_two = "index.php/core/get_inward_user_img/" + id + "/" + typee;

                    var strURL = base_url + base_url_two;

                    var req = getXMLHTTP();
                    if (req) {

                        req.onreadystatechange = function () {
                            if (req.readyState == 4) {
                                // only if "OK"
                                if (req.status == 200) {
                                    document.getElementById('doc_img').innerHTML = req.responseText;
                                    //alert('iam here');
                                } else {
                                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                                }
                            }
                        }
                        req.open("POST", strURL, true);
                        req.send(null);
                    }
                }
                function get_user() {
                    var department = $("#department").val();
                    department = department.join("|");
                    //alert(test);

                    //var department = dpt;
                    var base_url = "<?php echo base_url(); ?>";
                    var base_url_two = "index.php/core/get_user/" + department;

                    var strURL = base_url + base_url_two;
                    var req = getXMLHTTP();
                    if (req) {

                        req.onreadystatechange = function () {
                            if (req.readyState == 4) {
                                // only if "OK"
                                if (req.status == 200) {
                                    document.getElementById('user_info').innerHTML = req.responseText;
                                    //alert('iam here');
                                } else {
                                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                                }
                            }
                        }
                        req.open("POST", strURL, true);
                        req.send(null);
                    }
                }


                $(document).ready(function () {
                    $('#share_form').submit(function (e) {
                        e.preventDefault();
                        var form = $('#share_form')[0];
                        var data = new FormData(form);
                        if (confirm('Are you sure you want to share this file?'))
                        {
                            var link = $(this);
                            $.ajax({
                                type: $(this).attr('method'),
                                url: $(this).attr('action'),
                                type: "POST",
                                data: data,
                                secureuri: false,
                                dataType: 'json',
                                enctype: 'multipart/form-data',
                                processData: false, // Important!
                                contentType: false,
                                cache: false,
                                success: function (data, status)
                                {
                                    //var files = $('#files');
                                    if (data.status === "success")
                                    {
                                        alert(data.msg);
                                        //alert('tessdg');
                                    } else
                                    {       //refresh_files();
                                        alert(data.msg);
                                    }
                                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                                    alert("some error");
                                }
                            });
                        }
                    });
                });

                function get_user_cate() {
                    var department = $("#department1").val();
                    //department = department.join("|");
                    //alert(test);

                    //var department = dpt;
                    var base_url = "<?php echo base_url(); ?>";
                    var base_url_two = "index.php/core/get_cate/" + department;

                    var strURL = base_url + base_url_two;
                    var req = getXMLHTTP();
                    if (req) {

                        req.onreadystatechange = function () {
                            if (req.readyState == 4) {
                                // only if "OK"
                                if (req.status == 200) {
                                    document.getElementById('user_info1').innerHTML = req.responseText;
                                    //alert('iam here');
                                } else {
                                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                                }
                            }
                        }
                        req.open("POST", strURL, true);
                        req.send(null);
                    }
                }
                $(document).ready(function () {
                    $('#get_report').submit(function (e) {
                        e.preventDefault();
                        var form = $('#get_report')[0];
                        var data = new FormData(form);

                        var link = $(this);
                        $.ajax({
                            type: $(this).attr('method'),
                            url: $(this).attr('action'),
                            type: "POST",
                            data: data,
                            secureuri: false,
                            dataType: 'html',
                            enctype: 'multipart/form-data',
                            processData: false, // Important!
                            contentType: false,
                            cache: false,
                            success: function (data, status)
                            {
                                //var files = $('#files');
                                document.getElementById('out').innerHTML = data;
                            }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                                alert("some error");
                            }
                        });

                    });
                });
                function get_subcate() {
                    var departmentt = $("#category").val();
                    //departmentt = department.join("|");
                    //alert(departmentt);

                    //var department = dpt;
                    var base_url = "<?php echo base_url(); ?>";
                    var base_url_two = "index.php/core/get_category/" + departmentt;

                    var strURL = base_url + base_url_two;

                    var req = getXMLHTTP();
                    if (req) {

                        req.onreadystatechange = function () {
                            if (req.readyState == 4) {
                                // only if "OK"
                                if (req.status == 200) {
                                    document.getElementById('user_info_subcate').innerHTML = req.responseText;
                                    //alert('iam here');
                                } else {
                                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                                }
                            }
                        }
                        req.open("POST", strURL, true);
                        req.send(null);
                    }
                }

                
            </script>
            <!--Doc information Modal -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Document Information</h4>
                        </div>
                        <div class="modal-body" id="doc_info">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>

            <script>

            </script>
            <!-- Share With Modal-->


            <!-- Small modal -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form method="post" id="get_report" action="<?php echo base_url(); ?>index.php/report/get_stamp" onsubmit="get_report();">
                           
                            <div class="col-md-6">
                                <label> Date</label>
                                <div class="input-prepend input-group">
                                    <!--<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                    <input type="text" style="width: 200px; height:35px;" name="fromtodate" id="reservation" class="form-control" value="<?php //echo date('d/m/Y'); ?> - <?php ///echo date('d/m/Y'); ?>"  />-->
                                    <p>From: <input type="text" name="from" id="datepickerf" /> To: <input type="text" name="to" id="datepickert" /></p>
                                </div>
                                <input type="hidden" name="cantonment" value="<?php echo $cantonment ?>" />

                            </div>
                            <div class="col-md-1"> <input type="submit" value="Search" style="margin-top:25px;" class="btn btn-info"/></div>
                            <div class="col-md-5"></div>
                            <div class="col-md-1"><p class="fa fa-print fa-2x" style="margin-top:10px;cursor: pointer;" onclick="PrintElem('#mydiv','Type Report')"></p></div>     
                            <!--<div class="box-header pull-right"><label> Search</label><input type="text" class="form-control" id="myInput" onkeyup="Function()" placeholder="Search"></div>-->
                        </form>
                        <div class="clearfix"></div>
                        <!-- /.box-header -->
                        <div class="box-body" style="overflow-y: scroll; height: 450px;" id="mydiv">
                            <h3 style="text-align:center">Type Report</h3>
                            <table class="table table-bordered table-striped"> <!--  id="example1" -->
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th>User by</th>
                                        <th>Last update</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody  id="out">
                                    <?php
                                    $i = 1;
                                    foreach ($list as $inward_s) {
                                        echo"<tr>
                                               <td>$i</td>
                                                
                                                <td>$inward_s->amount</td>
                                                <td>$inward_s->balance</td>
                                                <td>$inward_s->user_by</td>
                                                <td>$inward_s->last_update</td>
                                                <td>$inward_s->type</td>
                                            </tr>";
                                        $i++;
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
                        <!-- /.col -->
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

