<?php

class library_model extends CI_Model {
    /*     * ****************************************** Add Supplier ********************************* */

    public function timtable_insert($data1) {
        $q = $this->db->insert('timetable', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_supplier($data1) {
        $q = $this->db->insert('lib_add_supplier', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function return_update($data1) {
        $q = $this->db->insert('lib_return_book_history', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function issue_book_student($data1) {
        $q = $this->db->insert('lib_borrow_book', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_borrower($data1) {
        $q = $this->db->insert('lib_borrow_book', $data1);
        $q = $this->db->insert('lib_borrow_book_history', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add_author($data1) {
        $q = $this->db->insert('lib_add_author', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*     * ****************************************** End Add Supplier ********************************* */

    /*     * ******************************************** Add Book *************************************** */

    public function add_book($data1) {
        $ncopy = $this->input->post('ncopy');
        for ($i = 0; $i < $ncopy; $i++) {
            $q = $this->db->insert('lib_add_book', $data1);
        }
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*     * ****************************************** Add Book End *************************************** */

    /*     * ****************************************** Add Category *************************************** */

    public function add_category($data1) {
        $this->form_validation->set_message('category', 'Already Exists.');
        $q = $this->db->insert('lib_add_category', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*     * ******************************************End  Add Category *************************************** */

    /*     * ****************************************** Select Supplier *************************************** */

    public function select_supplier() {
        $query = $this->db->query("SELECT * FROM lib_add_supplier order by id asc");
        return $query->result();
    }

    /**     * ***************************************** Supplier End******************************************* */
    /*     * ****************************************** Select Category *************************************** */

    public function select_cat() {
        $query = $this->db->query("SELECT * FROM lib_add_category order by id asc");
        return $query->result();
    }

    public function update_borrower_book($select_sub) {
        $query = $this->db->query("UPDATE `lib_add_book` SET status='Not-Available' WHERE id='$select_sub'");
    }

    /*     * ****************************************** Category End******************************************* */
    /*     * ****************************************** Get_CategoryId******************************************* */

    public function get_data($id) {
        $query = $this->db->query("SELECT * FROM lib_add_category where id='$id' order by id asc");
        return $query->result();
    }

    /*     * ****************************************** Get_CategoryId End******************************************* */
    /*     * ****************************************** Get_SupplierId******************************************* */

    public function getsup_data($id) {
        $query = $this->db->query("SELECT * FROM lib_add_supplier where id='$id' order by id asc");
        return $query->result();
    }

    /*     * ****************************************** Get_SupplierId End******************************************* */
    /*     * ****************************************** Update Category******************************************* */

    public function update_category($data1) {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('lib_add_category', $data1);
    }

    /*     * ****************************************** Update Category End******************************************* */
    /*     * ****************************************** delete Category******************************************* */

    public function delete_data($id) {
        $this->db->where('id', $id);
        $this->db->delete('lib_add_category');
    }

    /*     * ****************************************** Delete Category End******************************************* */
    /*     * ****************************************** Select Book******************************************* */

    public function select_book() {
        $query = $this->db->query("SELECT DISTINCT(isbn_no),title,author,edition,publications,accession_no,no_copies FROM lib_add_book GROUP BY title;");
        return $query->result();
    }

    public function select_books() {
        $query = $this->db->query("SELECT * FROM lib_add_book GROUP BY title;");
        return $query->result();
    }

    public function select_subject() {
        $query = $this->db->query("SELECT distinct title FROM lib_add_book where status='' ORDER BY id DESC");
        return $query->result();
    }

    public function copies_available($acsn) {
        $query = $this->db->query("select count(id) as count from lib_add_book where accession_no='$acsn' and status=''");
        return $query->result();
    }

    /*     * ****************************************** Select Book End******************************************* */
    /*     * ****************************************** Select Book By Id******************************************* */

    public function book_data($id) {
        $query = $this->db->query("SELECT * FROM lib_add_book where id='$id' order by id asc");
        return $query->result();
    }

    /*     * ****************************************** Select Book By Id End******************************************* */
    /*     * ****************************************** Update Book***************************************************** */

    public function update_book($data1) {
        $acsno = $this->input->post('acsno');
        $this->db->where('accession_no', $acsno);
        $this->db->update('lib_add_book', $data1);
    }

    /*     * ****************************************** Update Book End************************************************** */
    /*     * ****************************************** Update Supplier************************************************** */

    public function update_supplier($data1) {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('lib_add_supplier', $data1);
    }

    /*     * ****************************************** Supllier End************************************************** */
    /*     * ****************************************** Delete Supllier************************************************** */

    public function delete_supplier($id) {
        $this->db->where('id', $id);
        $this->db->delete('lib_add_supplier');
    }

    /*     * ****************************************** Delete Supllier End************************************************** */
    /*     * ****************************************** Delete Book************************************************** */

    public function delete_book($id) {
        $this->db->where('id', $id);
        $this->db->delete('lib_add_book');
    }

    /*     * ****************************************** Delete Book End************************************************** */
    /*     * ****************************************** Add Class *************************************** */

    public function add_class($data1) {
        $q = $this->db->insert('lib_add_class', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*     * ******************************************End  Add Class *************************************** */
    /*     * ****************************************** Select Book******************************************* */

    public function select_class() {
        $query = $this->db->query("SELECT * FROM lib_add_class order by id asc");
        return $query->result();
    }

    public function select_student() {
        $query = $this->db->query("SELECT * FROM lib_add_student order by id asc");
        return $query->result();
    }

    public function select_stud($classes) {
        $query = $this->db->query("SELECT * FROM lib_add_class where class_code='$classes' order by id asc");
        return $query->result();
    }

    /*     * ****************************************** Select Book End******************************************* */
    /*     * ****************************************** Delete class************************************************** */

    public function delete_class($id) {
        $this->db->where('id', $id);
        $this->db->delete('lib_add_class');
    }

    /*     * ****************************************** Delete class End************************************************** */
    /*     * ****************************************** Update Supplier************************************************** */

    public function edit_class($data1) {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('lib_add_class', $data1);
    }

    /*     * ****************************************** Supllier End************************************************** */
    /*     * ****************************************** Get_class by d******************************************* */

    public function get_class($id) {
        $query = $this->db->query("SELECT * FROM lib_add_class where id='$id' order by id asc");
        return $query->result();
    }

    /*     * ****************************************** End******************************************* */
    /*     * ****************************************** Add Student *************************************** */

    public function add_student($data1) {
        $q = $this->db->insert('lib_add_student', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*     * ******************************************End  Add Class *************************************** */
    /*     * ****************************************** Delete student************************************************** */

    public function delete_student($id) {
        $this->db->where('id', $id);
        $this->db->delete('lib_add_student');
    }

    /*     * ****************************************** Delete student************************************************** */
    /*     * ****************************************** Get_class by d******************************************* */

    public function get_student($id) {
        $query = $this->db->query("SELECT * FROM lib_add_student where id='$id' order by id asc");
        return $query->result();
    }

    /*     * ****************************************** End******************************************* */
    /*     * ****************************************** Update Supplier************************************************** */

    public function edit_student($data1) {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->update('lib_add_student', $data1);
    }

    /*     * ****************************************** Supllier End************************************************** */
    /*     * ****************************************** Update Supplier************************************************** */

    public function get_student_ajax($val) {
        $query = $this->db->query("SELECT student_name,student_code FROM lib_add_student where class='$val' order by id asc");
        return $query->result();
    }

    public function get_classes($val) {
        $query = $this->db->query("SELECT * FROM lib_add_class where class_code='$val' order by id asc");
        return $query->result();
    }

    public function get_student_contents($val) {
        $query = $this->db->query("SELECT distinct($val) FROM `lib_add_book`");
        return $query->result_array();
    }

    /*     * ****************************************** Supllier End************************************************** */

    public function select_book1() {
        $query = $this->db->query("SELECT * FROM lib_add_class order by id asc");
        return $query->result();
    }

    public function select_category_code() {
        $query = $this->db->query("SELECT category_code FROM lib_add_category ORDER BY ID Desc Limit 1");
        return $query->result();
    }

    public function select_author_code() {
        $query = $this->db->query("SELECT author_code FROM lib_add_author ORDER BY ID Desc Limit 1");
        return $query->result();
    }

    public function select_class_code() {
        $query = $this->db->query("SELECT class_code FROM lib_add_class ORDER BY ID Desc Limit 1");
        return $query->result();
    }

    public function select_acc_code() {
        $query = $this->db->query("SELECT accession_no FROM lib_add_book ORDER BY ID Desc Limit 1");
        return $query->result();
    }

    public function select_supplier_code() {
        $query = $this->db->query("SELECT supplier_code FROM lib_add_supplier ORDER BY ID Desc Limit 1");
        return $query->result();
    }

    public function select_student_code() {
        $query = $this->db->query("SELECT student_code FROM lib_add_student ORDER BY ID Desc Limit 1");
        return $query->result();
    }

    public function count_book() {

        $query = $this->db->query("select count(id) as count from lib_add_book");
        return $query->result();
    }

    public function count_cat() {

        $query = $this->db->query("select count(id) as count from lib_add_category");
        return $query->result();
    }

    public function count_sup() {

        $query = $this->db->query("select count(id) as count from lib_add_supplier");
        return $query->result();
    }

    public function count_b_a() {

        $query = $this->db->query("select count(id) as count from lib_add_book where status=''");
        return $query->result();
    }

    public function borrowed_today($todays_date) {
        $query = $this->db->query("select count(id) as count from lib_borrow_book where reg_date='$todays_date' and return_date=''");
        return $query->result();
    }

    public function total_borrow_list($todays_date) {
        $query = $this->db->query("select count(id) as count from lib_borrow_book where reg_date<='$todays_date' and return_date=''");
        return $query->result();
    }

    public function borrowed_today_due($today_date) {
        $query = $this->db->query("select count(id) as count from lib_borrow_book where due_date='$today_date'");
        return $query->result();
    }

    public function total_due() {
        $today_date = date('Y-m-d');
        $query = $this->db->query("select count(id) as count from lib_borrow_book where due_date <='$today_date' and return_date=''");
        return $query->result();
    }

    public function select_report($from, $to) {
        $query = $this->db->query("select * from lib_add_book where reg_date between '$from' and '$to'");
        return $query->result();
    }

    public function get_book_datewise_report($from, $to) {
        $query = $this->db->query("select distinct(title),reg_date,isbn_no,author,no_copies,accession_no,location from lib_add_book where reg_date between '$from' and '$to'");
        return $query->result();
    }

    public function select_author() {
        $query = $this->db->query("select * from lib_add_author");
        return $query->result();
    }

    public function borrow_list($val) {
        $query = $this->db->query("select * from lib_borrow_book where reg_date='$val'  and return_date=''");
        return $query->result();
    }

    public function select_class_borrow($val) {
        $query = $this->db->query("select class from lib_add_class where class_code='$val'");
        return $query->result();
    }

    public function select_student_borrow($val) {
        $query = $this->db->query("select student_name from lib_add_student where student_code='$val' ");
        return $query->result();
    }

    public function select_subject_borrow($val) {
        $query = $this->db->query("select * from lib_add_book where id='$val'");
        return $query->result();
    }

    public function due_borrow_list($val) {
        $query = $this->db->query("select * from lib_borrow_book where due_date ='$val'and return_date = ''");
        return $query->result();
    }

    public function total_due_borrow_list($val) {
        $query = $this->db->query("select * from lib_borrow_book where due_date <='$val' and return_date = ''");
        return $query->result();
    }

    /*     * public function total_due_dates($val){
      $query = $this->db->query("select distinct due_date from lib_borrow_book where due_date <='$val' and return_date = ''");
      return $query->result();
      }* */

    public function total_borrow_list1($val) {
        $query = $this->db->query("select * from lib_borrow_book where reg_date<='$val'  and return_date=''");
        return $query->result();
    }

    public function get_student_search($val) {
        $query = $this->db->query("SELECT distinct($val) FROM `lib_borrow_book`");
        return $query->result_array();
    }

    public function get_search_book_list($val, $boo_cat) {
        $query = $this->db->query("select distinct(title),isbn_no,location,author,no_copies,accession_no from lib_add_book where $boo_cat='$val'");
        return $query->result();
    }

    public function get_student_search_book_list($search_field, $val) {
        $query = $this->db->query("select * from lib_borrow_book where $search_field='$val'");
        return $query->result();
    }

    public function get_returning($first, $val) {
        $query = $this->db->query("select * from lib_borrow_book where select_class='$first' and select_student='$val' and return_date=''");
        return $query->result();
    }

    public function get_due_report($from, $to) {
        $tdate = date('Y-m-d');
        $query = $this->db->query("select * from lib_borrow_book_history where due_date between '$from' and '$to' and return_date='' and due_date <= '$tdate'");
        return $query->result();
    }

    public function get_return_update($select_subject) {
        $query = $this->db->query("select * from lib_borrow_book where select_subject='$select_subject'");
        return $query->result();
    }

    public function update_return_update($select_sub, $return_date, $idate, $student) {

        $query = $this->db->query("UPDATE `lib_add_book` SET status='' WHERE id='$select_sub'");
        $query = $this->db->query("UPDATE `lib_borrow_book_history` SET return_date='$return_date' WHERE select_subject='$select_sub'");
        $query = $this->db->query("UPDATE `lib_borrow_book` SET return_date='$return_date' WHERE select_subject='$select_sub'");
        $query = $this->db->query("UPDATE `lib_renewal_history` SET return_date='$return_date' WHERE issue_date='$idate' and select_student='$student' and select_subject='$select_sub'");
    }

    public function isuue_borrow_book_list() {
        $query = $this->db->query("select * from lib_borrow_book where return_date = ''");
        return $query->result();
    }

    public function total_borrow_return($val) {
        $query = $this->db->query("select count(id) as count from lib_borrow_book where return_date != ''");
        return $query->result();
    }

    public function total_today_borrow_return($val) {
        $query = $this->db->query("select count(id) as count from lib_borrow_book where return_date != '' and return_date ='$val'");
        return $query->result();
    }

    public function total_returned() {
        $query = $this->db->query("select * from lib_borrow_book where return_date != ''");
        return $query->result();
    }

    public function returned_today($dates) {
        $query = $this->db->query("select * from lib_borrow_book where return_date = '$dates' ");
        return $query->result();
    }

    public function get_all_due($val) {
        $dates = date('Y-m-d');
        if ($val == $dates) {
            $query = $this->db->query("select * from lib_borrow_book where due_date <='$dates' and return_date='' ");
        } else {
            $query = $this->db->query("select * from lib_borrow_book where due_date ='$dates' and return_date=''");
        }
        return $query->result();
    }

    public function due_challan($id) {
        $query = $this->db->query("select * from lib_return_book_history where due_amt > 0 and id='$id'");
        return $query->result();
    }

    public function due_challanns($id) {
        $query = $this->db->query("select * from lib_return_book_history where due_amt > 0 and id='$id'");
        return $query->result();
    }

    public function due_challans() {
        $query = $this->db->query("select * from lib_return_book_history where due_amt > 0");
        return $query->result();
    }

    public function get_book_by_name($val) {
        $a1 = 'All';
        $a2 = 'all';
        $a3 = 'ALL';
        if ($val == $a1 || $val == $a2 || $val == $a3) {
            $query = $this->db->query("select distinct(title),isbn_no,location,author,no_copies,accession_no from lib_add_book");
            return $query->result();
        } else {
            $query = $this->db->query("select distinct(title),isbn_no,location,author,no_copies,accession_no from lib_add_book where title='$val' OR isbn_no='$val' OR author = '$val' OR accession_no = '$val'");
            return $query->result();
        }
    }

    public function get_renewal($class, $student_name) {
        $query = $this->db->query("select * from lib_borrow_book where select_class = '$class' and select_student='$student_name' and return_date=''");
        return $query->result();
    }

    public function lib_renewal_history($data1) {
        $q = $this->db->insert('lib_renewal_history', $data1);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function lib_renewal_history_update($id, $new_day, $renew_date) {
        $query = $this->db->query("UPDATE `lib_borrow_book` SET `total_days`='$new_day',`due_date`='$renew_date' where id='$id'");
        $query = $this->db->query("UPDATE `lib_borrow_book_history` SET `total_days`='$new_day',`due_date`='$renew_date' where id='$id'");
    }

    public function class_history($val) {
        $dates = date('Y-m-d');
        if ($val == $dates) {
            $query = $this->db->query("select * from lib_borrow_book_history");
        } else {
            $query = $this->db->query("select * from lib_borrow_book_history where select_class = '$val'");
        }
        return $query->result();
    }

    public function stock_verfication_fields() {
        $query = $this->db->query("select distinct (category) from lib_add_book");
        return $query->result();
    }

    public function stock_verfication_copies_available($category) {
        $query = $this->db->query("select count(id) as count from lib_add_book where category='$category' and status=''");
        return $query->result();
    }

    public function stock_verfication_stock_library($category) {
        $query = $this->db->query("select count(id) as count from lib_add_book where category='$category'");
        return $query->result();
    }

    public function stock_verfication_out_library($category) {
        $query = $this->db->query("select count(id) as count from lib_add_book where category='$category' and status='Not-Available'");
        return $query->result();
    }

    public function due_list_report_class($val) {
        $todays_date = date('Y-m-d');
        $query = $this->db->query("select * from lib_borrow_book_history where select_class = '$val' and due_date <= '$todays_date' and return_date = ''");
        return $query->result();
    }

    public function Complete_book_details($acsn) {
        $query = $this->db->query("select * from lib_add_book where accession_no = '$acsn'");
        return $query->result();
    }

    public function get_acsn_no($id) {
        $query = $this->db->query("select accession_no from lib_add_book where id = '$id'");
        return $query->result();
    }

    public function select_acc_sn($acc_no) {
        $query = $this->db->query("select * from lib_borrow_book_history where acc_no = '$acc_no'");
        return $query->result();
    }

    public function select_sub($title) {
        $query = $this->db->query("SELECT id FROM `lib_add_book` where title='$title' and status=''");
        return $query->result();
    }

    public function get_renewal_by_name($val) {
        $query = $this->db->query("SELECT * FROM `lib_renewal_history` where select_student='$val' ");
        return $query->result();
    }

    public function select_class_timetable() {
        $query = $this->db->query("SELECT distinct (class) FROM `timetable`");
        return $query->result();
    }

    public function get_year_time_table($val) {
        $query = $this->db->query("SELECT * FROM `timetable` where class='$val'");
        return $query->result();
    }

    public function get_timetable($class, $year) {
        $query = $this->db->query("SELECT * FROM `timetable` where class='$class' and year='$year'");
        return $query->result();
    }

    public function edit_author($id) {
        $query = $this->db->query("SELECT * FROM `lib_add_author` where id='$id'");
        return $query->result();
    }

    public function edit_authors_update($id, $author) {
        $query = $this->db->query("update lib_add_author set author='$author' where id = '$id'");
    }

    public function delete_author($id) {
        $this->db->where('id', $id);
        $this->db->delete('lib_add_author');
    }

    public function manage_books($val) {
        if ($val == all) {
            $query = $this->db->query("select distinct(title),isbn_no,location,supplier,author,no_copies,accession_no from lib_add_book");
        } elseif ($val == '') {
            $query = $this->db->query("select distinct(title),isbn_no,location,author,supplier,no_copies,accession_no from lib_add_book where status = ''");
        } elseif ($val == 'Not-Available') {
            $query = $this->db->query("select distinct(title),isbn_no,location,author,no_copies,supplier,accession_no from lib_add_book where status = 'Not-Available'");
        }
        return $query->result();
    }

}
