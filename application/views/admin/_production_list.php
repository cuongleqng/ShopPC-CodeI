<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        DANH SÁCH CÁC DANH MỤC SẢN PHẨM
    </div>
    <div class="content">
        <form action="../proccess_main/action_del_all" method="post">
        <table class="tb_list">
            <thead>
                <tbody>
                    <tr>
                        <td colspan="5">
                             <div class="sp_title">
                                <span>Lọc theo tên hãng sản xuất :</span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/1-9"; ?>">0-9</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/A"; ?>">A</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/B"; ?>">B</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/C"; ?>">C</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/D"; ?>">D</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/E"; ?>">E</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/F"; ?>">F</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/G"; ?>">G</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/H"; ?>">H</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/I"; ?>">I</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/J"; ?>">J</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/K"; ?>">K</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/L"; ?>">L</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/M"; ?>">M</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/N"; ?>">N</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/O"; ?>">O</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/P"; ?>">P</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/P"; ?>">Q</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/R"; ?>">R</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/S"; ?>">S</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/T"; ?>">T</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/U"; ?>">U</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/V"; ?>">V</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/W"; ?>">W</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/X"; ?>">X</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/Y"; ?>">Y</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/Z"; ?>">Z</a></span>
                                <span class="bt_red"><a href="<?php echo base_url("/admin/Permission/menber_area")."/tatca"; ?>">Tất cả</a></span>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tr>
                    <th class="th_check"><input type="checkbox" class="checkall"/></th>
                    <th class="th_stt">STT</th>
                    <th class="th_hsx">Hãng sản xuất</th>
                    <th class="th_dm">Các sản phẩm </th>
                    <th class="th_kh">Kích hoạt</th>
                    <th class="th_tool">Công cụ</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $check=FALSE;
                $nid="";
                $dtitle="";
                $i=1;
                    while(list($r,$value)=each($production_list)){
                          
                          foreach ($value as $key3 => $value3) {
                           if (is_array($value3)) {
                           
                            foreach ($value["child"] as $key1 => $value1) {
                                $dtitle .= $value1["dtitle"].' <span style="color:red;"> | </span> ';
                            }
                            
                           }
                        }
                                       echo "<tr>";
                                       $active = ($value["active"]=="1") ? "Hiển thị" : "Không" ;  
                                        echo '<td><input type="checkbox" name="chon[]" class="choncheck" value="'.$value["nid"].'"  /><input type="hidden" name="hid[]" value="'.$value["nid"].'" /></td>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td style="text-align:left;padding-left:2%;"><img src='.base_url("images/logo")."/".$value["ndate"].".".$value["npic"].' width="80px" />
                                        <a href="'.base_url("admin/proccess_main/production_list_update") ."/".$value["nid"].'">
                                        <span class="sp_title" style="padding-left:1%;">'.$value["ntitle"].'</span></a></td>';
                                        echo ' <td style="text-align:left;padding-left:3%;"><span class="sp_title">'.$dtitle.'  </span></td>';
                                        echo ' <td>'.$active.'</td>';
                                        echo '<td class="actions"><a href="'.base_url("admin/proccess_main/production_list_update") ."/".$value["nid"].'" title="Sửa nội dung">
                                        <img src="'.base_url('style/admin/img/icons/edit.png').'" alt="" />
                                        </a>
                                        <a href="'.base_url("admin/proccess_main/production_list_del") ."/".$value["nid"].'" title="Xóa nội dung">
                                        <img src="'. base_url("style/admin/img/icons/delete.png").'" alt="" /></a>
                                        </td>';
                                        $dtitle="";
                                        echo '</tr>';
                                        $i++;
                    }
   
                 ?>
                                
                    
                
                            </tbody>
        </table>
        
        <div class="left input" style=" width:200px;">
            <select name="sl_product" >
                <option value="delete">Xóa mục đã chọn</option>
            </select>
            
        </div>
         <div  class="bt_sm" style="float:left;padding-top:5px;">
             <input type="submit" name="sm_del" value="Xóa vị trí đã chọn" /> 
         </div>
        

        
        </form>
    </div>
</div>

