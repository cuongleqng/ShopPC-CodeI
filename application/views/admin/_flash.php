<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        DANH SÁCH ẢNH FLASH TIÊU ĐIỂM NỔI BẬT
    </div>
    <div class="content">
        <table class="tb_list">
            <thead>
                <tr>
                    <th class="th_stt">STT</th>
                    <th class="th_dm">Nội dung</th>
                    <th class="th_hsx">Ngày gởi</th>
                    <th class="th_tool">Công cụ</th>
                </tr>
            </thead>
            <tbody class="tb_sp">
                       <?php 
                                    $i=1;
                                    while (list($key,$value) =each($flash)) {
                                        echo '<tr>';
                                        $ndate = gmdate( "d-m-Y", $value['fdate'] + 25200 );
                                        echo '<td><input type="hidden" name="fid" value="'.$value["fid"].'" />'.$i.'</td>';
                                        echo '<td class="td_dm"><a href="'.base_url("admin/proccess_main/flash")."/".$value["fid"].'"> 
                                        <img src="'.base_url("images/flash")."/".$value["fdate"].".".$value["fpic"].'"/> <br/>'.$value["fcont"].'</a></td>';
                                        echo '<td>'.$ndate.'</td>';
                                        echo '<td class="actions">
                                        <a href="'.base_url("admin/proccess_main/flash")."/".$value["fid"].'" title="Sửa nội dung"><img src="'. base_url("style/admin/img/icons/edit.png").'" alt="" /></a></td>';
                                      echo '</tr>';      
                                        $i++;
                                     }
                       ?>
                    
                
                            </tbody>
        </table>
        
      
    </div>
</div>

