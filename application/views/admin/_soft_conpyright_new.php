<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        DANH SÁCH PHẦN MỀN BẢN QUYỀN
    </div>
    <div class="content">
          <form action="../proccess_main/phanmen" method="post"  name="frm_computer" enctype="multipart/form-data" >
        <table class="tb_border tb_right">
            <tbody>
                  <tr>
                       <td colspan="4" style="text-align: center;color: red;font-size: 15px;"><?php echo $loier; ?></td>
                   </tr>
                   <tr>
                        
                       
                        <td><span class="sp_title">Hãng sản xuất :</span></td>
                        <td><select name="spnsx" id="spnsx" >
                                <option value="0">Chọn hãng sản xuất</option>
                               <?php 
                                    foreach ($soft_copy as $key => $value) {
                                        foreach ($value as $key1 => $value1) {
                                            echo ' <option value="'.$value1["nid"].'">&raquo; '.$value1["ntitle"].'</option>';
                                         }
                                    }
                                 ?>
                               
                            </select>
                        </td>
                         <td><span class="sp_title">Icon 85x90 :</span></td>
                        <td>
                             <input type="file" id="file" />
                        </td>
                        
                    </tr>
                      <tr>
                        <td><span class="sp_title">Giá bán :</span></td>
                        <td>
                            <input type="text" name="spgia" id="spgia" class="td_short" />
                            <select name="action" id="tableaction">
                                <option value="delete">Đã có VAT</option>
                                <option value="save">Chưa có VAT</option>
                            </select>
                        </td>
                        
                        <td><span class="sp_title">Thumb 200x200 :</span></td>
                        <td>
                             <input type="file" id="file" />
                        </td>
                        
                    </tr>
                    
                      <tr>
                        <td><span class="sp_title">Tên sản phẩm :</span></td>
                        <td>
                            <input type="text" name="sptitle" id="sptitle"/>
                        </td>
                       <td><span class="sp_title">Ảnh to 01 :</span></td>
                        <td>
                             <input type="file" id="file" />
                        </td>
                    </tr>
                      <tr>
                        <td><span class="sp_title">Khuyến mãi :</span></td>
                        <td>
                            <input type="text" name="spkm" id="spkm" />
                        </td>
                        <td><span class="sp_title">Ảnh to 02 :</span></td>
                        <td>
                             <input type="file" id="file" />
                        </td>
                    </tr>
                      <tr>
                        <td><span class="sp_title">Kho :</span></td>
                        <td>
                            <select name="spkho" id="tableaction">
                                <option value="delete">Còn hàng</option>
                                <option value="save">Hết hàng</option>
                            </select>
                        </td>
                        <td><span class="sp_title">Ảnh to 03 :</span></td>
                        <td>
                                    <input type="file" id="file" />
                        </td>
                        
                    </tr>
                      <tr>
                        <td><span class="sp_title">Bảo hành :</span></td>
                        <td>
                            <input type="text" name="spbh" id="spbh" value="12"/> &nbsp;Tháng
                        </td>
                        
                    </tr>
                  
                    
                    <tr>
                        <td><span class="sp_title">Giới thiệu :</span></td>
                        <td colspan="2">
                                <textarea name="text" id="spdes" rows="5" cols="58"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Chi tiết :</span></td>
                        <td colspan="2">
                                <textarea name="text" id="spcont" rows="6" class="wysiwyg" cols="59">
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

