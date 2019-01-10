<script>
    function get_student_search(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_student_search/" + val;

        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("select_title").innerHTML = response;
            }
        });
    }
    function get_student_search_book_list(val) {
        var search_field = document.getElementById('search_field').value;
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_student_search_book_list/" + search_field + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }
</script>
<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Return Book</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo form_open('library_controller/Library/return_book'); ?>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-6" style="margin-top: 4px;">
                    <div class="form-group has-feedback">
                        <label>Search Book By</label>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <select name="search_field" id="search_field" class="form-control select2" onchange="get_student_search(this.value)">
                            <option value="">Select</option>
                            <option value="select_subject">Subject</option>
                            <option value="select_student">Student</option>
                            <option value="select_class">Class</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <select name="select_title" id="select_title" class="form-control select2" onchange="get_student_search_book_list(this.value)">
                        </select>
                    </div>
                </div>
            </div>
            </form>  
            <div id="his">

            </div>
        </div>
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
