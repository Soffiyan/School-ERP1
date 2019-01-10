<?php

error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
global $inward, $outward, $doc, $report;

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model(array('report_model', 'files_model'));
        $this->load->library('grocery_CRUD');
        //if($inward !== false){
    }

    public function get_outward_lang() {
        //$category = $_POST['category'];
        $language = $_POST['language'];
        //$date = $_POST['fromtodate'];
        $user = $_POST['user'];


        ///$daterangepicker_start = trim(substr($date, -23, 10));
        //$daterangepicker_end = substr($date, -10);

        $from = $_POST['from'];
        $to = $_POST['to'];

        $new_date_start = DateTime::createFromFormat('d/m/Y', $from)->format('Y-m-d');
        $new_date_end = DateTime::createFromFormat('d/m/Y', $to)->format('Y-m-d');


        //$msg = "$category - $subcategory - $new_date_start & $new_date_end";
        $result = $this->report_model->get_outward_lang($language, $new_date_start, $new_date_end, $user);
        $i = 1;
        if ($result == true) {
            foreach ($result as $inward_s) {
                if($inward_s->statuss == 'Action-Taken'){$s="Closed";}else{$s=$inward_s->statuss;}
                echo"<tr>
                                               <td>$i</td>
                                                <td>$inward_s->document_no</td>
                                                <td>$inward_s->document_received_from</td>
                                                <td>$inward_s->document_subject</td>
                                                <td>$inward_s->select_document_status</td>
                                                <td>$inward_s->document_ref</td>
                                                <td>$inward_s->remark</td>
                                                <td>$inward_s->file_number_name</td>
                                               
                                                <td>$s</td>
                                                
                </tr>";
                $i++;
            }
        } else {
            echo"
                   <tr>
                    <td colspan='12' style='text-align:center'>Sorry No Result Found</td>
                   </tr>
            ";
        }


        echo $msg;
    }

    public function get_stamp() {
        //$category = $_POST['category'];
        //$language = $_POST['language'];
        //$date = $_POST['fromtodate'];
        $user = $_POST['user'];


        //$daterangepicker_start = trim(substr($date, -23, 10));
        //$daterangepicker_end = substr($date, -10);

        $from = $_POST['from'];
        $to = $_POST['to'];

        $new_date_start = DateTime::createFromFormat('d/m/Y', $from)->format('Y-m-d');
        $new_date_end = DateTime::createFromFormat('d/m/Y', $to)->format('Y-m-d');


        //$msg = "$category - $subcategory - $new_date_start & $new_date_end";
        $result = $this->report_model->get_pending_rpt($new_date_start, $new_date_end, $user);

        $i = 1;
        if ($result == true) {
            foreach ($result as $inward_s) {
                if($inward_s->statuss == 'Action-Taken'){$s="Closed";}else{$s=$inward_s->statuss;}
                echo"<tr>
                                               <td>$i</td>
                                                <td>$inward_s->document_no</td>
                                                <td>$inward_s->document_received_from</td>
                                                <td>$inward_s->document_subject</td>
                                                <td>$inward_s->select_document_status</td>
                                                <td>$inward_s->document_ref</td>
                                                <td>$inward_s->remark</td>
                                                <td>$inward_s->file_number_name</td>
                                               
                                                <td>$s</td>
                                               
                                                <td>$inward_s->datetime</td>
                                                <td>$inward_s->last_active</td>
                </tr>";
                $i++;
            }
        } else {
            echo"
                   <tr>
                    <td colspan='12' style='text-align:center'>Sorry No Result Found</td>
                   </tr>
            ";
        }


        echo $msg;
    }

    public function get_pending_outward() {
        //$category = $_POST['category'];
        //$language = $_POST['language'];
        //$date = $_POST['fromtodate'];
        $cant = $_POST['cantonment'];
        $user = $_POST['user'];
        //$daterangepicker_start = trim(substr($date, -23, 10));
        //$daterangepicker_end = substr($date, -10);

        $from = $_POST['from'];
        $to = $_POST['to'];

        $new_date_start = DateTime::createFromFormat('d/m/Y', $from)->format('Y-m-d');
        $new_date_end = DateTime::createFromFormat('d/m/Y', $to)->format('Y-m-d');


        //$msg = "$category - $subcategory - $new_date_start & $new_date_end";
        //Department list
        $result_dis = $this->report_model->get_pending_dis_dpt($new_date_start, $new_date_end, $user);
        /*         * * get pending departmen list ** */

        //Userwise count
        $i = 1;
        
        if ($result_dis == true) {
            foreach($result_dis as $result_dis_dpt) {
                echo"<tr>
                        <td colspan='11' style='text-align:center;'><b>$result_dis_dpt->department</b></td>
                     </tr>";
                $result = $this->report_model->get_pending_rpt($new_date_start, $new_date_end, $user,$result_dis_dpt->department);
                foreach ($result as $inward_s) {
                    $c_date = date("Y-m-d");
                   $now =  strtotime("$inward_s->datee"); // or your date as well
$your_date = strtotime("$c_date");
$datediff = $now - $your_date;

$dif = abs($datediff / (60 * 60 * 24));
                    echo"<tr>
                                                <td>$i</td>
                                                <td>$inward_s->share_with_user</td>
                                                <td>$inward_s->document_no</td>
                                                <td>$inward_s->document_received_from</td>
                                                <td>$inward_s->document_subject</td>
                                                <td>$inward_s->document_ref</td>
                                                <td>$inward_s->remark</td>
                                                <td>$inward_s->file_number_name</td>
                                                <td>$dif</td>
                                                
                </tr>";
                    $i++;
                }
            }
        } else {
            echo"
                   <tr>
                    <td colspan='12' style='text-align:center'>Sorry No Result Found</td>
                   </tr>
            ";
        }


        echo $msg;
    }

    public function type_vip() {
        $type = $_POST['type'];
        //$language = $_POST['language'];
        //$date = $_POST['fromtodate'];
        $user = $_POST['user'];


        //$daterangepicker_start = trim(substr($date, -23, 10));
        //$daterangepicker_end = substr($date, -10);
        $from = $_POST['from'];
        $to = $_POST['to'];

        $new_date_start = DateTime::createFromFormat('d/m/Y', $from)->format('Y-m-d');
        $new_date_end = DateTime::createFromFormat('d/m/Y', $to)->format('Y-m-d');


        //$msg = "$category - $subcategory - $new_date_start & $new_date_end";
        $result = $this->report_model->get_type_rpt($new_date_start, $new_date_end, $user, $type);

        $i = 1;
        if ($result == true) {
            foreach ($result as $inward_s) {
                echo"<tr>
                                               <td>$i</td>
                                                <td>$inward_s->document_no</td>
                                                <td>$inward_s->document_received_from</td>
                                                <td>$inward_s->document_subject</td>
                                             
                                                <td>$inward_s->document_ref</td>
                                                <td>$inward_s->remark</td>
                                                <td>$inward_s->file_number_name</td>
                                              
                                                <td>$inward_s->statuss</td>
                                               
                                                
                </tr>";
                $i++;
            }
        } else {
            echo"
                   <tr>
                    <td colspan='12' style='text-align:center'>Sorry No Result Found</td>
                   </tr>
            ";
        }


        echo $msg;
    }

//*************************************Send Mail end **************************************/
}
