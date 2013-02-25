<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        <?php  
       
         $title ="";$cont ="";$id ="";$date ="";$user="";$kpic="";
         $name ="";$kh="";
            foreach ($hethong as $key => $value) {
                $title= $key;
                if($key == "gioithieu"){
                    echo  "QUẢN LÝ GIỚI THIỆU";
                }elseif($key == "chinhsach"){
                    echo  "QUẢN LÝ CHÍNH SÁCH";
                }elseif($key == "baohanh"){
                    echo  "QUẢN LÝ BẢO HÀNH";
                }elseif($key == "khuyenmai"){
                    echo  "QUẢN LÝ KHUYẾN MÃI";
                }
                foreach ($value as $key1 => $value1) {
                   
                    if($key == "gioithieu"){
                        $id= $value1["gtid"];
                        $cont = $value1["gtcont"];
                        $date = gmdate("d-m-Y",$value1["gtdate"] + 25200);
                        $user = $value1["guser"];
                    }elseif($key == "chinhsach"){
                        $id= $value1["csid"];
                        $cont = $value1["cscont"];
                        $date = gmdate("d-m-Y",$value1["csdate"] + 25200);
                        $user = $value1["cuser"];
                    }elseif($key == "baohanh"){
                        $id= $value1["bhid"];
                        $cont = $value1["bhcont"];
                        $date = gmdate("d-m-Y",$value1["bhdate"] + 25200);
                        $user = $value1["buser"];
                    }elseif($key == "khuyenmai"){
                        $id= $value1["kmid"];
                        $cont = $value1["kmcont"];
                        $date = gmdate("d-m-Y",$value1["kmdate"] + 25200);
                        $kh = $value1["kmdate"];
                        $kpic = $value1["kmpic"];
                        $user = $value1["kuser"];
                    }
                }
            if($date != ""){
                $mang = explode("-",$date);
                $date = $mang[2]."-".$mang[1]."-".$mang[0];
            }
                break;
            }
        ?>
    </div>
    <div class="content">
        <form action="../proccess_main/hethong/<?php echo $title; ?>" method="post" >
        <table class="tb_center tb_right">
            <tbody>
               <tr>
                     <td colspan="4" style="text-align: center;color: red;font-size: 15px;"><?php echo $loier; ?></td>
                </tr>
                    <tr>
                        <td><span class="sp_title">Nội dung :</span></td>
                        <td colspan="1">
                            <div class="container">
                                <input type="hidden" value="<?php echo $id; ?>" name="id" />
                                <textarea name="txt_cont" id="sports" rows="6" class="wysiwyg" cols="59">
                                    <?php echo $cont; ?>
                                </textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Ngày cập nhật :</span></td>
                        <td><input type="date" name="DateStart" size="15" value="<?php echo $date; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
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

