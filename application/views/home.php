<script src="<?php echo base_url(); ?>assets/js/jquery.min_3.1.0.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
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
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="rec_doc">

                    </div>
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
                    <!-- Tab system end -->

                </div>
                <!-- /.box -->
            </div>
            <!-- /.row -->
        </div> 
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>