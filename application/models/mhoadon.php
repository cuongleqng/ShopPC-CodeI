<?php

    class Mhoadon extends CI_Model
    {
    
        function __construct(){
            parent::__construct();
        }
        
        public function insertHoadon($loaihd, $yeucau, $user)
        {
            $this->load->library('cart');
            $data = array(
                'yeucau' => $yeucau,
                'gloai' => $loaihd,
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
        
    }