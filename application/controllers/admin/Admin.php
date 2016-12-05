<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index() {
        if ($this->session->userdata('islogged') == 'yes'):
            redirect('admin/admin/home', $data);
        else:
            redirect('admin/admin/commonLogin', $data);
        endif;
    }

    function commonLogin() {
        $data['title'] = 'Rahnuma | Admin Login Panel';
        $data['baseurl'] = $this->config->item('base_url');
        $this->load->view('admin/login', $data);
    }

    ###Login Section#

    public function login() {
        $data['baseurl'] = $this->config->item('base_url');
        if (isset($_POST['email']) && isset($_POST['password'])):
            $email = $_POST['email'];
            $password = $_POST['password'];
            $resultlogin = $this->db->query("select email, password from user where email = '$email' AND password = '$password'");
            if ($resultlogin->num_rows() > 0):
                $data['title'] = "Admin| Dashboard";
                $this->session->set_userdata('islogged', 'yes');
                $this->session->set_userdata('user_name', $email);
                redirect('admin/admin/home', $data);
            else:
                $this->session->set_userdata('failed', "Login Failed. Checked username or password");
                redirect('admin/admin/commonLogin');
            endif;
        else:
            $this->session->set_userdata('failed', "Login Failed. Checked Blank field");
            redirect('admin/admin/commonLogin');
        endif;
    }

    ###Dashboard Section

    public function home() {
        $data['baseurl'] = $this->config->item('base_url');
        $data['title'] = 'Dashboard';
        $data['settingdata'] = $this->db->query("select * from setting_tbl where id = 1")->row();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu', $data);
        $this->load->view('admin/home', $data);
        $this->load->view('admin/footer', $data);
    }

    public function updatesetting() {
        $logoimage = $_FILES['userfile1']['name'];
        $favicon = $_FILES['userfile2']['name'];
        $config['upload_path'] = "assets/uploads/";
        $config['allowed_types'] = "gif|jpg|jpeg|png|pdf|docx|doc|ppt|pptx|xls";
        $config['overwrite'] = TRUE;
        $config['max_size'] = "5000";
        $config['max_width'] = "6000";
        $config['max_height'] = "4000";
        $config['file_name'] = $_FILES['userfile1']['name'];
        $config['file_name'] = $_FILES['userfile2']['name'];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_userdata("failed", "Image Upload Failed");
            redirect('admin/admin/home');
        } else {
            $upload_data = array(
                'site_title' => $this->input->post('site_title'),
                'keyword' => $this->input->post('keyword'),
                'copy_right' => $this->input->post('copy_right'),
                'company_email' => $this->input->post('company_email'),
                'logo_image' => $logoimage,
                'fave_icon' => $favicon,
                'date' => date('Y-m-d')
            );
            $this->db->where('id', 1);
            $updateInfo = $this->db->update('setting_tbl', $upload_data);
            if ($updateInfo == TRUE):
                $this->session->set_userdata("successfull", " Image Upload successfully");
                redirect('admin/admin/home');
            else :
                $this->session->set_userdata('failed', ' Image Upload Failed');
                redirect('admin/admin/home');
            endif;
        }
    }

    public function updatesetting2() {
        $quicklink = $this->input->post('quick_link');
        $gettingtouch = $this->input->post('getting_touch');
        $companydescription = $this->input->post('company_description');
        $settingData = array(
            'quick_link' => $quicklink,
            'getting_touch' => $gettingtouch,
            'company_description' => $companydescription,
            'date' => date('Y-m-d')
        );
        $this->db->where('id', 1);
        $updateMenuInfo = $this->db->update('setting_tbl', $settingData);
        if ($updateMenuInfo == TRUE):
            $this->session->set_userdata('successfull', ' Setting Add Successfully');
            redirect('admin/admin/home');
        else :
            $this->session->set_userdata('failed', ' Setting Add Failed');
            redirect('admin/admin/home');
        endif;
    }

    ###Page Menu Section

    public function createpages($id = '') {
        $data['baseurl'] = $this->config->item('base_url');
        $data['title'] = 'Create Page';
        $data['pageaction'] = '';
        if ($id != ''):
            $data['pagedata'] = $this->db->query("select * from page_tbl where id = $id")->row();
            $data['pageaction'] = 'editpage';
        endif;
        $data['pageinfo'] = $this->db->query("select * from page_tbl")->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu', $data);
        $this->load->view('admin/createpages', $data);
        $this->load->view('admin/footer', $data);
    }

    public function savepages() {
        $pagename = $this->input->post('pagename');
        $pagedescription = $this->input->post('pagedescription');
        $pageData = array(
            'pagename' => $pagename,
            'pagedescription' => $pagedescription,
            'date' => date('Y-m-d')
        );
        $savePageInfo = $this->db->insert('page_tbl', $pageData); ###tablename, tabledata###
        if ($savePageInfo == TRUE):
            $this->session->set_userdata('successfull', ' Page Add Successfully');
            redirect('admin/admin/createpages');
        else :
            $this->session->set_userdata('failed', ' Page Add Failed');
            redirect('admin/admin/createpages');
        endif;
    }

    public function updatecreatepage() {
        $id = $this->input->post('id');
        $pagename = $this->input->post('pagename');
        $pagedescription = $this->input->post('pagedescription');
        $pageData = array(
            'pagename' => $pagename,
            'pagedescription' => $pagedescription,
            'date' => date('Y-m-d')
        );
        $this->db->where('id', $id);
        $updateMenuInfo = $this->db->update('page_tbl', $pageData);
        if ($updateMenuInfo == TRUE):
            $this->session->set_userdata('successfull', ' Page Add Successfully');
            redirect('admin/admin/createpages');
        else :
            $this->session->set_userdata('failed', ' Page Add Failed');
            redirect('admin/admin/createpages');
        endif;
    }

    public function deletepage($id) {
        $this->db->where('id', $id);
        $delete = $this->db->delete('page_tbl');
        if ($delete):
            $this->session->set_userdata("successfull", " Page Delete successfully");
            redirect('admin/admin/createpages');
        endif;
    }

    ###Slide Upload Section

    public function slideupload() {
        $data['title'] = 'Sliders';
        $data['baseurl'] = $this->config->item('base_url');
        $slideQry = $this->db->query("select * from slider_tbl;");
        $data['slidinglist'] = $slideQry->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu', $data);
        $this->load->view('admin/slideupload', $data);
        $this->load->view('admin/footer', $data);
    }

    public function uoloadsliding() {
        $picturename = $_FILES['userfile']['name'];
        $config['upload_path'] = "assets/uploads/";
        $config['allowed_types'] = "gif|jpg|jpeg|png|pdf|docx|doc|ppt|pptx|xls";
        $config['overwrite'] = TRUE;
        $config['max_size'] = "5000";
        $config['max_width'] = "6000";
        $config['max_height'] = "4000";
        $config['file_name'] = $_FILES['userfile']['name'];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_userdata("failed", "Image Upload Failed");
            redirect('admin/admin/slideupload');
        } else {
            $upload_data = array(
                'slider_title' => $this->input->post('slider_title'),
                'slider_name' => $picturename,
                'uploaded_by' => 'admin',
                'date' => date('Y-m-d')
            );
            $insertimg = $this->db->insert('slider_tbl', $upload_data);
            if ($insertimg == TRUE):
                $this->session->set_userdata("successfull", " Image Upload successfully");
                redirect('admin/admin/slideupload');
            else :
                $this->session->set_userdata('failed', ' Image Upload Failed');
                redirect('admin/admin/slideupload');
            endif;
        }
    }

    public function delete_slider($id) {
        $imgQry = $this->db->query("SELECT slider_name from slider_tbl where id = '$id'");
        $imagename = $imgQry->row()->slider_name;
        unlink('assets/uploads/' . $imagename);
        $this->db->where('id', $id);
        $delete = $this->db->delete('slider_tbl');
        if ($delete):
            $this->session->set_userdata("successfull", "Image Delete successfully");
            redirect('admin/admin/slideupload');
        endif;
    }

    ###Menu Section

    public function menulist() {
        $data['baseurl'] = $this->config->item('base_url');
        $data['title'] = 'Menu List';
        $menuQry = $this->db->query("select * from menu_tbl;");
        $data['menulist'] = $menuQry->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu', $data);
        $this->load->view('admin/menulist', $data);
        $this->load->view('admin/footer', $data);
    }

    public function addmenu() {
        $menuname = $this->input->post('menuname');
        $menuData = array(
            'menu_name' => $menuname,
            'date' => date('Y-m-d')
        );
        $saveMenuInfo = $this->db->insert('menu_tbl', $menuData); ###tablename, tabledata###
        if ($saveMenuInfo == TRUE):
            $this->session->set_userdata('successfull', ' Menu Add Successfully');
            redirect('admin/admin/menulist');
        else :
            $this->session->set_userdata('failed', ' Menu Add Failed');
            redirect('admin/admin/menulist');
        endif;
    }

    public function editmenu() {
        $menuid = $this->input->post('menuid');
        $menuname = $this->input->post('menuname');
        $menuData = array(
            'menu_name' => $menuname,
            'date' => date('Y-m-d')
        );
        $this->db->where('id', $menuid);
        $updateMenuInfo = $this->db->update('menu_tbl', $menuData);
        if ($updateMenuInfo == TRUE):
            $this->session->set_userdata('successfull', ' Menu Add Successfully');
            redirect('admin/admin/menulist');
        else :
            $this->session->set_userdata('failed', ' Menu Add Failed');
            redirect('admin/admin/menulist');
        endif;
    }

    public function deletemenu($id) {
        $this->db->where('id', $id);
        $delete = $this->db->delete('menu_tbl');
        if ($delete):
            $this->session->set_userdata("successfull", " Menu Delete successfully");
            redirect('admin/admin/menulist');
        endif;
    }

    ###Category Section

    public function categorylist() {
        $data['baseurl'] = $this->config->item('base_url');
        $data['title'] = 'Category List';
        $categoryQry = $this->db->query("select * from category_tbl;");
        $data['categorylist'] = $categoryQry->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu', $data);
        $this->load->view('admin/categorylist', $data);
        $this->load->view('admin/footer', $data);
    }

    public function addcategory() {
        $category = $this->input->post('category');
        $categoryData = array(
            'category_name' => $category,
            'date' => date('Y-m-d')
        );
        $saveCatInfo = $this->db->insert('category_tbl', $categoryData); ###tablename, tabledata###
        if ($saveCatInfo == TRUE):
            $this->session->set_userdata('successfull', ' Category Add Successfully');
            redirect('admin/admin/categorylist');
        else :
            $this->session->set_userdata('failed', ' Category Add Failed');
            redirect('admin/admin/categorylist');
        endif;
    }

    public function editcategory() {
        $catid = $this->input->post('catid');
        $categoryname = $this->input->post('categoryname');
        $catData = array(
            'category_name' => $categoryname,
            'date' => date('Y-m-d')
        );
        $this->db->where('id', $catid);
        $updateCatInfo = $this->db->update('category_tbl', $catData);
        if ($updateCatInfo == TRUE):
            $this->session->set_userdata('successfull', ' Menu Add Successfully');
            redirect('admin/admin/categorylist');
        else :
            $this->session->set_userdata('failed', ' Menu Add Failed');
            redirect('admin/admin/categorylist');
        endif;
    }

    public function deletecategory($id) {
        $this->db->where('id', $id);
        $delete = $this->db->delete('category_tbl');
        if ($delete):
            $this->session->set_userdata("successfull", " Category Delete successfully");
            redirect('admin/admin/categorylist');
        endif;
    }

    ###Product Section

    public function products() {
        $data['baseurl'] = $this->config->item('base_url');
        $data['title'] = 'Product';
        $productQry = $this->db->query("select * from product_tbl;");
        $data['productlist'] = $productQry->result();
        $menuQry = $this->db->query("select * from menu_tbl;");
        $data['menulist'] = $menuQry->result();
        $categoryQry = $this->db->query("select * from category_tbl;");
        $data['categorylist'] = $categoryQry->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menu', $data);
        $this->load->view('admin/productlist', $data);
        $this->load->view('admin/footer', $data);
    }

    public function addproduct() {
        $productname = $this->input->post('productname');
        $menuname = $this->input->post('menuname');
        $categoryname = $this->input->post('categoryname');
        $productdescription = $this->input->post('productdescription');
        $picturename = $_FILES['userfile']['name'];
        $config['upload_path'] = "assets/uploads/";
        $config['allowed_types'] = "gif|jpg|jpeg|png|pdf|docx|doc|ppt|pptx|xls";
        $config['overwrite'] = TRUE;
        $config['max_size'] = "5000";
        $config['max_width'] = "6000";
        $config['max_height'] = "4000";
        $config['file_name'] = $_FILES['userfile']['name'];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_userdata("failed", " Image Upload Failed");
            redirect('admin/admin/products');
        } else {
            $upload_data = array(
                'product_name' => $productname,
                'menu_id' => $menuname,
                'category_id' => $categoryname,
                'product_description' => $productdescription,
                'product_image' => $picturename,
                'date' => date('Y-m-d')
            );
            $updateInfo = $this->db->insert('product_tbl', $upload_data);
            if ($updateInfo == TRUE):
                $this->session->set_userdata("successfull", " Image Upload successfully");
                redirect('admin/admin/products');
            else :
                $this->session->set_userdata('failed', ' Image Upload Failed');
                redirect('admin/admin/products');
            endif;
        }
    }

    public function deleteproduct($id) {
        $imgQry = $this->db->query("SELECT product_image from product_tbl where id = '$id'");
        $imagename = $imgQry->row()->product_image;
        unlink('assets/uploads/' . $imagename);
        $this->db->where('id', $id);
        $delete = $this->db->delete('product_tbl');
        if ($delete):
            $this->session->set_userdata("successfull", " Product delete successfully");
            redirect('admin/admin/products');
        endif;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/admin/login', 'refresh');
    }

}
