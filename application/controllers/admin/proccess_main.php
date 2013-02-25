<?php  
/**
 * 
 */
class Proccess_main extends CI_Controller {
	
	function __construct() {
	    parent::__construct();
		$this->load->model('admin/m_main');
        $this->load->library("session");
        $this->load->model('admin/m_upload');
        $this->load->helper("file");
         $this->load->helper("url"); 
         $this->load->helper("form");  
	}
    function index(){
        redirect('admin/Permission/menber_area');
    }
    //Category 
    function insert_new(){
      $data = $this->m_main->_category_new_load();
      echo $data;
    }
    function update_new(){
        $data = $this->m_main->_category_update();
        echo $data;
    }
    function view_list(){
       
    }
    function category_list(){
        $this->m_main->category_list_del();
         redirect("admin/redirect/danhmuc_list");
    }
    function category_list_regular(){
        $list=$this->uri->segment(4);
        // 1
        $this->session->set_userdata('category_list',"category_".$list);
        redirect("admin/redirect/danhmuc_new_save");
    }
    function action_change(){
        $_data = array();
        $txt_id=$this->input->post("txt_id");
        $action = $this->input->post("action_category");
        $hid =$this->input->post("hid");
        $check =$this->input->post("chon");
        $status = "";
        if (count($check[0]) >= 1) {
        
        if($action == "save"){
           
          for ($j=($check[0]-1); $j < ($check[count($check)-1]) ; $j++) { 
              $_data []= array(
              'did'=>$hid[$j],
              'dorder'=>$txt_id[$j]
              );
             
          } 
         $this->m_main->category_update_all($_data); 
         $status = "Sửa thành công";
        }elseif($action == "delete"){
            
            for ($j=($check[0]-1); $j < ($check[count($check)-1]) ; $j++) { 
              $_data[]  =array('did'=>$hid[$j]);
            }
            $this->m_main->category_delete_all($_data); 
         $status = "Xóa thành công";
        }   
        } else {
          $status = "Bạn chưa check các dòng cần thay đổi";  
        }
       redirect("admin/redirect/danhmuc_list");
    }
    
    // hang san xuat
    
    function production_new_upload(){
        $ul =$this->input->post("upload");
        $ntitle= $this->input->post("txt_id");
        $slpro=$this->input->post("sl_pro");
        $sl_check = $this->input->post("sl_production");
        $_data = array();
        $status = "";
        
       if(isset($ul) && $ul=="Thêm hãng sản xuất mới"){
            if(count($sl_check[0]) >= 1){
              $hinhanh = $this->m_upload->upload_img();
                if(isset($hinhanh["false"])) {
                   $status = $hinhanh;
               }else{
                        $_data = array(
                        'ntitle'=>$ntitle,
                        'npic'=> $hinhanh["npic"],
                        'ndate'=> $hinhanh["ndate"],
                        'active'=> $slpro,
                        );
                    $id =$this->m_main->_production_new_insert($_data); 
                    for ($i=0; $i < count($sl_check) ; $i++) { 
                        $data = array(
                        'nid'=>$id,
                        'did'=>$sl_check[$i]
                        );
                        $this->m_main->_production_new_chitiet($data);
                       }//end foreach
                       $status = "Thêm hãng sản xuất thành công";
                }
            }else{
                $status = "Bạn chưa chọn hãng sản xuất";
            }
           
        }
         $this->session->set_userdata('loi',$status);
       redirect("admin/redirect/sanxuat_new");
    }
    //production 
     function production_list_del(){
        $this->m_main->production_list_del();
        redirect("admin/redirect/sanxuat_list");
    }
     function action_del_all(){
         $action =$this->input->post("sm_del");
         $sl_check= $this->input->post("chon");
         if($action == "Xóa vị trí đã chọn" ){
             for ($i=0; $i < count($sl_check); $i++) { 
                 $data["nid"]=$sl_check[$i];
                 $this->m_main->production_delete_all($data);
             }
         }
         redirect("admin/redirect/sanxuat_list");
     }
      function production_update(){
        $ul =$this->input->post();
         $sl_check = $this->input->post("sl_production");
        $_data = array();
        $status = "";
        $id = $ul["txt_id"];
        if(isset($ul["upload"]) && $ul["upload"]=="Lưu thông tin"){
            $id = $ul["txt_id"];
            if(count($sl_check[0]) >= 1){
                        $_data[] = array(
                        'nid' =>$ul["txt_id"],
                        'ntitle'=>$ul["txt_title"],
                        'active'=> $ul["sl_pro"],
                        );
                    $this->m_main->_production_update_nsx($_data); 
                    $this->m_main->_production_delete_chitiet($id);
                    for ($i=0; $i < count($sl_check) ; $i++) { 
                        $data = array(
                        'nid'=>$ul["txt_id"],
                        'did'=>$sl_check[$i]
                        );
                        $this->m_main->_production_update_chitiet($data);
                       }//end foreach
                       $status = "Lưu hãng sản xuất thành công";
            }else{
                $status = "Bạn chưa chọn hãng sản xuất";
            }
           
        }
         $this->session->set_userdata('loi',$status);
       redirect("admin/redirect/production_new_save");
    }
    function production_list_update(){
        $list=$this->uri->segment(4);
        
        //2
        $this->session->set_userdata('category_list',"production_".$list);
        redirect("admin/redirect/production_new_save");
    }
    
