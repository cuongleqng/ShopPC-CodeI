<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        THÊM BÁO GIÁ SẢN PHẨM MỚI
    </div>
    <div class="content">
              <?php
                    $frm ="insert_baogia";
                    $id ="";
                    $kh ="";
                    $kkh="";
                    $sm ="Thêm báo giá mới";
                    $title= "";
                   if(isset($category_regular)){
                       $sm ="Lưu báo giá";
                       $id = $category_regular[0]["bgid"];
                       $title =$category_regular[0]["bgtitle"];
                       if ($category_regular[0]["active"] == "1") {
                           $kh = "Selected";
                       } else {
                           $kkh = "Selected";
                       }
                       $frm ="save_baogia";
                       
                   } 
                   ?>
                   
        <form action="../proccess_main/<?php echo $frm; ?>" method="post" enctype="multipart/form-data">
        <table class="tb_center">
            <tbody>
                  
                    <tr>
                        <td><span class="sp_title">Tên loại báo giá :</span></td>
                        <td><input  type="hidden" value="<?php echo $id; ?>" name="bgid" />
                            <input  type="text" value="<?php echo $title; ?>" name="bgtitle"/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Upload file báo giá :</span></td>
                        <td><?php echo form_upload("userfile","Upload"); ?></td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Kích hoạt :</span></td>
                        <td>
                            <select name="active">
                                <option value="1" value="<?php echo $kh; ?>">Hiển thị</option>
                                <option value="0" value="<?php echo $kkh; ?>">Không hiển thị</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <br />
                                <div  class="bt_sm div_center">
                                    <input type="submit" value="<?php echo $sm; ?>" name="sm_hethong" /> &nbsp;
                                    <input type="reset" value="Làm lại" />
                                </div>
                        </td>
                    </tr>
                    
            </tbody>
        </table>
        
        </form>
        
    </div>
</div>

