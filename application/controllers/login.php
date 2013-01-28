<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login extends CI_Controller{
        function __construct(){
            
            parent::__construct();
        }
        
        public function index(){
            
        }
        
        public function checkLogin()
        {
            $this->load->model('muser');
            $this->load->library("session");
            if ($this->input->post('login'))
            {
                
                $email = $this->security->xss_clean($this->input->post('email'));
                $password = $this->security->xss_clean($this->input->post('password'));
                if (empty($email))
                    echo "Bạn phải nhập địa chỉ email ! ";
                elseif (empty($password))
                    echo "Bạn phải nhập mật khẩu ! ";
                else
                {
                    $password = md5($password);
                    if ($this->muser->checkUser($email,$password))
                    {
                        echo "success";
                        $data = array(
                            'email' => $email,
                            'log_in' => true,
                        );
                        
                        $this->session->set_userdata($data);
                    }
                    else
                        echo "Email hoặc mật khẩu không tồn tại ! ";
                }
                    
            }       
        }
        
        public function logout(){
            $this->load->library("session");
            $this->session->sess_destroy();
            redirect('/');
        }
        
        public function register()
        {
            $this->load->library('session');
            $this->load->model('muser');
            
            if ($this->input->post('register'))
            {
                $email = $this->security->xss_clean($this->input->post('email'));
                $passw1 = $this->security->xss_clean($this->input->post('password1'));
                $passw2 = $this->security->xss_clean($this->input->post('password2'));
                $name = $this->security->xss_clean($this->input->post('fullname'));
                $phone = $this->security->xss_clean($this->input->post('phone'));
                $address = $this->security->xss_clean($this->input->post('address'));
                $sex = $this->input->post('gender');
                
                if ($this->validateRegister($email,$passw1,$passw2,$name,$phone,$address))
                {
                    if ($this->muser->addUser($name,$email,$passw1,$address,$sex,$phone))
                    {
                        $data = array(
                            'email' => $email,
                            'log_in' => true
                        );
                        
                        $this->session->set_userdata($data);
                        echo 'success';
                    }
                }
            }
        }
        
        
        private function validateRegister($email,$passw1,$passw2, $name, $phone, $address)
        {
            $this->load->model('muser');
            if (empty($email)){
                echo "Hãy nhập email của bạn.";
                return false;
            }
            elseif($this->muser->checkExistEmail($email)){
                echo "Email này đã có người đăng ký rồi.";
                return false;
            }
            elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo "Email không đúng định dạng.";
                return false;
            }
            elseif ($passw1!==$passw2){
                echo "Mật khẩu không trùng nhau";
                return false;
            }
            elseif(empty($passw1) || empty($passw2)){
                echo "Không được để trống mật khẩu.";
                return false;
            }
            elseif(empty($name)){
                echo "Hãy nhập tên của bạn.";
                return false;
            }
            elseif(empty($phone)){
                echo "Hãy nhập số điện thoại của bạn.";
                return false;
            }
            elseif(!preg_match('/^\d{10,11}$/i',$phone)){
                echo "Điện thoại không đúng định dạng";
                return false;
            }
            elseif(empty($address)){
                echo "Hãy nhập địa chỉ của bạn.";
                return false;
            }
            
            return true;
            
        }
        
        public function changePass()
        {
            $this->load->model('muser');
            $this->load->library('session');
            if ($this->input->post('changePass') && $this->session->userdata('email'))
            {
                $email = $this->session->userdata('email');
                $pass = $this->security->xss_clean($this->input->post('pass'));
                $new_pass = $this->security->xss_clean($this->input->post('new_pass'));
                $re_pass = $this->security->xss_clean($this->input->post('re_pass'));
                
                if (empty($pass) || empty($new_pass) || empty($re_pass))
                    echo "Bạn phải điền đầy đủ thông tin" ;
                elseif (!$this->muser->checkUser($email,md5($pass)))
                    echo "Mật khẩu cũ không đúng !";
                elseif ($new_pass != $re_pass)
                    echo "Mật khẩu không trùng nhau ! ";
                else
                {
                    if ($this->muser->changePassword($email,md5($new_pass)))
                        echo "success";
                    
                }
                
            }
        }
        
        public function changeInfo()
        {
            $this->load->model('muser');
            $this->load->library('session');
            if ($this->input->post('changeInfo') && $this->session->userdata('email'))
            {
                $email = $this->session->userdata('email');
                $fullname = $this->security->xss_clean($this->input->post('fullname'));
                $address = $this->security->xss_clean($this->input->post('address'));
                $sex = $this->input->post('sex');
                $phone = $this->security->xss_clean($this->input->post('phone'));
                
                if (empty($fullname) || empty($address) || empty($phone) )
                    echo "Bạn phải điền đầy đủ thông tin";
                else
                    if ($this->muser->changeInfo($email,$fullname,$address, $sex, $phone))
                        echo "success";
            }
            
        }
                
    }