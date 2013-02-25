<?php 
 /**
  * 
  */
 class m_upload extends CI_Model {
     
     var $gallery_path="";
     var $gallery_path_url="";
     function __construct() {
         parent::__construct();
         $this->gallery_path= realpath(APPPATH."../images");
         $this->gallery_path_url=base_url()."../images";
         $this->load->helper('date');
     }
     function upload_img(){
       $_data= array();  
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path."/logo",
            'max_size' => 2000,
            'file_name'=>time(),
        );
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload()){
            return $_data["false"] =$this->upload->display_errors();
        }else{
            $img_data = $this->upload->data();
            
            $mang= explode(".",$img_data["file_ext"]);
            $_data["npic"]= $mang[1];
            $_data["ndate"]=$img_data["raw_name"];
            return $_data;
        }
     }
     function upload_tintuc(){
       $_data= array();  
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path."/tintuc",
            'max_size' => 2000,
            'file_name'=>time(),
        );
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload()){
            return $_data["false"] =$this->upload->display_errors();
        }else{
            $img_data = $this->upload->data();
            
            $mang= explode(".",$img_data["file_ext"]);
            $_data["npic"]= $mang[1];
            $_data["ndate"]=$img_data["raw_name"];
            return $_data;
        }
     }
    function upload_baogia(){
       $_data= array();  
        $config = array(
            'allowed_types' => 'xls',
            'upload_path' => $this->gallery_path."/baogia",
            'file_name'=>time(),
        );
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload()){
            return $_data["false"] =$this->upload->display_errors();
        }else{
        $img_data = $this->upload->data();
        
        $mang= explode(".",$img_data["file_ext"]);
        $_data["bgfile"]= $mang[1];
        $_data["bgdate"]=$img_data["raw_name"];
        return $_data;
        }
     }
function upload_flash(){
       $_data= array();  
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path."/flash",
            'file_name'=>time(),
        );
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload()){
            return $_data["false"] =$this->upload->display_errors();
        }else{
        $img_data = $this->upload->data();
        
        $mang= explode(".",$img_data["file_ext"]);
        $_data["bgfile"]= $mang[1];
        $_data["bgdate"]=$img_data["raw_name"];
        return $_data;
        }
     }
     function upload_thumb($cate,$anh1,$t){
        $gettmp=$_FILES[$anh1]["tmp_name"];
        $getname=$_FILES[$anh1]["name"];
        $getsize=round($_FILES[$anh1]["size"]/1024,0);
        $gettype=$_FILES[$anh1]["type"];
        $gettime=$t;
        if(preg_match("[jpg|png|jpeg|gif]",$gettype)!=0)
       move_uploaded_file($gettmp,$this->gallery_path."/product/".$cate."_".$gettime.".jpg");
     }
 }
 
?>