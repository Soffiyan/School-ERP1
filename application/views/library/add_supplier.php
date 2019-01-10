<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Add Supplier</h3></div>

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
            <?php echo form_open('library_controller/Library/add_supplier'); ?>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="c_code">Supplier-Code</label>
                        <?php
                        $list = $this->library_model->select_supplier_code();
                        foreach ($list as $row) {
                            $codes = $row->supplier_code;
                        }
                        if (empty($codes)) {
                            $class_code = 1000;
                            ?>
                            <input readonly type="text" name="c_code" value = "<?php echo $class_code ?>"  id="c_code" required="required" class="form-control">
                            <?php
                        } else {
                            $start_code = $codes + 1;
                            ?>
                            <input readonly type="text" name="c_code" value = "<?php echo $start_code ?>"  id="c_code" required="required" class="form-control">
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group has-feedback">
                        <?php
                        echo form_label('Supplier Name', 'Supname');
                        $data_sup_name = array(
                            'name' => 'Supname',
                            'id' => 'Supname',
                            'required' => 'required',
                            'class' => 'form-control',
                            'placeholder' => 'Supplier Name'
                        );
                        echo form_input($data_sup_name);
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group has-feedback">
                        <?php
                        echo form_label('Email', 'email');
                        $data_email = array(
                            'name' => 'email',
                            'type' => 'email',
                            'id' => 'email',
                            'required' => 'required',
                            'class' => 'form-control',
                            'placeholder' => 'Enter email'
                        );

                        echo form_input($data_email);
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group has-feedback">
                        <?php
                        echo form_label('Phone No', 'pno');
                        $data_pno = array(
                            'name' => 'pno',
                            'id' => 'pno',
                            'required' => 'required',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Phone Number'
                        );

                        echo form_input($data_pno);
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group has-feedback">
                        <?php
                        echo form_label('Mobile Number', 'mobile');
                        $data_yop = array(
                            'name' => 'mobile',
                            'id' => 'mobile',
                            'required' => 'required',
                            'class' => 'form-control',
                            'placeholder' => 'Enter Mobile No'
                        );

                        echo form_input($data_yop);
                        ?>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">

                    <div class="form-group has-feedback">
                        <label>Address</label>
                        <textarea style="height: 10%!important;" rows="3" class="form-control" cols="50" name="address" id="address"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12"></div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat"/>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--******************************Category List***************************** -->
            <!--******************************Category List***************************** -->
            <?php
            $list = $this->library_model->select_supplier();
            ?>
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SI.No</th>
                        <th>Supplier-Code</th>
                        <th>Supplier-Name</th>
                        <th>Mobile No</th>
                        <th>Registration Date</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($list as $row) {
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row->supplier_code ?></td>
                            <td><?php echo $row->supplier_name ?></td>
                            <td><?php echo $row->mobile ?></td>
                            <td><?php echo $row->reg_date ?></td>
                            <td><a href="<?php echo base_url("index.php/library_controller/Library/edit_supplier/" . $row->id) ?>"onclick="return confirm('Are you sure want to edit')">
                                    <i style="color: red;" class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                </a>&nbsp;<a href="<?php echo base_url("index.php/library_controller/Library/delete_supplier/" . $row->id) ?>"onclick="return confirm('Are you sure want to delete')">
                                    <i style="color: blue;" class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                </a></td>
                        </tr>
                        <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
            <!--******************************Category List Ends***************************** -->
        </div>
        </form>  
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
?>
