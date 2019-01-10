<html>
    <?php
    foreach ($user_data as $row) {
        
    }
    ?>

    <body>
        <div class="container-fluid">
            <?php
            echo form_open('inventory/inventory/edit_supplier');
            ?>
            <div class="col-lg-4">
                <div class="form-group has-feedback" style="display:none">
                    <label for="id">Id</label><input type="text" value="<?php echo $row->id; ?>" name="id" id="id" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="name">Enter the Supplier Name</label><input type="text" value="<?php echo $row->name; ?>" name="name" id="name" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="address">Enter Address</label><input type="text" value="<?php echo $row->address; ?>" name="address" id="address" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="phno">Enter phone no</label><input type="text" value="<?php echo $row->phno; ?>" name="phno" id="phno" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="date">Date</label><input type="text" value="<?php echo $row->date; ?>" name="date" id="date" required="required" class="form-control">
                </div>
               <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary ">
                    <input type="reset" value="Reset" class="btn btn-success ">
                </div>
            </div>
        </form>
    </div>
</body>   

</html>