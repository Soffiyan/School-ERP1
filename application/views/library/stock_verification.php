<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Stock Summary</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">    
            <?php
            $list = $this->library_model->stock_verfication_fields();
            ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th data-colstart="1">Category Name</th>
                        <th data-colstart="2">In Library</th>
                        <th data-colstart="3">Out of Library</th>
                        <th data-colstart="4">Book Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->category ?></td>

                            <?php
                            $list1 = $this->library_model->stock_verfication_copies_available($row->category);
                            foreach ($list1 as $tot) {
                                
                            }
                            ?>
                            <td><a href='#' class="acopy"><?php echo $tot->count ?></a></td>
                            
                            <?php
                            $list3 = $this->library_model->stock_verfication_out_library($row->category);
                            foreach ($list3 as $tot2) {
                                
                            }
                            ?>
                            <td><a href='#' class="abcopy"><?php echo $tot2->count ?></a></td>
                            
                            <?php
                            $list2 = $this->library_model->stock_verfication_stock_library($row->category);
                            foreach ($list2 as $tot1) {
                                
                            }
                            ?>
                            <td><a href='#' class="acopy" style="background:#143c5f!important"><?php echo $tot1->count ?></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
