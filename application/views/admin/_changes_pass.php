

<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        THAY ĐỔI THÔNG TIN THÀNH VIÊN QUẢN TRỊ
    </div>
    <div class="content">
         <form action="../Permission/change_pass" method="post" name="frm_change" id="frm_change" class="AdvancedForm">
               
        <table class="tb_center tb_right_td">

            <tbody >
                
                    <?php 
                            echo '<tr><td colspan="2" style="text-align:center;corlor:red;">'.$change_p.'</td></tr>';
                        
                     ?>
                     

                  <tr>
                      
                       <?php foreach ($content as $key): ?>
                    <td ><span class="sp_title">Tài khoản :</span></td>
                    <td><input type="text" maxlength="40" value="<?php echo $key->username; ?>" name="username" id="valid_required" />
                        <span id="nameInfo"></span>
                    </td>
                    
                  </tr>
                   <tr>
                    <td><span class="sp_title">Mật khẩu mới :</span></td>
                    <td><input type="password" maxlength="40" id="valid_pass" name="password" />
                        <span id="pass1Info"></span>
                    </td>
                  </tr>
                   <tr>
                    <td><span class="sp_title">Nhập lại mật khẩu mới :</span></td>
                    <td><input type="password" maxlength="40"  id="valid_pass2" name="pass2"/>
                        <span id="pass2Info"></span>
                    </td>
                  </tr>
                   <tr>
                    <td><span class="sp_title">Họ và Tên :</span></td>
                    <td><input type="text" maxlength="40" value="<?php echo $key->fullname; ?>" id="valid_required1"  name="fullname" />
                        <span id="nameInfo1"></span>
                    </td>
                  </tr>
                    <tr>
                    <td><span class="sp_title">E-mail :</span></td>
                    <td><input type="text" maxlength="40" value="<?php echo $key->email; ?>" id="email" name="email" readonly="readonly" />
                        <span id="emailInfo"></span>
                    </td>
                        
                     <?php endforeach; ?>
                  </tr>
                   
                   <tr>
                        <td colspan="2">
                            <br />
                                <div  class="bt_sm div_center">
                                    <input type="submit" value="Thay đổi thông tin" id="sm_change" name="sm_change"/> &nbsp;
                                    <input type="reset" value="Làm lại" />
                                </div>
                        </td>
                    </tr>
                    
            
                
              </tbody>
              
        </table>
        
         </form>
         
    </div> <!--conttent-->
</div>

