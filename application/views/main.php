<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>MÁY TÍNH CƯỜNG TÂN</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Design by CuongTanGroup" />
    <meta name="description" content="Nhà phân phối Máy Tính - Laptop - Thiết Bị Văn Phòng"/>
    <meta name="keywords" content="cong ty co phan thiet bi may tinh ,laptop,desktop,pc,mainboard,ram,ddram,cdrom,dvd,pci,card,vga,hdd,sound,ide,sata,cpu,chip,chipset,power supply,usb,flash,asus,benq,sony,toshiba,lenovo,transcend,microlab,corsair,gigabyte,intel,amd,ibm,acer,hp,compaq,dell,kingston,kingmax,kingbox,aspcer,vdata,adata," />
    <meta name="robots" content="follow,index" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico" />
    <meta http-equiv="imagetoolbar" content="no" />
    <script type="text/javascript">
        //Set default url for all script
        var url = '<?php echo base_url() ?>';
    </script>
    <link href="<?php echo base_url(); ?>style/css/style.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo base_url(); ?>style/css/compact.css" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo base_url(); ?>style/css/carousel-skin.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/highslide.css" /> 
    <script type="text/javascript" lang="javascript" src="<?php echo base_url(); ?>js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" lang="javascript" src="<?php echo base_url(); ?>js/jquery.jcarousel.js"></script>
    <script type="text/javascript" lang="javascript" src="<?php echo base_url(); ?>js/highslide-with-gallery.js"></script>
    <script type="text/javascript" lang="javascript" src="<?php echo base_url(); ?>js/jquery.leanModal.min.js"></script>
    <script type="text/javascript">
        
        hs.graphicsDir = url + 'js/graphics/';
        hs.align = 'center';
        hs.transitions = ['expand', 'crossfade'];
        hs.outlineType = 'rounded-white';
        hs.fadeInOut = true;
        hs.numberPosition = 'caption';
        hs.dimmingOpacity = 0.75; 
        if (hs.addSlideshow) 
            hs.addSlideshow({ interval: 5000,repeat: false,useControls: true,fixedControls: 'fit',overlayOptions: {opacity: .75,position: 'bottom center',hideOnMouseOut: true}});
    </script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/ajax.js"></script>
    
    
</head>
<body>
    
    <?php
        $this->load->view('login');
        $this->load->view('header');
        
    ?>
    <!--Begin Main -->
    <div id="body">
        <!--Begin Left Col -->
        <div class="left fl">
            <div class="content">
                <div id="giohang">
                    <?php $this->load->view('left_giohang'); ?>
                </div>
                <div id="menu">
                    <?php $this->load->view('left'); ?>
                </div>
                <!--Quảng cáo -->
                
                
                <!-- End Quảng cáo -->
                
                
            </div>        
        </div> <!--End left Col -->
        
        <div class="right fl">
            <div class="ads">
                <a href="<?php echo base_url('chon-cau-hinh')?>" title="Chọn cấu hình máy tính" />
                    <img src="<?php echo base_url(); ?>style/images/choncauhinh.gif" class="spac" alt="Chọn cấu hình máy tính"/>
                </a> 
                <a href="<?php echo base_url('khuyen-mai') ?>" title="Chương trình khuyến mãi" />
                    <img src="<?php echo base_url(); ?>style/images/khuyenmai.gif" class="spac" alt="Chương trình khuyến mãi"/>
                </a> 
                <a href="<?php echo link_cat(2) ?>" title="Máy tính thương hiệu" />
                    <img src="<?php echo base_url(); ?>style/images/thuonghieu.gif" class="spac" alt="Máy tính thương hiệu"/>
                </a> 
                <a href="<?php echo base_url('download') ?>" title="Download báo giá" />
                    <img src="<?php echo base_url(); ?>style/images/download.gif" class="spac" alt="Download báo giá"/>
                </a> 
            </div>
            <div>
                <!-- Begin Menu header --!>
                <div class="hblock">
                    <div class="btopr">
                         <div class="btopl">
                         </div>
                    </div>
                </div>
                <div class="list">
                    <img src="<?php echo base_url(); ?>style/images/home.png" width="16" height="16" align="absbottom" style="margin-right:5px;"/><a href="<?php echo base_url() ?>">Trang chủ</a><span>
                    <?php 
                    if (isset( $title ))
                    {
                        for ($i=0;$i<count($title['text']);$i++)
                            echo "&raquo;<span><a href=\"{$title['link'][$i]}\">{$title['text'][$i]}</a></span>";
                    }
                    ?>
                </div>
                <div class="bblock">
                    <div class="bbotr">
                        <div class="bbotl">
                        </div>
                    </div>
                </div>            
                 <!-- End Menu header --!>
                 <?php $this->load->view($main_page); ?>
            </div>
        </div>
    </div>
    <?php
       
        $this->load->view('footer');
    ?>
</body>
</html>