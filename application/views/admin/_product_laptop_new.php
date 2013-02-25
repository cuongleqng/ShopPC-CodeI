<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        THÊM SẢN PHẨM LAPTOP MỚI
    </div>
    <div class="content">
        
        <form action="../proccess_main/computer_laptop_new" method="POST">
            
        <table class="tb_border tb_right">
            <tbody>
                <tr>
                    <td colspan="4" style="text-align: center"><?php echo $loier; ?></td>
                </tr>
                   <tr>
                        <td><span class="sp_title">Hãng sản xuất :</span></td>
                        <td><select name="spnsx"  >
                                <option value="0">Chọn hãng sản xuất</option>
                                <?php 
                                        if(isset($update_laptop_new)){
                                            foreach ($update_laptop_new as $key => $value) {
                                            echo '<option value="'.$value["nid"].'">&raquo;   '.$value["ntitle"].'</option>';
                                            }
                                        }
                                 ?>
                            </select>
                        </td>
                        <td><span class="sp_title">Hệ điều hành :</span></td>
                        <td>
                            <input type="text" name="spd05" id="spd05"  />
                        </td>
                    </tr>
                      <tr>
                        <td><span class="sp_title">Giá bán :</span></td>
                        <td>
                            <input type="text" name="spgia" class="td_short" id="spgia" />
                            <select name="spvat">
                                <option value="Đã có VAT">Đã có VAT</option>
                                <option value="Chưa có VAT">Chưa có VAT</option>
                            </select>
                        </td>
                        <td><span class="sp_title">Kho :</span></td>
                        <td>
                            <select name="spkho" >
                                <option value="Còn hàng">Còn hàng</option>
                                <option value="Hết hàng">Hết hàng</option>
                            </select>
                        </td>
                        
                        
                    </tr>
                      <tr>
                        <td><span class="sp_title">Bộ vi xử lý :</span></td>
                        <td>
                            <input type="text" name="spd03" id="spd03" class="td_long" />
                        </td>
                        <td><span class="sp_title">Bảo hành :</span></td>
                        <td>
                            <input type="text" name="spbh" id="spbh" value="12" />&nbsp;<span class="sp_title">Tháng</span>
                        </td>
                    </tr>
                      <tr>
                        <td><span class="sp_title">HDD :</span></td>
                        <td>
                            <input type="text" name="spd06" id="spd06" class="td_long" />
                        </td>
                        <td><span class="sp_title">Icon 85x90 :</span></td>
                        <td>
                             <input type="file" id="file" name="user_1" />
                        </td>
                    </tr>
                      <tr>
                        <td><span class="sp_title">Tên sản phẩm :</span></td>
                        <td>
                            <input type="text" name="sptitle" id="sptitle" class="td_long" />
                        </td>
                        <td><span class="sp_title">Thumb 200x200 :</span></td>
                        <td>
                             <input type="file" id="file" name="user_2" />
                        </td>
                    </tr>
                      <tr>
                        <td><span class="sp_title">Khuyến mãi :</span></td>
                        <td>
                            <input type="text" name="spkm" id="spkm" class="td_long" />
                        </td>
                       <td><span class="sp_title">Ảnh to 01 :</span></td>
                        <td>
                             <input type="file" id="file" name="user_3" />
                        </td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">RAM :</span></td>
                        <td>
                            <input type="text" name="spd02" id="spd02" class="td_long" />
                        </td>
                         <td><span class="sp_title">Ảnh to 02 :</span></td>
                        <td>
                                   <input type="file" id="file" name="user_4" />
                        </td>
                    </tr>
                    
                     <tr>
                        <td><span class="sp_title">Màn hình :</span></td>
                        <td>
                            <input type="text" name="spd01" id="spd01" class="td_long" />
                        </td>
                        <td><span class="sp_title">Ảnh to 03 :</span></td>
                        <td>
                                    <input type="file" id="file" name="user_5" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td><span class="sp_title">VAG Card :</span></td>
                        <td>
                            <input type="text" name="spd04" id="spd04" class="td_long" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td><span class="sp_title">Giới thiệu :</span></td>
                        <td colspan="2">
                                <textarea name="spdes" id="spdes" rows="5" cols="58"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Chi tiết :</span></td>
                        <td colspan="2">
                                <textarea name="spcont" id="spcont" rows="6" class="wysiwyg" cols="59">
                                </textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                                <div  class="bt_sm div_center">
                                    <input type="submit" value="Thêm sản phẩm" /> &nbsp;
                                    <input type="reset" value="Làm lại" />
                                </div>
                        </td>
                    </tr>
                    
            </tbody>
        </table>
        
            </form>
            
    </div>
</div>

