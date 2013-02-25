<?php 
 /**
  * 
  */
  
 class Permission extends CI_Controller{
     private $_user;
     protected $_data = array();
      private  $data = array(); 
     function __construct() {
         parent::__construct();
         $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('admin/mlogin');
         $this->load->model('admin/m_main');
         $this->load->library('form_validation');
         $this->load->library('pagination');
         
         $this->is_login_in();
     }
     function index(){ 
                
         $this->load->view('admin/includes/template',$this->_data);
     }
     function menber_area($limit = "30",$offset = 0){
         
         $this->session->keep_flashdata('main_content');
         $this->_data['main_content']= $this->check_select();
        
        // login
         $this->_data['content']=$this->mlogin->load_user($this->_user);
         $this->_data['report_main']=$this->mlogin->report_main();
         
         //quan ly danh muc
         $this->_data['category_select_1']=$this->m_main->_category_new_select();
          $this->_data['noidung']=$this->m_main->_category_list_tool();
         $this->_data['category_regular']= $this->category_list_regular();
        // nha san xuat
        //danh sach san pham
         if($this->session->flashdata('main_content') == "_product_list_equiqment"){
                $this->_data["product_list"]=$this->m_main->_product_list_lk($limit,($offset * $limit )); 
                 $row =$this->m_main->_product_count();
                 $this->_data["linki"] = ($offset * $limit + 1);
                 $this->_data["pagination"]= $this->m_main->pagesListLimit($row,$limit,$offset);
                 $this->_data["locsp"] = $this->uri->segment(6);
                 $this->_data["hsx"] = $this->uri->segment(7);
        }else{
        $this->_data['production_new_option']=$this->m_main->_production_new();
        $this->_data['production_list']=$this->m_main->_production_list();
        }
        
        
        
        // cap nhat
       
                // thuong hieu moi
                $this->_data['update_computer_brand'] = $this->m_main->_computer_brand();
                // may tinh xach tay
                $this->_data['update_laptop_new'] = $this->m_main->_product_laptop_new();
                //dien tu am thanh
                $this->_data['update_select_content']=$this->m_main->get_select();
                $this->_data['select_option']= $this->m_main->get_option_sl();
                
                // phan men bang quyen 
                $this->_data["soft_copy"] =$this->m_main->_soft_copyright();
        
                 
               
                        
        // gio hang
                $this->_data["giohang"]=$this->m_main->get_order_giohang();     
        // tin tuc list 
                $this->_data["tintuc"]= $this->m_main->tintuc_list();
       // he thong
                $this->_data["hethong"] = $this->m_main->get_hethong();
                // bao gia
                $this->_data["baogia"]=$this->m_main->baogia();
                // sodo
                $this->_data["sodo"]=$this->m_main->sodo();
                
                // flash
                $this->_data["flash"] = $this->m_main->flash();
                // lien he
                $this->_data["lienhe"] = $this->m_main->lienhe();
                
                // nhan vien
                $this->_data["nhanvien"] = $this->m_main->nhanvien();
          // change pass
                $this->_data["change_p"] = $this->mlogin->set_change_erro();
                
                 $this->_data['loier'] = $this->session->userdata('loi');
                  $this->session->unset_userdata('loi');
                   //dien tu am thanh
                   
            // pagination 
            
                $this->_data['update_select_content']=$this->m_main->get_select();
         
                $this->index();
     }

    function check_select()
    {   $sl_option=$this->session->flashdata('main_content');
        if ($sl_option =="" || !isset($sl_option)) {
          return  $sl_option= "_main_root";
        }
        else
        if ($sl_option=="_select_dtam" || $sl_option=="_select_cap" || $sl_option =="_select_lkien" || $sl_option == "_select_tbmang" || $sl_option == "_select_tbvphong") {
            $this->m_main->set_select($sl_option);
            
            return "_select_product_new";
        } elseif($sl_option=="_order_linhkien" || $sl_option == "_order_cauhinh") {
            $this->m_main->set_order_giohang($sl_option);
          return "_order_list_configuration";
        }elseif($sl_option == "44" ){
            $this->m_main->set_option($sl_option);
            return "_product_amthanh";
        }elseif( in_array($sl_option, array("23","29","60","34","35","36","43","66","53","54","56","59","10","57","58"))){
            $this->m_main->set_option($sl_option);
            return '_product_select';
        }elseif(in_array($sl_option, array("45"))){
            $this->m_main->set_option($sl_option);
            return '_product_loa_select';
        }elseif(in_array($sl_option, array("11","12","13","14","15","16","19","22","25"))){
            $this->m_main->set_option($sl_option);
            return '_product_linhkien_select';
        }elseif(in_array($sl_option, array("17","20","21","28"))){
            $this->m_main->set_option($sl_option);
            return '_product_linhkien_select2';
        }elseif(is_numeric($sl_option)){
            $this->m_main->set_option($sl_option);
            return '_product_select';
        }elseif(in_array($sl_option, array("_gioithieu","_chinhsach","_baohanh","_khuyenmai"))){
            $this->m_main->set_hethong($sl_option);
            return "_manager_list";
        }else{
            return $sl_option;
        }
        
    }
    function redirect_select_option(){
        $this->m_main->get_option();
    }
     function is_login_in(){
         $is_login_in=$this->session->userdata('is_login_in');
         $this->_user=$this->session->userdata('user');
         if(!isset($is_login_in) || $is_login_in !=TRUE){
             echo 'You don\'t permission access this page !';
             redirect("admin/login/index");
         }
   
    }
     function change_pass(){
       echo  $this->mlogin->change_pass();
    }
 
    function category_list_regular(){
        $ss=$this->session->userdata('category_list');
        $mang = explode("_", $ss);
      //  $sss = $this->session->userdata('production_list');
        if(isset($mang[0]) && $mang[0] == "category"){
           // $this->session->unset_userdata('category_list');
          return $this->m_main->_category_new_regular($mang[1]);
        }elseif (isset($mang[0]) && $mang[0] == "production"){
           // $this->session->unset_userdata('category_list');
          return $this->m_main->production_load_update($mang[1]);
        }elseif (isset($mang[0]) && $mang[0] == "product"){
           // $this->session->unset_userdata('category_list');
          return $this->m_main->product_load_update($mang[1]);
        }elseif (isset($mang[0]) && $mang[0] == "baogia"){
           $this->session->unset_userdata('category_list');
          return $this->m_main->baogia_load_update($mang[1]);
        }elseif (isset($mang[0]) && $mang[0] == "flash"){
          return $this->m_main->_load_flash($mang[1]);
        }elseif (isset($mang[0]) && $mang[0] == "acticle"){
          return $this->m_main->_acticle_tintuc($mang[1]);
        }
        
     }

 }
 
?>