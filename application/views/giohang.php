<div class="hblock">
    <div class="btopr">
        <div class="btopl">
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("input[name='emptyCart']").click(function(){
            $("#loading").fadeIn("fast");
            $.get(url + "giohang/emptyCart",function(data){
                location.reload();
                $("#loading").fadeOut("fast");
           })
        });
        
        $("table a").click(function(e){
            e.preventDefault();
            $("#loading").fadeIn("fast");
            var tr = $(this).parent("td").parent("tr");
            var row_id = $(this).attr("id");
            $.post(url + "giohang/updateCart",{rowid : row_id, ajax : 1 }, function(data){
                tr.remove();
                $("#total").html(data);
                $.get( url + "giohang/showLeftCart",function(html){
                    $("#giohang").html(html); 
                });
                $("#loading").fadeOut("fast");   
            });
        });
        
        $("input[name='update']").click(function(){
            $('form').attr("action","<?php echo base_url('giohang/updateCart')?>");
            $('form').submit();
        });
        
        $("input[name='guidonhang']").click(function(e){
            e.preventDefault();
            $("#loading").fadeIn("fast");
            $.post(url + "giohang/insertCart",
            {
               fullname: $('#fullname').val(),
               address: $('#address').val(),
               phone: $('#phone').val(),
               content: $('#content').val(),
               code: $('#code').val(),
               linhkien:1, 
            },
            function(data){
                $('#codeimage').attr("src",url + "captcha");
                $('.errorPanel, .okPanel').remove();
                if (data == 'success')
                {
                    
                     $('#guidonhang').prepend('<div class="okPanel"><span class="ok" style="text-align:center">' + "Bạn đã đặt hàng thành công. " + '</span></div>').fadeIn("fast");
                }
                else
                {
    
                    $('#guidonhang').prepend('<div class="errorPanel"><span class="errors" style="text-align:center">' + data + '</span></div>').fadeIn("fast");
                }
                $('#loading').fadeOut("fast");
            });
        })
        
        
        
        
    })
