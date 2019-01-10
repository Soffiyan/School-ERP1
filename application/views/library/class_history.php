<?php
$this->load->view('header_footer/header');
?>
<script>
    function get_classes(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_classess/" + val;

        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }

</script>
<div class="box-header with-border"><h3 class="box-title">Class History</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo validation_errors(); ?>
            <?php echo form_open('library_controller/Library/class_history'); ?>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label>Select Class</label>
                        <select class="form-control select2" name="select_class" id="select_class" onchange="get_classes(this.value);">
                            <option value="">Select Class</option>
                            <option value="<?php echo date('Y-m-d') ?>">All Class</option>
                            <?php
                            $select = $this->library_model->select_book1();
                            foreach ($select as $row) {
                                echo"<option value='$row->class_code'>$row->class</option>";
                            }
                            ?>
                        </select>
                    </div>                               
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        </form>  
        <div id="his"></div>
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
?>
