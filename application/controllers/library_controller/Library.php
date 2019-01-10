
<?php

error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
global $inward, $outward, $doc, $report;

class Library extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model(array('admin_model'));
        $this->load->model(array('library_model'));
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

    /*     * ******************************************** Add Book *************************************** */

    public function add_book() {
        $data = array(
            'main_content' => 'library/add_book',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);

        $title = $this->input->post('title');
        $author = $this->input->post('author');
        $publication = $this->input->post('publication');
        $yop = $this->input->post('yop');
        $nop = $this->input->post('nop');
        $isbn = $this->input->post('isbn');
        $vol = $this->input->post('vol');
        $edition = $this->input->post('edition');
        $pdate = $this->input->post('pdate');
        $pridate = $this->input->post('pridate');
        $ncopy = $this->input->post('ncopy');
        $billno = $this->input->post('billno');
        $singlecopy = $this->input->post('singlecopy');
        $loc = $this->input->post('loc');
        $sup = $this->input->post('sup');
        $acsno = $this->input->post('acsno');
        $category = $this->input->post('category');
        $titlebrief = $this->input->post('titlebrief');
        $reg_date = date('Y-m-d');
        $reg_year = date('Y');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('author', 'author', 'required');
        $this->form_validation->set_rules('publication', 'publication', 'required');
        $this->form_validation->set_rules('yop', 'Year Of Passing', 'required');
        $this->form_validation->set_rules('nop', 'No Of Pages', 'required');

        $this->form_validation->set_rules('isbn', 'ISBN No', 'required');
        $this->form_validation->set_rules('vol', 'Volume', 'required');
        $this->form_validation->set_rules('edition', 'Edition', 'required');
        $this->form_validation->set_rules('pdate', 'Purchase Date', 'required');
        $this->form_validation->set_rules('pridate', 'Printing Date', 'required');

        $this->form_validation->set_rules('ncopy', 'No Of Copies', 'required');
        $this->form_validation->set_rules('billno', 'Bill No', 'required');
        $this->form_validation->set_rules('singlecopy', 'Single Copy', 'required');

        $this->form_validation->set_rules('loc', 'Location', 'required');
        $this->form_validation->set_rules('sup', 'Supplier', 'required');
        $this->form_validation->set_rules('acsno', 'Accession No', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('titlebrief', 'titlebrief', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'title' => $title,
                'author' => $author,
                'publications' => $publication,
                'year_passing' => $yop,
                'no_pages' => $nop,
                'isbn_no' => $isbn,
                'volume' => $vol,
                'edition' => $edition,
                'purchasing_date' => $pdate,
                'printing_date' => $pridate,
                'no_copies' => $ncopy,
                'bill_no' => $billno,
                'purchasing_prince_single_copy' => $singlecopy,
                'location' => $loc,
                'supplier' => $sup,
                'accession_no' => $acsno,
                'category' => $category,
                'title_brief' => $titlebrief,
                'reg_date' => $reg_date,
                'reg_year' => $reg_year
            );

            $result = $this->library_model->add_book($data1);
            $base = base_url();
            $siteurl = site_url();
            if ($result == true) {
                echo "<script>alert('Book Added Successfully'); window.location.href='$base/index.php/library_controller/Library/add_book'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_book'</script>";
            }
        }
    }

    /*     * ****************************************** End Add Book ********************************* */

    /*     * ******************************************** Add Supplier *************************************** */

    public function add_supplier() {
        $data = array(
            'main_content' => 'library/add_supplier',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
        $supplier_code = $this->input->post('c_code');
        $supplier_name = $this->input->post('Supname');
        $pno = $this->input->post('pno');
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $reg_date = date('Y-m-d');
        $reg_year = date('Y');
        $this->form_validation->set_rules('Supname', 'Name', 'required');
        $this->form_validation->set_rules('pno', 'Phone No', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'supplier_code' => $supplier_code,
                'supplier_name' => $supplier_name,
                'phone_no' => $pno,
                'email' => $email,
                'mobile' => $mobile,
                'address' => $address,
                'reg_date' => $reg_date,
                'reg_year' => $reg_year
            );


            $result = $this->library_model->add_supplier($data1);
            $base = base_url();
            if ($result == true) {
                echo "<script>alert('Supplier Added Successfully'); window.location.href='$base/index.php/library_controller/Library/add_supplier'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_supplier'</script>";
            }
        }
    }

    /*     * ****************************************** End Add Supplier ********************************* */

    /*     * ******************************************** add_category *************************************** */

    public function add_category() {
        $data = array(
            'main_content' => 'library/add_category',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
        $this->load->library('form_validation');
        $category_code = $this->input->post('c_code');
        $add_category = $this->input->post('category');
        $reg_date = date('Y-m-d');
        $reg_year = date('Y');
        $this->form_validation->set_rules('c_code', 'c_code', 'required');
        $this->form_validation->set_rules('category', 'Category', 'trim|is_unique[lib_add_category.category]');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'category_code' => $category_code,
                'category' => $add_category,
                'reg_date' => $reg_date,
                'reg_year' => $reg_year
            );
            $data2 = array(
                'category' => $add_category
            );


            $result = $this->library_model->add_category($data1);
            $base = base_url();
            if ($result == true) {
                echo "<script>alert('Category Added Successfully'); window.location.href='$base/index.php/library_controller/Library/add_category'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_category'</script>";
            }
        }
    }

    /*     * ****************************************** End Add Category ********************************* */
    /*     * ******************************************************* edit_category Start************************************************** */

    public function edit_category($id) {
        $user_data = $this->library_model->get_data($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'library/edit_category',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);

        $id = $this->input->post('id');
        $add_category = $this->input->post('category');
        $reg_date = date('Y-m-d');
        $reg_year = date('Y');
        $this->form_validation->set_rules('category', 'Category', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'category' => $add_category,
                'reg_date' => $reg_date,
                'reg_year' => $reg_year
            );


            $result = $this->library_model->update_category($data1);
            $base = base_url();
            if (!$result) {
                echo "<script>alert('Category Updated Successfully'); window.location.href='$base/index.php/library_controller/Library/add_category'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_category'</script>";
            }
        }
    }

    /*     * ******************************************************* edit_category End************************************************** */
    /*     * ******************************************************* delete_category Start************************************************** */

    public function delete_category($id) {

        $delete_data = $this->library_model->delete_data($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Category Deleted Successfully'); window.location.href='$base/index.php/library_controller/Library/add_category'</script>";
        } else {
            echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_category'</script>";
        }
    }

    /*     * ******************************************************* delete_category End************************************************** */
    /*     * ******************************************************* edit_supplier Start************************************************** */

    public function edit_supplier($id) {
        $user_data = $this->library_model->getsup_data($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'library/edit_supplier',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
        $id = $this->input->post('id');
        $Supname = $this->input->post('Supname');
        $email = $this->input->post('email');
        $pno = $this->input->post('pno');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $reg_date = date('Y-m-d');
        $reg_year = date('Y');
        $this->form_validation->set_rules('Supname', 'Supname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('pno', 'pno', 'required');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'supplier_name' => $Supname,
                'phone_no' => $pno,
                'email' => $email,
                'mobile' => $mobile,
                'address' => $address,
                'reg_date' => $reg_date,
                'reg_year' => $reg_year
            );


            $result = $this->library_model->update_supplier($data1);
            $base = base_url();
            if (!$result) {
                echo "<script>alert('Supplier Updated Successfully'); window.location.href='$base/index.php/library_controller/Library/add_supplier'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_supplier'</script>";
            }
        }
    }

    /*     * ******************************************************* edit_supplier************************************************** */
    /*     * ******************************************************* List Book Start************************************************** */

    public function book_list() {
        $data = array(
            'main_content' => 'library/book_list',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    /*     * ******************************************************* List Book End************************************************** */
    /*     * ******************************************************* Update Book Start************************************************** */

    public function edit_book($id) {
        $user_data = $this->library_model->book_data($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'library/edit_book',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $author = $this->input->post('author');
        $publication = $this->input->post('publication');
        $yop = $this->input->post('yop');
        $nop = $this->input->post('nop');
        $isbn = $this->input->post('isbn');
        $vol = $this->input->post('vol');
        $edition = $this->input->post('edition');
        $pdate = $this->input->post('pdate');
        $pridate = $this->input->post('pridate');
        $ncopy = $this->input->post('ncopy');
        $billno = $this->input->post('billno');
        $singlecopy = $this->input->post('singlecopy');
        $loc = $this->input->post('loc');
        $sup = $this->input->post('sup');
        $acsno = $this->input->post('acsno');
        $category = $this->input->post('category');
        $titlebrief = $this->input->post('titlebrief');
        $reg_date = date('Y-m-d');
        $reg_year = date('Y');

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('author', 'author', 'required');
        $this->form_validation->set_rules('publication', 'publication', 'required');
        $this->form_validation->set_rules('yop', 'Year Of Passing', 'required');
        $this->form_validation->set_rules('nop', 'No Of Pages', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN No', 'required');
        $this->form_validation->set_rules('vol', 'Volume', 'required');
        $this->form_validation->set_rules('edition', 'Edition', 'required');
        $this->form_validation->set_rules('pdate', 'Purchase Date', 'required');
        $this->form_validation->set_rules('pridate', 'Printing Date', 'required');
        $this->form_validation->set_rules('ncopy', 'No Of Copies', 'required');
        $this->form_validation->set_rules('billno', 'Bill No', 'required');
        $this->form_validation->set_rules('singlecopy', 'Single Copy', 'required');
        $this->form_validation->set_rules('loc', 'Location', 'required');
        $this->form_validation->set_rules('sup', 'Supplier', 'required');
        $this->form_validation->set_rules('acsno', 'Accession No', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('titlebrief', 'titlebrief', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'title' => $title,
                'author' => $author,
                'publications' => $publication,
                'year_passing' => $yop,
                'no_pages' => $nop,
                'isbn_no' => $isbn,
                'volume' => $vol,
                'edition' => $edition,
                'purchasing_date' => $pdate,
                'printing_date' => $pridate,
                'no_copies' => $ncopy,
                'bill_no' => $billno,
                'purchasing_prince_single_copy' => $singlecopy,
                'location' => $loc,
                'supplier' => $sup,
                'accession_no' => $acsno,
                'category' => $category,
                'title_brief' => $titlebrief,
                'reg_date' => $reg_date,
                'reg_year' => $reg_year
            );

            $result = $this->library_model->update_book($data1);
            $base = base_url();
            if (!$result) {
                echo "<script>alert('Book Updated Successfully'); window.location.href='$base/index.php/library_controller/Library/book_list'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/book_list'</script>";
            }
        }
    }

    /*     * ******************************************************* Update Book End************************************************** */

    /*     * ******************************************************* Delete Supplier Start************************************************** */

    public function delete_supplier($id) {
        $result = $this->library_model->delete_supplier($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Supplier Deleted Successfully'); window.location.href='$base/index.php/library_controller/Library/add_supplier'</script>";
        } else {
            echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_supplier'</script>";
        }
    }

    /*     * ******************************************************* Delete Supplier End************************************************** */
    /*     * ******************************************************* Delete Book start************************************************** */

    public function delete_book($id) {
        $result = $this->library_model->delete_book($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Book Deleted Successfully'); window.location.href='$base/index.php/library_controller/Library/book_list'</script>";
        } else {
            echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/book_list'</script>";
        }
    }

    /*     * ******************************************************* Delete Book End************************************************** */
    /*     * ******************************************** add_class *************************************** */

    public function add_class() {
        $data = array(
            'main_content' => 'library/add_class',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
        $class_code = $this->input->post('c_code');
        $add_class = $this->input->post('clas');
        $this->form_validation->set_rules('clas', 'Class', 'required|trim|max_length[20]');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'class_code' => $class_code,
                'class' => $add_class
            );


            $result = $this->library_model->add_class($data1);
            $base = base_url();
            if ($result == true) {
                echo "<script>alert('Class Added Successfully'); window.location.href='$base/index.php/library_controller/Library/add_class'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_class'</script>";
            }
        }
    }

    /*     * ****************************************** End Add Class ********************************* */

    /*     * ******************************************************* Delete Class start************************************************** */

    public function delete_class($id) {
        $result = $this->library_model->delete_class($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Class Deleted Successfully'); window.location.href='$base/index.php/library_controller/Library/add_class'</script>";
        } else {
            echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_class'</script>";
        }
    }

    /*     * ******************************************************* Delete Class End************************************************** */

    /*     * ******************************************************* edit_class Start************************************************** */

    public function edit_class($id) {
        $user_data = $this->library_model->get_class($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'library/edit_class',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
        $id = $this->input->post('id');
        $add_class = $this->input->post('clas');
        $this->form_validation->set_rules('clas', 'clas', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'class' => $add_class
            );
            $result = $this->library_model->edit_class($data1);
            $base = base_url();
            if (!$result) {
                echo "<script>alert('Class Updated Successfully'); window.location.href='$base/index.php/library_controller/Library/add_class'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_class'</script>";
            }
        }
    }

    /*     * ******************************************************* edit_class End************************************************** */

    public function add_student() {
        $data = array(
            'main_content' => 'library/add_student',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
        $student_code = $this->input->post('c_code');
        $select_class = $this->input->post('sclass');
        $sname = $this->input->post('sname');
        $this->form_validation->set_rules('sclass', 'Select Class', 'required');
        $this->form_validation->set_rules('sname', 'Name', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'student_code' => $student_code,
                'class' => $select_class,
                'student_name' => $sname
            );


            $result = $this->library_model->add_student($data1);
            $base = base_url();
            if ($result == true) {
                echo "<script>alert('Class Added Successfully'); window.location.href='$base/index.php/library_controller/Library/add_student'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_student'</script>";
            }
        }
    }

    /*     * ******************************************************* Delete Student start************************************************** */

    public function delete_student($id) {
        $result = $this->library_model->delete_student($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Student Deleted Successfully'); window.location.href='$base/index.php/library_controller/Library/add_student'</script>";
        } else {
            echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_student'</script>";
        }
    }

    /*     * ******************************************************* Delete Student End************************************************** */

    /*     * ******************************************************* edit_class Start************************************************** */

    public function edit_student($id) {
        $user_data = $this->library_model->get_student($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'library/edit_student',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
        $id = $this->input->post('id');
        $sclass = $this->input->post('sclass');
        $sname = $this->input->post('sname');
        $this->form_validation->set_rules('sclass', 'sclass', 'required');
        $this->form_validation->set_rules('sname', 'sname', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'class' => $sclass,
                'student_name' => $sname
            );
            $result = $this->library_model->edit_student($data1);
            $base = base_url();
            if (!$result) {
                echo "<script>alert('Student Details Updated Successfully'); window.location.href='$base/index.php/library_controller/Library/add_student'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/add_student'</script>";
            }
        }
    }

    /*     * ******************************************************* edit_class End************************************************** */

    public function search_book() {
        $data = array(
            'main_content' => 'library/search_book',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function book_report() {
        $data = array(
            'main_content' => 'library/book_report',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function book_report_date_wise() {
        $from = $_POST['fdate'];
        $to = $_POST['tdate'];
        $result = $this->library_model->select_report($from, $to);
        if ($result == true) {

            echo" <table id='example2' class='table table-bordered table-hover'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Publication</th>
                                    <th>Purchasing Date</th>
                                    <th>Supplier</th>
                                    <th>Book Category</th>
                                </tr>";
            foreach ($result as $data) {
                echo "<tr>                     
                                                <td>$data->id</td>
                                                <td>$data->title</td>   
                                                <td>$data->author</td> 
                                                <td>$data->publications</td> 
                                                <td>$data->purchasing_date</td> 
                                                <td>$data->supplier</td> 
                                                <td>$data->category</td>     
                    </tr>";
            }
            echo "</table>";
        }
    }

    public function view_author() {
        $data = array(
            'main_content' => 'library/view_author',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function add_author() {
        $author_code = $this->input->post('c_code');
        $author = $this->input->post('author');
        $this->form_validation->set_rules('c_code', 'Author Code', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'author_code' => $author_code,
                'author' => $author
            );


            $result = $this->library_model->add_author($data1);
            $base = base_url();
            if ($result == true) {
                echo "<script>alert('Author Added Successfully'); window.location.href='$base/index.php/library_controller/Library/view_author'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/view_author'</script>";
            }
        }
    }

    public function issue_book() {
        $data = array(
            'main_content' => 'library/issue_book',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
        $class = $this->input->post('select_class');
        $student = $this->input->post('select_student');
        $select_sub = $this->input->post('select_sub');
        $idate = $this->input->post('idate');
        $ddate = $this->input->post('ddate');
        $reg = date('Y-m-d');
        $return_date = '';

        $this->form_validation->set_rules('select_class', 'Class', 'required');
        $this->form_validation->set_rules('select_student', 'Student', 'required');
        $this->form_validation->set_rules('select_sub', 'Sub', 'required');
        $this->form_validation->set_rules('idate', 'Issue-date', 'required');
        $this->form_validation->set_rules('ddate', 'Due-date', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'select_class' => $class,
                'select_student' => $student,
                'select_subject' => $select_sub,
                'issue_date' => $idate,
                'due_date' => $ddate,
                'return_date' => $return_date,
                'reg_date' => $reg
            );

            $data2 = array(
                'select_subject' => $select_sub
            );


            $result = $this->library_model->add_borrower($data1);
            $result = $this->library_model->update_borower_book($data2);
            $base = base_url();
            if ($result == true) {
                echo "<script>alert('Issued Successfully'); window.location.href='$base/index.php/library_controller/Library/issue_book'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/issue_book'</script>";
            }
        }
    }

    public function borrow_book() {
        $data = array(
            'main_content' => 'library/borrow_book',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
        $class = $this->input->post('select_class');
        $student = $this->input->post('select_student');
        $select_sub = $this->input->post('select_sub');
        $idate = $this->input->post('idate');
        $ddate = $this->input->post('ddate');
        $tdays = $this->input->post('tdays');
        $acc_no = $this->input->post('acc_no');
        $reg = date('Y-m-d');
        $return_date = '';

        $this->form_validation->set_rules('select_class', 'Class', 'required');
        $this->form_validation->set_rules('select_student', 'Student', 'required');
        $this->form_validation->set_rules('select_sub', 'Sub', 'required');
        $this->form_validation->set_rules('idate', 'Issue-date', 'required');
        $this->form_validation->set_rules('ddate', 'Due-date', 'required');
        $this->form_validation->set_rules('tdays', 'Total Days', 'required');
        $this->form_validation->set_rules('acc_no', 'acc_no', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'select_class' => $class,
                'select_student' => $student,
                'select_subject' => $select_sub,
                'issue_date' => $idate,
                'due_date' => $ddate,
                'total_days' => $tdays,
                'return_date' => $return_date,
                'reg_date' => $reg,
                'acc_no' => $acc_no
            );

            $data2 = array(
                'select_subject' => $select_sub
            );


            $result = $this->library_model->add_borrower($data1);
            $result = $this->library_model->update_borrower_book($select_sub);
            $base = base_url();
            if (!$result) {
                echo "<script>alert('Issued Successfully'); window.location.href='$base/index.php/library_controller/Library/isuue_borrow_book_list'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/isuue_borrow_book_list'</script>";
            }
        }
    }

    public function get_student_ajax($val) {
//echo $val;
        $result = $this->library_model->get_student_ajax($val);
        echo"<option value=''>SELECT</option>";
        foreach ($result as $row) {
            echo"<option value='$row->student_code'>$row->student_name</option>";
        }
    }

    public function get_classes($val) {
        $result = $this->library_model->get_classes($val);
    }

    public function get_book_days($from, $val) {
        $from1 = strtotime($from);
        $tos = strtotime($val);
        $date_diff = ($tos - strtotime($from)) / 86400;
        $dayss = round($date_diff, 0);
        echo "<input type='text' style='border:none!important;' name='tdays' id='tdays' value=$dayss>";
    }

    public function borrow_list() {
        $data = array(
            'main_content' => 'library/borrow_list',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function due_borrow_list() {
        $data = array(
            'main_content' => 'library/due_borrow_list',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function total_due() {
        $data = array(
            'main_content' => 'library/total_due',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function total_borrow_list() {
        $data = array(
            'main_content' => 'library/total_borrow_list',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function return_book() {
        $data = array(
            'main_content' => 'library/return_book',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function get_student_contents($val) {
        $result = $this->library_model->get_student_contents($val);
        echo "<option>Select</option>";
        foreach ($result as $row) {

            echo"<option value=" . "$row[$val]" . ">" . "$row[$val]" . "</option>";
        }
    }

    public function get_student_search($val) {
        $result = $this->library_model->get_student_search($val);
        echo "<option>Select</option>";
        foreach ($result as $row) {

            echo"<option value=" . "$row[$val]" . ">" . "$row[$val]" . "</option>";
        }
    }

    public function get_search_book_list($val, $boo_cat) {
        $result = $this->library_model->get_search_book_list($val, $boo_cat);

        echo "<table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
                <td><label>Book Title</label></td>
                <td><label>ISBN</label></td>
                <td><label>Author</label></td>
                <td><label>Total Copies</label></td>
                <td><label>Copies Available</label></td>
                <td><label>Location</label></td>
                <td><label>Accession No</label></td>                            
          </tr>
          </thead>
          <tbody>";
        foreach ($result as $row) {
            echo "<tr>
                <td>$row->title</td>
                <td>$row->isbn_no</td>
                <td>$row->author</td>             
                <td>$row->no_copies</td>";
            $lists = $this->library_model->copies_available($row->accession_no);
            foreach ($lists as $tot) {
                
            }
            echo "<td><a href='#'  style='text-align:center;color: white!important;cursor: pointer;background: #ff0000;padding: 1px 4px 1px 4px;border-radius: 4px;'>$tot->count</td>
                <td>$row->location</td>
                <td>$row->accession_no</td>
            </tr>";
        }
        echo "</tbody>
          </table>";
    }

    public function get_student_search_book_list($search_field, $val) {

        $result = $this->library_model->get_student_search_book_list($search_field, $val);

        echo "<table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>  
                <th>Class</th>
                <th>Student</th>
                <th>Subject</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Reg Date</th>                          
          </tr>
          </thead>
          <tbody>";
        foreach ($result as $row) {
            $lists = $this->library_model->select_class_borrow($row->select_class);
            foreach ($lists as $tot) {
                
            }
            $list = $this->library_model->select_subject_borrow($row->select_subject);
            foreach ($list as $to) {
                
            }
            $list = $this->library_model->select_student_borrow($row->select_student);
            foreach ($list as $t1) {
                
            }
            echo "<tr>
                
                <td>$tot->class</td>
                <td>$t1->student_name</td>
                <td>$to->title</td>
                <td>$row->issue_date</td>
                <td>$row->due_date</td> 
                <td>$row->reg_date</td>
            </tr>";
        }
        echo "</tbody>
          </table>";
    }

    /*     * ****************************************Return Book********************************************** */

    public function returning_book() {
        $data = array(
            'main_content' => 'library/returning_book',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function get_returning($first, $val) {
        $result = $this->library_model->get_returning($first, $val);
        echo "<style>.acopy
         {
        color: white!important;
        cursor: pointer;
        background: #ff0000;
        padding: 4px 7px 5px 7px;
        border-radius: 4px;
        }</style>";
        echo "<table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
                <th>Class</th>
                <th>Student</th>
                <th>Subject</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Days Remaining</th>
                <th>Due Fees</th>
                <th>Return Book</th>  
          </tr>
          </thead>
          <tbody>";
        $base = base_url();
        foreach ($result as $row) {
            $lists = $this->library_model->select_class_borrow($row->select_class);
            foreach ($lists as $tot) {
                
            }
            $list = $this->library_model->select_subject_borrow($row->select_subject);
            foreach ($list as $to) {
                
            }
            $list = $this->library_model->select_student_borrow($row->select_student);
            foreach ($list as $t1) {
                $tdate = date('d-m-Y');
                $due_date = $row->due_date;
                $from1 = strtotime($tdate);
                $tos = strtotime($due_date);
                $date_diff = ($tos - strtotime($tdate)) / 86400;
                $dayss = round($date_diff, 0);
                $i_date = DateTime::createFromFormat('Y-m-d', $row->issue_date)->format('d-m-Y');
                $d_date = DateTime::createFromFormat('Y-m-d', $row->due_date)->format('d-m-Y');
            }
            echo "<tr>
                <td>$tot->class</td>
                <td>$t1->student_name</td>
                <td>$to->title</td>
                <td>$i_date</td>
                <td>$d_date</td>";
            if ($dayss < 0) {
                echo "<td><a href='#' style='cursor:pointer' class='acopy'>$dayss Days Ago</a></td>";
            } else {
                echo "<td><a href='#' style='cursor:pointer' class='abcopy'>$dayss Days Left</a></td>";
            }
            if ($dayss <= 0) {
                $x = $dayss;
                $abs = $x * 10;
                $abs_v = abs($abs);
                echo "<td>$abs_v Rupees</td>";
            } else {
                echo "<td>0 Rupees</td>";
            }
            $zero = 0;
            if ($dayss >= 0) {
                echo "<td style='text-align: center'><a href='$base/index.php/library_controller/Library/return_update/$row->id/$row->select_subject/$zero' class='acopy' style='background: #143c5f!important;' >Return</a></td>    ";
            } else {
                echo "<td style='text-align: center'><a href='$base/index.php/library_controller/Library/return_update/$row->id/$row->select_subject/$abs_v' class='acopy' style='background: #143c5f!important;'>Return</a></td>    ";
            }
            echo "</tr>";
        }
        echo "</tbody>
          </table>";
    }

    public function return_update($id, $select_subject, $abs_v) {
        $user_data = $this->library_model->get_return_update($select_subject, $abs_v);

        $data = array(
            'user_data' => $user_data,
            'abs_vs' => $abs_v,
            'main_content' => 'library/return_update',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
        $id = $this->input->post('id');
        $class = $this->input->post('select_class');
        $student = $this->input->post('select_student');
        $select_sub = $this->input->post('select_subject');
        $idate = $this->input->post('issue_date');
        $ddate = $this->input->post('due_date');
        $tdays = $this->input->post('total_days');
        $reg = date('Y-m-d');
        $return_date = $this->input->post('rdate');
        $damount = $this->input->post('damount');

        $this->form_validation->set_rules('select_class', 'Class', 'required');
        $this->form_validation->set_rules('select_student', 'Student', 'required');
        $this->form_validation->set_rules('select_subject', 'Sub', 'required');
        $this->form_validation->set_rules('issue_date', 'Issue-date', 'required');
        $this->form_validation->set_rules('due_date', 'Due-date', 'required');
        $this->form_validation->set_rules('total_days', 'Total Days', 'required');
        $this->form_validation->set_rules('rdate', 'rdate', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'select_class' => $class,
                'select_student' => $student,
                'select_subject' => $select_sub,
                'issue_date' => $idate,
                'due_date' => $ddate,
                'total_days' => $tdays,
                'return_date' => $return_date,
                'reg_date' => $reg,
                'due_amt' => $damount
            );


            $result1 = $this->library_model->return_update($data1);
            $list = $this->library_model->due_challans();
            foreach ($list as $rowss) {
                
            }
            $idss = $rowss->id;
            $result = $this->library_model->update_return_update($select_sub, $return_date, $idate, $student);
            $base = base_url();
            if (!$result) {
                if ($damount > 0) {
                    echo "<script>alert('Due Challan'); window.location.href='$base/index.php/library_controller/Library/due_challan/$idss'</script>";
                } else {
                    echo "<script>alert('Book Returned'); window.location.href='$base/index.php/library_controller/Library/returning_book'</script>";
                }
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/returning_book'</script>";
            }
        }
    }

    public function isuue_borrow_book_list() {
        $data = array(
            'main_content' => 'library/isuue_borrow_book_list',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function total_returned() {
        $data = array(
            'main_content' => 'library/total_returned',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function returned_today() {
        $data = array(
            'main_content' => 'library/returned_today',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function due_dates() {
        $data = array(
            'main_content' => 'library/due_dates',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function get_all_due($val) {
        $result = $this->library_model->get_all_due($val);

        echo "<style>.acopy
         {
        color: white!important;
        cursor: pointer;
        background: #ff0000;
        padding: 4px 7px 5px 7px;
        border-radius: 4px;
        }</style>";
        echo "<table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
                <th>Class</th>
                <th>Student</th>
                <th>Subject</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Reg Date</th>  
                <th>Days Remaining</th>
                <th>Due Fees</th>
          </tr>
          </thead>
          <tbody>";
        $base = base_url();
        foreach ($result as $row) {
            $lists = $this->library_model->select_class_borrow($row->select_class);
            foreach ($lists as $tot) {
                
            }
            $list = $this->library_model->select_subject_borrow($row->select_subject);
            foreach ($list as $to) {
                
            }
            $list = $this->library_model->select_student_borrow($row->select_student);
            foreach ($list as $t1) {
                $tdate = date('d-m-Y');
                $due_date = $row->due_date;
                $from1 = strtotime($tdate);
                $tos = strtotime($due_date);
                $date_diff = ($tos - strtotime($tdate)) / 86400;
                $dayss = round($date_diff, 0);
            }
            echo "<tr>
                
                <td>$tot->class</td>
                <td>$t1->student_name</td>
                <td>$to->title</td>
                <td>$row->issue_date</td>
                <td>$row->due_date</td> 
                <td>$row->reg_date</td>";
            if ($dayss < 0) {
                echo "<td><a href='#' style='cursor:pointer' class='acopy'>$dayss Days Ago</a></td>";
            } else {
                echo "<td><a href='#' style='cursor:pointer' class='acopy'>$dayss Days Left</a></td>";
            }

            if ($dayss <= 0) {

                $x = $dayss;


                $abs = $x * 10;
                $abs_v = abs($abs);
                echo "<td><a href='#'class='abcopy' style='text-align:center'>$abs_v Rupees</a></td>";
            } else {
                echo "<td><a href='#'class='acopy'>0 Rupees</a></td>";
            }

            echo "</tr>";
        }
        echo "</tbody>
          </table>";
    }

    public function due_challan($id) {
        $user_data = $this->library_model->due_challanns($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'library/due_challan',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function get_due_report($from, $to) {
        $result = $this->library_model->get_due_report($from, $to);
        echo "<style>.acopy
         {
        color: white!important;
        cursor: pointer;
        background: #ff0000;
        padding: 4px 7px 5px 7px;
        border-radius: 4px;
        }</style>";
        echo "<h4>Dues Report From : $from - $to</h4>
            <table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
                <th>Class</th>
                <th>Student</th>
                <th>Subject</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Reg Date</th>
                <th>Days Remaining</th>
                <th>Due Fees</th>
          </tr>
          </thead>
          <tbody>";
        $base = base_url();
        foreach ($result as $row) {
            $lists = $this->library_model->select_class_borrow($row->select_class);
            foreach ($lists as $tot) {
                
            }
            $list = $this->library_model->select_subject_borrow($row->select_subject);
            foreach ($list as $to) {
                
            }
            $list = $this->library_model->select_student_borrow($row->select_student);
            foreach ($list as $t1) {
                $tdate = date('d-m-Y');
                $due_date = $row->due_date;
                $from1 = strtotime($tdate);
                $tos = strtotime($due_date);
                $date_diff = ($tos - strtotime($tdate)) / 86400;
                $dayss = round($date_diff, 0);
            }
            echo "<tr>
                <td>$tot->class</td>
                <td>$t1->student_name</td>
                <td>$to->title</td>
                <td>$row->issue_date</td>
                <td>$row->due_date</td>
                <td>$row->reg_date</td>";
            if ($dayss < 0) {
                echo "<td><a href='#' style='cursor:pointer' class='acopy'>$dayss Days Ago</a></td>";
            } else {
                echo "<td><a href='#' style='cursor:pointer' class='acopy'>$dayss Days Left</a></td>";
            }

            if ($dayss <= 0) {

                $x = $dayss;


                $abs = $x * 10;
                $abs_v = abs($abs);
                echo "<td><a href='#' class = 'abcopy'>$abs_v Rupees</a></td>";
            } else {
                echo "<td><a href='#' class = 'abcopy'>0 Rupees</a></td>";
            }

            echo "</tr>";
        }
        echo "</tbody>
          </table>";
    }

    public function get_book_datewise_report($from, $to) {
        $result = $this->library_model->get_book_datewise_report($from, $to);
        if ($result == true) {

            echo "<label>Book Date Wise Report From $from To $to </label><table id='example2' class='table table-bordered table-hover'>
                
          <thead>
          
          <tr>
                
                <td><label>Book Title</label></td>
                <td><label>ISBN</label></td>
                <td><label>Author</label></td>
                <td><label>Total Copies</label></td>
                <td><label>Copies Available</label></td>
                <td><label>Location</label></td>
                <td><label>Accession No</label></td>  
                <td><label>Reg-Date</label></td>    
          </tr>
          </thead>
          <tbody>";
            foreach ($result as $row) {
                echo "<tr>
                <td>$row->title</td>
                <td>$row->isbn_no</td>
                <td>$row->author</td>             
                <td>$row->no_copies</td>";
                $lists = $this->library_model->copies_available($row->accession_no);
                foreach ($lists as $tot) {
                    
                }
                echo "<td><a href='#'  style='text-align:center;color: white!important;cursor: pointer;background: #ff0000;padding: 1px 4px 1px 4px;border-radius: 4px;'>$tot->count</td>
                <td>$row->location</td>
                <td>$row->accession_no</td>
                <td>$row->reg_date</td>
            </tr>";
            }
            echo "</tbody>
          </table>";
        }
    }

    public function view_book_details() {
        $data = array(
            'main_content' => 'library/view_book_details',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function get_book_by_name($val) {
        $result = $this->library_model->get_book_by_name($val);

        echo "<table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
                <td><label>Book Title</label></td>
                <td><label>ISBN</label></td>
                <td><label>Author</label></td>
                <td><label>Total Copies</label></td>
                <td><label>Copies Available</label></td>
                <td><label>Location</label></td>
                <td><label>Accession No</label></td> 
                <td><label>View Details</label></td>
          </tr>
          </thead>
          <tbody>";
        foreach ($result as $row) {
            echo "<tr>
                <td>$row->title</td>
                <td>$row->isbn_no</td>
                <td>$row->author</td>             
                <td>$row->no_copies</td>";
            $lists = $this->library_model->copies_available($row->accession_no);
            foreach ($lists as $tot) {
                
            }
            $base = base_url();
            echo "<td><a href='#'  style='text-align:center;color: white!important;cursor: pointer;background: #ff0000;padding: 1px 4px 1px 4px;border-radius: 4px;'>$tot->count</td>
                <td>$row->location</td>
                <td>$row->accession_no</td>
                <td><a href='$base/index.php/library_controller/Library/Complete_book_details/$row->accession_no' class='abcopy'style='background: #143c5f!important'>View More</a></td>
            </tr>";
        }
        echo "</tbody>
          </table>";
    }

    public function get_renewal($class, $student_name) {
        $result = $this->library_model->get_renewal($class, $student_name);


        echo "<style>.acopy
         {
        color: white!important;
        cursor: pointer;
        background: #ff0000;
        padding: 4px 7px 5px 7px;
        border-radius: 4px;
        }</style>";
        echo "<form>
            <table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
                <th>Class</th>
                <th>Student</th>
                <th>Subject</th>
                <th>Issue Date</th>
                <th>Due Date</th>
                <th>Total Date</th>
                <th>Reg Date</th>  
                <th>Renewal Date</th>
                <th>Action</th>
          </tr>
          </thead>
          <tbody>";
        $base = base_url();
        foreach ($result as $row) {
            $lists = $this->library_model->select_class_borrow($row->select_class);
            foreach ($lists as $tot) {
                
            }
            $list = $this->library_model->select_subject_borrow($row->select_subject);
            foreach ($list as $to) {
                
            }
            $list = $this->library_model->select_student_borrow($row->select_student);
            foreach ($list as $t1) {
                $tdate = date('d-m-Y');
                $due_date = $row->due_date;
                $from1 = strtotime($tdate);
                $tos = strtotime($due_date);
                $date_diff = ($tos - strtotime($tdate)) / 86400;
                $dayss = round($date_diff, 0);
                $i_date = DateTime::createFromFormat('Y-m-d', $row->issue_date)->format('d-m-Y');
                $d_date = DateTime::createFromFormat('Y-m-d', $row->due_date)->format('d-m-Y');
                $r_date = DateTime::createFromFormat('Y-m-d', $row->reg_date)->format('d-m-Y');
            }

            echo "<tr>
                
                
                <td>$tot->class</td>
                <td>$t1->student_name</td>
                <td>$to->title</td>
                <td>$i_date</td>
                <td>$d_date</td> 
                <td>$row->total_days</td>
                <td>$r_date</td>
                <td><input type='text' name='renew_date' class='datepicker' id=' ' class='form-control'></td>
                <td><input type='submit' class='btn btn-block btn-warning btn-flat' value='Save'></td>";


            echo "</tr>";
        }
        echo "</tbody>
          </table>
            </form>";
    }

    public function renewal_books() {
        $data = array(
            'main_content' => 'library/renewal_books',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function renewal_book_get_data() {
        $select_class = $this->input->post('select_class');
        $select_student = $this->input->post('select_student');
        $user_data = $this->library_model->get_renewal($select_class, $select_student);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'library/renewal_book_get_data',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function renewal_extend_books() {

        $id = $this->input->post('id');
        $class_name = $this->input->post('class_name');
        $student_name = $this->input->post('student_name');
        $title = $this->input->post('title');
        $issue_date = $this->input->post('issue_date');
        $due_date = $this->input->post('due_date');
        $total_days = $this->input->post('total_days');
        $reg_date = $this->input->post('reg_date');
        $renew_date = $this->input->post('renew_date1');
        $new_day = $this->input->post('new_day1');

        $this->form_validation->set_rules('class_name', 'class_name', 'required');
        $this->form_validation->set_rules('student_name', 'student_name', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('issue_date', 'issue_date', 'required');
        $this->form_validation->set_rules('due_date', 'due_date', 'required');
        $this->form_validation->set_rules('total_days', 'total_days', 'required');
        $this->form_validation->set_rules('reg_date', 'reg_date', 'required');
        $this->form_validation->set_rules('renew_date1', 'renew_date', 'required');
        $this->form_validation->set_rules('new_day1', 'new_day', 'required');
        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'select_class' => $class_name,
                'select_student' => $student_name,
                'select_subject' => $title,
                'issue_date' => $issue_date,
                'due_date' => $due_date,
                'total_days' => $total_days,
                'reg_date' => $reg_date,
                'renewal_date' => $renew_date,
                'new_days' => $new_day
            );


            $result = $this->library_model->lib_renewal_history($data1);
            $result = $this->library_model->lib_renewal_history_update($id, $new_day, $renew_date);
            $base = base_url();
            if (!$result) {
                echo "<script>alert('Book Renewed Successfully'); window.location.href='$base/index.php/library_controller/Library/renewal_books'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/renewal_books'</script>";
            }
        }
    }

    public function get_days($from, $to) {
        $from1 = strtotime($from);
        $tos = strtotime($to);
        $date_diff = ($tos - strtotime($from)) / 86400;
        $dayss = round($date_diff, 0);

        echo "<option value='$dayss'>$dayss</option";
    }

    public function get_date($val) {
        echo "<option value='$val'>$val</option>";
    }

    public function get_classess($val) {
        $result = $this->library_model->class_history($val);

        echo "<style>.acopy
         {
        color: white!important;
        cursor: pointer;
        background: #ff0000;
        padding: 4px 7px 5px 7px;
        border-radius: 4px;
        }</style>";
        echo "<table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
		<th>Sr. No.</th>
		<th>Name</th>
		<th>Acc No</th>
		<th>Title</th>
		<th>Author</th>
		<th>Iss Date</th>
		<th>Due Date</th>
		<th>Return On</th>
                <th>Days / Status</th>
	   </tr>
          </thead>
          <tbody>";
        $base = base_url();
        $i = 1;
        foreach ($result as $row) {
            $tdate = date('d-m-Y');
            $due_date = $row->due_date;
            $from1 = strtotime($tdate);
            $tos = strtotime($due_date);
            $date_diff = ($tos - strtotime($tdate)) / 86400;
            $dayss = round($date_diff, 0);
            echo "<tr>
                <td>$i</td>";
            $li = $this->library_model->select_student_borrow($row->select_student);
            foreach ($li as $r2)
                echo "<td>$r2->student_name</td>";
            $lis = $this->library_model->select_subject_borrow($row->select_subject);
            foreach ($lis as $r3)
                echo "<td>$r3->accession_no</td>        
                      <td>$r3->title</td> 
                      <td>$r3->author</td>     
                      <td>$row->issue_date</td>        
                      <td>$row->due_date</td> 
                      <td>$row->return_date</td>";
            if ($dayss < 0) {
                if ($row->return_date != '') {
                    echo "<td><a href='#' style='background: #143c5f!important' class='acopy'>Book Returned</a></td>";
                } else {
                    echo "<td><a href='#' class='acopy'>$dayss Days Ago</a></td>";
                }
            } else {

                if ($row->return_date != '') {
                    echo "<td><a href='#' style='background: #143c5f!important' class='acopy'>Book Returned</a></td>";
                } else {
                    echo "<td><a href='#' class='abcopy'>$dayss Days Left</a></td>";
                }
            }


            echo "</tr>";
            $i = $i + 1;
        }
        echo "</tbody>
          </table>";
    }

    public function class_history() {
        $data = array(
            'main_content' => 'library/class_history',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function stock_verification() {
        $data = array(
            'main_content' => 'library/stock_verification',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function due_list_report() {
        $data = array(
            'main_content' => 'library/due_list_report',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function due_list_report_class($val) {
        $result = $this->library_model->due_list_report_class($val);

        echo "<style>.acopy
         {
        color: white!important;
        cursor: pointer;
        background: #ff0000;
        padding: 4px 7px 5px 7px;
        border-radius: 4px;
        }</style>";
        echo "<table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
		<th>Sr. No.</th>
		<th>Name</th>
		<th>Acc No</th>
		<th>Title</th>
		<th>Author</th>
		<th>Iss Date</th>
		<th>Due Date</th>
		<th>Return On</th>
                <th>Days</th>
	   </tr>
          </thead>
          <tbody>";
        $base = base_url();
        $i = 1;
        foreach ($result as $row) {
            $tdate = date('d-m-Y');
            $due_date = $row->due_date;
            $from1 = strtotime($tdate);
            $tos = strtotime($due_date);
            $date_diff = ($tos - strtotime($tdate)) / 86400;
            $dayss = round($date_diff, 0);
            echo "<tr>
                <td>$i</td>";
            $li = $this->library_model->select_student_borrow($row->select_student);
            foreach ($li as $r2)
                echo "<td>$r2->student_name</td>";
            $lis = $this->library_model->select_subject_borrow($row->select_subject);
            foreach ($lis as $r3)
                echo "<td>$r3->accession_no</td>        
                      <td>$r3->title</td> 
                      <td>$r3->author</td>     
                      <td>$row->issue_date</td>        
                      <td>$row->due_date</td> 
                      <td>$row->return_date</td>";

            if ($dayss < 0) {

                echo "<td><a href='#' class='acopy'>$dayss Days Ago</a></td>";
            } else {

                echo "<td><a href='#'  class='abcopy'>$dayss Days Left</a></td>";
            }


            echo "</tr>";
            $i = $i + 1;
        }
        echo "</tbody>
          </table>";
    }

    public function Complete_book_details($acsn) {
        $user_data = $this->library_model->Complete_book_details($acsn);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'library/Complete_book_details',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function get_acsn_no($id) {
        $result = $this->library_model->get_acsn_no($id);
        foreach ($result as $row) {
            echo "<option value='$row->accession_no'>$row->accession_no</option>";
        }
    }

    public function renewal_report() {
        $data = array(
            'main_content' => 'library/renewal_report',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function get_renewal_by_name($val) {
        $result = $this->library_model->get_renewal_by_name($val);
        echo "<table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
		<th>Sr. No.</th>
		<th>Class</th>
		<th>Student</th>
		<th>Subject</th>
		<th>Iss Date</th>
		<th>Old Due Date</th>
		<th>Renewal Due Date</th>
                <th>Return Date</th>
	   </tr>
          </thead>
          <tbody>";
        $i = 1;
        foreach ($result as $row) {
            $li = $this->library_model->select_student_borrow($row->select_student);
            foreach ($li as $r2)
                $lis = $this->library_model->select_subject_borrow($row->select_subject);
            foreach ($lis as $r3)
                $lists = $this->library_model->select_class_borrow($row->select_class);
            foreach ($lists as $tot)
                echo "<tr>
                <td>$i</td> 
                <td>$tot->class</td>
                <td>$r2->student_name</td>    
                <td>$r3->author</td>        
                <td>$row->issue_date</td> 
                <td>$row->due_date</td>
                <td>$row->renewal_date</td>";
            if ($row->return_date != '') {
                echo"<td><a href='' class='abcopy'>$row->return_date</a></td>";
            } else {
                echo"<td><a href='' class='acopy'>Not Returned</a></td>";
            }

            echo "</tr>";
        }
        $i = $i + 1;

        echo "</tbody>";

        echo "</table>";
        if ($row->return_date != '') {
            echo"<label class='abcopy' style='width: 100%;text-align: center;font-size: 16px;'>Current Status Book Returned</label>";
        } else {
            echo"<label class='acopy' style='width: 100%;text-align: center;font-size: 16px;'>Current Status Not Returned</label>";
        }
    }

    public function timetable() {
        $data = array(
            'main_content' => 'library/timetable',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
        $classess = $this->input->post('classs');
        $year = $this->input->post('s_year');
        $a0 = $this->input->post('a0');
        $a1 = $this->input->post('a1');
        $a2 = $this->input->post('a2');
        $a3 = $this->input->post('a3');
        $a4 = $this->input->post('a4');
        $a5 = $this->input->post('a5');
        $a6 = $this->input->post('a6');
        $b0 = $this->input->post('b0');
        $b1 = $this->input->post('b1');
        $b2 = $this->input->post('b2');
        $b3 = $this->input->post('b3');
        $b4 = $this->input->post('b4');
        $b5 = $this->input->post('b5');
        $b6 = $this->input->post('b6');
        $c0 = $this->input->post('c0');
        $c1 = $this->input->post('c1');
        $c2 = $this->input->post('c2');
        $c3 = $this->input->post('c3');
        $c4 = $this->input->post('c4');
        $c5 = $this->input->post('c5');
        $c6 = $this->input->post('c6');

        $d0 = $this->input->post('d0');
        $d1 = $this->input->post('d1');
        $d2 = $this->input->post('d2');
        $d3 = $this->input->post('d3');
        $d4 = $this->input->post('d4');
        $d5 = $this->input->post('d5');
        $d6 = $this->input->post('d6');
        $e0 = $this->input->post('e0');
        $e1 = $this->input->post('e1');
        $e2 = $this->input->post('e2');
        $e3 = $this->input->post('e3');
        $e4 = $this->input->post('e4');
        $e5 = $this->input->post('e5');
        $e6 = $this->input->post('e6');
        $f0 = $this->input->post('f0');
        $f1 = $this->input->post('f1');
        $f2 = $this->input->post('f2');
        $f3 = $this->input->post('f3');
        $f4 = $this->input->post('f4');
        $f5 = $this->input->post('f5');
        $f6 = $this->input->post('f6');

        $this->form_validation->set_rules('classs', 'classs', 'required');
        $this->form_validation->set_rules('s_year', 's_year', 'required');
        $this->form_validation->set_rules('a0', 'a0', 'required');
        $this->form_validation->set_rules('a1', 'a1', 'required');
        $this->form_validation->set_rules('a2', 'a2', 'required');
        $this->form_validation->set_rules('a3', 'a3', 'required');
        $this->form_validation->set_rules('a4', 'a4', 'required');
        $this->form_validation->set_rules('a5', 'a5', 'required');
        $this->form_validation->set_rules('a6', 'a6', 'required');
        $this->form_validation->set_rules('b0', 'b0', 'required');
        $this->form_validation->set_rules('b1', 'b1', 'required');
        $this->form_validation->set_rules('b2', 'b2', 'required');
        $this->form_validation->set_rules('b3', 'b3', 'required');
        $this->form_validation->set_rules('b4', 'b4', 'required');
        $this->form_validation->set_rules('b5', 'b5', 'required');
        $this->form_validation->set_rules('b6', 'b6', 'required');
        $this->form_validation->set_rules('c0', 'c0', 'required');
        $this->form_validation->set_rules('c1', 'c1', 'required');
        $this->form_validation->set_rules('c2', 'c2', 'required');
        $this->form_validation->set_rules('c3', 'c3', 'required');
        $this->form_validation->set_rules('c4', 'c4', 'required');
        $this->form_validation->set_rules('c5', 'c5', 'required');
        $this->form_validation->set_rules('c6', 'c6', 'required');

        $this->form_validation->set_rules('d0', 'd0', 'required');
        $this->form_validation->set_rules('d1', 'd1', 'required');
        $this->form_validation->set_rules('d2', 'd2', 'required');
        $this->form_validation->set_rules('d3', 'd3', 'required');
        $this->form_validation->set_rules('d4', 'd4', 'required');
        $this->form_validation->set_rules('d5', 'd5', 'required');
        $this->form_validation->set_rules('d6', 'd6', 'required');
        $this->form_validation->set_rules('e0', 'e0', 'required');
        $this->form_validation->set_rules('e1', 'e1', 'required');
        $this->form_validation->set_rules('e2', 'e2', 'required');
        $this->form_validation->set_rules('e3', 'e3', 'required');
        $this->form_validation->set_rules('e4', 'e4', 'required');
        $this->form_validation->set_rules('e5', 'e5', 'required');
        $this->form_validation->set_rules('e6', 'e6', 'required');
        $this->form_validation->set_rules('f0', 'f0', 'required');
        $this->form_validation->set_rules('f1', 'f1', 'required');
        $this->form_validation->set_rules('f2', 'f2', 'required');
        $this->form_validation->set_rules('f3', 'f3', 'required');
        $this->form_validation->set_rules('f4', 'f4', 'required');
        $this->form_validation->set_rules('f5', 'f5', 'required');
        $this->form_validation->set_rules('f6', 'f6', 'required');

        if ($this->form_validation->run() == TRUE) {

            $data1 = array(
                'class' => $classess,
                'year' => $year,
                'a0' => $a0,
                'a1' => $a1,
                'a2' => $a2,
                'a3' => $a3,
                'a4' => $a4,
                'a5' => $a5,
                'a6' => $a6,
                'b0' => $b0,
                'b1' => $b1,
                'b2' => $b2,
                'b3' => $b3,
                'b4' => $b4,
                'b5' => $b5,
                'b6' => $b6,
                'c0' => $c0,
                'c1' => $c1,
                'c2' => $c2,
                'c3' => $c3,
                'c4' => $c4,
                'c5' => $c5,
                'c6' => $c6,
                'd0' => $d0,
                'd1' => $d1,
                'd2' => $d2,
                'd3' => $d3,
                'd4' => $d4,
                'd5' => $d5,
                'd6' => $d6,
                'e0' => $e0,
                'e1' => $e1,
                'e2' => $e2,
                'e3' => $e3,
                'e4' => $e4,
                'e5' => $e5,
                'e6' => $e6,
                'f0' => $f0,
                'f1' => $f1,
                'f2' => $f2,
                'f3' => $f3,
                'f4' => $f4,
                'f5' => $f5,
                'f6' => $f6
            );

            $result = $this->library_model->timtable_insert($data1);
            $base = base_url();
            $siteurl = site_url();
            if ($result == true) {
                echo "<script>alert('Time Table Added Successfully'); window.location.href='$base/index.php/library_controller/Library/timetable'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/timetable'</script>";
            }
        }
    }

    public function get_year_time_table($val) {
        $result = $this->library_model->get_year_time_table($val);
        echo "<option>Select</option>";
        foreach ($result as $row) {

            echo "<option value='$row->year'>$row->year</option>";
        }
    }

    public function get_timetable($class, $year) {
        $result = $this->library_model->get_timetable($class, $year);
        echo "<table id='example2' class='table table-bordered table-hover'>
          <thead>
          <tr>
		<th>Timing</th>
		<th>Monday</th>
		<th>Tuesday</th>
		<th>Wednesday</th>
		<th>Thursday</th>
		<th>Friday</th>
		<th>Saturday</th>
	   </tr>
          </thead>
          <tbody>";
        foreach ($result as $row) {
            echo "<tr>
		<td><input type='text' value = '$row->a0' readonly style='border:none'></td>
		<td><input type='text' value = '$row->a1' readonly style='border:none'></td>
		<td><input type='text' value = '$row->a2' readonly style='border:none'></td>
		<td><input type='text' value = '$row->a3' readonly style='border:none'></td>
		<td><input type='text' value = '$row->a4' readonly style='border:none'></td>
		<td><input type='text' value = '$row->a5' readonly style='border:none'></td>
		<td><input type='text' value = '$row->a6' readonly style='border:none'></td>
	   </tr>
           <tr>
		<td><input type='text' value = '$row->b0' readonly style='border:none'></td>
		<td><input type='text' value = '$row->b1' readonly style='border:none'></td>
		<td><input type='text' value = '$row->b2' readonly style='border:none'></td>
		<td><input type='text' value = '$row->b3' readonly style='border:none'></td>
		<td><input type='text' value = '$row->b4' readonly style='border:none'></td>
		<td><input type='text' value = '$row->b5' readonly style='border:none'></td>
		<td><input type='text' value = '$row->b6' readonly style='border:none'></td>
	   </tr>
           <tr>
		<td><input type='text' value = '$row->c0' readonly style='border:none'></td>
		<td><input type='text' value = '$row->c1' readonly style='border:none'></td>
		<td><input type='text' value = '$row->c2' readonly style='border:none'></td>
		<td><input type='text' value = '$row->c3' readonly style='border:none'></td>
		<td><input type='text' value = '$row->c4' readonly style='border:none'></td>
		<td><input type='text' value = '$row->c5' readonly style='border:none'></td>
		<td><input type='text' value = '$row->c6' readonly style='border:none'></td>
	   </tr>
           <tr>
		<td><input type='text' value = '$row->d0' readonly style='border:none'></td>
		<td><input type='text' value = '$row->d1' readonly style='border:none'></td>
		<td><input type='text' value = '$row->d2' readonly style='border:none'></td>
		<td><input type='text' value = '$row->d3' readonly style='border:none'></td>
		<td><input type='text' value = '$row->d4' readonly style='border:none'></td>
		<td><input type='text' value = '$row->d5' readonly style='border:none'></td>
		<td><input type='text' value = '$row->d6' readonly style='border:none'></td>
	   </tr>
           <tr>
		<td><input type='text' value = '$row->e0' readonly style='border:none'></td>
		<td><input type='text' value = '$row->e1' readonly style='border:none'></td>
		<td><input type='text' value = '$row->e2' readonly style='border:none'></td>
		<td><input type='text' value = '$row->e3' readonly style='border:none'></td>
		<td><input type='text' value = '$row->e4' readonly style='border:none'></td>
		<td><input type='text' value = '$row->e5' readonly style='border:none'></td>
		<td><input type='text' value = '$row->e6' readonly style='border:none'></td>
	   </tr>
           <tr>
		<td><input type='text' value = '$row->f0' readonly style='border:none'></td>
		<td><input type='text' value = '$row->f1' readonly style='border:none'></td>
		<td><input type='text' value = '$row->f2' readonly style='border:none'></td>
		<td><input type='text' value = '$row->f3' readonly style='border:none'></td>
		<td><input type='text' value = '$row->f4' readonly style='border:none'></td>
		<td><input type='text' value = '$row->f5' readonly style='border:none'></td>
		<td><input type='text' value = '$row->f6' readonly style='border:none'></td>
	   </tr>
          </tbody>";
        }
        echo "<table>";
    }

    public function fixedep() {
        $data = array(
            'main_content' => 'library/fixedep',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    function get_maturity_value($amt, $period, $percent, $frequency) {
        $percentage = $percent / 100;
        $temp = (1 + $percentage / $frequency);
        $res3 = $amt * pow($temp, ($frequency * $period));
        $results = round($res3);
        echo "<option value='$results.00'>$results.00</option>";
    }

    function get_interest($amt, $period, $percent, $frequency) {
        $percentage = $percent / 100;
        $temp = (1 + $percentage / $frequency);
        $res3 = $amt * pow($temp, ($frequency * $period));

        $diff = $res3 - $amt;
        $results = round($diff);
        echo "<option value='$results.00'>$results.00</option>";
    }

    public function edit_author($id) {
        $user_data = $this->library_model->edit_author($id);
        $data = array(
            'user_data' => $user_data,
            'main_content' => 'library/edit_author',
            'setting' => $this->admin_model->setting(),
        );

        $this->load->view('template', $data);
    }

    public function edit_authors() {
        $id = $this->input->post('id');
        $author = $this->input->post('author');

        $this->form_validation->set_rules('author', 'author', 'required');
        if ($this->form_validation->run() == TRUE) {

            $result = $this->library_model->edit_authors_update($id, $author);

            $base = base_url();
            if (!$result) {
                echo "<script>alert('Author Updated Successfully'); window.location.href='$base/index.php/library_controller/Library/view_author'</script>";
            } else {
                echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/view_author'</script>";
            }
        }
    }

    public function delete_author($id) {
        $delete_data = $this->library_model->delete_author($id);
        $base = base_url();
        if (!$result) {
            echo "<script>alert('Author Deleted Successfully'); window.location.href='$base/index.php/library_controller/Library/view_author'</script>";
        } else {
            echo "<script>alert('Failed'); window.location.href='$base/index.php/library_controller/Library/view_author'</script>";
        }
    }

    public function manage_book() {
        $data = array(
            'main_content' => 'library/manage_book',
            'setting' => $this->admin_model->setting(),
        );
        $this->load->view('template', $data);
    }

    public function manage_books($val) {
        $list = $this->library_model->manage_books($val);
        echo "<table  class='table table-bordered table-hover'>
                <thead>
                    <tr>
                        <th>SI.No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Supplier</th>
                        <th>Copies</th>
                        <th>Copies-Remaining</th>
                    </tr>
                </thead>
                <tbody>";

        $i = 1;
        foreach ($list as $row) {

            echo "<tr>
                            <td> $i </td>
                            <td> $row->title </td>
                            <td> $row->author </td>
                            <td> $row->supplier</td>
                            <th> $row->no_copies</th>";

            $list1 = $this->library_model->copies_available($row->accession_no);
            foreach ($list1 as $tot) {
                
            }

            echo "<td style=''><a href='#' class='acopy'>$tot->count</a></td>
                           
                        </tr>";

            $i = $i + 1;
        }

        echo "</tbody>
            </table>";
    }

}
