
<?php

error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
global $inward, $outward, $doc, $report;

class Attendence extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model(array('admin_model'));
        $this->load->model(array('attendence_model'));
        $this->load->library('grocery_CRUD');
    }

    public function home() {
        if (($this->session->userdata['logged_in']['user']) or ( $this->session->userdata['logged_in']['admin_user'])) {
            $cantonment = $this->session->userdata['logged_in']['cantonment'];
            $data = array(
                'main_content' => 'library/home',
                'setting' => $this->admin_model->setting(),
            );
            $this->load->view('template', $data);
        } else {
            $this->login();
        }
    }

    public function index() {
        $base = base_url();
    }

    public function attendence_module() {
        $data = array(
            'main_content' => 'attendence/attendence_module',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function view_attendence() {
        $data = array(
            'main_content' => 'attendence/view_attendence',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function update_attendence() {
        $data = array(
            'main_content' => 'attendence/update_attendence',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function attendence_day_wise() {
        $data = array(
            'main_content' => 'attendence/attendence_day_wise',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function get_student_attendence_list($val) {
        $result = $this->attendence_model->get_student_attendence_list($val);
        echo "
            <table id='example2' class='table table-bordered table-hover'>
            <thead>
            <tr>
                <th>SI.No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>";
        $base = base_url();
        $i = 1;
        foreach ($result as $row) {
            echo "<tr>
                <td>$i</td>
                <td><input style='border: none;background: #fafaff;'type='text' name='student_name' id='student_name$i' value='$row->student_name'></td>
                <td><select style='width: 50%;' name = 'action' class='form-control select2' id='action'><option value='P'>Present</option><option value='A'>Absent</option></select></td>
                 </tr>";
            $i += 1;
        }
        echo "</tbody>
          </table>
          <input type='submit' value='Submit' class='btn btn-block btn-warning btn-flat'/>";
    }

    public function save_day_wise() {
        $select_batch = $this->input->post('select_batch');
        $atten_date = $this->input->post('tdate');
        $data = array(
            'user_data' => $user_data,
            'atten_date' => $atten_date,
            'select_batch' => $select_batch,
            'main_content' => 'attendence/save_day_wise',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function submit_day_wise() {
        $array_length = $this->input->post('ia');
        for ($i = 1; $i <= $array_length; $i++) {
            $data1 = array(
                'classs' => $this->input->post("attend_class$i"),
                'name' => $this->input->post("student_name$i"),
                'attendence' => $this->input->post("action$i"),
                'date' => $this->input->post("attend_date$i"),
                'reason' => $this->input->post("reason1$i")
            );
            $result = $this->attendence_model->save_day_wise($data1);
        }
        $base = base_url();
        if ($result == true) {
            echo "<script>alert('Attendence Added Successfully'); window.location.href='$base/index.php/attendence_controller/Attendence/attendence_day_wise'</script>";
        } else {
            echo "<script>alert('Failed'); window.location.href='$base/index.php/attendence_controller/Attendence/attendence_day_wise'</script>";
        }
    }

    public function update_day_wise() {
        $classss = $this->input->post("select_batch1");
        $datess = $this->input->post("txtDate1");
        $result = $this->attendence_model->delete_day_wise($classss, $datess);
        $array_length = $this->input->post('i2');
        for ($i = 1; $i <= $array_length; $i++) {
            $data1 = array(
                'classs' => $this->input->post("attend_class1$i"),
                'name' => $this->input->post("student_name1$i"),
                'attendence' => $this->input->post("actions1$i"),
                'date' => $this->input->post("attend_date1$i"),
                'reason' => $this->input->post("reason$i")
            );
            $result = $this->attendence_model->save_day_wise($data1);
        }
        $base = base_url();
        if ($result == true) {
            echo "<script>alert('Attendence Updated Successfully'); window.location.href='$base/index.php/attendence_controller/Attendence/attendence_day_wise'</script>";
        } else {
            echo "<script>alert('Failed'); window.location.href='$base/index.php/attendence_controller/Attendence/attendence_day_wise'</script>";
        }
    }

}
