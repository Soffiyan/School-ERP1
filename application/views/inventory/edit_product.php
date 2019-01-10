<html>
    <?php
    foreach ($user_data as $row) {
        
    }
    ?>

    <body>
        <div class="container-fluid">
            <?php
            echo form_open('inventory/inventory/edit_product');
            ?>
            <div class="col-lg-4">
                <div class="form-group has-feedback" style="display:none">
                    <label for="id">Id</label><input type="text" value="<?php echo $row->id; ?>" name="id" id="id" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="prodname">Enter the Product Name</label><input type="text" value="<?php echo $row->prodname; ?>" name="prodname" id="prodname" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="proddes">Enter the Product Description</label><input type="text" value="<?php echo $row->proddes; ?>" name="proddes" id="proddes" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="prodtype">Enter the Product Type</label><input type="text" value="<?php echo $row->prodtype; ?>" name="prodtype" id="prodtype" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="unitcost">Unit Cost</label><input type="text" value="<?php echo $row->unitcost; ?>" name="unitcost" id="unitcost" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="uom">Unit of  Measurement</label><input type="text" value="<?php echo $row->uom; ?>" name="uom" id="uom" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="place">Place</label><input type="text" value="<?php echo $row->place; ?>" name="place" id="place" required="required" class="form-control">
                </div>
                <div class="form-group has-feedback">
                    <label for="openingstock">Opening stock</label><input type="text" value="<?php echo $row->openingstock; ?>" name="openingstock" id="openingstock" required="required" class="form-control">
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