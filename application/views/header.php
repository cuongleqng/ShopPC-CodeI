<div id="bordertop">
</div>
<div id="allpage">
    <div id="loading">Đang tải dữ liệu</div>
<div id="main">
    <!--Begin Header -->

<div id="header">
    <div class="logo fl">
        <a href="./" title="Trang chủ"><img src="<?php echo base_url(); ?>style/images/logos.jpg" alt="Trang chủ"/></a>
    </div>
    <div class="bgsearch fr">
        <div class="menutop">
        <a href="<?php echo base_url('gioi-thieu')?>">Giới thiệu</a>
            <span>|</span><a href="<?php echo base_url('chinh-sach')?>">Chính sách</a>
            <span>|</span><a href="<?php echo base_url('bao-hanh')?>">Bảo hành</a>
            <span>|</span><a href="<?php echo base_url('duong-di')?>">Sơ đồ đường đi</a>
            <span>|</span><a href="<?php echo base_url('tin-tuc');  ?>">Tin tức</a>
            <span>|</span><a href="<?php echo base_url('lien-he'); ?>">Liên hệ</a>
            <span>
        </div>
        <div class="search">
            <form onSubmit="search('','');return false" style="margin:0px;">
                <input type="text" size="1" id="kwd" class="key fl" value="Nhập từ khoá"  onfocus="if(this.value=='Nhập từ khoá') this.value='';" onblur="if(this.value=='') this.value='Nhập từ khoá';">
                <input type="submit" value="" class="timkiem fl" />
            </form>
        </div>
        <div class="thoigian fr"><b>Ví dụ</b>: 
         <a href="index.php?mod=timkiem&kwd=Dual%20Core">Dual Core</a>, <a href="index.php?mod=timkiem&kwd=LCD">LCD</a>, <a href="index.php?mod=timkiem&kwd=DDR2">DDR2</a>,...
         </div>
    </div>
    <div class="blockhot">
        <div id="nav2">
            <ul> 
                <?php 
                if (isset($cat) && $cat == 0)
                    echo  "<li class=\"parent-active\">";
                else
                    echo "<li>";
                ?>
                <a href="<?php echo base_url(); ?>">Trang chủ</a></li>
            </ul>
            <ul>
                <?php 
                if (isset($cat) && $cat == 6)
                    echo "<li class=\"parent-active\">";
                else
                    echo "<li>";
                ?>
                <a href="<?php echo link_cat(6); ?>">Linh Kiện Máy Tính</a></li>
            </ul>	
            <ul>
                  <?php 
                if (isset($cat) && $cat == 3)
                    echo "<li class=\"parent-active\">";
                else
                    echo "<li>";
                ?>
            	<a href="<?php echo link_cat(3); ?>">Máy Tính Xách Tay</a></li>
            </ul>
            <ul>
                  <?php 
                if (isset($cat) && $cat == 9)
                    echo "<li class=\"parent-active\">";
                else
                    echo "<li>";
                ?>
                <a href="<?php echo link_cat(9); ?>">Thiết Bị Văn Phòng</a></li>
            </ul>
            <ul>
                  <?php 
                if (isset($cat) && $cat == 8)
                    echo "<li class=\"parent-active\">";
                else
                    echo "<li>";
                ?>
                <a href="<?php echo link_cat(8); ?>">Thiết Bị Mạng</a></li>
            </ul>			
            <ul>
                  <?php 
                if (isset($cat) && $cat == 5)
                    echo "<li class=\"parent-active\">";
                else
                    echo "<li>";
                ?>
            	<a href="<?php echo link_cat(5); ?>">Cáp & Phụ kiện</a></li>
            </ul>
    		<ul>
                  <?php 
                if (isset($cat) && $cat == 4)
                    echo "<li class=\"parent-active\">";
                else
                    echo "<li>";
                ?>
                <a href="<?php echo link_cat(4); ?>">Điện tử âm thanh</a></li>
            </ul>							  
            <ul>
                <?php
                    if ($this->uri->segment(1)=="lien-he") 
                        echo "<li class=\"parent-active\">";
                    else
                        echo  "<li>";
                ?>
            	<a href="<?php echo base_url('lien-he'); ?>">Liên Hệ</a></li>
            </ul>	
        				  
        </div>				  
            <!--Begin Menu -->
        
            <!--Get Css for Menu -->
            
        <link href="<?php echo base_url();?>style/css/menu.css" rel="stylesheet" type="text/css" media="screen, projection" />
        
            <!--Begin Flash -->
        
        <div class="flash fl">
            <?php
                if (!empty($flash))
                {
                    $fpic = $flink = $fcont = "";
                    foreach ($flash as $row)
                    {
                        $fpic .=  $this->config->item('flash')."{$row['fdate']}.{$row['fpic']}|";
                        $flink .= "{$row['flink']}|";
                        $fcont .= "{$row['fcont']}|";
                        
                    }
            ?>
                    <embed type="application/x-shockwave-flash" src="<?php echo base_url();?>style/images/tinmoi.swf" quality="high" wmode="opaque" width="735" height="245" flashvars="<?php echo "image=$fpic&amp;url=$flink&amp;info=$fcont;&amp;stopTime=5000"?>" />
            <?php
                }

            ?>
            
        </div>
            <!--End Flash -->          
            
            
        <div class="support fr">
        <!--Begin Support -->                 
            <?php 
            if (isset($support) && count($support))
            {
            ?>
            
                <div class="stitle">Bán hàng trực tuyến</div>
                <div class="online"><img src="http://opi.yahoo.com/online?u=<?php echo $support['bhnv1'] ?>&amp;m=g&amp;t=1&amp;2=us" align="absmiddle" border="0" /> 
                <a href="ymsgr:SendIM?<?php echo $support['bhnv1'] ?>" title="Liên hệ">NV. Kinh doanh 01</a></div>
                <div class="online"><img src="http://opi.yahoo.com/online?u=<?php echo $support['bhnv2'] ?>&amp;m=g&amp;t=1&amp;2=us" align="absmiddle" border="0" />
                <a href="ymsgr:SendIM?<?php echo $support['bhnv2'] ?>" title="Liên hệ">NV. Kinh doanh 02</a></div>
                <div class="online"><img src="http://opi.yahoo.com/online?u=<?php echo $support['bhnv3'] ?>&amp;m=g&amp;t=1&amp;2=us" align="absmiddle" border="0" />
                <a href="ymsgr:SendIM?<?php echo $support['bhnv3'] ?>" title="Liên hệ">NV. Kinh doanh 03</a></div>
                <div class="online"><img src="http://opi.yahoo.com/online?u=<?php echo $support['bhnv4'] ?>&amp;m=g&amp;t=1&amp;2=us" align="absmiddle" border="0" />
                <a href="ymsgr:SendIM?<?php echo $support['bhnv4'] ?>" title="Liên hệ">NV. Dịch vụ 01</a></div>
                <div class="online"><img src="http://opi.yahoo.com/online?u=<?php echo $support['bhnv5'] ?>&amp;m=g&amp;t=1&amp;2=us" align="absmiddle" border="0" />
                <a href="ymsgr:SendIM?<?php echo $support['bhnv5'] ?>" title="Liên hệ">NV. Dịch vụ 02</a></div>
                <div class="shot">Số điện thoại nóng</div><div class="sdt"><?php echo $support['bhsdt1'] ?></div>
                <div class="phone"><?php echo $support['bhsdt2'] ?></div>
            <?php
            
            }
            
            ?>
            <!--End Support -->         
        </div>
    </div>        
</div>