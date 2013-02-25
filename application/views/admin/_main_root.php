       
 <h1><img src="<?php echo base_url('style/admin/img/icons/dashboard.png');?>" alt="" />
     Administrator Center
</h1>
                
<div class="bloc left">
    <div class="title">
        Thông tin tài khoản quản trị
    </div>
    <div class="content dashboard">
        <div class="center">
            <table class="noalt title_right">
                <tbody>
                    <?php foreach($content as $key): ?>
                    <tr>
                        <td><span class="sp_title">Tài khoản :</span></td>
                        <td><?php echo $key->username; ?></td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Họ và Tên :</span></td>
                        <td><?php echo $key->fullname; ?></td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">E-mail :</span></td>
                        <td><?php echo $key->email; ?></td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Thay đổi thông tin :</span></td>
                        <td><a href="../redirect/changepass">Đổi mật khẩu</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="cb"></div>
        </div>
    </div>
</div>

           
<div class="bloc right">
    <div class="title">
        Thông tin đơn vị chủ website
    </div>
    <div class="content">
        <div class="center">
            <table class="noalt title_right">
                <tbody>
                    <tr>
                        <td><span class="sp_title">Tên đơn vị :</span></td>
                        <td>Development by Nguyen Van Hien</td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Địa chỉ :</span></td>
                        <td>Song Cau - Phu Yen</td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Điện thoại-Fax :</span></td>
                        <td>0166.534.8054</td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Website - E-mail :</span></td>
                        <td>Nguyen.van.hien.cdtin@gmail.com</td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Lượt truy cập :</span></td>
                        <td>900</td>
                    </tr>
                </tbody>
            </table>
            <div class="cb"></div>
        </div>
        <div class="cb"></div>
    </div>
</div> 
  
   

<div class="cb"></div>
             
<div class="bloc">
    <div class="title">
        Thống kê chung bài viết trong hệ thống
    </div>
    <div class="content">
        <?php if (isset($report_main)): ?>
        <div class="left">
            <table class="noalt title_right">
                <thead>
                    <tr>
                        <th colspan="2"><em>Nội dung</em></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td><a href="#"><span class="sp_title">Danh mục sản phẩm :</span></a></td>
                        <td class="bad title_bold"><?php echo $report_main["dm"]; ?></td>
                    </tr>
                    <tr>
                        <td><a href="../redirect/sanxuat_list"><span class="sp_title">Các hãng sản xuất :</span></a></td>
                        <td class="bad title_bold"><?php echo $report_main["nsx"]; ?></td>
                    </tr>
                    <tr>
                        <td><a href="#"><span class="sp_title">Máy tính thương hiệu :</span></a></td>
                        <td class="bad title_bold"><?php echo $report_main["mtth"]; ?></td>
                    </tr>
                    <tr>
                        <td><a href="#"><span class="sp_title">Máy tính xách tay :</span></a></td>
                        <td class="bad title_bold"><?php echo $report_main["mtxt"]; ?></td>
                    </tr>
                    <tr>
                        <td><a href="#"><span class="sp_title">USB - MP3 - Thẻ nhớ:</span></a></td>
                        <td class="bad title_bold"><?php echo $report_main["usb"]; ?></td>
                    </tr>
                    <tr>
                        <td><a href="../redirect/danhsachsp"><span class="sp_title">Sản phẩm :</span></a></td>
                        <td class="bad title_bold"><?php echo $report_main["sp"]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="right">
            <table class="noalt title_right">
                <thead>
                    <tr>
                        <th colspan="2"><em>Thống kê</em></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="../redirect/donhang_mt"><span class="sp_title">Đơn hàng cấu hình máy :</span></a></td>
                        <td class="bad title_bold"><?php echo $report_main["dhmt"]; ?></td>
                    </tr>
                    <tr>
                        <td><a href="../redirect/donhang_lk"><span class="sp_title">Đơn hàng linh kiện :</span></a></td>
                        <td class="bad title_bold"><?php echo $report_main["dmlk"]; ?></td>
                    </tr>
                    
                    <tr>
                        <td > <a href="#" ><span class="sp_title">Đơn hàng đã hoàn thành :</span></a></td>
                        <td class="bad title_bold" ><?php echo $report_main["dhht"]; ?></td>
                    </tr>
                    
                    <tr>
                        <td><a href="../redirect/lienhe"><span class="sp_title">Liên hệ :</span></a></td>
                        <td class="bad title_bold"><?php echo $report_main["lh"]; ?></td>
                    </tr>
                    
                    
                    
                </tbody>
            </table>
        </div>
        <div class="cb"></div>
    </div>
    <?php endif;  ?>
</div>

<div class="cb"></div>