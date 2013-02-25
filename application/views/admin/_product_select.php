<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        
        <?php if(in_array($select_option, array("23","29","60"))){
            echo "THÊM SẢN PHẨM THIẾT BỊ VĂN PHÒNG MỚI";
        }else{
            echo "THÊM SẢN PHẨM LOA - ÂM THANH MỚI";
        }  ?>
    </div>
    <div class="content">
        <form action="../proccess_main/product_option" method="post" id="frm_computer" name="frm_computer" enctype="multipart/form-data" >
            
        <table class="tb_border tb_right">
            <tbody>
                <?php 
                        $sploai="";$spnsx="";$sptitle="";$spkho="";$spbh="";$spgia=0;$spvat="";
                        $spkm="";$spdes="";$spcont="";$sppic="";$spdate="";$spview="";
                        $spd01="";$spd02="";$spd03="";$spd04="";$spd05="";
                        $vat="";$kvat ="";$conh="";$heth="";
                        if (isset($category_regular["product"]) && is_array($category_regular["product"])) {
                            $sploai = $category_regular["product"][0]["sploai"];
                            $spnsx = $category_regular["product"][0]["spnsx"];
                            $sptitle = $category_regular["product"][0]["sptitle"];
                            $spkho = $category_regular["product"][0]["spkho"];
                            $spbh = $category_regular["product"][0]["spbh"];
                            $spgia = $category_regular["product"][0]["spgia"];
                            $spvat = $category_regular["product"][0]["spvat"];
                            $spkm = $category_regular["product"][0]["spkm"];
                            $spdes = $category_regular["product"][0]["spdes"];
                            $spcont = $category_regular["product"][0]["spcont"];
                            $sppic = $category_regular["product"][0]["sppic"];
                            $spdate = $category_regular["product"][0]["spdate"];
                            $spview = $category_regular["product"][0]["spview"];
                            $spd01 = $category_regular["product"][0]["spd01"];
                            $spd02 = $category_regular["product"][0]["spd02"];
                            $spd03 = $category_regular["product"][0]["spd03"];
                            $spd04 = $category_regular["product"][0]["spd04"];
                            $spd05 = $category_regular["product"][0]["spd05"];
                            if ($spvat == "Đã có VAT") {
                                $vat = "Selected";
                                $kvat= "";
                            } else {
                                $kvat = "Selected";
                                $vat= "";
                            }
                            if ($spkho == "Còn hàng") {
                                $conh = "Selected";
                                $heth= "";
                            } else {
                                $heth = "Selected";
                                $conh= "";
                            }
                            
                        }
                      
                        ?>
                    <tr>
                       <td colspan="4" style="text-align: center;color: red;font-size: 15px;"><?php echo $loier; ?></td>
                   </tr>
                   <tr>   
                       
                        <td>
                            <span class="sp_title">Hãng sản xuất :</span></td>
                        <td>
                            <input type="hidden" value="<?php echo $select_option ?>" name="sploai" />
                            <select name="spnsx"  id="spnsx">
                                <option value="0">Chọn hãng sản xuất</option>
                                <?php 
                                    if (isset($update_computer_brand)) {
                                        foreach ($update_computer_brand as $key => $value) {
                                            if ($spnsx == $value["nid"]) {
                       echo '<option value="'.$value["nid"].'">&raquo;&raquo;&raquo;  '.$value["ntitle"].'</option>';
                                            } else {
                                                echo '<option value="'.$value["nid"].'">&raquo;   '.$value["ntitle"].'</option>';
                                            }
                                            
                                            
                                        }
                                    }
                                 ?>
                               
                            </select>
                        </td>
                        <td><span class="sp_title">Icon 85x90 :</span></td>
                        <td>
                             <input type="file" id="file" name="user_1" />
                        </td>
                    </tr>
                      <tr>
                        <td><span class="sp_title">Giá bán :</span></td>
                        <td>
                            <input type="text" name="spgia" id="spgia" class="td_short"  value="<?php echo number_format($spgia,0,",","."); ?>" />
                            
                            <select name="spvat" id="sl_vat">
                                <option value="Đã có VAT" <?php echo $vat;  ?> >Đã có VAT</option>
                                <option value="Chưa có VAT" <?php echo $kvat;  ?> >Chưa có VAT</option>
                            </select>
                        </td>
                        <td><span class="sp_title">Thumb 200x200 :</span></td>
                        <td>
                             <input type="file" id="file" name="user_2" />
                        </td>
                        
                    </tr>
                      <tr>
                        <td><span class="sp_title">Tên sản phẩm :</span></td>
                        <td>
                            <input type="text" name="sptitle" id="sptitle" class="td_long" value="<?php echo $sptitle; ?>" />
                        </td>
                         <td><span class="sp_title">Ảnh to 01 :</span></td>
                        <td>
                             <input type="file" id="file" name="user_3" />
                        </td> 
                        
                    </tr>
                      <tr>
                        <td><span class="sp_title">Khuyến mãi :</span></td>
                        <td>
                            <input type="text" name="spkm" id="spkm" class="td_long" value="<?php echo $spkm;  ?>" />
                        </td>
                         <td><span class="sp_title">Ảnh to 02 :</span></td>
                        <td>
                             <input type="file" id="file" name="user_4" />
                        </td>  
                        
                    </tr>
                      <tr>
                        <td><span class="sp_title">Kho :</span></td>
                        <td>
                            <select name="spkho" id="sl_kho" >
                                <option value="Còn hàng" <?php echo $conh; ?> >Còn hàng</option>
                                <option value="Hết hàng" <?php echo $heth; ?> >Hết hàng</option>
                            </select>
                        </td>
                        <td><span class="sp_title">Ảnh to 03 :</span></td>
                        <td>
                                    <input type="file" id="file" name="user_5" />
                        </td>
                    </tr>
                      <tr>
                        <td><span class="sp_title">Bảo hành :</span></td>
                        <td>
                            <input type="text" name="spbh" id="spbh" value="<?php 
                            if ($spbh != 0 && $spbh != "") {
                                echo $spbh;
                            }else echo "12";
                             ?>" class="td_long"/> &nbsp;Tháng
                        </td>
                        
                       
                    </tr>
                    <tr>
                        <td><span class="sp_title">Giới thiệu :</span></td>
                        <td colspan="2">
                                <textarea name="spdes" id="spdes" rows="5" cols="58">
                                    <?php echo $spdes; ?>
                                </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Chi tiết :</span></td>
                        <td colspan="2">
                                <textarea name="spcont" id="spcont" rows="6" class="wysiwyg" cols="59">
                                    <?php echo $spcont; ?>
                                </textarea>
                        </td>
                    </tr>
                   
                    <tr>
                        <td colspan="3">
                             <div  class="bt_sm div_center">
                                    <input type="submit" value="Thêm sản phẩm" name="sm_product"  id="sm_product"/> &nbsp;
                                    <input type="reset" value="Làm lại" />
                            </div> 
                        </td>
                    </tr>
                    
            </tbody>
        </table>
        
        </form>
        
        
        
   
    </div>
</div>

