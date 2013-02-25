<?php  
 /**
  * 
  */
 class Login extends CI_Controller {
     private $_data=array();
     function __construct() {
         parent::__construct();
         $this->load->library('form_validation');
         $this->load->library('session');
         $this->load->model('admin/mlogin');
     }
     function index(){
         $user=$this->session->userdata('user');
         if(isset($user) && $user !="" ){
             $this->session->set_flashdata('main_content','_main_root');
             redirect('admin/Permission/menber_area');
         }else{
             $this->load->view('admin/login',$this->_data);
         }
        
     }
     function checklogin(){
         $this->form_validation->set_rules('txt_login','Email','trim|required|valid_email|min_length[6]');
         $this->form_validation->set_rules('txt_pass','Password','trim|required|min_length[4]');
         
         if($this->form_validation->run()==FALSE){
             $this->_data['islogin']=1;
             $this->index();
         }else{
             $query=$this->mlogin->login();
             
             if($query){
                 $this->_data=array(
                    'user'=>$this->input->post('txt_login'),
                    'is_login_in'=>TRUE
                 );
                 
             $this->session->set_flashdata('main_content','_main_root');
                 $this->session->set_userdata($this->_data);
                redirect('admin/Permission/menber_area');
                 
             }else{
                 $this->_data['error']='Username or Password is not match';
                 $this->index();
             }
         }
     }
    
    
    function logout(){
            $this->session->unset_userdata('user');
            redirect("admin/login/");
        
    }
    
    function change_pass(){
        $_data = array();
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]');
        $this->form_validation->set_rules('pass2','Re-Password','matches[password]');
        $this->form_validation->set_rules('email','Email','trim|required|min_length[4]|vaild_email');
               if($this->form_validation->run()==FALSE){
                   return $_data["change_mess"] ="";
                
            }else{
                 if($this->mlogin->_changepass()==TRUE){
                   return $_data["change_mess"]="Đổi mật khẩu thành công !";
                }else{
                 return  $_data["change_mess"] = "Đổi mật khẩu thất bại .!";
                }
            }
    }
      
 }// end class
 
?>