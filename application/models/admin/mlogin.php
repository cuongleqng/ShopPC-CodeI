<?php
 /**
  * 
  */
 class Mlogin extends CI_Model {
     function __construct() {
         parent::__construct();
         $this->load->database();
     }
     private $change_erro;
     function login(){
         $name=$this->input->post('txt_login');
         $pass=$this->input->post('txt_pass');
         $this->db->where('email',$name);
         $this->db->where('password',md5($pass));
         $query=$this->db->get('tbl_user');
         if($query->num_rows==1){
             return TRUE;
         }
     }
     function report_main(){
         $_data=array();
        $_data['dm']=$this->db->get('tbl_danhsach')->num_rows();
        $_data['nsx']=$this->db->get('tbl_nsx')->num_rows();
        $_data['mtth']=$this->db->where('sploai',2)->get('tbl_sanpham')->num_rows();
        $_data['mtxt']=$this->db->where('sploai',3)->get('tbl_sanpham')->num_rows();
        $_data['usb']=$this->db->where('sploai',10)->get('tbl_sanpham')->num_rows();
        $_data['sp']=$this->db->get('tbl_sanpham')->num_rows();
        $_data['dhmt']=$this->db->where('gloai','bo')->get('tbl_hoadon')->num_rows();
        $_data['dmlk']=$this->db->where('gloai','le')->get('tbl_hoadon')->num_rows();
        $_data['dhht']=$this->db->where('xuly','Đã thanh toán')->get('tbl_hoadon')->num_rows();
        $_data['lh']=$this->db->get('tbl_lienhe')->num_rows();
        return $_data;
     }
     function load_user($user){
         $this->db->select('username,fullname,email,user_id');
         $this->db->where('email',$user);
         $sql=$this->db->get('tbl_user')->result();
        return $sql;
     }

    function  _changepass(){
        $email=$this->input->post("email");
        $_data= array(
        'username'=>$this->input->post('username'),
        'password'=>md5($this->input->post('password')),
        'fullname'=>$this->input->post('fullname'),
        
        );
        $query= $this->db->where('email',$email)->update('tbl_user',$_data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
        
        
        
    }
   
    function change_pass(){
        $rp_erro;
             if($this->mlogin->_changepass()==TRUE){
                  $rp_erro ="Đổi mật khẩu thành công !";
               
                }else{
                  $rp_erro = "Đổi mật khẩu thất bại .!";
               
                }
           return $rp_erro;
          
    }
    function set_change_erro(){
        return $this->change_erro;
    }
    
    
  
 }
 
?>