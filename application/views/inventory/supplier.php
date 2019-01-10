            
<!--******************************Supplier Form***************************** -->
<html>
    <body><br><br>
        <div class="container-fluid" style="padding: 45px; background-color: #fafafa!important;">
            <label>Enter supplier name</label>
            <?php echo validation_errors(); ?>
            <?php
            echo form_open('inventory/inventory/supplier');
            $data = array(
                'type' => 'text',
                'name' => 'name',
                'id' => 'name',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data);
            ?>
            <label>Enter Address</label>
            <?php
            $data2 = array(
                'type' => 'text',
                'name' => 'address',
                'id' => 'address',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data2);
            ?>
            <label>Enter Phone No</label>
            <?php
            $data3 = array(
                'type' => 'text',
                'name' => 'phno',
                'id' => 'phno',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data3);
            ?>
            <label>Enter Date</label>
            <?php
            $data4 = array(
                'type' => 'date',
                'name' => 'date',
                'id' => 'date',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data4);
            ?>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary ">
                <input type="reset" value="Reset" class="btn btn-success "><br><br>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <!--******************************Supplier Form Ends***************************** -->


        <!--******************************Supplier List***************************** -->
        <?php
        $list = $this->inventory_model->select_supplier();
        ?>
        <h3>Report</h3>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sl.no</th>
                    <th>Supplier Name</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Date</th>
                    <th>Adate</th>

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
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->address ?></td>
                        <td><?php echo $row->address ?></td>
                        <td><?php echo $row->date ?></td>
                        <td><?php echo $row->adate ?></td>
                        <td><a href="<?php echo base_url("index.php/inventory/inventory/edit_supplier/" . $row->id) ?> " class="btn btn-xs btn-warning edit_supplier">
                                Edit </a> 
                            <a href="<?php echo base_url("index.php/inventory/inventory/delete_supplier/" . $row->id) ?> " class="btn btn-xs btn-warning edit_supplier">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        <!--******************************Supplier  List Ends***************************** --> 

    </body>   

</html>