 <?php
		if($this->session->userdata('email') && $this->session->userdata('log_in') == true )
		{
		   $email = $this->session->userdata('email');
    ?>
        <fieldset id="userBar">
            <div class="pageWidth">
                <div class="pageContent">
                    <ul class="visitorTabs">
                       <li class="navTab account">
                            Xin chào <b><a href="#infoChange" rel="leanModal" style="padding:0"><?php echo $email ?></a></b>
                       </li>
                       
                       <li class="navTab changePass">
                            <a href="#passChange"  rel="leanModal">Đổi mật khẩu</a>
                       </li> 
                       
                       <li class="navTab logout">
                            <a href="<?php echo base_url('login/logout')?>">Thoát</a>
                       </li>  
                    </ul>
                </div>
            </div>
        </fieldset>
        <script type="text/javascript">
        
            $(document).ready(function(){
               $('input[name="changePass"]').click(function(){
                    $("#loading").fadeIn("fast");
                    $.post(url + "login/changePass",$('#passChange form').serialize() + "&changePass=1",function(data)
                    {
                       $('.errorPanel, .okPanel').remove();
                       if (data == 'success')
                       {
                            
                             $('#passChange form').prepend('<div class="okPanel" style="margin:10px 10px"><span class="ok" style="text-align:center">' + "Bạn đã đổi mật khẩu thành công. " + '</span></div>').fadeIn("fast");
                       }
                       else
                       {
            
                            $('#passChange form').prepend('<div class="errorPanel" style="margin:10px 10px"><span class="errors" style="text-align:center">' + data + '</span></div>').fadeIn("fast");
                        } 
                    });
                    
                    $('#loading').fadeOut("fast");
               }); 
               
               
               $('input[name="changeInfo"]').click(function(){
                    $("#loading").fadeIn("fast");
                    
                    
                    $.post(url + "login/changeInfo",$('#infoChange form').serialize() + "&changeInfo=1",function(data)
                    {
                       $('.errorPanel, .okPanel').remove();
                       if (data == 'success')
                       {
                            
                             $('#infoChange form').prepend('<div class="okPanel" style="margin:10px 10px"><span class="ok" style="text-align:center">' + "Bạn đã đổi thông tin thành công. " + '</span></div>').fadeIn("fast");
                       }
                       else
                       {
            
                            $('#infoChange form').prepend('<div class="errorPanel" style="margin:10px 10px"><span class="errors" style="text-align:center">' + data + '</span></div>').fadeIn("fast");
                        } 
                    });
                    
                    $('#loading').fadeOut("fast");
               }); 
            });
            
        </script>
        <div id="passChange" rel="leanModal" style="display: none">
            <div id="pass_ct">
                <div id="pass_header">
                    <h2>Thay đổi mật khẩu</h2>
                    <a class="modal_close" href="#"></a>
                </div>
                <form action="" method="POST" name="passChange">
                    
                    <div class="txt-fld">
                        <label>Mật khẩu cũ</label>
                        <input class="input" type="password" name="pass" />
                    </div>
                    <div class="txt-fld">
                        <label>Mật khẩu mới: </label>
                        <input class="input" type="password" name="new_pass" />
                    </div>
                    <div class="txt-fld">
                        <label>Nhập lại mật khẩu: </label>
                        <input class="input" type="password" name="re_pass"/>
                    </div>
                    <div class="btn-fld">
                        <input type="button" name="changePass" value="Đổi mật khẩu"/>
                    </div>
                </form>
            </div>
        
        </div>
        
        <div id="infoChange" rel="leanModal" style="display: none">
            <div id="info_ct">
                <div id="info_header">
                    <h2>Thông tin tài khoản</h2>
                    <a class="modal_close" href="#"></a>
                </div>
                <form action="" method="POST" name="infoChange">
                    
                    <div class="txt-fld">
                        <label>Họ và tên</label>
                        <input class="input" type="text" name="fullname" value="<?php echo $user['fullname']?>" />
                    </div>
                    <div class="txt-fld">
                        <label>Địa chỉ</label>
                        <input class="input" type="text" name="address" value="<?php echo $user['diachi'] ?>" />
                    </div>
                    <div class="txt-fld">
                        <label>Giới tính</label>
                        <input type="radio" value="nam" name="sex" <?php if ($user['sex'] == "nam") echo "checked" ?>/> Nam
                        <input type="radio" value="nu" name="sex" <?php if ($user['sex'] == "nu") echo "checked" ?> /> Nữ
                    </div>
                    
                    <div class="txt-fld">
                        <label>Điện thoại</label>
                        <input class="input" type="text" name="phone" value="<?php echo $user['phone']?>"/>
                    </div>
                    <div class="btn-fld">
                        <input type="button" name="changeInfo" value="Đổi thông tin"/>
                    </div>
                </form>
            </div>
        
        </div>
    
     <?php
       }
       else
       {
     ?>
          <div id="user-panel-content">
        	<div id="user-panel-inner" style="display: none; margin-top: 0px; margin-bottom: 10px; ">		
                <form id="user-panel-form" name="user_panel_form" action="login/checkLogin" method="POST" enctype="multipart/form-data">
                    <div class="form-field">
                        <label for="login_19" class="main_label cm-required cm-email">E-mail:</label>
                        <input type="text" id="login_19" name="email" size="30" value="" class="cm-focus input-text" />
                    </div>
                    <div class="form-field">
                        <label class="main_label">Bạn đã có tài khoản?</label>
                        <div style="overflow: hidden">
                            <span style="line-height: 24px">
                                <input class="cm-combinations_have_account" type="radio" id="sw_off_have_account_19" name="have_account" value="N"> 
                                <label for="sw_off_have_account_19" class="html-label">Không, tạo một tài khoản ngay bây giờ</label>
                            </span>
                            <br style="clear:both" />
                            <span style="line-height: 24px">
                                <input class="cm-combinations_have_account" type="radio" checked="checked" id="sw_on_have_account_19" name="have_account" value="Y"> 
                                <label for="sw_on_have_account_19" class="html-label">Có, mật khẩu của tôi là:</label>
                            </span>
                        </div>
                    </div>
        
                    <div id="on_have_account" style="display: block; ">
                        <div class="form-field">
                            <label for="psw_19" class="main_label cm-required"><a class="forgot-pass" href="index.php?dispatch=auth.recover_password">Quên mật khẩu?</a></label>
                            <input type="password" id="psw_19" name="password" size="30" value="" class="input-text">
                        </div>
        
                        
                        <div class="clear">
                            <div class="p-button p-button-red" style="margin: 5px 0 0 142px;">
                                <input type="button" class="p-button-start" value="Đăng nhập" name="login" />
                                <div class="p-button-end"></div>
                            </div>
                            &nbsp;
                            <div style="display: inline; line-height: 42px; ">
                                <input type="checkbox" class="p-checkbox" name="remember_me" id="remember_me_19" value="Y">
                                <label class="p-sublabel" for="remember_me_19" style="font-size:11px;">Tự động đăng nhập lần sau</label>
                            </div>
                        </div>
                    </div>
        
                    <div id="off_have_account" class="hidden" style="display: none; ">
                        <div class="form-field">
                            <label for="password1" class="cm-required cm-password">Mật khẩu:</label>
                            <input type="password" id="password1" name="password1" size="30" maxlength="32" value="" class="input-text" autocomplete="off" disabled="">
                        </div>
                        <div class="form-field">
                            <label for="password2" class="cm-required cm-password">Nhập lại mật khẩu:</label>
                            <input type="password" id="password2" name="password2" size="30" maxlength="32" value="" class="input-text" autocomplete="off" disabled="">
                        </div>
                        <div class="sep-line" style="width:90%"></div>        
                            <div class="form-field">
                            <label for="elm_6" class="cm-required ">Họ và Tên:</label>
                                <input type="text" id="elm_6" name="fullname" size="30" value="" class="input-text" disabled="">
                            
                            </div>
                                
                            <div class="form-field">
                            <label for="elm_44" class=" ">Điện thoại liên hệ:</label>
                                <input type="text" id="elm_44" name="phone" size="30" value="" class="input-text" disabled="">
                            
                            </div>
                            
                            <div class="form-field">
                            <label for="elm_44" class=" ">Địa chỉ:</label>
                                <input type="text" id="elm_4" name="address" size="30" value="" class="input-text" disabled="">
                            
                            </div>
                            
                            <div class="form-field">
                            <label>Giới tính:</label>
                            Nam:
                            <input type="radio" name="gender" value="nam" checked="checked" />
                            Nữ:
                            <input type="radio" name="gender" value="nu" />
                             </div>
                            
                            <div class="clear">
                            <div class="form-button">
                                <div class="p-button p-button-red" style="margin: 5px 0 0 142px;">
                                    <input type="submit" class="p-button-start cm-check-user-panel-resize" value="Đăng ký tài khoản" name="register" id="save_profile_but">
                                    <div class="p-button-end"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        	</div>
        
        	<div id="user-panel-buttons">
        	   <a class="button up-login-register-button" href="./signin/"><span class="button-inner">Đăng Nhập hoặc Đăng Ký</span></a>	
            </div>
         </div>
     <?php
       }	
	?>	
