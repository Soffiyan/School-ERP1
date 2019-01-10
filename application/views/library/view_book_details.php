<?php
$this->load->view('header_footer/header');
?>
<script>
    function get_book_by_name(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_book_by_name/" + val;

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
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo validation_errors(); ?>
            <?php echo form_open(); ?>
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group has-feedback">
                        <label for="s_book">Search Book (Want to search all book's type All in search box)</label><input type="text" onkeyup="get_book_by_name(this.value)" name="s_book" id="s_book" class="form-control" placeholder="Search Book Any Unique Field's">
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
