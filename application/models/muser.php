<?php

    class Muser extends CI_Model{
        
        function __construct(){
            parent::__construct();
        }
        
        
        
        public function checkUser($email, $password){
            
            $query = $this->db->get_where("user",array('email' => $email, 'password' => $password),1);
            if ($query->num_rows())
                return true;
            else
                return false;
        }
        
        public function checkExistEmail($email)
        {
            $query = $this->db->get_where("user",array('email' => $email),1);
            if ($query->num_rows())
                return true;
            else
                return false;
        }
        
        public function addUser($name="", $email="", $password="", $address="", $sex="", $phone=""){
            $data = array(
                'fullname' => $name,
                'password' => md5($password),
                'email' => $email,
                'diachi' => $address,
                'sex' => $sex,
                'phone' => $phone,
                'permission' => 2
            );
            
            $query = $this->db->insert("user",$data);
            return $this->db->insert_id();
        }
        
        public function getInfoUser($email)
        {
            $query = $this->db->get_where("user",array('email' => $email),1);
            if ($query->num_rows())
            {
                return $query->row_array();
            }
            
        }
        
        
        
    }