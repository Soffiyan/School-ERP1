<?php
$this->load->view('header_footer/header');
?>
<div class="box-header with-border"><h3 class="box-title">Dashboard</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <?php echo form_open('library_controller/Library/add_book'); ?>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="acsno">Accession No</label>
                    <?php
                    $list = $this->library_model->select_acc_code();
                    foreach ($list as $row) {
                        $codes = $row->accession_no;
                    }
                    if (empty($codes)) {
                        $class_code = 18524;
                        ?>
                        <input readonly type="text" name="acsno" value = "<?php echo $class_code ?>"  id="acsno" class="form-control">
                        <?php
                    } else {
                        $start_code = $codes + 1;
                        ?>
                        <input readonly type="text" name="acsno" value = "<?php echo $start_code ?>"  id="acsno" class="form-control">
                        <?php
                    }
                    ?>
                </div> 
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Title', 'title');
                    $data_title = array(
                        'name' => 'title',
                        'id' => 'title',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Title'
                    );
                    echo form_input($data_title);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php echo form_label('Author', 'author'); ?>
                    <select class="form-control select2" name="author" id="author">
                        <option value="">Author's</option>
                        <?php
                        $cat = $this->library_model->select_author();
                        foreach ($cat as $row) {
                            echo"<option>$row->author</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Publication', 'publication');
                    $data_publication = array(
                        'name' => 'publication',
                        'id' => 'publication',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Publication'
                    );

                    echo form_input($data_publication);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Year Of Passing', 'yop');
                    $data_yop = array(
                        'name' => 'yop',
                        'id' => 'yop',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Year Of Publication'
                    );

                    echo form_input($data_yop);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('No Of Pages', 'nop');
                    $data_nop = array(
                        'name' => 'nop',
                        'id' => 'nop',
                        'class' => 'form-control',
                        'placeholder' => 'Enter No Of Pages'
                    );

                    echo form_input($data_nop);
                    ?>
                </div>                                        
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('ISBN No', 'isbn');
                    $data_isbn = array(
                        'name' => 'isbn',
                        'id' => 'isbn',
                        'class' => 'form-control',
                        'placeholder' => 'Enter ISBN-No'
                    );

                    echo form_input($data_isbn);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Volume', 'volume');
                    $data_volume = array(
                        'name' => 'vol',
                        'id' => 'vol',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Volume'
                    );

                    echo form_input($data_volume);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Edition', 'edition');
                    $data_edition = array(
                        'name' => 'edition',
                        'id' => 'edition',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Edition'
                    );

                    echo form_input($data_edition);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Purchasing Date', 'pdate');
                    $data_pdate = array(
                        'type' => 'date',
                        'name' => 'pdate',
                        'id' => 'pdate',
                        'class' => 'form-control'
                    );

                    echo form_input($data_pdate);
                    ?>
                </div>  
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Printing Date', 'pridate');
                    $data_pridate = array(
                        'type' => 'date',
                        'name' => 'pridate',
                        'id' => 'pridate',
                        'class' => 'form-control'
                    );

                    echo form_input($data_pridate);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('No Of Copies', 'ncopy');
                    $data_ncopy = array(
                        'type' => 'text',
                        'name' => 'ncopy',
                        'id' => 'ncopy',
                        'class' => 'form-control',
                        'placeholder' => 'No Of Copies'
                    );
                    echo form_input($data_ncopy);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Bill No', 'billno');
                    $data_billno = array(
                        'type' => 'text',
                        'name' => 'billno',
                        'id' => 'billno',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Bill No'
                    );
                    echo form_input($data_billno);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Purchasing Price of Single Copy', 'singlecopy');
                    $data_singlecopy = array(
                        'type' => 'text',
                        'name' => 'singlecopy',
                        'id' => 'singlecopy',
                        'class' => 'form-control',
                        'placeholder' => 'Purchasing Price of Single Copy'
                    );
                    echo form_input($data_singlecopy);
                    ?>
                </div>   
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <?php
                    echo form_label('Location(e.g. Rack 1, Rack 2, etc)', 'loc');
                    $data_loc = array(
                        'type' => 'text',
                        'name' => 'loc',
                        'id' => 'loc',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Location'
                    );
                    echo form_input($data_loc);
                    ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Select Supplier Name</label>
                    <select class="form-control select2" name="sup" id="sup">
                        <option value="">Supplier's</option>
                        <?php
                        $sup = $this->library_model->select_supplier();
                        foreach ($sup as $row) {
                            echo"<option>$row->supplier_name</option>";
                        }
                        ?>
                    </select>
                </div>                               
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Select Book Category</label>
                    <select class="form-control select2" name="category" id="category">
                        <option value="">Book's</option>
                        <?php
                        $cat = $this->library_model->select_cat();
                        foreach ($cat as $row) {
                            echo"<option>$row->category</option>";
                        }
                        ?>
                    </select>
                </div> 
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Tilte Brief</label>
                    <textarea style="height: 10%!important;" rows="3" class="form-control" cols="50" name="titlebrief" id="titlebrief"></textarea>
                </div>                                       
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat"/>
                </div>
            </div>
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <!-- /.tab-content -->
</div>

<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<?php
$this->load->view('header_footer/footer');
?>