    // cap nhat
    // may tinh thuong hieu
    function computer_brand(){
        $data = $this->input->post();
        if ($data["spnsx"] != 0) {
        
                $t= time();
                $status="";
               $anh1 = "user_1";$anh2 = "user_2";$anh3 = "user_3";$anh4 = "user_4";$anh5 = "user_5";
                   $this->m_upload->upload_thumb("icon",$anh1,$t);
                   $this->m_upload->upload_thumb("thumb",$anh2,$t);
                   $this->m_upload->upload_thumb("TA01",$anh3,$t);
                   $this->m_upload->upload_thumb("TA02",$anh4,$t);
                   $this->m_upload->upload_thumb("TA03",$anh5,$t);
               if ($this->m_main->_computer_brand_insert($t)){
                     $status ="Thêm thành công !";  
               }else{
                   $status ="Thêm thất bại ..!";
               }
           
        } else {
            $status = "Chưa chọn nhà sản xuất";
        }
        $this->session->set_userdata('loi',$status);
       redirect("admin/redirect/sanpham_mtth");
    }
    // may tin hxach tay
    function computer_laptop_new(){
         $data = $this->input->post();
        if ($data["spnsx"] != 0) {
        
                $t= time();
                $status="";
               $anh1 = "user_1";$anh2 = "user_2";$anh3 = "user_3";$anh4 = "user_4";$anh5 = "user_5";
                   $this->m_upload->upload_thumb("icon",$anh1,$t);
                   $this->m_upload->upload_thumb("thumb",$anh2,$t);
                   $this->m_upload->upload_thumb("TA01",$anh3,$t);
                   $this->m_upload->upload_thumb("TA02",$anh4,$t);
                   $this->m_upload->upload_thumb("TA03",$anh5,$t);
               if ($this->m_main->_computer_brand_insert($t)){
                     $status ="Thêm thành công !";  
               }else{
                   $status ="Thêm thất bại ..!";
               }
               
        } else {
            $status = "Chưa chọn nhà sản xuất";
        }
        $this->session->set_userdata('loi',$status);
       redirect("admin/redirect/sanpham_mtxt");
    }
      
