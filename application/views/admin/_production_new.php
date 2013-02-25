<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        THÊM HÃNG SẢN XUẤT MỚI
    </div>
    <div class="content">
        <form action="../proccess_main/production_new_upload" class="production_insert" enctype="multipart/form-data" id="upload_frm" accept-charset="utf-8"  method="post">
        
        <table class="tb_border tb_right_id">
            <tbody>
                <tr>
                    <td colspan="3" style="text-align: center"><?php echo $loier; ?></td>
                </tr>
                        <tr>
                    <td style="text-align:right;padding-right: 2%;"><span class="sp_title">Tên hãng sản xuất : </span></td>
                    <td class="td_short" style="text-align: left;margin-left: 2%"><input type="text" name="txt_id" id="txt_id" /></td>
                    <td class="td_long" style="text-align: center;"><span class="sp_title">Các hãng sản xuất :</span></td>
                      </tr>
                      
                      <tr>
                            <td style="text-align:right;padding-right: 2%;"><span class="sp_title">Logo (80x26 Pixel) :</span></td>
                            <td class="td_short">
                                    <?php echo form_upload('userfile',"upload"); ?>
                                
                            </td>
                            
                            <td rowspan="2" class="td_long" style="height: 300px;">
                                
                               <div style="overflow: auto;text-align: ;width:60%;margin-left:5%;border:1px solid #999999;height:97%;display: block;">
                                   
                                             <?php
                                             
                                   while (list($r,$value)= each($production_new_option)) {
                                           while(list($r1,$value1) = each($value)){
                                              
                                              if (is_array($value1)) {
                                                  while(list($r2,$value2) = each($value1)){
                                                    
                                                      if (is_array($value2)) {
                                                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="'.$value2["did"].'"id="sl_production" name="sl_production[]"/>';
                                                           echo '<span class="sp_title">'.$value2["dtitle"].'</span>';
                                                           echo "<br/>";
                                                           echo "\n\r\t";
                                                            break;
                                                       }else{
                                                           echo '<input type="checkbox" name="sl_production[]" value="'.$value1["did"].'"/>';
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
                             <div class="input" style="text-align: left;margin-left: 3%">
                                <select name="sl_pro" >
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Không</option>
                                </select>
                             </div>
                         </td>
                     </tr>
                
                            </tbody>
        </table>
        
        <div class="bt_sm" style="margin : 10px auto;width:40%;">
                                 <input type="submit" value="Thêm hãng sản xuất mới" name="upload" /> &nbsp;
                                 <input type="reset" value="Làm lại" />
        </div>
    </form>
    
    
    </div>
    
   
</div>





                
           