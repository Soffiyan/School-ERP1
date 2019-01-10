<?php
$this->load->view('header_footer/header');
foreach ($user_data as $row) {
    
}
?>
<script>
    $(function () {
        $(".idate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
</script>

<div class="box-header with-border"><h3 class="box-title">Return Book</h3></div>
<div class="nav-tabs-custom">

    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo validation_errors(); ?>
            <?php echo form_open('library_controller/Library/return_update'); ?>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12" style="display:none;">
                    <div class="form-group has-feedback">
                        <input type='text' name='id' id='id' class='form-control' value="<?php echo $row->id ?>">
                        <input type='text' name='select_class' id='select_class' class='form-control' value="<?php echo $row->select_class ?>">
                        <input type='text' name='select_subject' id='select_subject' class='form-control' value="<?php echo $row->select_subject ?>">
                        <input type='text' name='select_student' id='select_student' class='form-control' value="<?php echo $row->select_student ?>">
                        <input type='text' name='issue_date' id='issue_date' class='form-control' value="<?php echo $row->issue_date ?>">
                        <input type='text' name='due_date' id='due_date' class='form-control' value="<?php echo $row->due_date ?>">
                        <input type='text' name='total_days' id='select_subject' class='form-control' value="<?php echo $row->total_days ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <label for='damount'>Due Amount</label><input type="text" name='damount' id='damount' value='<?php echo $abs_vs ?>' class='form-control'>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <label for='rdate'>Return Date</label><input type="text" name='rdate' class='idate form-control'>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"style="margin-top: 24px;">
                    <div class="form-group">
                        <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            </form>
            <div id="his">

            </div>
        </div>
        <!-- /.tab-content -->
        <?php
        $this->load->view('header_footer/footer');
        ?>

