<div class="hblock">
    <div class="btopr">
        <div class="btopl">
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('form select').change(function(){
            $("#loading").fadeIn("fast");
            var name = $(this).attr("name");
            var obj = $("#" + name);
            $.post( url + 'choncauhinh_ajax/getPrice', $('form').serialize() ,
                function(data){
                    obj.html(data[name]);
                    $('#sum').html(data.sum);
                    $("#loading").fadeOut("fast");
                },"json");
        });
        
        $('input[name="choncauhinh"]').click(function(e){
           e.preventDefault();
           $('form').attr("action","print");
           $('form').submit();
        });
    })
</script>
<div class="list">
    <form method="POST" action="" name="choncauhinh" target="_blank">
        <table cellpadding="1" cellspacing="1" border="0" style="border-color:#c6c6c6;border-collapse:collapse">
            <tr>
                <td width="610" height="24" align="center">
                    <b><font color="#3281cd">Bạn hãy chọn các linh kiện máy tính dưới đây</font></b>
                </td>
                <td width="100" align="right">
                    <b><font color="#3281cd">Giá (VND) </font></b>
                </td>
            </tr>
            
            <tr>
                <td height="25" align="left">
                    <select name="cpu" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                            if (count($list_product['cpu']))
                            {
                                echo "<option>&gt; Bộ vi xử lý - CPU</option>";
                                foreach($list_product['cpu'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện Bộ vi xử lý - CPU</option>"
                        ?>
                    </select>
                    CPU
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="cpu"></span></b></font>
                </td>
            </tr>
            
            
            <tr>
                <td height="35" align="left">
                    <select name="mainboard" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                            if (count($list_product['cpu']))
                            {
                                echo "<option>&gt; Bo mạch chủ - Mainboard</option>";
                                foreach($list_product['mainboard'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện Bo mạch chủ - Mainboard</option>"
                        ?>
                    </select>
                    Mainboard
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="mainboard"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="ram" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                            if (count($list_product['ram']))
                            {
                                echo "<option>&gt; Bộ nhớ trong - RAM</option>";
                                foreach($list_product['ram'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện Bộ nhớ trong - RAM</option>"
                        ?>
                    </select>
                    RAM
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="ram"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="hdd" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                            if (count($list_product['hdd']))
                            {
                                echo "<option>&gt; Ổ đĩa cứng - HDD</option>";
                                foreach($list_product['hdd'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện ổ đĩa cứng - HDD</option>"
                        ?>
                    </select>
                    HDD
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="hdd"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="vga" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                            if (count($list_product['vga']))
                            {
                                echo "<option>&gt; Card màn hình - VGA</option>";
                                foreach($list_product['vga'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện card màn hình - VGA</option>"
                        ?>
                    </select>
                    VGA
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="vga"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="monitor" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                            if (count($list_product['monitor']))
                            {
                                echo "<option>&gt; Màn hình - Monitor</option>";
                                foreach($list_product['hdd'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có thiết bị màn hình - Monitor</option>"
                        ?>
                    </select>
                    Monitor
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="monitor"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="case" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                           
                            if (count($list_product['case']))
                            {
                                echo "<option>&gt; Vỏ máy tính - Case</option>";
                                foreach($list_product['case'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện vỏ máy tính - Case</option>"
                        ?>
                    </select>
                    Case
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="case"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="power" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                           
                            if (count($list_product['power']))
                            {
                                echo "<option>&gt; Nguồn máy tính - Power Supply</option>";
                                foreach($list_product['power'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện nguồn máy tính - Power Supply</option>"
                        ?>
                    </select>
                    Power
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="power"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="mouse" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                           
                            if (count($list_product['mouse']))
                            {
                                echo "<option>&gt; Chuột - Mouse</option>";
                                foreach($list_product['mouse'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện chuột - Mouse</option>"
                        ?>
                    </select>
                    Mouse
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="mouse"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="keyboard" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                           
                            if (count($list_product['keyboard']))
                            {
                                echo "<option>&gt; Bàn phím - Keyboard</option>";
                                foreach($list_product['keyboard'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện bàn phím - Keyboard</option>"
                        ?>
                    </select>
                    Keyboard
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="keyboard"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="odd" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                           
                            if (count($list_product['odd']))
                            {
                                echo "<option>&gt; Ổ đĩa quang - CD/DVD</option>";
                                foreach($list_product['odd'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện đĩa quang - CD/DVD</option>"
                        ?>
                    </select>
                    CD/DVD
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="odd"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="35" align="left">
                    <select name="speaker" style="border:1px solid #c6c6c6; width:545px" size="1">
                        
                        <?php
                           
                            if (count($list_product['speaker']))
                            {
                                echo "<option>&gt; Loa máy tính - Speaker</option>";
                                foreach($list_product['speaker'] as $row)
                                {
                         ?>
                                    <option value="<?php echo $row['spid']?>">
                                        <?php echo number_format($row['spgia'],0,",",".") ?>VNĐ - BH <?php echo $row['spbh'] ?> tháng - <?php echo $row['sptitle'] ?>
                                        
                                    </option>
                         <?php           
                                }
                           
                            }
                            else
                                echo "<option>&gt; Không có linh kiện loa máy tính - Speaker</option>"
                        ?>
                    </select>
                    Speaker
                    
                </td>
                <td align="right">
                    <font size="2" color="#ff8d1d"><b><span id="speaker"></span></b></font>
                </td>
            </tr>
            
            <tr>
                <td height="24" align="right">
                    <b><font color="red">Tổng tiền</font></b>
                </td>
                <td align="right">
                    <b><font color="red"><span id="sum"></span></font></b>
                </td>
            </tr>
            
            <tr>
                <td colspan="2" height="30" align="center">
                    <input type="submit" class="button" name="choncauhinh" value="In cấu hình" /> | <input type="button" class="button" onclick="showhide('guidonhang');return false" value="Đặt hàng ngay"/>  
                </td>
            </tr>
        </table>
        
        <div id="guidonhang" style="display: none;">
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
        </div>
    </form>
</div>

<div class="bblock">
    <div class="bbotr">
        <div class="bbotl">
        </div>
    </div>
</div>


