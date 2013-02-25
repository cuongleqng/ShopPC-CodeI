<?php $this->load->view('admin/includes/header'); ?>


<?php $this->load->view('admin/includes/left'); ?>
                      
        <!--            
              CONTENT 
                        --> 
        <div id="content">
            
<?php $this->load->view('admin/'.$main_content); ?>

        </div> <!-- end content -->
         

         
<?php $this->load->view('admin/includes/footer') ?>