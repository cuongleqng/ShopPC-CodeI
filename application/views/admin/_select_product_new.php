<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
       CHỌN LOẠI SẢN PHẨM CẦN THÊN SẢN PHẨM MỚI
    </div>
    <div class="content">
        <form action="" method="get" id="frm_sl">
        <div class="div_center tb_center">
            <?php 
            
            $_data=array();
            $title_select="";
            $sl_name="";
                        
                      if (isset($update_select_content)) {
                        foreach ($update_select_content as $key => $value ) {
                            $sl_name = $key;
                             foreach ($value as $key1 => $value1) {
                                        $_data=$value1;
                                     $title_select=$key1; 
                              }
                           }  
                        }   
            ?>
               <span class="sp_title" style="font-size: 15px;"><?php echo $title_select; ?> :</span>
                &nbsp;
                <select name="dmat" id="<?php echo $sl_name;  ?>">
                                <option value="0">Chọn hãng sản xuất</option>
                                <?php 
                                    foreach ($_data as $key => $value) {
                                            echo '<option value="'.$value["did"].'">&raquo;   '.$value["dtitle"].'</option>';
                                        }
                                 ?>
               </select>
        </div>
        
        </form>
        
        
    </div>
</div>



