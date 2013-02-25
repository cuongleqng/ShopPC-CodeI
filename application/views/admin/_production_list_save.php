<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        SỬA HÃNG SẢN XUẤT
    </div>
    <div class="content">
        <form action="../proccess_main/production_update" enctype="multipart/form-data" id="upload_frm" accept-charset="utf-8"  method="post">
        
        <table class="tb_border tb_right_id">
            <tbody>
                        <?php
                         $_data= array();
                         $data = array(); 
                        
                           if(is_array($category_regular["nsx"]))
                            
                            foreach ($category_regular["nsx"] as $key5 => $value5) {
                              
                                foreach ($value5 as $key6 => $value6) {
                                    
                                    if(is_array($value6)){
                                        $_data[] = $value6;
                                               
                                    }
                                }
                            }
                             
                         ?> 
                    <tr>
                        <td colspan="3" style="text-align: center;"><?php echo $loier; ?></td>
                    </tr> 
                        <tr>
                                 
                    <td style="text-align:right;padding-right: 2%;"><span class="sp_title">Tên hãng sản xuất : </span></td>
                    <td class="td_short" style="text-align: left;margin-left: 2%">
                        <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $category_regular["nsx"][0]["nid"]; ?>" />
                        <input type="text" name="txt_title" id="txt_id" value="<?php echo $category_regular["nsx"][0]["ntitle"]; ?>" /></td>
                    <td class="td_long" style="text-align: center;"><span class="sp_title">Các hãng sản xuất :</span></td>
                      </tr>
                      
                      <tr>
                            <td style="text-align:right;padding-right: 2%;"><span class="sp_title">Logo (80x26 Pixel) :</span></td>
                            <td class="td_short">
                                    <?php echo form_upload('userfile'); ?>
                                
                            </td>
                            
                            <td rowspan="2" class="td_long" style="height: 300px;">
                                
                               <div style="overflow: auto;text-align: ;width:60%;margin-left:5%;border:1px solid #999999;height:97%;display: block;">
                                   
                                             <?php
                                             
                                   while (list($r,$value)= each($production_new_option)) {
                                           while(list($r1,$value1) = each($value)){
                                              
                                              if (is_array($value1)) {
                                                  while(list($r2,$value2) = each($value1)){
                                                    
                                                      if (is_array($value2)) {
                                                            $check=FALSE;
                                                           foreach ($_data as $key7 => $value7) {
                                                               if ($value2["did"] == $value7["did"]) {
                                                                   $check=true;
                                                                   break;
                                                               } else {
                                                                   $check=FALSE;
                                                               }
                                                               
                                                           }
                                                           
                                                           if($check==TRUE){
                                                              echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="'.$value2["did"].'"id="sl_production"  checked="true" name="sl_production[]"/>';
                                                           }else{
                                                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="'.$value2["did"].'"id="sl_production" name="sl_production[]"/>';
                                                           }
                                                           
                                                           echo '<span class="sp_title">'.$value2["dtitle"].'</span>';
                                                           echo "<br/>";
                                                           echo "\n\r\t";
                                                            break;
                                                       }else{
                                                            $check=FALSE;
                                                               foreach ($_data as $key7 => $value7) {
                                                                   if ($value1["did"] == $value7["did"]) {
                                                                       $check=true;
                                                                       break;
                                                                   } else {
                                                                       $check=FALSE;
                                                                   }
                                                                   
                                                               }
                                                               
                                                               if($check==TRUE){
                                                           echo '<input type="checkbox" checked="true" name="sl_production[]" value="'.$value1["did"].'"/>';
                                                               }else{
                                                           echo '<input type="checkbox" name="sl_production[]" value="'.$value1["did"].'"/>';     
                                                               }
                                                           echo '<span class="sp_title">'.$value1["dtitle"].'</span>';
                                                           echo "<br/>";
                                                            break;
                                                       } 
                                                   }
                                              }
                                              
                                           } // end while2
                                           
                                               
                                       }//end while 1
                     ?>


       
                                  
                               </div>
                            </td>
                     </tr>
                     <tr>
                         <td style="vertical-align:top;text-align:right;padding-right: 2%;padding-top: 1%;"> <span class="sp_title "  >Kích hoạt : </span> </td>
                         <td style="vertical-align: top">
                             <?php 
                                if($category_regular["nsx"][0]["active"]=="1"){
                                    $at="selected";
                                    $ac="";
                                }else{
                                    $ac="selected";
                                    $at="";
                                }
                              ?>
                             <div class="input" style="text-align: left;margin-left: 3%">
                                <select name="sl_pro" >
                                    <option value="1" <?php echo $at;  ?>>Hiển thị</option>
                                    <option value="0" <?php echo $ac;  ?>>Không</option>
                                </select>
                             </div>
                             <div style="text-align: center">
                                 <h5>Logo của hãng :</h5><br /><br />
                             <?php  
                               echo  '<img src="'.base_url("images/logo")."/".$category_regular["nsx"][0]["ndate"].".".$category_regular["nsx"][0]["npic"].'" width="80" hieght="26" />';
                             ?>
                             </div>
                         </td>
                     </tr>
                        <?php 
                             
                              ?>
                            </tbody>
        </table>
        
        <div class="bt_sm" style="margin : 10px auto;width:40%;">
                                 <input type="submit" value="Lưu thông tin" name="upload" /> &nbsp;
                                 <input type="reset" value="Làm lại" />
        </div>
    </form>
    
    
    </div>
    
   
</div>





                
           