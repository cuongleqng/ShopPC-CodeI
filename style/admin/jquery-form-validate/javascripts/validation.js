
    /*
     * 
     onchange="window.location ='<?php site_url();?> '+this.options[this.selectedIndex].value; "
                */
                
                // search 

                   /* <![CDATA[ */
            jQuery(function(){
           
            	
           	
           	 $(".checkall").click(function(){
            	var checked_status = this.checked;
				$("input[class='choncheck']").attr('checked', checked_status);
			  });
            	jQuery("#valid_required").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#valid_required1").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#vaild_title").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#vaild_number1").validate({
                    expression: "if (VAL.match(/^[0-9\.]*$/) && VAL) return true; else return false;",
                    message: "Chỉ cho phép nhập số"
                });
                jQuery("#vaild_number2").validate({
                    expression: "if (VAL.match(/^[0-9\.]*$/) && VAL) return true; else return false;",
                    message: "Chỉ cho phép nhập số"
                });
                jQuery("#vaild_number3").validate({
                    expression: "if (VAL.match(/^[0-9\.]*$/) && VAL) return true; else return false;",
                    message: "Chỉ cho phép nhập số"
                });
                jQuery("#vaild_number4").validate({
                    expression: "if (VAL.match(/^[0-9\.]*$/) && VAL) return true; else return false;",
                    message: "Chỉ cho phép nhập số"
                });
                
                jQuery("#valid_pass").validate({
                    expression: "if (VAL.length > 4 && VAL) return true; else return false;",
                    message: "Password bạn không đúng"
                });
                jQuery("#valid_pass2").validate({
                    expression: "if ((VAL == jQuery('#valid_pass').val() )) return true; else return false;",
                    message: "Nhập lại Password không khớp"
                });
                 jQuery("#sports").validate({
                    expression: "if (VAL.length > 4 && VAL) return true; else return false;",
                    message: "Chưa nhập thông tin"
                });
                
                /*
                 * hang san xuat
                 */
                 jQuery("#txt_id").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                
                // cap nhat
              // ../proccess_main/computer_brand
               // select product
               $("select[name='dmat']").change(function(){
               	var id=$(this).val();
               	     if(id != " " && id != 0){
               	     	location.href ="../redirect/redirect_select/"+id;
               	     }
	       			
               });
               jQuery("#spgb").validate({
                    expression: "if (VAL.match(/^[0-9\.]*$/) && VAL) return true; else return false;",
                    message: "Chỉ cho phép nhập số"
                });
                jQuery("#spgia").validate({
                    expression: "if (VAL.match(/^[0-9\.]*$/) && VAL) return true; else return false;",
                    message: "Chỉ cho phép nhập số"
                });
                jQuery("#spbh").validate({
                    expression: "if (VAL.match(/^[0-9\.]*$/) && VAL) return true; else return false;",
                    message: "Chỉ cho phép nhập số"
                });
                jQuery("#sptitle").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#spd03").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#spd01").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#spkm").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#spd02").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#spd04").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#spd05").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#spdes").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#spcont").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                jQuery("#spd06").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Bạn chưa nhập thông tin"
                });
                
                jQuery("#user_email1").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Xin vui lòng nhập địa chỉ Email"
                });
                jQuery("#user_email2").validate({
                     expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Xin vui lòng nhập địa chỉ Email"
                });
                jQuery("#user_email3").validate({
                     expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Xin vui lòng nhập địa chỉ Email"
                });
                jQuery("#user_email4").validate({
                     expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Xin vui lòng nhập địa chỉ Email"
                });
                
              
                
                
                
                
                
                jQuery('.AdvancedForm').validated(function(){
                    
                });
              
                
                
                jQuery('#frm_category_new').validated(function(){
                	$.ajax({
						  type: "POST",
						  url: "../proccess_main/insert_new",
						  data: $("#frm_category_new").serialize()
						}).done(function( msg ) {
						  alert(msg);
						});
                });
                jQuery('#frm_category_save').validated(function(){
                	$.ajax({
						  type: "POST",
						  url: "../proccess_main/update_new",
						  data: $("#frm_category_save").serialize()
						}).done(function( msg ) {
						  alert(msg);
						});
                });
                
                
                jQuery('#frm_change').validated(function(){
                   $.ajax({
                   	type:"POST",
                   	url:"../Permission/change_pass",
                   	data: $("#frm_change").serialize()
                   }).done(function(msg){
                   	 alert(msg);
                   });
                });
                // luu vi tri da chon
               // upload_production_new
              
               
               
            });
            /* ]]> */