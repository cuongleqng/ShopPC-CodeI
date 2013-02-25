<div class="title_margin"></div>
<div class="bloc">
    <div class="title">
        THÊM TIN TỨC MỚI
    </div>
    <div class="content">
        <form action="../proccess_main/acticle_insert" method="POST" enctype="multipart/form-data" >
        <table class="tb_center tb_right">
            <tbody>
                <tr>
                     <td colspan="4" style="text-align: center;color: red;font-size: 15px;"><?php echo $loier; ?></td>
                </tr>
                   <tr>
                        <td><span class="sp_title">Tiêu đề :</span></td>
                        <td> <input type="text" value="" name="sptitle" id="sptitle" /></td>
                    </tr>
                    
                      <tr>
                        <td><span class="sp_title">Upload ảnh :</span></td>
                        <td>
                                 <?php echo form_upload("userfile","upload"); ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><span class="sp_title">Mở đầu :</span></td>
                        <td colspan="2">
                                <textarea name="spdes" id="spdes" rows="5" cols="58"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="sp_title">Nội dung :</span></td>
                        <td colspan="2">
                                <textarea name="spcont" id="spcont" rows="6" class="wysiwyg" cols="59">
                                </textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                                <div  class="bt_sm div_center">
                                    <input type="submit" value="Thêm sản phẩm" /> &nbsp;
                                    <input type="reset" value="Làm lại" />
                                </div>
                        </td>
                    </tr>
                    
            </tbody>
        </table>
        
        </form>
        
    </div>
</div>

