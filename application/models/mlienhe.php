<?php
    class Mlienhe extends CI_Model{
        
        function __construct(){
            
        }
        
        public function send()
        {
            //X�a m� x�c nh?n trong array
            $data = $this->input->post();
            unset($data['code']);
            
            // Th�m tru?ng datasubmit v�o trong array
            $data["datesubmit"] = date( "Y-m-d H:i:s" );
            return $this->db->insert("lienhe",$data);
        }
    }
?>