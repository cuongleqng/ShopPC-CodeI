<div class="title_margin"></div>
<div class="bloc">
    <div class="title">THÊM DANH MỤC SẢN PHẨM MỚI</div>
    <div class="content">

       <form id="frm_category_new" class="AdvancedForm" action="../proccess_main/insert_new" method="POST" >
        <div class="input">
            <table class="noalt title_right tb_center">
                    <tbody>
                         
                        <tr>
                            <td><label for="input1">Tên danh mục cha : &nbsp;  </label></td>
                            <td><input type="text" name="title" id="vaild_title" />
                                <span id="nameInfo" class="error_span"></span>
                           </td>
                        </tr>
                        <tr>
                            <td><label for="select">Danh mục cha : &nbsp;  </label></td>
                            <td><select name="dparent" id="dparent">
                                    <option value="0">Danh mục gốc</option>
                                    <?php 
                                        foreach ($category_select_1 as $key) {
                                            echo '<option value="'.$key->did.'">&raquo; '.$key->dtitle.'</option>';
                                        }
                                     ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="select1">Kích hoạt :  &nbsp; </label></td>
                            <td><select name="active" id="select1">
                                    <option value="1" >Hiển thị</option>
                                    <option value="0">Không hiển thị</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Các bước giá :&nbsp;</label><span id="limit1"></span></td>
                       
                            <td><label class="none_display">Nhỏ hơn &nbsp;</label><input type="text" id="vaild_number1" name="dgia1" class="display_inline" />&nbsp;VNĐ (từ 0 đến nhỏ hơn)</td>
                        </tr>
                         <tr>
                            <td></td>
                            <td><label class="none_display">Bước 1 &nbsp;</label><input type="text" id="vaild_number2" name="dgia2" class="display_inline"/>&nbsp;<span id="limit2">VNĐ (từ nhỏ hơn đến bước 1)</span></td>
                        </tr>
                         <tr>
                            <td></td>
                            <td><label class="none_display">Bước 2 &nbsp;</label><input type="text" id="vaild_number3" name="dgia3" class="display_inline"/>&nbsp;<span id="limit3">VNĐ (từ bước 1 đến bước 2)</span></td>
                        </tr>
                         <tr>
                            <td></td>
                            <td><label class="none_display">Lớn hơn &nbsp;</label><input type="text" id="vaild_number4" name="dgia4" class="display_inline"/> &nbsp;<span id="limit4">VNĐ (từ bước 2 đến lớn hơn)</span></td>
                        </tr>
                        
                    </tbody>
                </table>
                <div class="cb"></div>
                
        </div><!-- end input-->

     
        <div class="submit" style="width:40%;margin : 0 auto;">
            <input type="submit" value="Thêm danh mục" name="sm_cate" id="FormSubmit"/>
            <input type="reset" value="Làm lại"/>
        </div>
        
        </form>
       
    </div> <!-- end content-->
</div>

