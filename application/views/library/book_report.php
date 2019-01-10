<?php
$this->load->view('header_footer/header');
?>

<script >
    $(document).ready(function () {
        $('#inventory_trans').submit(function (e) {
            e.preventDefault();
            var form = $('#inventory_trans')[0];
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
                    document.getElementById('his').innerHTML = data;
                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("some error");
                }
            });

        });
    });

    $(function () {
        $("#fdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
    $(function () {
        $("#tdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
    
    $(function () {
        $("#ffdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
    $(function () {
        $("#ttdate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
    
    function get_book_datewise_report(val)
    {
        var from_date = document.getElementById('ffdate').value;
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_book_datewise_report/" + from_date + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }
</script>
<div class="box-header with-border"><h3 class="box-title">Book Report Date Wise</h3></div>

<!-- Form Tab     -->
<!-- Custom Tabs     -->
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
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="fdate">From Date</label><input type="text" name="from_date" placeholder="Select From Date" id="ffdate" class="form-control" > 
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="tdate">To Date</label><input type="text" name="to_date" placeholder="Select To Date" id="ttdate" class="form-control"onchange="get_book_datewise_report(this.value);"> 
                        </div> 
                    </div>
                </div>
            <div id="his">

            </div>

            <!-- /.tab-content -->
            <?php
            $this->load->view('header_footer/footer');
            ?>


