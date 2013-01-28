<?php

    class Msupport extends CI_Model{
        
        function __construct()
        {
            parent::__construct();
        }
        
        public function getSupport()
        {
            $query = $this->db->get("support",1);
            if ($query->num_rows())
                return $query->row_array();
            
        }
    }