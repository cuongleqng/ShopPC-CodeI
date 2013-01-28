<?php

    class Mhoadon extends CI_Model
    {

        function __construct(){
            parent::__construct();
            
        }
        
        public function insertHoadonLK($yeucau, $user)
        {
            $this->load->library('cart');
            $data = array(
                'yeucau' => $yeucau,
                'gloai' => 'le',
                'timepost' => time(),
                'xuly' => 'Chờ xử lý',
                'tongtien' => $this->cart->total(),
                'uid' => $user
            );
            
            $this->db->insert('hoadon',$data);
            $hd = $this->db->insert_id();
            
            //Insert vao table cthoadon
            
            
            
            foreach ($this->cart->contents() as $item)
            {
                $this->db->flush_cache();
                $data = array(
                    'hid' => $hd,
                    'spid' => $item['id'],
                    'soluong' => $item['qty'],
                    'gia' => $item['price']
                );
                
                $this->db->insert('cthoadon',$data);
            }
    
        }
        
        public function insertHoadonCH($arr_ch, $yeucau, $sum, $user)
        {
            $this->load->model('mbaogia');
            $data = array(
            
                'yeucau' => $yeucau,
                'gloai' => 'bo',
                'timepost' => time(),
                'xuly' => 'Chờ xử lý',
                'tongtien' => $sum,
                'uid' => $user
            );
            
            $this->db->insert('hoadon',$data);
            $hd = $this->db->insert_id();
            
            foreach ($arr_ch as $item)
            {
                $this->db->flush_cache();
                
                $res = $this->mbaogia->getInfoProduct($item);
                $price = $res['spgia'];
                
                $data = array(
                    'hid' => $hd,
                    'spid' => $item,
                    'soluong' => 1,
                    'gia' => $price
                );
                
                $this->db->insert('cthoadon',$data);
                
            }
            
        }
        
    }