    // dien tu am thanh
    function product_amthanh(){
        $data = $this->input->post();
        if ($data["spnsx"] != 0) {
                 $t= time();
                $status="";
               $anh1 = "user_1";$anh2 = "user_2";$anh3 = "user_3";$anh4 = "user_4";$anh5 = "user_5";
                   $this->m_upload->upload_thumb("icon",$anh1,$t);
                   $this->m_upload->upload_thumb("thumb",$anh2,$t);
                   $this->m_upload->upload_thumb("TA01",$anh3,$t);
                   $this->m_upload->upload_thumb("TA02",$anh4,$t);
                   $this->m_upload->upload_thumb("TA03",$anh5,$t);
               if ($this->m_main->insert_amthanh($t)){
                     $status ="Thêm thành công !";  
               }else{
                   $status ="Thêm thất bại ..!";
               }
       } else {
            $status = "Chưa chọn nhà sản xuất";
        }
        $this->session->set_userdata('loi',$status);
       redirect("admin/redirect/redirect_select/44");
    }
    function product_option(){
         $data = $this->input->post();
        if ($data["spnsx"] != 0) {
            
                 $t= time();
                $status="";
               $anh1 = "user_1";$anh2 = "user_2";$anh3 = "user_3";$anh4 = "user_4";$anh5 = "user_5";
                   $this->m_upload->upload_thumb("icon",$anh1,$t);
                   $this->m_upload->upload_thumb("thumb",$anh2,$t);
                   $this->m_upload->upload_thumb("TA01",$anh3,$t);
                   $this->m_upload->upload_thumb("TA02",$anh4,$t);
                   $this->m_upload->upload_thumb("TA03",$anh5,$t);
               if ($this->m_main->insert_option($t)){
                     $status ="Thêm thành công !";  
               }else{
                   $status ="Thêm thất bại ..!";
               }
        } else {
            $status = "Chưa chọn nhà sản xuất";
        }
        $this->session->set_userdata('loi',$status);
       redirect("admin/redirect/redirect_select/66");
       
    }
    function product_option2(){
          $data = $this->input->post();
        if ($data["spnsx"] != 0) {
                 $t= time();
                $status="";
               $anh1 = "user_1";$anh2 = "user_2";$anh3 = "user_3";$anh4 = "user_4";$anh5 = "user_5";
                   $this->m_upload->upload_thumb("icon",$anh1,$t);
                   $this->m_upload->upload_thumb("thumb",$anh2,$t);
                   $this->m_upload->upload_thumb("TA01",$anh3,$t);
                   $this->m_upload->upload_thumb("TA02",$anh4,$t);
                   $this->m_upload->upload_thumb("TA03",$anh5,$t);
               if ($this->m_main->insert_option2($t)){
                     $status ="Thêm thành công !";  
               }else{
                   $status ="Thêm thất bại ..!";
               }
       } else {
            $status = "Chưa chọn nhà sản xuất";
        }
        $this->session->set_userdata('loi',$status);
       redirect("admin/redirect/redirect_select/45");
    }
    function product_option3(){
         $data = $this->input->post();
        if ($data["spnsx"] != 0) {
                    $t= time();
                    $status="";
                   $anh1 = "user_1";$anh2 = "user_2";$anh3 = "user_3";$anh4 = "user_4";$anh5 = "user_5";
                       $this->m_upload->upload_thumb("icon",$anh1,$t);
                       $this->m_upload->upload_thumb("thumb",$anh2,$t);
                       $this->m_upload->upload_thumb("TA01",$anh3,$t);
                       $this->m_upload->upload_thumb("TA02",$anh4,$t);
                       $this->m_upload->upload_thumb("TA03",$anh5,$t);
                   if ($this->m_main->insert_option3($t)){
                         $status ="Thêm thành công !";  
                   }else{
                       $status ="Thêm thất bại ..!";
                   }
       } else {
            $status = "Chưa chọn nhà sản xuất";
        }
        $this->session->set_userdata('loi',$status);
       redirect("admin/redirect/redirect_select/11");
    }
    function phanmen(){
             $data = $this->input->post();
            if ($data["spnsx"] != 0) {
                        $t= time();
                        $status="";
                       $anh1 = "user_1";$anh2 = "user_2";$anh3 = "user_3";$anh4 = "user_4";$anh5 = "user_5";
                           $this->m_upload->upload_thumb("icon",$anh1,$t);
                           $this->m_upload->upload_thumb("thumb",$anh2,$t);
                           $this->m_upload->upload_thumb("TA01",$anh3,$t);
                           $this->m_upload->upload_thumb("TA02",$anh4,$t);
                           $this->m_upload->upload_thumb("TA03",$anh5,$t);
                       if ($this->m_main->insert_phanmen($t)){
                             $status ="Thêm thành công !";  
                       }else{
                           $status ="Thêm thất bại ..!";
                       }
           } else {
                $status = "Chưa chọn nhà sản xuất";
            }
            $this->session->set_userdata('loi',$status);
           redirect("admin/redirect/sanpham_pmbq");
        }
    // danh sach san pham 
     function product_list_del(){
        $this->m_main->product_list_del();
        redirect("admin/redirect/danhsachsp");
    }
     function product_del_all(){
         $action =$this->input->post("sm_danhsach");
         $sl_check= $this->input->post("chon");
         if($action == "Xóa vị trí đã chọn" ){
             for ($i=0; $i < count($sl_check); $i++) { 
                 $data["spid"]=$sl_check[$i];
                 
                 $this->m_main->product_delete_all($data);
             }
         }
         redirect("admin/redirect/danhsachsp");
     }
    function product_list_update(){
        $list=$this->uri->segment(4);
        $this->session->set_userdata('category_list',"product_".$list);
        $e = $this->m_main->load_sploai($list);
        if ($e[0]["sploai"] == 0) {
            $e[0]["sploai"] = 0;
        }
        $this->session->set_flashdata('main_content',$e[0]["sploai"]);
        $this->index();
    }
    // don dat hang 
    function order_list_del(){
        $this->m_main->order_list_del();
        $url = $this->uri->segment(5);
        if ($url == "le") {
            redirect("admin/redirect/donhang_lk");
        } else {
            redirect("admin/redirect/donhang_mt");
        }
        
        
    }
     function order_del_all(){
         $action =$this->input->post("sm_order");
         $sl_check= $this->input->post("chon");
         if($action == "Xóa vị trí đã chọn" ){
             for ($i=0; $i < count($sl_check); $i++) { 
                 $data["hid"]=$sl_check[$i];
                 $this->m_main->order_delete_all($data);
             }
         }
         if ($url == "le") {
            redirect("admin/redirect/donhang_lk");
        } else {
            redirect("admin/redirect/donhang_mt");
        }
     }
     function acticle_insert(){
           $data = $this->input->post();
           $status ="";
           $hinhanh = $this->m_upload->upload_tintuc();
           if(isset($hinhanh["false"])){
               $status = $hinhanh;
           }else{
               $_data = array(
               'ntitle' => $data["sptitle"],
               'nshort' => $data["spdes"],
               'ncont'  => $data["spcont"],
               'npic'   => $hinhanh["npic"],
               'ndate'  => $hinhanh["ndate"],
               'nuser'  => '1'
               );
               if ($this->m_main->acticle_insert($_data)) {
                   $status = "Thêm thành công";
               } else {
                   $status = "Thêm thất bại";
               }
               
           }
                
            $this->session->set_userdata('loi',$status);
          redirect("admin/redirect/baiviet_new");  
     }
     
