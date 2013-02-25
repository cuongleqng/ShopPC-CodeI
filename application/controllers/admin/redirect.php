<?php  
    /**
     * 
     */
    class Redirect extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->helper('cookie');
        }
        function index(){
           
            redirect('admin/Permission/menber_area');
        }
        //trang chu
        function trangchu(){
            $this->session->set_flashdata('main_content','_main_root');
           
            $this->index();
        }
         // quan ly danh muc
        function danhmuc_new(){
            $this->session->set_flashdata('main_content','_category_new');
            $this->index();
        }
        function danhmuc_list(){
            $this->session->set_flashdata('main_content','_category_list');
            $this->index();
        }
        function danhmuc_new_save(){
            $this->session->set_flashdata('main_content','_category_list_save');
            $this->index();
        }
        // quan ly san xuat 
        function sanxuat_new(){
            $this->session->set_flashdata('main_content','_production_new');
            $this->index();
        }
        function sanxuat_list(){
            $this->session->set_flashdata('main_content','_production_list');
            $this->index();
        }
        function production_new_save(){
             $this->session->set_flashdata('main_content','_production_list_save');
             $this->index();
        }
        function redirect_select(){
            $this->session->set_flashdata('main_content',$this->uri->segment(4));
             $this->index();
        }
    /*    function redirect_select2(){
            $this->session->set_flashdata('main_content',$this->uri->segment(4));
             $this->index();
        }
        function redirect_select3(){
            $this->session->set_flashdata('main_content',$this->uri->segment(4));
             $this->index();
        }
        function redirect_select4(){
            $this->session->set_flashdata('main_content',$this->uri->segment(4));
             $this->index();
        }
     * 
     */
         // cap nhat san pham
        function sanpham_mtth(){
            $this->session->set_flashdata('main_content','_computer_brand');
            $this->index();
        }
        function sanpham_mtxt(){
            $this->session->set_flashdata('main_content','_product_laptop_new');
            $this->index();
        }
        function sanpham_dtam(){
            $this->session->set_flashdata('main_content','_select_dtam');
            $this->index();
        }
        function sanpham_cap(){
            $this->session->set_flashdata('main_content','_select_cap');
            $this->index();
        }
        function sanpham_lkmt(){
            $this->session->set_flashdata('main_content','_select_lkien');
            $this->index();
        }
        function sanpham_pmbq(){
            $this->session->set_flashdata('main_content','_soft_conpyright_new');
            $this->index();
        }
        function sanpham_tbm(){
            $this->session->set_flashdata('main_content','_select_tbmang');
            $this->index();
        }
        function sanpham_tbvp(){
            $this->session->set_flashdata('main_content','_select_tbvphong');
            $this->index();
        }
        // quan ly gio hang 
        function donhang_mt(){
            $this->session->set_flashdata('main_content','_order_cauhinh');
            $this->index();
        }
        function donhang_lk(){
            $this->session->set_flashdata('main_content','_order_linhkien');
            $this->index();
        }
        // danh sach san pham
        function danhsachsp(){
            
            $this->session->set_flashdata('main_content','_product_list_equiqment');
            $this->index();
        }
       // quan ly tin tuc
        function baiviet_new(){
            $this->session->set_flashdata('main_content','_article_new');
            $this->index();
        }
        function baiviet_list(){
            $this->session->set_flashdata('main_content','_insert_article_new');
            $this->index();
        }
        function baiviet_update(){
            $this->session->set_flashdata('main_content','insert_article_update');
            $this->index();
        }
        // theme
        function theme_white(){
            $cookie = array(
            'name' => 'theme',
            'value' => 'white',
            'expire' =>86500,
           // 'domain' => '',
           // 'path' => '/',
           // 'secure' =>TRUE
            );
            $this->input->set_cookie($cookie);
           
            $this->index();
        }
        function theme_wood(){
            $cookie = array(
            'name' => 'theme',
            'value' => 'wood',
            'expire' =>86500,
           // 'domain' => '',
           // 'path' => '/',
           // 'secure' =>TRUE
            );
            $this->input->set_cookie($cookie);
            $this->index();
        }
        function theme_black(){
           $cookie = array(
            'name' => 'theme',
            'value' => 'black',
            'expire' =>86500,
           // 'domain' => '',
           // 'path' => '/',
           // 'secure' =>TRUE
            );
            $this->input->set_cookie($cookie);
            $this->index();
        }
        // quan ly he thong
        function gioithieu(){
           $this->session->set_flashdata('main_content','_gioithieu');
            $this->index();
        }
        function chinhsach(){
            $this->session->set_flashdata('main_content','_chinhsach');
            $this->index();
        }
        function baohanh(){
            $this->session->set_flashdata('main_content','_baohanh');
            $this->index();
        }
        function khuyenmai(){
           $this->session->set_flashdata('main_content','_khuyenmai');
            $this->index();
        }
        function baogia(){
            $this->session->set_flashdata('main_content','_quotation_list');
            $this->index();
        }
        function insert_baogia(){
             
            $this->session->set_flashdata('main_content','_insert_baogia');
            $this->index();
        }
        function sodo(){
           $this->session->set_flashdata('main_content','_map_path');
            $this->index();
        }
        function tructuyen(){
           $this->session->set_flashdata('main_content','_manager_online');
            $this->index();
        }
        function lienhe(){
            $this->session->set_flashdata('main_content','_contact_client');
            $this->index();
        }
        function flash(){
            $this->session->set_flashdata('main_content','_flash');
            $this->index();
        }
        function flash_update(){
            $this->session->set_flashdata('main_content','_flash_content');
            $this->index();
        }
        function changepass(){
            $this->session->set_flashdata('main_content','_changes_pass');
            $this->index();
        }
        
        
        
       
        
    }
    
?>