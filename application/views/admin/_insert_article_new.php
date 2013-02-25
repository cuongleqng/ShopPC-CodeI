<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        DANH SÁCH CÁC BÀI VIẾT
    </div>
    <div class="content">
      <form action="../proccess_main/acticle_del_all" method="POST" name="frm_donhang">
        <table class="tb_list">
            <thead>
                <tr>
                    <th class="th_check"><input type="checkbox" class="checkall"/></th>
                    <th class="th_stt">STT</th>
                    <th class="th_dm">Tiêu đề </th>
                    <th class="th_kh">Ảnh</th>
                    <th class="th_hsx">Ngày gởi</th>
                    <th class="th_tool">Công cụ</th>
                </tr>
            </thead>
            <tbody class="tb_sp">
                                
                                <?php 
                                    $i=1;
                                    while (list($key,$value) =each($tintuc)) {
                                        echo '<tr>';
                                        $ndate = gmdate( "d-m-Y", $value['ndate'] + 25200 );
                                        echo '<td><input type="checkbox" name ="chon[]" class="choncheck" value="'.$value["nid"].'" /></td>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td class="td_dm"><a href="#">'.$value["ntitle"].'</a></td>';
                                        echo '<td><a href="'.base_url("images/tintuc") ."/".$value["ndate"].".".$value["npic"].'"><img src="'.base_url("images").'/pic.gif" /></a></td>';
                                        echo '<td>'.$ndate.'</td>';
                                        echo ' <td class="actions"><a href="'.base_url("admin/proccess_main/acticle_list_update") ."/".$value["nid"].'" title="Sửa nội dung">
                                        <img src="'. base_url('style/admin/img/icons/edit.png').'" alt="" /></a>
                                        <a href="'.base_url("admin/proccess_main/acticle_list_del") ."/".$value["nid"].'" title="Xóa nội dung">
                                        <img src=" '.base_url("style/admin/img/icons/delete.png").'" alt="" /></a></td>';
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
             <input type="submit" name="sm_acticle" value="Xóa vị trí đã chọn" /> 
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

