<?php
$this->load->view('header_footer/header');
?>
<script>
    $(function () {
        $("#idate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });
    $(function () {
        $("#ddate").datepicker(
                {
                    format: 'yyyy-mm-dd'
                });
    });

    function get_maturity_value(val) {
        var amount = document.getElementById('prin').value;
        var period = document.getElementById('fp').value;
        var intr = document.getElementById('intr').value;
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_maturity_value/" + amount + '/' + period + '/' + intr + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("mv").innerHTML = response;
            }
        });
    }
    function get_interest(val) {
        var amount = document.getElementById('prin').value;
        var period = document.getElementById('fp').value;
        var intr = document.getElementById('intr').value;
<?php $base = base_url(); ?>
        var url = "<?php echo"$base"; ?>index.php/library_controller/Library/get_interest/" + amount + '/' + period + '/' + intr + '/' + val;
        $.ajax({
            type: 'post',
            url: url,
            success: function (response) {
                document.getElementById("ie").innerHTML = response;
            }
        });
    }
</script>
<div class="box-header with-border"><h3 class="box-title">Fixed Deposit</h3></div>
<div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <form>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Principal (P)</label>
                            <input id="prin" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>FD Period </label>
                            <select id="fp" class="form-control select2">
                                <option>Option</option>
                                <option value="1">1 Year</option>
                                <option value="2">2 Year</option>
                                <option value="3">3 Year</option>
                                <option value="4">4 Year</option>
                                <</select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Rate of Interest (r) </label>
                            <input id="intr" type="text" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Frequency (n) </label>
                            <select id="cifr" class="form-control select2" onchange="get_interest(this.value);get_maturity_value(this.value)">
                                <option value="0">Simple Interest</option>
                                <option value="12">Monthly</option>
                                <option value="4">Quarterly</option>
                                <option value="2">HalfYearly</option>
                                <option value="1" selected="">Annually</option> </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Interest Earned </label>
                            <select id="ie" class="form-control select2"> </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Maturity Value </label>
                            <select id="mv" class="form-control select2"> </select>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php
$this->load->view('header_footer/footer');
