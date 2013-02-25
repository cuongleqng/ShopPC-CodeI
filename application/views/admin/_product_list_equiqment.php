<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        DANH SÁCH CÁC SẢN PHẨM LINH KIỆN
    </div>
    <div class="content">
        <form action="<?php echo base_url();?>admin/proccess_main/product_del_all" method="POST" name="frm_danhsach">
        <div class="div_center">
                <?php
                              $_data=array(); 
                            while (list($key,$value) = each($noidung)) {
                                while (list($key1,$value1) = each($value)) {
                                    $_data[] = $value1;
                                }
                            }
                            
                          
                             ?>
            <span class="sp_title">Lọc sản phẩm :</span> &nbsp;
            <select name="search_danhsach" id="search_danhsach"  onchange="window.location.href = '<?php echo base_url()."admin/Permission/menber_area/30/0/";?>'+this.options[this.selectedIndex].value + '<?php echo "/".$hsx; ?> '">
                                <option value="0">Danh mục sản phẩm</option>
                            <?php
                                          while (list($key,$value) =each($_data)) {
                                                while (list($key1,$value1) = each($value)) {
                                                    if (is_array($value1)) {
                                                        if($locsp == $value1["did"]){
                  echo ' <option value="'.$value1["did"].'" selected >&raquo;  &nbsp;&nbsp; '.$value1["dtitle"].'</option>';                                           
                                                        }else
                  echo ' <option value="'.$value1["did"].'" >&raquo;  &nbsp;&nbsp; '.$value1["dtitle"].'</option>';
                                                    } else {
                                                        if($locsp == $value["did"]){
                  echo ' <option value="'.$value["did"].'" style="color:#fb4f03" selected>&raquo; '.$value["dtitle"].'</option>';                                          
                                                        }else
                  echo ' <option value="'.$value["did"].'" style="color:#fb4f03">&raquo; '.$value["dtitle"].'</option>';
                                                 break;
                                                    }
                                                    
                                                }
                                            }
                            ?>
    
                                
                                
                                
             </select> &nbsp;&nbsp;&nbsp;
             <select name="search_nsx" onchange="window.location.href = '<?php echo base_url()."admin/Permission/menber_area/30/0/".$locsp."/";?>'+this.options[this.selectedIndex].value;" >
                                <option value="0">Hãng sản xuất</option>
                                <?php 
                                    foreach ($soft_copy as $key => $value) {
                                        foreach ($value as $key1 => $value1) {
                                            if ($hsx == $value1["nid"]) {
                                echo ' <option value="'.$value1["nid"].'" selected>&raquo; '.$value1["ntitle"].'</option>';                
                                            }else
                                            echo ' <option value="'.$value1["nid"].'">&raquo; '.$value1["ntitle"].'</option>';
                                         }
                                    }
                                 ?>
             </select>
        </div>
        <br/>
        <table class="tb_list">
            <thead>
                <tr>
                    <th class="th_check"><input type="checkbox" class="checkall"/></th>
                    <th class="th_stt">Số thứ tự</th>
                    <th class="th_dm">Tên sản phẩm</th>
                    <th class="th_kh">Ảnh sản phẩm</th>
                    <th class="th_kh">Giá bán VNĐ</th>
                    <th class="th_vt">Kho </th>
                    <th class="th_kh">Khuyến mãi</th>
                    <th class="th_view"><img src="<?php echo base_url('style/admin/img/th-comment.png');?>" alt="" /></th>
                    <th class="th_tool">Công cụ</th>
                </tr>
            </thead>
            <tbody class="tb_sp">
                                
                                    
                                  <?php 
                                    $i=(isset($linki) && is_numeric($linki))?($linki):1;
                                    $km="";
                                    while (list($key,$value) = each($product_list)) {
                                        if ($value["spkm"]!="") {
                                            $km=$value["spkm"];
                                        } else {
                                            $km="Không";
                                        }
                                        
                                        echo '<tr>';    
                                        echo '<td><input type="checkbox" name="chon[]" class="choncheck" value="'.$value["spid"].'" /></td>';
                   echo ' <td>'.$i.'</td>';
                   echo '<td class="td_left"><a href="'.base_url("admin/proccess_main/product_list_update") ."/".$value["spid"].'"> '.$value["sptitle"].'</a></td>';
                  echo '  <td><a href="'.base_url("images/product")."/TA01_".$value["spdate"].".".$value["sppic"].'"><img width="20" src="'.base_url('images').'/pic.gif" /></a></td>';
                  echo '  <td class="td_left">'.number_format($value["spgia"], 0, ",", "." ).'</td>';
                  echo '  <td class="td_dm" style="text-align:center;">'.$value["spkho"].'</td>';
                  echo '  <td>'.$km.'</td>';
                   echo ' <td>'.$value["spview"].'</td>';
                  echo '  <td class="actions"><a href="'.base_url("admin/proccess_main/product_list_update") ."/".$value["spid"].'" title="Sửa nội dung">
                  <img src="'.base_url('style/admin/img/icons/edit.png').'" alt="" /></a>
                  <a href="'.base_url("admin/proccess_main/product_list_del") ."/".$value["spid"].'" title="Xóa nội dung">
                  <img src="'. base_url("style/admin/img/icons/delete.png").'" alt="" /></a>
                  </td>';
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
             <input type="submit" name="sm_danhsach" value="Xóa vị trí đã chọn" /> 
         </div>
        <div class="pagination" >
            <?php 
            echo $pagination; 
            ?>
        </div>
        
        </form>
        
        
    </div>
</div>

