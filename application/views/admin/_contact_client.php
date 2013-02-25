<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        DANH SÁCH LIÊN HỆ CỦA KHÁCH HÀNG
    </div>
    <div class="content">
        <form action="../proccess_main/client_contact" method="post">
        <table class="tb_list">
            <thead>
                <tr>
                    <th class="th_stt">STT</th>
                    <th class="th_hsx">Nguời gởi</th>
                    <th class="th_dm">Tiêu đề</th>
                    <th class="th_hsx">Ngày gởi</th>
                    <th class="th_tool">Công cụ</th>
                </tr>
            </thead>
            <tbody class="tb_sp">
                            <?php 
                                    $i=1;
                                    while (list($key,$value) =each($lienhe)) {
                                        echo '<tr>';
                                        
                                        echo '<td>'.$i.'</td>';
                                        echo '<td class="td_dm blu img_light" alt="'.$value["ctid"].'" >'.$value["fullname"]." - ".$value["email"].'</td>';
                                        echo '<td>'.$value["subject"].'</td>';
                                        echo '<td>'.$value["datesubmit"].'</td>';
                                        echo ' <td class="actions">
                                        <a href="'.base_url("admin/proccess_main/client_dell")."/".$value["ctid"].'" title="Xóa nội dung">
                                        <img src="'. base_url("style/admin/img/icons/delete.png").'" alt="" />
                                        </a></td>';
                                        echo '</tr>';
                                        $i++;
                             ?>
                                     <div  class="light_a" id="light_a_<?php echo $value["ctid"]?>">
                                                <div class="nguyen">
                                                <div class="border_bg">
                                                  <form action="../proccess_main/contact_khachhang" method="post">  
                                                      <h3>TRẢ LỜI LIÊN HỆ CỦA KHÁCH</h3><br />
                                                      <span class="error"><?php echo $loier; ?></span>
                                                      <div>
                                                          <label>Người gởi :</label><input type="text" value="<?php echo $value["fullname"] ?>" readonly="true" /><br />
                                                          <label>Email :</label><input type="text" value="<?php echo $value["email"] ?>" readonly="true" /><br />
                                                          <label>Điện thoại :</label><input type="text" value="<?php echo $value["phone"] ?>" readonly="true" /><br />
                                                          <label>Tiêu đề :</label><input type="text" value="<?php echo $value["subject"] ?>" readonly="true" /><br />
                                                          <label>Nội dung liên hệ :</label><div style="float:right"><textarea cols="35"  readonly="true" rows="5"><?php echo $value["content"]; ?></textarea></div><br />
                                        <div class="clear"></div>                  <label>Nội dung trả lời</label><div style="float:right">
                                                           <TextArea class="wysiwyg" cols="35" rows="5" name="re_contact">Nhập thông tin</textarea> </div><br />
                                                               <div class="clear"></div>
                                                               <input type="hidden" value="<?php echo $value["ctid"] ?>" name="ctid" />
                                                         <div><input type="submit" value="Gởi liên hệ" />&nbsp;&nbsp;<input type="reset" value="Làm lại" /></div>
                                                      </div>
                                                      <div class="clear"></div>
                                                  </form>
                                                </div>
                                                </div>
                                    </div>
                                    <div class="clear"></div>
                            <?php       }
                            ?>
                            
                
                            </tbody>
        </table>
        <br />
        
        </form>
    </div>
</div>

