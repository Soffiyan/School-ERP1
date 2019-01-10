<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Book List</h3></div>

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
            <?php
            $list = $this->library_model->select_books();
            ?>
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SI.No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Supplier</th>
                        <th>Copies</th>
                        <th>Copies-Remaining</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row->title ?></td>
                            <td><?php echo $row->author ?></td>
                            <td><?php echo $row->supplier ?></td>
                            <th><?php echo $row->no_copies ?></th>
                            <?php
                            $list1 = $this->library_model->copies_available($row->accession_no);
                            foreach ($list1 as $tot) {
                                
                            }
                            ?>
                            <td style="text-align: center"><a href='#' class="acopy"><?php echo $tot->count ?></a></td>
                            <td><a href="<?php echo base_url("index.php/library_controller/Library/edit_book/" . $row->id) ?>"onclick="return confirm('Are you sure want to edit')">
                                    <i style="color: red;" class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                </a>&nbsp;<a href="<?php echo base_url("index.php/library_controller/Library/delete_book/" . $row->id) ?>"onclick="return confirm('Are you sure want to delete')">
                                    <i style="color: blue;" class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                </a></td>
                        </tr>
                        <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </form>  
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
?>
