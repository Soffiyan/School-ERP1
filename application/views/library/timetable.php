<?php
$this->load->view('header_footer/header');
?>
<style>
    input[type="text"]
    {
        width:50%!important;
    }
    .panel-default>.panel-heading {
        color: white!important;
        background-color: green!important;
        border-color: green!important;
        border-radius: 5px!important;
    }
    .panel-default>.panel-heading a:hover{
        color: white!important;
    }
</style>
<script>
    function get_year_time_table(val) {
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_year_time_table/" + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("s_years").innerHTML = response;
            }
        });
    }
    function get_timetable(val) {
        var classess = document.getElementById('classss').value;
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_timetable/" + classess + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("his").innerHTML = response;
            }
        });
    }
</script>
<div class="box-header with-border"><h3 class="box-title">Time Table</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">

            
            <div class="col-lg-12" style="padding-left: 0px!important;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Click Add Time Table</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo validation_errors(); ?>
                            <?php echo form_open('library_controller/Library/timetable'); ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Select Class</label>
                                        <select name="classs" id="classs" class="form-control select2">
                                            <option>Class-1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Select Year</label>
                                        <select name="s_year" id="s_year" class="form-control select2">
                                            <option>2016-2017</option>
                                            <option>2017-2018</option>
                                            <option>A</option>
                                            <option>B</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <table class='table table-bordered table-hover'>
                                    <tr>
                                        <th>Timing</th>
                                        <th>Monday</th>
                                        <th>Tuesday</th>
                                        <th>Wednesday</th>
                                        <th>Thursday</th>
                                        <th>Friday</th>
                                        <th>Saturday</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="a0" value='9-10' style='border: none;' readonly></td>
                                        <td><input type="text" name="a1"></td>
                                        <td><input type="text" name="a2"></td>
                                        <td><input type="text" name="a3"></td>
                                        <td><input type="text" name="a4"></td>
                                        <td><input type="text" name="a5"></td>
                                        <td><input type="text" name="a6"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="b0" value='10-11' style='border: none;' readonly></td>
                                        <td><input type="text" name="b1"></td>
                                        <td><input type="text" name="b2"></td>
                                        <td><input type="text" name="b3"></td>
                                        <td><input type="text" name="b4"></td>
                                        <td><input type="text" name="b5"></td>
                                        <td><input type="text" name="b6"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="c0" value='11-12' style='border: none;' readonly></td>
                                        <td><input type="text" name="c1"></td>
                                        <td><input type="text" name="c2"></td>
                                        <td><input type="text" name="c3"></td>
                                        <td><input type="text" name="c4"></td>
                                        <td><input type="text" name="c5"></td>
                                        <td><input type="text" name="c6"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="d0" value='1-2' style='border: none;' readonly></td>
                                        <td><input type="text" name="d1"></td>
                                        <td><input type="text" name="d2"></td>
                                        <td><input type="text" name="d3"></td>
                                        <td><input type="text" name="d4"></td>
                                        <td><input type="text" name="d5"></td>
                                        <td><input type="text" name="d6"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="e0" value='2-3' style='border: none;' readonly></td>
                                        <td><input type="text" name="e1"></td>
                                        <td><input type="text" name="e2"></td>
                                        <td><input type="text" name="e3"></td>
                                        <td><input type="text" name="e4"></td>
                                        <td><input type="text" name="e5"></td>
                                        <td><input type="text" name="e6"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="f0" value='3-4' style='border: none;' readonly></td>
                                        <td><input type="text" name="f1"></td>
                                        <td><input type="text" name="f2"></td>
                                        <td><input type="text" name="f3"></td>
                                        <td><input type="text" name="f4"></td>
                                        <td><input type="text" name="f5"></td>
                                        <td><input type="text" name="f6"></td>
                                    </tr>

                                </table>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="submit" value="SAVE AND CONTINUE" class="btn btn-block btn-warning btn-flat">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label>Select Class</label>
                    <select name="classss" id="classss" class="form-control select2" onchange="get_year_time_table(this.value);">
                        <option>Select</option>
                        <?php
                        $select = $this->library_model->select_class_timetable();
                        foreach ($select as $row) {
                            echo"<option value='$row->class'>$row->class</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label>Year</label>
                    <select name="s_years" id="s_years" class="form-control select2" onchange="get_timetable(this.value);">
                    </select>
                </div>
            </div>
            <br>
            <div id="his"></div>

            <!-------------------Ajax Report ------------------->


        </div>
    </div>
</div>
<!-- /.tab-content -->
<?php
$this->load->view('header_footer/footer');
?>

