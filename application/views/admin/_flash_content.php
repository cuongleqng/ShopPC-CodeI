<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
       
       SỬA THÔNG TIN ẢNH FLASH TRÊN TIÊU ĐIỂM NỔI BẬT
        
    </div>
    <div class="content">
        <form action="../proccess_main/update_flash" method="post">
        <table class="tb_center tb_right">
            <tbody>
                    <?php  
                   $title ="";$cont ="";$id ="";$flink="";$fpic="";$fdate="";
                   if (isset($category_regular))
                      foreach ($category_regular as $key => $value) {
                       $id= $value["fid"];
                       $flink = $value["flink"];
                       $cont = $value["fcont"];
                       $fpic = $value["fpic"];
                       $fdate = $value["fdate"];
                   } 
                   
                   
                    ?>
                    <tr>
                        <td><span class="sp_title">Nội dung :</span></td>
                        <td colspan="1">
                            <div class="container">
                                <input  type="hidden" value="<?php echo $fpic; ?>" name ="fpic"/>
                                <input  type="hidden" value="<?php echo $fdate; ?>" name ="fdate"/>
                                <input type="hidden" value="<?php echo $id; ?>" name="fid" />
                                <textarea name="fcont"  rows="6" class="wysiwyg" cols="59">
                                    <?php echo $cont; ?>
                                </textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Liên kết đến :</span></td>
                        <td><input type="text" name="flink"  value="<?php echo $flink; ?>" /></td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Ảnh tiêu điểm :</span></td>
                        <td><?php echo form_upload("userfile","upload"); ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <br />
                                <div  class="bt_sm div_center">
                                    <input type="submit" value="Lưu thông tin" name="sm_hethong" /> &nbsp;
                                    <input type="reset" value="Làm lại" />
                                </div>
                        </td>
                    </tr>
                    
            </tbody>
        </table>
        
        </form>
        
    </div>
</div>

