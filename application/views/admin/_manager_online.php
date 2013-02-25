<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        DANH SÁCH BÁO GIÁ CÓ SẴN
    </div>
    <div class="content">
        <form action="../proccess_main/manager_online" method="POST">
        <table class="tb_center tb_right_td">
            <thead>
                <tr>
                    <th class="th_hsx">Nhân viên</th>
                    <th class="th_hsx">Yahoo Messeger</th>
                </tr>
            </thead>
            <tbody >
                <?php 
                        $user1 ="";$user2 =""; $user3 ="";$user4 ="";
                        $id1 = "";$id2= "";$id3 ="";$id4 ="";
                        if (isset($nhanvien) && count($nhanvien) >= 1) {
                            $user1 = $nhanvien[0]["email"];$user2 = $nhanvien[1]["email"];
                            $user3 = $nhanvien[2]["email"];$user4 = $nhanvien[3]["email"];
                            $id1 = $nhanvien[0]["user_id"];$id2 = $nhanvien[1]["user_id"];
                            $id3 = $nhanvien[2]["user_id"];$id4 = $nhanvien[3]["user_id"];
                        }
                        
                ?>
                <tr>
                 <td colspan="4" style="text-align: center;color: red;font-size: 15px;"><?php echo $loier; ?></td>
                   </tr>
                  <tr>
                    <td><span class="sp_title">Kinh doanh 01 :</span></td>
                    <td><input type="hidden" name="user_1" value="<?php echo $id1; ?>" />
                        <input type="text" name="user1" id="user_email1" maxlength="40" value="<?php echo $user1; ?>" /></td>
                  </tr>
                   <tr>
                    <td><span class="sp_title">Kinh doanh 02 :</span></td>
                    <td><input type="hidden" name="user_2" value="<?php echo $id2; ?>" />
                        <input type="text" maxlength="40" name="user2" id="user_email2" value="<?php echo $user2; ?>" /></td>
                  </tr>
                   <tr>
                    <td><span class="sp_title">Dịch vụ 01 :</span></td>
                    <td><input type="hidden" name="user_3" value="<?php echo $id3; ?>" />
                        <input type="text" maxlength="40" name="user3" id="user_email3" value="<?php echo $user3; ?>" /></td>
                  </tr>
                   <tr>
                    <td><span class="sp_title">Dịch vụ 02 :</span></td>
                    <td><input type="hidden" name="user_4" value="<?php echo $id4; ?>" />
                        <input type="text" maxlength="40" name="user4" id="user_email4" value="<?php echo $user4; ?>" /></td>
                  </tr>
                    <tr>
                    <td><span class="sp_title">Số điện thoại nóng 01 :</span></td>
                    <td><input type="text" maxlength="40" value="0166.534.8054"/></td>
                  </tr>
                   <tr>
                    <td><span class="sp_title">Số điện thoại nóng 02 :</span></td>
                    <td><input type="text" maxlength="40" value="0166.534.8054" /></td>
                  </tr>

                   <tr>
                        <td colspan="2">
                            <br />
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

