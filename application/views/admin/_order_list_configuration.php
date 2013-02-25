<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        <?php 
        $red="";
            while (list($key,$value) = each($giohang)) {
                echo $key;
                $red = $value[0]["gloai"];
                break;
                
            }
         ?>
    </div>
    <div class="content">
        <form action="../proccess_main/order_del_all/<?php echo $red; ?>" method="POST" name="frm_donhang">
            
        <table class="tb_list">
            <thead>
                <tr>
                    <th class="th_check"><input type="checkbox" class="checkall"/></th>
                    <th class="th_stt">STT</th>
                    <th class="th_kh">Mã đơn hàng</th>
                    <th class="th_dm">Thông tin khách hàng </th>
                    <th class="th_hsx">Yêu cầu</th>
                    <th class="th_hsx">Tình trạng xử lý</th>
                    <th class="th_tool">Công cụ</th>
                </tr>
            </thead>
            <tbody class="tb_sp">
                <?php  
                    $i=1;
                    
                    foreach ($giohang as $key => $value) {
                        while(list($key1,$value1) = each($value)){
                           
                    $gtime = gmdate( "H:i", $value1['timepost'] + 25200 );
                    $gtime = $gtime." ngày ".gmdate( "d-m-Y", $value1['timepost'] + 25200 );
                            echo '<tr>';
                            echo '<td><input type="checkbox" name ="chon[]" class="choncheck" value="'.$value1["hid"].'" /></td>';
                            echo '<td>'.$i.'</td>';
                            echo '<td>'.$value1["hid"].' </td>';
                            echo '<td class="td_left blu"><b>'.$value1["fullname"].'</b><br/>'.$value1["diachi"].'<br/>'.$value1["phone"].' - '.$value1["email"].' </td>';
                            echo '<td class="td_dm">'.$gtime.'<br /> <span class="td_left ora"> '.$value1["yeucau"].'</span></td>';
                            if ( $value1['xuly'] == "Chờ xử lý" )
                                {
                                    $c0 = "selected";
                                    $c1 = $c2 = $c3 = "";
                                }
                                else if ( $value1['xuly'] == "Đã thanh toán" )
                                {
                                    $c1 = "selected";
                                    $c0 = $c2 = $c3 = "";
                                }
                                else if ( $value1['xuly'] == "Đang chuyển hàng" )
                                {
                                    $c2 = "selected";
                                    $c1 = $c0 = $c3 = "";
                                }
                                else
                                {
                                    $c3 = "selected";
                                    $c1 = $c0 = $c2 = "";
                                }
                                                    
                             echo '<td>
                                   <select name="action" id="tableaction" >
                                        <option value="0" '.$c0.'>Chờ xử lý </option>
                                        <option value="1" '.$c1.'>Đã thanh toán</option>
                                        <option value="2" '.$c2.'>Đang chuyển hàng</option>
                                        <option value="3" '.$c3.'>Đã xử lý</option>
                                   </select>
                                 </td>' ;
                            echo ' <td class="actions"><a href="'.base_url("admin/proccess_main/order_list_update") ."/".$value1["hid"].'" title="Sửa nội dung">
                            <img src="'.base_url('style/admin/img/icons/edit.png').'" alt="" /></a>
                            <a href="'.base_url("admin/proccess_main/order_list_del") ."/".$value1["hid"]."/".$value1["gloai"].'" title="Xóa nội dung">
                            <img src="'. base_url('style/admin/img/icons/delete.png' ) . '" alt="" /></a>
                            </td>' ;
                            
                            echo "</tr>";
                            $i++;
                            
                            }
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
             <input type="submit" name="sm_order" value="Xóa vị trí đã chọn" /> 
         </div>
        
        
        
        <div class="pagination">
            <a href="#" class="prev">«</a>
            <a href="#">1</a>
            <a href="#" class="current">2</a>
            ...
            <a href="#">21</a>
            <a href="#">22</a>
            <a href="#" class="next">»</a>
        </div>
        
        </form>
        
    </div>
</div>

