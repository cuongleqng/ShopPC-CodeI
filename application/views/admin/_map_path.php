<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        SƠ ĐỒ ĐƯỜNG ĐI
    </div>
    <div class="content">
         <form action="../proccess_main/save_sodo" method="post" enctype="multipart/form-data">
        <table class="tb_center tb_right">
            <tbody>
                   <?php
                   $date ="";
                     if($sodo[0]["sddate"] != ""){
                            $date =  gmdate("Y-m-d",$sodo[0]["sddate"] + 25200);
                           // $mang = explode("-",$date);
                           // $date = $mang[2]."-".$mang[1]."-".$mang[0];
                        }
                   ?>
                     <tr>
                       <td colspan="4" style="text-align: center;color: red;font-size: 15px;"><?php echo $loier; ?></td>
                   </tr>
                    <tr>
                        <td><span class="sp_title">Nội dung :</span></td>
                        <td colspan="1">
                            <input  type="hidden" value="<?php echo $sodo[0]["sdpic"]; ?>" name ="sdpic"/>
                            <input  type="hidden" value="<?php echo $sodo[0]["sddate"]; ?>" name ="sddate"/>
                             <input  type="hidden" value="<?php echo $sodo[0]["sdid"]; ?>" name ="sdid"/>
                                <textarea name="sdcont" id="textarea2" rows="6" class="wysiwyg" cols="59">
                                    <?php echo $sodo[0]["sdcont"]; ?>
                                </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Ngày cập nhật :</span></td>
                        <td><input type="date" name="datestart" value="<?php echo $date; ?>" /></td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Ảnh sơ đồ :</span></td>
                        <td><?php echo form_upload("userfile","upload"); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><br />
                                <div  class="bt_sm div_center">
                                    <input type="submit" value="Lưu thông tin" /> &nbsp;
                                    <input type="reset" value="Làm lại" />
                                </div>
                        </td>
                    </tr>
                    
                    
            </tbody>
        </table>
        </form>
    </div>
</div>

