
           <!--******************************Product Form***************************** -->
<html>
    <body><br><br>
        <div class="container-fluid" style="padding: 45px; background-color: #fafafa!important;">
            <label>Enter product name</label>
            <?php echo validation_errors(); ?>
            <?php
            echo form_open('inventory/inventory/save1');
            $data = array(
                'type' => 'text',
                'name' => 'prodname',
                'id' => 'prodname',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data);
            ?>
            <label>Enter Product Description</label>
            <?php
            $data2 = array(
                'type' => 'text',
                'name' => 'proddes',
                'id' => 'proddes',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data2);
            ?>
            <label>Enter Product Type</label>
            <?php
            $data3 = array(
                'type' => 'text',
                'name' => 'prodtype',
                'id' => 'prodtype',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data3);
            ?>
            <label>Unit Cost</label>
            <?php
            $data4 = array(
                'type' => 'text',
                'name' => 'unitcost',
                'id' => 'unitcost',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data4);
            ?>
            <label>Unit of  Measurement</label>
            <?php
            $data5 = array(
                'type' => 'text',
                'name' => 'uom',
                'id' => 'uom',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data5);
            ?>
            <label>Place</label>
            <?php
            $data6 = array(
                'type' => 'text',
                'name' => 'place',
                'id' => 'place',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data6);
            ?>
            <label>Opening stock</label>
            <?php
            $data7 = array(
                'type' => 'text',
                'name' => 'openingstock',
                'id' => 'openingstock',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data7);
            ?>
            <label>Date</label>
            <?php
            $data8 = array(
                'type' => 'date',
                'name' => 'date',
                'id' => 'date',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data8);
            ?>



            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary ">
                <input type="reset" value="Reset" class="btn btn-success "><br><br>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <!--******************************Product Form Ends***************************** -->

        <!--******************************Product List***************************** -->
        <?php
        $list = $this->inventory_model->select_product();
        ?>
        <h3>Report</h3>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Descreption</th>
                    <th>Product Type</th>
                    <th>Unit Cost</th>
                    <th>Unit of  Measurement</th>
                    <th>Place</th>
                    <th>Opening stock</th>
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
                        <td><?php echo $row->prodname ?></td>
                        <td><?php echo $row->proddes ?></td>
                        <td><?php echo $row->prodtype ?></td>
                        <td><?php echo $row->unitcost ?></td>
                        <td><?php echo $row->uom ?></td>
                        <td><?php echo $row->place ?></td>
                        <td><?php echo $row->openingstock ?></td>
                        <td><?php echo $row->date ?></td>
                        <td><?php echo $row->adate ?></td>
                        <td><a href="<?php echo base_url("index.php/inventory/inventory/edit_product/" . $row->id) ?> " class="btn btn-xs btn-warning edit_product">
                                Edit </a> 
                            <a href="<?php echo base_url("index.php/inventory/inventory/delete_product/" . $row->id) ?> " class="btn btn-xs btn-warning edit_product">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        <!--******************************Product List Ends***************************** --> 

    </body>   

</html>