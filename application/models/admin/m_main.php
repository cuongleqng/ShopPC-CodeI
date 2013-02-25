<?php  
 /**
  * 
  */
 class M_main extends CI_Model {
     
     function __construct() {
         parent::__construct();
         $this->load->database();
     }
  protected   $_data_sl = array();
  protected   $_data_gh = array();
  protected   $_option = array();
  protected   $_hethong = array();
     // category
     function _category_new_select(){
        $sql = $this->db->where('dparent',0)->order_by('did,dorder','asc')->get('tbl_danhsach')->result();
        return $sql; 
     }
     function _category_new_regular($list){
         $_data_regular = array();
         if(isset($list) && is_numeric($list)){
             
             $data = $this->db->from('tbl_danhsach')->where('did',$list)->get()->result_array();
             if($data){
                 foreach ($data as $key => $value) {
                     $_data_regular = $value;
                 }
             }
             return $_data_regular;
         }
         
     }
     function _category_new_load(){
         $data=$this->input->post();
         $_data=array();
            $_data['dtitle'] = $data['title'];
            $_data['dparent'] = $data['dparent'];
            $_data['dgia01'] = $data['dgia1'];
            $_data['dgia02'] = $data['dgia2'];
            $_data['dgia03'] = $data['dgia3'];
            $_data['dgia04'] = $data['dgia4'];
            $_data['active'] = $data['active'];
            
            if ( $_data['dparent'] == "0" )
            {
                $where = "dparent = '0'";
            }
            else
            {
                $where = "dparent != '0'";
            }
            
            $query = $this->db->select_max('dorder')->where($where)->get('tbl_danhsach')->result_array();
            $_data['dorder'] = $query[0]["dorder"] + 1;
            $query = $this->db->insert('tbl_danhsach',$_data);  
            if ( $query )
            {
                $mess = "Thêm danh mục mới thành công !";
            }
            else
            {
                $mess = "Có lỗi trong quá trình thêm danh mục mới !";
            }
            return $mess;
       
     }
     function _category_update(){
         $data= $this->input->post();
         $_data[] = array(
                'did'    => $data["did"],
                'dparent'=> $data["dparent"],
                'dtitle' => $data['dtitle'],
                'dgia01' => $data['dgia01'],
                'dgia02' => $data['dgia02'],
                'dgia03' => $data['dgia03'],
                'dgia04' => $data['dgia04'],
                'active' => $data['active'],
            );
            
            $query = $this->db->update_batch('tbl_danhsach',$_data,"did"); 
                $mess = "Lưu danh mục mới thành công !";
            return $mess;
     }
    function _category_list_tool(){
       $_data=array();
        $query = $this->db->where('dparent',0)->order_by('did',"ASC")->get('tbl_danhsach')->result_array();
       
       foreach($query as $r=>$value)
        {
            
            $_data[]=array(
                $r=>$value
                 );
            $querysub = $this->db->where('dparent',$value["did"])->order_by('dorder,did','ASC')->get('tbl_danhsach')->result_array();

                 foreach($querysub as $j=>$value2)
                {
                    $_data[$value["did"]][]=array(
                    $j=>$value2
                    );
                }
            
           
            
        }
    return $_data;
    }
       //del category_list
       function category_list_del(){
           $list = $this->uri->segment(4);
           $query = $this->db->where('did',$list)->delete('tbl_danhsach');
       }
       
    // update and dell_all
    function category_update_all($data){
        
            $this->db->update_batch('tbl_danhsach',$data,'did');
        
        
    //    
    } 
    function category_delete_all($data){
        foreach ($data as $key => $value) {
             $this->db->where('did',$value["did"])->delete('tbl_danhsach');
        }
       
    }
     // hang san xuat
     function _production_new(){
                $_data=array();
        $query = $this->db->where('dparent',0)->order_by('did',"ASC")->get('tbl_danhsach')->result_array();

       foreach($query as $r=>$value)
        {
            
            $_data[]=array(
                $r=>$value
                 );
            $querysub = $this->db->where('dparent',$value["did"])->order_by('dorder,did','ASC')->get('tbl_danhsach')->result_array();

                 foreach($querysub as $j=>$value2)
                {
                    $_data[$value["did"]][]=array(
                        $j=>$value2
                    );
                }
            
           
            
        }
    return $_data;
     }
     
     function _production_list(){
         $uri = $this->uri->segment(4);
         $where = "";
         if (isset($uri) && $uri !="" ) {
             $uri = (!is_numeric($uri))?strtolower($uri):$uri;
             
             $where = " WHERE ";
             if ($uri == "1-9") {
                 $where.= " ntitle LIKE '0%' OR ntitle LIKE '1%' OR ntitle LIKE '2%' OR ntitle LIKE '3%' OR ntitle LIKE '4%' OR ntitle LIKE '5%' OR ntitle LIKE '6%' OR ntitle LIKE '7%' OR ntitle LIKE '8%' OR ntitle LIKE '9%' ";
             }elseif($uri == "tatca") {
                 $where = "";
             }else{
                 $where.= " ntitle LIKE '{$uri}%' ";

             }
             
         }
         $_data=array();
                 $query=$this->db->query('SELECT tbl_nsx.nid,ntitle,npic,ndate,tbl_nsx.active FROM tbl_nsx '.$where.' ORDER BY ntitle ASC')->result_array();
         if ($query) {
             foreach ($query as $key => $value) {
                 $_data[$key]=$value;
                 $where='tbl_chitiet_nsx.nid ='.$value["nid"];
                 $query_sub=$this->db->select('dtitle')->from('tbl_danhsach')->join('tbl_chitiet_nsx','tbl_chitiet_nsx.did = tbl_danhsach.did','inner')->where($where)->get()->result_array();
             
                 foreach ($query_sub as $key1 => $value1) {
                     $_data[$key]['child'][] = $value1;
                 } //end foreach two
           
             } // end foreach one
             
         }//end query
         
         return $_data;
     }
     // cap nhat 
     function _production_new_insert($_data){
         $this->db->insert('tbl_nsx',$_data);
        return mysql_insert_id();
     }
    
     function _production_new_chitiet($_data){
         $this->db->insert('tbl_chitiet_nsx',$_data);
     }
     function _production_delete_chitiet($id){
          $this->db->where('nid',$id)->delete('tbl_chitiet_nsx');
     }
      function _production_update_chitiet($data){
         
        $this->db->insert('tbl_chitiet_nsx',$data);
    }
     function _production_update_nsx($_data){
         $this->db->update_batch('tbl_nsx',$_data,"nid");
     }
     // hang san xuat _ delete
     
     
     function production_list_del(){
           $list = $this->uri->segment(4);
           $query = $this->db->where('nid',$list)->delete('tbl_nsx');
       }
       
    // update and dell_all
 
    function production_delete_all($data){
             $this->db->delete('tbl_nsx',$data);
    }
    function production_load_update($list){
         if(isset($list) && is_numeric($list)){
             
             $data["nsx"] = $this->db->from('tbl_nsx')->where('nid',$list)->get()->result_array();
             $data["nsx"][] = $this->db->select('did')->from('tbl_chitiet_nsx')->where('nid',$list)->get()->result_array();
             
             return $data;
         }
    }
    
     
     function acticle_list_del(){
           $list = $this->uri->segment(4);
           $query = $this->db->where('nid',$list)->delete('tbl_tintuc');
       }
    
    function _acticle_tintuc($list){
        if(isset($list) && is_numeric($list)){
             
             $data["tintuc"] = $this->db->from('tbl_tintuc')->where('nid',$list)->get()->result_array();
             
             return $data;
         }
    }
    function acticle_tintuc_update(){
       $data = $this->input->post();
       $_data[] = array(
       'nid' => $data["nid"],
       'ntitle' => $data["sptitle"],
       'nshort' => $data["spdes"],
       'ncont' => $data["spcont"],
       );
       return $this->db->update_batch('tbl_tintuc',$_data,'nid');
    }


     
     //thuong hieu moi
     function _computer_brand(){
            $_data=array();
            $query=$this->db->from('tbl_nsx')->join('tbl_chitiet_nsx','tbl_chitiet_nsx.nid = tbl_nsx.nid')->where('tbl_chitiet_nsx.did',2)->where('active',1)->order_by('ntitle,tbl_nsx.nid','ASC')->get()->result_array();
            if($query){
                $_data=$query;
            }
            
            return $_data;
     }
        function _computer_brand_insert($t){
            $data = $this->input->post();
            $_data = array(
            'sploai'=>'2',
            'spnsx'=>$data["spnsx"],
            'sptitle'=>$data["sptitle"],
            'spkho'=>$data["spkho"],
            'spbh'=>$data["spbh"],
            'spgia'=>$data["spgia"],
            'spvat'=>$data["spvat"],
            'spkm'=>$data["spkm"],
            'spdes'=>$data["spdes"],
            'spcont'=>$data["spcont"],
            'sppic'=>'jpg',
            'spdate'=>$t,
            'spview'=>'0',
            'spd01'=>$data["spd01"],
            'spd02'=>$data["spd02"],
            'spd03'=>$data["spd03"],
            'spd04'=>$data["spd04"],
            'spd05'=>'',
            );
           $query=$this->db->insert('tbl_sanpham',$_data);
            return $query;
        }

     
     // may tin xach tay
     function _product_laptop_new(){
         $_data=array();
         $query=$this->db->from('tbl_nsx')->join('tbl_chitiet_nsx','tbl_chitiet_nsx.nid = tbl_nsx.nid')->where('tbl_chitiet_nsx.did',3)->where('active',1)->order_by('ntitle,tbl_nsx.nid','ASC')->get()->result_array();
            if($query){
                $_data=$query;
            }
            
            return $_data;
     }
     // insert
      function _computer_laptop_insert($t){
            $data = $this->input->post();
            $_data = array(
            'sploai'=>'3',
            'spnsx'=>$data["spnsx"],
            'sptitle'=>$data["sptitle"],
            'spkho'=>$data["spkho"],
            'spbh'=>$data["spbh"],
            'spgia'=>$data["spgia"],
            'spvat'=>$data["spvat"],
            'spkm'=>$data["spkm"],
            'spdes'=>$data["spdes"],
            'spcont'=>$data["spcont"],
            'sppic'=>'jpg',
            'spdate'=>$t,
            'spview'=>'0',
            'spd01'=>$data["spd01"],
            'spd02'=>$data["spd02"],
            'spd03'=>$data["spd03"],
            'spd04'=>$data["spd04"],
            'spd05'=>$data["spd05"],
            );
           $query=$this->db->insert('tbl_sanpham',$_data);
            return $query;
        }
     
     
      // check select option
     // dien tu am thanh
        function set_select($ktr){
            if ($ktr =="_select_dtam") {
                   $query = $this->db->select('dtitle,did')->from('tbl_danhsach')->where('dparent',4)->where('active','1')->order_by('dorder,did', 'ASC')->get()->result_array();
                   if($query){
                       foreach ($query as $key => $value) {
                           $this->_data_sl["dmat"]["Chọn danh mục sản phẩm âm thanh"][] = $value;
                       }
                   } //end if
            }//end if kt
            elseif($ktr =="_select_cap"){
                $query = $this->db->select('dtitle,did')->from('tbl_danhsach')->where('dparent',5)->where('active','1')->order_by('dorder,did',' ASC')->get()->result_array();
                   if($query){
                       foreach ($query as $key => $value) {
                           $this->_data_sl["cap"]["Chọn danh mục Cáp &amp; phụ kiện"][] = $value;
                       }
                   } //end if
            } elseif($ktr =="_select_tbvphong"){
                $query = $this->db->select('dtitle,did')->from('tbl_danhsach')->where('dparent',9)->where('active','1')->order_by('dorder,did',' ASC')->get()->result_array();
                   if($query){
                       foreach ($query as $key => $value) {
                           $this->_data_sl["tbvp"]["Chọn danh mục thiết bị văn phòng"][] = $value;
                       }
                   } //end if
            }elseif($ktr =="_select_lkien"){
                $query = $this->db->select('dtitle,did')->from('tbl_danhsach')->where('dparent',6)->where('active','1')->order_by('dorder,did',' ASC')->get()->result_array();
                   if($query){
                       foreach ($query as $key => $value) {
                           $this->_data_sl["splk"]["Chọn danh mục sản phẩm linh kiện"][] = $value;
                       }
                   } //end if
            }elseif($ktr =="_select_tbmang"){
                $query = $this->db->select('dtitle,did')->from('tbl_danhsach')->where('dparent',8)->where('active','1')->order_by('dorder,did',' ASC')->get()->result_array();
                   if($query){
                       foreach ($query as $key => $value) {
                           $this->_data_sl["tbm"]["Chọn danh mục thiết bị mạng"][] = $value;
                       }
                   } //end if
            }
            
            
        }
        function get_select(){
            return $this->_data_sl;
        }
        
        // cap nhat 
         //dien tu am thanh
       
       
         function set_option($sl_option){
             if($sl_option != 0 && $sl_option != ""){
                 $this->_option = $sl_option;
             }else{
                 $this->_option = 0;
             }
         }
         function get_option_sl(){
             return $this->_option;
         }
         function insert_amthanh($t){
              $data = $this->input->post();
            $_data = array(
            'sploai'=>$data["sploai"],
            'spnsx'=>$data["spnsx"],
            'sptitle'=>$data["sptitle"],
            'spkho'=>$data["spkho"],
            'spbh'=>$data["spbh"],
            'spgia'=>$data["spgia"],
            'spvat'=>$data["spvat"],
            'spkm'=>$data["spkm"],
            'spdes'=>$data["spdes"],
            'spcont'=>$data["spcont"],
            'sppic'=>'jpg',
            'spdate'=>$t,
            'spview'=>'0',
            'spd01'=>$data["spd01"],
            'spd02'=>$data["spd02"],
            'spd03'=>$data["spd03"],
            );
           $query=$this->db->insert('tbl_sanpham',$_data);
            return $query;
         }
         function insert_option($t){
              $data = $this->input->post();
            $_data = array(
            'sploai'=>$data["sploai"],
            'spnsx'=>$data["spnsx"],
            'sptitle'=>$data["sptitle"],
            'spkho'=>$data["spkho"],
            'spbh'=>$data["spbh"],
            'spgia'=>$data["spgia"],
            'spvat'=>$data["spvat"],
            'spkm'=>$data["spkm"],
            'spdes'=>$data["spdes"],
            'spcont'=>$data["spcont"],
            'sppic'=>'jpg',
            'spdate'=>$t,
            'spview'=>'0',
            );
           $query=$this->db->insert('tbl_sanpham',$_data);
            return $query;
         }
          function insert_option2($t){
              $data = $this->input->post();
            $_data = array(
            'sploai'=>$data["sploai"],
            'spnsx'=>$data["spnsx"],
            'sptitle'=>$data["sptitle"],
            'spkho'=>$data["spkho"],
            'spbh'=>$data["spbh"],
            'spgia'=>$data["spgia"],
            'spvat'=>$data["spvat"],
            'spkm'=>$data["spkm"],
            'spdes'=>$data["spdes"],
            'spcont'=>$data["spcont"],
            'sppic'=>'jpg',
            'spdate'=>$t,
            'spview'=>'0',
            'spd01'=>$data["spd01"],
            'spd02'=>$data["spd02"]
            );
           $query=$this->db->insert('tbl_sanpham',$_data);
            return $query;
         }
        function insert_option3($t){
              $data = $this->input->post();
            $_data = array(
            'sploai'=>$data["sploai"],
            'spnsx'=>$data["spnsx"],
            'sptitle'=>$data["sptitle"],
            'spkho'=>$data["spkho"],
            'spbh'=>$data["spbh"],
            'spgia'=>$data["spgia"],
            'spvat'=>$data["spvat"],
            'spkm'=>$data["spkm"],
            'spdes'=>$data["spdes"],
            'spcont'=>$data["spcont"],
            'sppic'=>'jpg',
            'spdate'=>$t,
            'spview'=>'0',
            'spd01'=>$data["spd01"],
            'spd02'=>$data["spd02"],
            'spd03'=>$data["spd03"],
            'spd04'=>$data["spd04"],
            'spd05'=>$data["spd05"]
            );
           $query=$this->db->insert('tbl_sanpham',$_data);
            return $query;
         }
         function insert_phanmen($t){
              $data = $this->input->post();
            $_data = array(
            'sploai'=>$data["sploai"],
            'spnsx'=>$data["spnsx"],
            'sptitle'=>$data["sptitle"],
            'spkho'=>$data["spkho"],
            'spbh'=>$data["spbh"],
            'spgia'=>$data["spgia"],
            'spvat'=>$data["spvat"],
            'spkm'=>$data["spkm"],
            'spdes'=>$data["spdes"],
            'spcont'=>$data["spcont"],
            'sppic'=>'jpg',
            'spdate'=>$t,
            'spview'=>'0',
            );
           $query=$this->db->insert('tbl_sanpham',$_data);
            return $query;
         }
        // danh sach san pham
        
          function product_list_del(){
           $list = $this->uri->segment(4);
           $query = $this->db->where('spid',$list)->delete('tbl_sanpham');
       }
       
    // update and dell_all
 
    function product_delete_all($data){
             $this->db->delete('tbl_sanpham',$data);
    }
    function load_sploai($list){
        $query= $this->db->select("sploai")->where("spid",$list)->get("tbl_sanpham")->result_array();
        return $query;
    }
    function product_load_update($list){
         if(isset($list) && is_numeric($list)){
             
             $data["product"] = $this->db->from('tbl_sanpham')->where('spid',$list)->get()->result_array();
             if (!isset($data[0]["sploai"]) || $data[0]["sploai"] == "" ){
                 $data[0]["sploai"]=0;
             }
           //  $data[0][$data[0]["sploai"]] = $this->db->from('tbl_danhsach')->where('did',$data[0]["sploai"])->get()->result_array();
             
             return $data;
         }
    }
        
        // don hang
      function order_list_del(){
           $list = $this->uri->segment(4);
           $query = $this->db->where('hid',$list)->delete('tbl_hoadon');
       }
       
    // update and dell_all
 
    function order_delete_all($data){
             $this->db->delete('tbl_hoadon',$data);
    }
        
       // phan men ban quyen
       function _soft_copyright(){
           $_data = array();
           $query = $this->db->select('ntitle,nid')->from('tbl_nsx')->where('active',1)->order_by('ntitle',' ASC')->get()->result_array();
               if($query){
                 foreach ($query as $key => $value) {
                    $_data["phanmen"][] = $value;
                }
                 
                 return $_data;
           }
       }
       // danh sach cac san pham link kien
       function _product_list_lk($limit,$offset){
           $uri6 = $this->uri->segment(6);
           $uri7 = $this->uri->segment(7);$uri_6 ="";$uri_7="";
           $where =  "";
           if(is_numeric($uri6) && $uri6 != 0){
           $uri_6 = "sploai =".$uri6;
               $where = "where ";
           }
           if (is_numeric($uri7) && $uri7 != 0 ) {
           $uri_7 = "spnsx =".$uri7;  
                $where = "where ";  
           }
           if( $uri6 != 0 && $uri7 != 0){
              $where .= $uri_6." and ".$uri_7." "; 
           }else{
             $where .= $uri_6.$uri_7." ";   
           }
           
            $_data = array();
            $query= $this->db->query('SELECT spid,sploai,spnsx,spkho,spkm,sptitle,spview,sppic,spdate,spgia FROM tbl_sanpham '.$where.'ORDER BY spid DESC LIMIT '.$limit,$offset)->result_array();
                if($query){
                    foreach ($query as $key => $value) {
                        $_data[] = $value;
                    }
                }
                
                return $_data;
       }
       function _product_count(){
           $uri6 = $this->uri->segment(6);
           $uri7 = $this->uri->segment(7);$uri_6 ="";$uri_7="";
           $where =  "";
           if(is_numeric($uri6) && $uri6 != 0){
           $uri_6 = "sploai =".$uri6;
               $where = "where ";
           }
           if (is_numeric($uri7) && $uri7 != 0 ) {
           $uri_7 = "spnsx =".$uri7;  
                $where = "where ";  
           }
           if( $uri6 != 0 && $uri7 != 0){
              $where .= $uri_6." and ".$uri_7." "; 
           }else{
             $where .= $uri_6.$uri_7." ";   
           }
            $query = $this->db->query('SELECT Count(*) as countsp FROM tbl_sanpham '.$where)->result_array();
                return $query[0]["countsp"];
       }
       
       
        function pagesListLimit($totalRows , $pageSize = 5, $offset = 5){
            $uri6 = $this->uri->segment(6);
           $uri7 = $this->uri->segment(7);
        if ($totalRows<=0) return "";
        else $totalPages = ceil($totalRows/$pageSize);
        if ($totalPages<=1) return "";
        $currentURL = base_url("admin/Permission/menber_area")."/$pageSize";
        $url = $offset;
        if( isset($url) == true)  $currentPage = ($url+1);
        else $currentPage = 1;
        settype($currentPage,"int");    
        if ($currentPage <=0) $currentPage = 1;
        
        $links = "Trang ";  
        $from = $currentPage - 2; 
        $to = $currentPage + 2;
        if ($from < 0) { $from = 0;$to = 5;}
        if ($to > $totalPages) { $to = $totalPages; }
        for($j = $from; $j < $to; $j++) {
           if (($j+1) == $currentPage) $links = $links . "<span>".($j+1)."</span>";       
           else{                
            $qt = ($j);
            $links= $links . "<a href = '$currentURL/{$qt}/{$uri6}/{$uri7}'>".($j+1)."</a>";
           }       
        } //for
        return $links;
    }
       // gio hang 
       
       function set_order_giohang($gh){
           if($gh =="_order_linhkien"){
                $query = $this->db->select('fullname,gloai,email,diachi,phone,hid,yeucau,timepost,xuly')->from('tbl_hoadon')->join('tbl_user','tbl_user.user_id = tbl_hoadon.uid')->where('gloai','le')->order_by('hid',' DESC')->get()->result_array();
                   if($query){
                       foreach ($query as $key => $value) {
                           $this->_data_gh["DANH SÁCH ĐƠN ĐẶT HÀNG LINH KIỆN MÁY TÍNH"][] = $value;
                       }
                   } //end if
           } //end if
           elseif($gh =="_order_cauhinh"){
               $query = $this->db->select('fullname,gloai,email,diachi,phone,hid,yeucau,timepost,xuly')->from('tbl_hoadon')->join('tbl_user','tbl_user.user_id = tbl_hoadon.uid')->where('gloai','bo')->order_by('hid',' DESC')->get()->result_array();
                   if($query){
                       foreach ($query as $key => $value) {
                           $this->_data_gh["DANH SÁCH ĐƠN ĐẶT HÀNG CẤU HÌNH MÁY TÍNH"][] = $value;
                       }
                   } //end if
           }//end if 
                   
       }
        function get_order_giohang(){
            return $this->_data_gh;
        }
       
       function tintuc_list(){
           $_data = array();
           $query= $this->db->from('tintuc')->order_by('nid','DESC')->get()->result_array();
           foreach ($query as $key => $value) {
               $_data[] = $value;
           }
           return $_data;
       }
       function acticle_insert($data){
         return  $this->db->insert('tbl_tintuc',$data);
       }
       //he thong
        function set_hethong($sl){
            if($sl =="_gioithieu"){
                $this->_hethong["gioithieu"] = $this->db->get("tbl_gioithieu")->result_array();
            }elseif($sl == "_chinhsach"){
                $this->_hethong["chinhsach"] = $this->db->get("tbl_chinhsach")->result_array();
            }elseif($sl == "_baohanh"){
                $this->_hethong["baohanh"] = $this->db->get("tbl_baohanh")->result_array();
            }elseif($sl == "_khuyenmai"){
                $this->_hethong["khuyenmai"] = $this->db->get("tbl_khuyenmai")->result_array();
            }
        }
        function get_hethong(){
            return $this->_hethong;
        }
        function hethong_gioithieu($data){
            return $this->db->where("gtid",$data["gtid"])->update('tbl_gioithieu',$data);
        }
        function hethong_chinhsach($data){
            return $this->db->where("csid",$data["csid"])->update('tbl_chinhsach',$data);
        }
        function hethong_baohanh($data){
            return $this->db->where("bhid",$data["bhid"])->update('tbl_baohanh',$data);
        }
        function hethong_khuyenmai($data){
            return $this->db->where("kmid",$data["kmid"])->update('tbl_khuyenmai',$data);
        }
        // bao gia
        function baogia(){
            $_data =array();
            $query =$this->db->from('baogia')->order_by('bgid','DESC')->get()->result_array();
            foreach ($query as $key => $value) {
                $_data[] = $value;
            }
            return $_data;
        }
        function baogia_del($id){
            $url = $this->uri->segment(4);
            $this->db->where("bgid",$url)->delete("tbl_baogia");
        }
        function baogia_update($data){
            $this->db->update_batch('tbl_baogia',$data,"bgid");
        }
        function baogia_active($id,$active){
            $this->db->query("UPDATE tbl_baogia SET active ='".$active."' WHERE bgid ='".$id."'");
        }
        function baogia_insert($data){
            $this->db->insert('tbl_baogia',$data);
        }
        function baogia_load_update($id){
            return $this->db->from('tbl_baogia')->where('bgid',$id)->get()->result_array();
        }
        function _save_baogia($data){
            $dl = $this->input->post();
               $_data[] = array(
               'bgid'=> $dl["bgid"],
               'bgtitle'=>$dl["bgtitle"],
               'bgfile' =>$data["bgfile"],
               'bgdate' =>$data["bgdate"],
               'active' =>$dl["active"]
               );
         return  $this->db->update_batch('tbl_baogia',$_data,'bgid');
        }
        
        function sodo(){
            return $this->db->get('tbl_sododuongdi')->result_array();
        }
        function _save_sodo($data){
            $dl = $this->input->post();
               $_data = array(
               'sdid'=> $dl["sdid"],
               'sdcont'=>$dl["sdcont"],
               'sdpic' =>$data["sdpic"],
               'sddate' =>$data["sddate"],
               );
         return  $this->db->where('sdid',$_data["sdid"])->update('tbl_sododuongdi',$_data);
        }
    function _save_sodo2(){
            $dl = $this->input->post();
               $_data = array(
               'sdid'=> $dl["sdid"],
               'sdcont'=>$dl["sdcont"],
               'sdpic' =>$dl["sdpic"],
               'sddate' =>$dl["sddate"],
               );
         return  $this->db->where('sdid',$dl["sdid"])->update('tbl_sododuongdi',$_data);
        }
        function _client_del(){
            $url = $this->uri->segment(4);
           return $this->db->where("ctid",$url)->delete('tbl_lienhe');
        }
        // tieu diem flash
        function flash(){
            $_data = array();
            $query= $this->db->from('tbl_flash')->order_by('fid','DESC')->get()->result_array();
            foreach ($query as $key => $value) {
                $_data[] = $value;
            }
            return $_data;
        }
        function _load_flash($id){
            return $_data["flash"]=$this->db->where("fid",$id)->get('tbl_flash')->result_array();
        }
        function _flash_update($data){
            $dl = $this->input->post();
               $_data[] = array(
               'fid'=> $dl["fid"],
               'fcont'=>$dl["fcont"],
               'flink'=>$dl["flink"],
               'fpic' =>$data["sdpic"],
               'fdate' =>$data["spdate"],
               );
         return  $this->db->update_batch('tbl_flash',$_data,'fid');
        }
         function _flash_update2(){
            $dl = $this->input->post();
               $_data[] = array(
               'fid'=> $dl["fid"],
               'fcont'=>$dl["fcont"],
               'flink'=>$dl["flink"],
               'fpic' =>$dl["fpic"],
               'fdate' =>$dl["fdate"],
               );
         return  $this->db->update_batch('tbl_flash',$_data,'fid');
        }
        // lien he
        function lienhe(){
            $_data = array();
           $query= $this->db->from('tbl_lienhe')->order_by('ctid','DESC')->get()->result_array();
           foreach ($query as $key => $value) {
               $_data[] = $value;
           }
           return $_data;
        }
        function nhanvien(){
            $query = $this->db->select('user_id,email')->where('permission','2')->get('tbl_user')->result_array();
            return $query;
        }
        function nhanvien_update(){
            $data = $this->input->post();
            $_data = array(
             array('user_id' => $data["user_1"],
                    'email' => $data["user1"]),
             array('user_id' => $data["user_2"],
                    'email' => $data["user2"]),
             array('user_id' => $data["user_3"],
                    'email' => $data["user3"]),
             array('user_id' => $data["user_4"],
                    'email' => $data["user4"]),                     
            );
            $this->db->update_batch('tbl_user',$_data,'user_id');
        }
function contact_khachhang(){
    $ctid = $this->input->post('ctid');
    $data = array('re_contact'=>$this->input->post('re_contact'));
    $query = $this->db->where('ctid',$ctid)->update('tbl_lienhe',$data);
    return $query;
}
 }//end class
 
?>