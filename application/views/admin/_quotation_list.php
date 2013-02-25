<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        DANH SÁCH BÁO GIÁ CÓ SẴN
    </div>
    <div class="content">
        <form action="../redirect/insert_baogia" method="post">
        <table class="tb_list">
            <thead>
                <tr>
                    <th class="th_check"><input type="checkbox" class="checkall"/></th>
                    <th class="th_stt">STT</th>
                    <th class="th_dm">Loại báo giá sản phẩm</th>
                    <th class="th_kh">File</th>
                    <th class="th_hsx">Ngày gởi</th>
                    <th class="th_tool">Công cụ</th>
                </tr>
            </thead>
            <tbody class="tb_sp">
                       <?php 
                                    $i=1;
                                    while (list($key,$value) =each($baogia)) {
                                        echo '<tr>';
                                        $ndate = gmdate( "d-m-Y", $value['bgdate'] + 25200 );
                                        echo '<td><input type="checkbox" /></td>';
                                        echo '<td>'.$i.'</td>';
                                        echo '<td class="td_dm"><a href="'.base_url("admin/proccess_main/load_baogia") ."/".$value["bgid"].'">'.$value["bgtitle"].'</a></td>';
                                        echo '<td><a href="'.base_url("images/baogia")."/".$value["bgdate"].".".$value["bgfile"].'">
                                        <img src="'.base_url("images").'/attach.png"/> </a></td>';
                                        echo '<td>35</td>';
                                       echo '<td class="actions">';
                                        if ($value["active"]== "0" ) {
                                              
                                       echo ' <a href="'.base_url("admin/proccess_main/baogia_active") ."/1/".$value["bgid"].'">  
                                        <img src="'.base_url('style/admin/img/icons/error.png').'" alt="" title="Không hiển thị"/> </a>';
                                        } else {
                                          echo ' <a href="'.base_url("admin/proccess_main/baogia_active") ."/0/".$value["bgid"].'">  
                                        <img src="'.base_url('style/admin/img/icons/success.png').'" alt="" title="Đã hiển thị"/> </a>';   
                                        }
                                        
                                    
                                   echo '    <a href="'.base_url("admin/proccess_main/load_baogia") ."/".$value["bgid"].'" title="Sửa nội dung">
                                        <img src="'. base_url("style/admin/img/icons/edit.png").'" alt="" /></a>
                                        <a href="'.base_url("admin/proccess_main/baogia_del") ."/".$value["bgid"].'" title="Xóa nội dung">
                                        <img src="'. base_url('style/admin/img/icons/delete.png').'" alt="" /></a></td>';
                                      echo '</tr>';      
                                        $i++;
                                     }
                       ?>
                    
                
                            </tbody>
        </table>
        <br />
        <div class="bt_sm div_center">
            <input type="submit" value="Thêm báo giá mới" />
            
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

