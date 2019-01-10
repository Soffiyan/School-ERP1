<!--******************************Cost Center Form***************************** -->
<html>
    <body><br><br>
        <div class="container-fluid" style="padding: 45px; background-color: #fafafa!important;">
            <label>Enter cost center name</label>
            <?php echo validation_errors(); ?>
            <?php
            echo form_open('inventory/inventory/cost_center');
            $data = array(
                'type' => 'text',
                'name' => 'name',
                'id' => 'name',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data);
            ?> 
            <label>Enter cost center Description</label>    
            <?php
            $data2 = array(
                'type' => 'text',
                'name' => 'description',
                'id' => 'description',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data2);
            ?>
            <label>Enter Date</label>
            <?php
            $data3 = array(
                'type' => 'date',
                'name' => 'date',
                'id' => 'date',
                'required' => 'required',
                'class' => 'form-control',
            );
            echo form_input($data3);
            ?>

            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary ">
                <input type="reset" value="Reset" class="btn btn-success "><br><br>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
        <!--******************************Cost Center Form Ends***************************** -->

        <!--******************************Cost center List***************************** -->
        <?php
        $list = $this->inventory_model->select_cost_center();
        ?>
        <h3>Report</h3>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sl.no</th>
                    <th> Name</th>
                    <th>Description</th>
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
                        <td><?php echo $row->description ?></td>
                        <td><?php echo $row->date ?></td>
                        <td><?php echo $row->adate ?></td>
                        <td><a href="<?php echo base_url("index.php/inventory/inventory/edit_cost_center/" . $row->id) ?> " class="btn btn-xs btn-warning edit_cost_center">
                                Edit </a> 
                            <a href="<?php echo base_url("index.php/inventory/inventory/delete_cost_center/" . $row->id) ?> " class="btn btn-xs btn-warning edit_cost_center">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $i = $i + 1;
                }
                ?>
            </tbody>
        </table>
        <!--******************************Cost center List Ends***************************** --> 

    </body>   

</html>