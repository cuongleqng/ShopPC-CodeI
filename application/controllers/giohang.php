<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Giohang extends CI_Controller{
        
        function __construct(){
            
            parent::__construct();
            $this->load->library(array('cart','session'));
            $this->load->model('mbaogia');
        }
        
        public function showLeftCart()
        {
            $this->load->view('left_giohang');
        }
        
        public function emptyCart()
        {
            
            $this->cart->destroy();
        }
        
        
        public function addCart()
        {    
           
            if ($this->input->post('spid') && is_numeric($this->input->post('spid')))
            {
                $spid = intval($this->input->post('spid'));
                $info = $this->mbaogia->getInfoProduct($spid);
                $data = array(
                    'id' => $spid,
                    'qty' => 1,
                    'price' => $info['spgia'],
                    'name' => url_title($info['sptitle'])
                );
                
                $this->cart->insert($data);
                echo $this->cart->total_items();
 
            }
        }
        
        public function updateCart()
        {
            if ($this->input->post('ajax'))
            {
                $rowid = $this->input->post('rowid');
                $data = array(
                    'rowid' => $rowid,
                    'qty' => 0
                );
                $this->cart->update($data);
                echo number_format($this->cart->total(),0,",",".");
            }
            else
            {
                $total = $this->cart->total_items();
                $item = $this->input->post('rowid');
                $qty = $this->input->post('qty');
                
                for ($i=0 ; $i<$total ; $i++)
                {
                    if (is_numeric($qty[$i]))
                        $valid_qty = $qty[$i];
                    else
                        break;
                    $data = array(
                        'rowid' => $item[$i],
                        'qty' => intval($valid_qty)
                    );
                    
                    $this->cart->update($data);
                }
                redirect('gio-hang');
            }
        }
        
        public function insertCart()
        {
            $this->load->model(array('muser','mhoadon'));
            $username = $this->security->xss_clean($this->input->post('fullname'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $phone = $this->security->xss_clean($this->input->post('phone'));
            $comm = $this->security->xss_clean($this->input->post('content'));
            
            
            if (empty($username) || empty ($address) || empty($phone))
            {
                echo "Bạn phải điền đầy đủ thông tin ! ";
            }
            elseif ($this->input->post('code') != $this->session->flashdata('security_code'))
            {   
                echo "Mã bảo vệ không đúng !";   
            }
            else
            {
                if ($this->input->post('linhkien'))
                {
            
                    if ($this->session->userdata('email') && $this->session->userdata('log_in') == TRUE )
                    {
                            $result = $this->muser->getInfoUser($this->session->userdata('email'));
                            $userid = $result['user_id'];
                            $this->mhoadon->insertHoadonLK($comm,$userid);
                    }
                    else
                    {
                        //Chưa login thì thêm user vào database
                        $uid = $this->muser->addUser($username,"","",$address,"",$phone);
                        //Insert hóa đơn vào database
                        $this->mhoadon->insertHoadonLK($comm,$uid);
                    }
                    
                    echo "success";
                }
                elseif ($this->input->post('cauhinh'))
                {
                    // Nếu khách hàng chọn xây dựng cấu hình.
                    
                    $arr_ch = array();
                    if ($this->input->post('cpu') && is_numeric($this->input->post('cpu')))
                        $arr_ch[] = $this->input->post('cpu');
                        
                    if ($this->input->post('mainboard') && is_numeric($this->input->post('mainboard')))
                        $arr_ch[] = $this->input->post('mainboard');
                    
                    if ($this->input->post('ram') && is_numeric($this->input->post('ram')))
                        $arr_ch[] = $this->input->post('ram');
                        
                    if ($this->input->post('hdd') && is_numeric($this->input->post('hdd')))
                        $arr_ch[] = $this->input->post('hdd');
                    
                    if ($this->input->post('vga') && is_numeric($this->input->post('vga')))
                        $arr_ch[] = $this->input->post('vga');
                        
                    if ($this->input->post('monitor') && is_numeric($this->input->post('monitor')))
                        $arr_ch[] = $this->input->post('monitor');
                    
                    if ($this->input->post('cse') && is_numeric($this->input->post('case')))
                        $arr_ch[] = $this->input->post('case');
                        
                    if ($this->input->post('power') && is_numeric($this->input->post('power')))
                        $arr_ch[] = $this->input->post('power');
                        
                    if ($this->input->post('mouse') && is_numeric($this->input->post('mouse')))
                        $arr_ch[] = $this->input->post('mouse');
                        
                    if ($this->input->post('keyboard') && is_numeric($this->input->post('keyboard')))
                        $arr_ch[] = $this->input->post('keyboard');
                        
                    if ($this->input->post('odd') && is_numeric($this->input->post('odd')))
                        $arr_ch[] = $this->input->post('odd');
                        
                    if ($this->input->post('speaker') && is_numeric($this->input->post('speaker')))
                        $arr_ch[] = $this->input->post('speaker');
                    
                    // Xử lý tổng tiền ###.###.### => #########
                    if ($this->input->post('sum'))
                    {
                        $sum = str_replace(".","",$this->input->post('sum'));
                        if (is_numeric($sum))
                            $sum = intval($sum);
                        else
                            $sum = 0;
                    }
                        
                    
                    
                    if ($this->session->userdata('email') && $this->session->userdata('log_in') == TRUE )
                    {
                            $result = $this->muser->getInfoUser($this->session->userdata('email'));
                            $userid = $result['user_id'];
                            $this->mhoadon->insertHoadonCH($arr_ch, $comm, $sum,$userid);
                    }
                    else
                    {
                        $uid = $this->muser->addUser($username,"","",$address,"",$phone);
                        //Insert hóa đơn vào database
                        $this->mhoadon->insertHoadonCH($arr_ch,$comm, $sum ,$uid);
                    }
                        
                    echo 'success';
                   
                    
                }
                
            }
            
            
            
           
            
        }
    }