      function acticle_list_del(){
        $this->m_main->acticle_list_del();
        redirect("admin/redirect/baiviet_list");
    }
     function acticle_del_all(){
         $action =$this->input->post("sm_acticle");
         $sl_check= $this->input->post("chon");
         if($action == "Xóa vị trí đã chọn" ){
             for ($i=0; $i < count($sl_check); $i++) { 
                 $data["nid"]=$sl_check[$i];
                 $this->m_main->production_delete_all($data);
             }
         }
         redirect("admin/redirect/baiviet_list");
     }
    function acticle_list_update(){
        $list=$this->uri->segment(4);
        
        //2
        $this->session->set_userdata('category_list',"acticle_".$list);
        redirect("admin/redirect/baiviet_update");
    }
    function acticle_update(){
        $status ="";
        $this->m_main->acticle_tintuc_update();
            $status = "Sửa thành công";
            
         $this->session->set_userdata('loi',$status);
          redirect("admin/redirect/baiviet_update");  
    }    
    
    function hethong(){
        $url = $this->uri->segment(4);
        $status ="";
        $path_li="index";
        if($url == "gioithieu"){
            $data = array(
            'gtid'=>$this->input->post("id"),
            'gtcont'=>$this->input->post("txt_cont"),
            'gtdate'=>strtotime($this->input->post("DateStart")),
            );
            
          $status=  $this->m_main->hethong_gioithieu($data);
          $path_li = "gioithieu";
        }elseif ($url == "chinhsach") {
            $data = array(
            'csid'=>$this->input->post("id"),
            'cscont'=>$this->input->post("txt_cont"),
           'csdate'=>strtotime($this->input->post("DateStart")),
            );
          $status=  $this->m_main->hethong_chinhsach($data);
          $path_li = "chinhsach";
        }elseif ($url == "baohanh") {
            $data = array(
            'bhid'=>$this->input->post("id"),
            'bhcont'=>$this->input->post("txt_cont"),
            'bhdate'=>strtotime($this->input->post("DateStart")),
            );
          $status=  $this->m_main->hethong_baohanh($data);
          $path_li = "baohanh";
        }elseif ($url == "khuyenmai") {
            $data = array(
            'kmid'=>$this->input->post("id"),
            'kmcont'=>$this->input->post("txt_cont"),
            'kmdate'=>strtotime($this->input->post("DateStart")),
            );
          $status=  $this->m_main->hethong_khuyenmai($data);
          $path_li =  "khuyenmai";
        }
        if($status == "1"){
            $this->session->set_userdata('loi',"Cập nhật thành công");
        }else{
            $this->session->set_userdata('loi',"Cập nhật thất bại");
        }
        
          redirect("admin/redirect/".$path_li);  
    }
       function baogia_active(){
           $id = $this->uri->segment(5);
           
           $active = $this->uri->segment(4);
           
           $this->m_main->baogia_active($id,$active);
           redirect("admin/redirect/baogia");
       }
       function baogia_update(){
           
       }
       function baogia_del(){
           $this->m_main->baogia_del();
            redirect("admin/redirect/baogia");
       }
       function insert_baogia(){
           $data = $this->m_upload->upload_baogia();
           if(isset($data["false"])) {
               echo $data;
           }else{
               $dl = $this->input->post();
               $_data = array(
               'bgtitle'=>$dl["bgtitle"],
               'bgfile' =>$data["bgfile"],
               'bgdate' =>$data["bgdate"],
               'active' =>$dl["active"]
               );
               $this->m_main->baogia_insert($_data);
               redirect("admin/redirect/insert_baogia");
           }
       }
        function load_baogia(){
        $list=$this->uri->segment(4);
        $this->session->set_userdata('category_list',"baogia_".$list);
        redirect("admin/redirect/insert_baogia");
    }
    function save_baogia(){
         $data = $this->m_upload->upload_baogia();
           if(isset($data["false"])) {
               echo $data;
           }else{
               if ($this->m_main->_save_baogia($data)== TRUE){
                   echo "Thanh cong";
               }else{
                   echo "asd";
               }
           }
           redirect("admin/redirect/baogia");
    }
    function save_sodo(){
        $status ="";
         $data = array();
         
         if (!empty($_FILES["userfile"]["name"])){
            $data = $this->m_upload->upload_img();
             if(isset($data["false"])) {
               $status = $data;
               }else{
                   if ($this->m_main->_save_sodo($data)== TRUE){
                       $status = "Cập nhật thành công";
                   }else{
                       $status = "Cập nhật thất bại";
                   }
                   
               }
         }else{
             
              if ($this->m_main->_save_sodo2()== TRUE){
                       $status = "Cập nhật thành công";
                   }else{
                       $status = "Cập nhật thất bại";
                   } 
         }
           
           $this->session->set_userdata('loi',$status);
           redirect("admin/redirect/sodo");
    }
    function client_contact(){
        
    }
    function client_dell(){
        if($this->m_main->_client_del())  {
            echo "Thanh cong";
        }  else{
            echo " That bai";
        }
    }
    function flash(){
        $list=$this->uri->segment(4);
        
        //2
        $this->session->set_userdata('category_list',"flash_".$list);
        redirect("admin/redirect/flash_update");
    }
    function update_flash(){
        $status ="";
         $data = array();
         
         if (!empty($_FILES["userfile"]["name"])){
            $data = $this->m_upload->upload_baogia();
             if(isset($data["false"])) {
               $status = $data;
               }else{
                   if ($this->m_main->_flash_update($data)== TRUE){
                       $status = "Cập nhật thành công";
                   }else{
                       $status = "Cập nhật thất bại";
                   }
                   
               }
         }else{
             
              if ($this->m_main->_flash_update2()== TRUE){
                       $status = "Cập nhật thành công";
                   }else{
                       $status = "Cập nhật thất bại";
                   } 
         }
           
           $this->session->set_userdata('loi',$status);
           redirect("admin/redirect/flash_update");
           
    }
    
    function manager_online(){
        $this->m_main->nhanvien_update();
        $this->session->set_userdata('loi',"Cập nhật thành công");
           redirect("admin/redirect/tructuyen");
    }
    function search_danhsach(){
        echo "asd";
    }
    function contact_khachhang(){
       $this->m_main->contact_khachhang();
       $this->session->set_userdata('loi',"Trả lời thành công");
           redirect("admin/redirect/lienhe");
    }
}

?>