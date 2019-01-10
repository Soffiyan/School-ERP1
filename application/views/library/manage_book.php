<?php
$this->load->view('header_footer/header');
?>
<script>
    function manage_book(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/manage_books/" + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }
</script>
<div class="box-header with-border"><h3 class="box-title">Manage Book's</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">    
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Filter By</label>
                        <select class="form-control select2" name="manage_book" id="manage_book" onchange="manage_book(this.value);">
                            <option value="select">select</option>
                            <option value="all">All</option>
                            <option value="">Available</option>
                            <option value="Not-Available">Not-Available</option>
                        </select>
                    </div>                               
                </div>

            </div>
        </div>
        <div id="his"></div>
    </div>
</div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
