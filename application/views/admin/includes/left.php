
   <!--            
                SIDEBAR
                         --> 
                         
        <div id="sidebar">
            <ul>
                <li class="nosubmenu" >
                    <?php echo anchor('admin/redirect/trangchu','<img src='.base_url('style/admin/img/icons/menu/dashboard.png').' alt=""/> Trang chủ','id="tcs"');  ?>
                        
                </li>
                <li><a href="#"><img src="<?php echo base_url('style/admin/img/icons/menu/layout.png');?>" alt="" />
                     Quản lý danh mục  </a>
                    <ul>
                                                <li>
                                            <?php echo anchor('admin/redirect/danhmuc_new','Thêm danh mục mới');?>
                                                </li>
                                                <li>
                                           <?php echo anchor('admin/redirect/danhmuc_list','Danh sách danh mục');?></li>
                    </ul>
                </li>
                
                 <li><a href="#"><img src="<?php echo base_url('style/admin/img/icons/menu/layout.png');?>" alt="" /> Quản lý sản xuất </a>
                     <ul>
                                                <li>
                                            <?php echo anchor('admin/redirect/sanxuat_new','Thêm hãng sản xuất mới');?>
                                                </li>
                                                <li>
                                           <?php echo anchor('admin/redirect/sanxuat_list','Danh sách hãng sản xuất');?>
                                                </li>
                    </ul>
                 </li>
                
                <li><a href="#"><img src="<?php echo base_url('style/admin/img/icons/menu/layout.png');?>" alt="" /> Cập nhật sản phẩm </a>
                    <ul>
                                                <li>
                                           <?php echo anchor('admin/redirect/sanpham_mtth','Máy tính thương hiệu');?>
                                               </li>
                                                <li>
                                            <?php echo anchor('admin/redirect/sanpham_mtxt','Máy tính xách tay');?>
                                                </li>
                                                <li>
                                             <?php echo anchor('admin/redirect/sanpham_dtam','Điện tử - Âm thanh');?> 
                                             </li>
                                                <li>
                                            <?php echo anchor('admin/redirect/sanpham_cap','Cáp &amp; các phụ kiện khác');?> 
                                            </li>
                                                <li>
                                              <?php echo anchor('admin/redirect/sanpham_lkmt','Linh kiện máy tính');?>
                                              </li>
                                                <li>
                                              <?php echo anchor('admin/redirect/sanpham_pmbq','Phần mền bản quyền');?>
                                              </li>
                                                <li>
                                                <?php echo anchor('admin/redirect/sanpham_tbm','Thiết bị mạng');?>
                                                </li>
                                                <li>
                                              <?php echo anchor('admin/redirect/sanpham_tbvp','Thiết bị văn phòng');?>
                                              </li>
                    </ul>
                </li>
                
                <li class="nosubmenu">
                    <?php echo anchor('admin/redirect/danhsachsp','<img src='.base_url('style/admin/img/icons/menu/layout.png').' alt=""/> Danh sách sản phẩm','id="tcs"');  ?>
                    
                 </li>
                
                <li><a href="#"><img src="<?php echo base_url('style/admin/img/icons/menu/layout.png');?>" alt="" /> Quản lý giỏ hàng </a>
                    <ul>
                                                <li>
                                            <?php echo anchor('admin/redirect/donhang_mt','Đơn hàng máy tính');?>
                                               </li>
                                                <li>
                                              <?php echo anchor('admin/redirect/donhang_lk','Đơn hàng linh kiện');?> 
                                              </li>
                    </ul>
                </li>
                
                <li ><a href="#"><img src="<?php echo base_url('style/admin/img/icons/menu/layout.png');?>" alt="" /> Quản lý tin tức </a>
                    <ul>
                                                <li>
                                             <?php echo anchor('admin/redirect/baiviet_new','Thêm bài viết mới');?>
                                             </li>
                                                <li>
                                             <?php echo anchor('admin/redirect/baiviet_list','Danh sách bài viết');?>
                                             </li>
                    </ul>
                </li>
                
                <li><a href="#"><img src="<?php echo base_url('style/admin/img/icons/menu/layout.png');?>" alt="" /> Quản lý hệ thống </a>
                     <ul>
                                                <li>
                                            <?php echo anchor('admin/redirect/gioithieu','Giới thiệu');?>  
                                            </li>
                                                <li>
                                             <?php echo anchor('admin/redirect/chinhsach','Chính sách');?>
                                             </li>
                                                <li>
                                             <?php echo anchor('admin/redirect/baohanh','Bảo hành');?> 
                                             </li>
                                                <li>
                                             <?php echo anchor('admin/redirect/khuyenmai','Khuyến mãi');?>  
                                             </li>
                                                <li>
                                            <?php echo anchor('admin/redirect/baogia','Báo giá sản phẩm');?>
                                            </li>
                                                <li>
                                              <?php echo anchor('admin/redirect/sodo','Sơ đồ đường đi');?> 
                                              </li>
                                                <li>
                                             <?php echo anchor('admin/redirect/tructuyen','Bán hàng trực tuyến');?> 
                                             </li>
                                                <li>
                                              <?php echo anchor('admin/redirect/lienhe','Liên hệ của khách');?>  
                                              </li>
                                               <li>
                                              <?php echo anchor('admin/redirect/flash','Tiêu điểm nổi bật');?>  
                                              </li>
                    </ul>
    
    
    
    
                </li>
                
                <li><a href="#"><img src="<?php echo base_url('style/admin/img/icons/menu/color.png');?>" alt="" /> 
                    Quản lý giao diện </a>
                    <ul>
                        <li>
                       <?php echo anchor('admin/redirect/theme_white','<span style="color:#FFF;">White</span>');?>   
                       </li>
                        <li>
                       <?php echo anchor('admin/redirect/theme_black','<span style="color:#000;">Black</span>');?> 
                       </li>
                        <li>
                        <?php echo anchor('admin/redirect/theme_wood','<span style="color:#624A3E;">Wood</span>');?> 
                       </li>
                    </ul>
                </li>
                
            </ul>


        </div>
        

<!-- end sidebar left-->