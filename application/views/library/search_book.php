<?php
$this->load->view('header_footer/header');
?>
<script>

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

    function get_contents(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_student_contents/" + val;

        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("select_field").innerHTML = response;
            }
        });
    }
    function get_search_book_list(val)
    {
        var book_cat = document.getElementById("select_book_data").value
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_search_book_list/" + val + '/' + book_cat;

        $.ajax({
            type: 'post',
            url: url,
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            },
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });

    }
    function get_book_datewise_report(val)
    {
        var from_date = document.getElementById('fdate').value;
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
<div class="box-header with-border"><h3 class="box-title">Search Book</h3></div>

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
            <?php echo validation_errors(); ?>
            <?php echo form_open('library_controller/Library/search_book'); ?>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-6" style="margin-top: 4px;">
                    <div class="form-group has-feedback">
                        <label>Search Book By</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <select  name="select_book_data" id="select_book_data" class="form-control select2" onchange="get_contents(this.value);">
                            <option>Select</option>
                            <option value="title">Title</option>
                            <option value="author">Author</option>
                            <option value="accession_no">Accession_no</option>
                            <option value="isbn_no">ISBN No</option>
                            <option value="bill_no">Bill No</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <select name="select_field" id="select_field" class="form-control select2" onchange="get_search_book_list(this.value)">
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-6" style="margin-top: 4px;">
                    <div class="form-group has-feedback">
                        <label>Search By Date</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <input type="text" name="from_date" placeholder="Select From Date" id="fdate" class="form-control" > 
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <input type="text" name="to_date" placeholder="Select To Date" id="tdate" class="form-control"onchange="get_book_datewise_report(this.value);"> 
                    </div>
                </div>
            </div>
            </form>
            <div id="his">

            </div>

        </div>
        <!-- /.tab-content -->
        <?php
        $this->load->view('header_footer/footer');
        ?>