</script>
<div class="list">
    <form method="POST" name="giohang" action="">
    <?php
        
         if (count($product_cart))
         {
    ?>
            <table cellpadding="0" cellspacing="0" border="1" style="border-color:#c6c6c6; border-collapse: collapse;">
                <tr>
                    <td width="30" height="24" align="center">
                        <b><font color="#3281cd">Xóa</font></b>
                    </td>
                    <td width="510" align="center">
                        <b><font color="#3281cd">Danh sách trong giỏ hàng</font></b>
                    </td>
                    <td width="90" align="center">
                        <b><font color="#3281cd">Giá (VNĐ) </font></b>
                    </td>
                    <td width="50" align="center">
                        <b><font color="#3281cd">S.Lượng</font></b>
                    </td>
                    <td width="90" align="center">
                        <b><font color="#3281cd">Thành tiền</font></b>
                    </td>
                </tr>
        
    <?php
                foreach ($product_cart as $key => $value)
                {
    ?>
                    <tr>
                        <td align="center">
                            <a href="#" title="Xóa sản phẩm ra khỏi giỏ hàng" id="<?php echo $key ?>"><img src="<?php echo base_url('style/images/delicon.png')?>" border="0" align="absmiddle" /></a>
                        </td>
                        
                        <td style="padding:5px">
                            <b><?php echo $value['sptitle'] ?></b><br />
                            <?php echo $value['spdes'] ?>
                        </td>
                        <td align="center">
                            <?php echo number_format($value['price'],0,",",".")?>
                        </td>
                        
                        <td align="center">
                            <input type="hidden" name="rowid[]" value="<?php echo $key ?>" />
                            <input type="text" name="qty[]" value="<?php echo $value['qty'] ?>" style="width:45px;border:1px #c6c6c6 solid; text-align: center;" maxlength="4"/>
                        </td>
                        
                        <td align="center">
                            <b><?php echo number_format(($value['qty'] * $value['price']),0,",",".")?></b>
                        </td>
                    </tr>
    <?php                
                }
    ?>
    
                    <tr>
                        <td colspan="4" height="24" align="center">
                            <b><font color="red">Tổng tiền (VNĐ) </font></b>
                        </td>
                        <td align="center">
                            <b><font color="red"><span id="total"><?php echo number_format($this->cart->total(),0,",",".") ?></span></font></b>
                        </td>
                    </tr>
                    
                     <tr>
                        <td colspan="5" height="50" align="center">
                            <input type="button" class="button" onclick="window.open('<?php echo base_url('print/cart')?>')" value="In giỏ hàng" /> |
                            <input type="button" class="button" name="emptyCart" onclick="#" value="Xóa giỏ hàng" /> |
                            <input type="button" class="button" name="update" onclick="#" value="Cập nhật" />
                            
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="5" height="50" align="center">
                        
                            <input type="button" class="button" onclick="showhide('guidonhang');return false" value="Đặt hàng ngay" />
                        </td>
                    </tr>
    <?php   
       
        }
        else
        {
        ?>
                <center>
                    <font color="red">Không có sản phẩm nào trong giỏ hàng của bạn !</font><br /><br />
                    <a href="<?php echo base_url() ?>">Quay về trang chủ.</a>
                </center>
                
        <?php   
             
        }
        ?>
        </table>
    </form>
    <div id="guidonhang" style="display: none;">
        <form name="dathang" id="dathang" style="margin:0px;" method="POST" action="<?php echo base_url('giohang/insertCart') ?>">
            <table cellpadding="0" cellspacing="10" border="0">
                <tr>
                    <td width="200" height="22">
                    </td>
                    <td width="450" align="left">
                        <font size="1" color="#FF8000">Hãy kiểm tra thông tin của bạn cẩn thận trước khi gửi đơn hàng.</font>
                    </td> 
                </tr>
                
                <tr>
                    <td height="24" align="right">
                        Họ tên
                    </td>
                    <td align="left">
                        <input tabindex="1" type="text" id="fullname" style="width:340px" 
                            <?php
                                if (isset($info_user))
                                    echo "value=\"{$info_user['fullname']}\" disabled"
                                
                            ?>
                        />
                    </td>
                </tr>
                
                <tr>
                    <td height="24" align="right">
                        Địa chỉ
                    </td>
                    <td align="left">
                        <input tabindex="2" type="text" id="address" style="width: 340px;" 
                            <?php
                                if (isset($info_user))  
                                    echo "value=\"{$info_user['diachi']}\" disabled"
                            ?>
                        
                        />
                    </td>
                </tr>
                
                <tr>
                    <td height="24" align="right">
                        Điện thoại
                    </td>
                    <td align="left">
                        <input tabindex="3" type="text" id="phone" style="width: 340px;" 
                        <?php
                            if (isset($info_user))  
                                echo "value=\"{$info_user['phone']}\" disabled"
                        ?>
                        />
                    </td>
                    
                </tr>
                 <?php
                    if (isset($info_user))
                    {  
                                
                 ?>
                
                    <tr>
                        <td height="24" align="right">
                            Email
                        </td>
                        
                        <td align="left">
                            <input tabindex="4" type="text" id="email" style="width: 340px;" value="<?php echo $info_user['email']?>" disabled/>
                        </td>
                    </tr>
                <?php
                
                    }
                    
                ?>
                
                <tr>
                    <td height="24" align="right">
                        Yêu cầu khác
                    </td>
                    <td align="left">
                        <textarea tabindex="5" id="content" cols="40" rows="10" style="height:100px"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td height="24" align="right">
                        Mã xác nhận
                    </td>
                    <td align="left">
                        <input tabindex="6" type="text" id="code" style="width:100px" />
                        <img src="<?php echo base_url('captcha')?>" border="0" align="absmiddle" style="margin:0 0 0 20px" id="codeimage" />
                    </td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td align="left">
                        <input tabindex="7" type="button" id="button" value="Gửi đơn hàng" onclick="guidathang()" class="button" border="0" name="guidonhang"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<div class="bblock">
    <div class="bbotr">
        <div class="bbotl">
        </div>
    </div>
</div>