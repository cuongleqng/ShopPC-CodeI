$(document).ready(function(){
   $('.changePass a').click(function(){
        $('.errorPanel').remove();
        $('.okPanel').remove();
        $('#passChange').find("form")[0].reset();
   });
   
    $('.account a').click(function(){
        $('.errorPanel').remove();
        $('.okPanel').remove();
        
   });
   
   $('a[rel*=leanModal]').leanModal({ top : 120, closeButton: ".modal_close" });

    $('#s_parent').bind('change',function(){
        var v = $('#s_parent option:selected').val();
        $('#loading').fadeIn("fast");
        $.ajax({
            type: "POST",
            url: url + "download_ajax/getChild/",
            data: {did:v},
            success:function(data)
            {
                $('#s_child').html(data);
                $("#loading").fadeOut("fast");
            }
        })
    })
    $('.up-login-register-button').click(function(e){
        e.preventDefault();
        if ($('#user-panel-inner').is(':hidden'))
        {
            
            $('#user-panel-inner').slideDown("slow");
            $('#bordertop').append('<div id="user-panel-overlay"></div>');
            $('#user-panel-overlay').animate({opacity:0.5},"slow");
            
        }
        else
        {
             $('#user-panel-inner').slideUp("slow");
             $('#user-panel-overlay').remove();
        }
        
    })
    
    $('.cm-combinations_have_account').change(function(){
        if ($(this).attr('value') == 'N')
        {
            $('#on_have_account').fadeOut("normal");
            $('#off_have_account').slideDown("normal");
            $('#off_have_account :input').attr("disabled", false);
        }
        else
        {
            $('#off_have_account').slideUp("normal");
            $('#on_have_account').fadeIn("normal");
            $('#off_have_account :input').attr("disabled", true);
        }
    })
    
    $('input[name="login"]').click(function(e){
        e.preventDefault();
        $.post(url + "login/checkLogin",$('#user-panel-form').serialize() + '&login=1',function(data){
           if (data=='success')
           {
                location.reload();
           }    
           else
           {
                if ($('.errorPanel').length)
                    $('.errorPanel').remove();
                $('#user-panel-form').prepend('<div class="errorPanel"><span class="errors">' + data + '</span></div>').fadeIn("fast");
           }
                
        });
    })
    
    $('input[name="register"]').click(function(e){
       e.preventDefault();
       $.post(url + "login/register", $('#user-panel-form').serialize() + '&register=1',function(data)
       {
            if(data == 'success')
            {
                location.reload();
            }
            else
            {
                if ($('.errorPanel').length)
                    $('.errorPanel').remove();
                $('#user-panel-form').prepend('<div class="errorPanel"><span class="errors">' + data + '</span></div>').fadeIn("fast");
                
            }
       });
    });
})


function addCart(id)
{
    $("#loading").fadeIn("fast");
    $.ajax({
        type: "POST",
        url : url + "giohang/addCart",
        data: {spid : id},
        success:function(data)
        {
            if (data==1)
                alert('Đã khởi tạo giỏ hàng thành công');
            $.get(url + "giohang/showLeftCart",function(data){
                $("#giohang").html(data); 
            });
            $("#loading").fadeOut("fast");
        }
    })
    return false;
}
function lienhe(){
    if ( document.contact.fullname.value == "" ) {
	 alert( "Hãy nhập tên của bạn vào!" );
	 document.contact.fullname.focus();
     return false;
    } else if ( document.contact.email.value == "" ) {
	 alert( "Hãy nhập email của bạn vào!" );		
	 document.contact.email.focus();
     return false;
    } else if (( document.contact.email.value.search("@") == -1 ) || ( document.contact.email.value.search("[.*]" ) == -1 )){
	 alert( "Địa chỉ Email không hợp lệ" );	
	 document.contact.email.focus();
     return false;
    } else if ( document.contact.subject.value == "" ) {
	 alert( "Hãy nhập tiêu đề vào!" );		
	 document.contact.subject.focus();
    } else if ( document.contact.content.value == "" ) {
	 alert( "Hãy nhập nội dung vào!" );		
	 document.contact.content.focus();
     return false;
    } else if (document.contact.code.value == "" ){
	 alert( "Hãy nhập mã xác nhận vào!" );	
	 document.contact.code.focus();
     return false;
    }
    
}
function guidathang(){
    if ( document.dathang.fullname.value == "" ) {
	 alert( "Hãy nhập tên của bạn vào!" );
	 document.dathang.fullname.focus();
    }else if ( document.dathang.address.value == "" ) {
	 alert( "Hãy nhập địa chỉ của bạn vào!" );		
	 document.dathang.address.focus();
    } else if ( document.dathang.phone.value == "" ) {
	 alert( "Hãy nhập số điện thoại của bạn vào!" );		
	 document.dathang.phone.focus();
    } else if (document.dathang.code.value == "" ){
	 alert( "Hãy nhập mã xác nhận vào!" );	
	 document.dathang.code.focus();
    }
    return false;
    
}
/****************  Tim kiem *****************/

function search(kwd){  
	 var kwd = document.getElementById("kwd").value;
	 if (kwd=="" || kwd.length<3){
	     alert('Từ khóa tìm kiếm phải lớn hơn 3 ký tự!');
	     window.location.href='#Cuongtan,timkiem';
	 } else {	
	     kwd = kwd.replace(/&/g,'%26');
	     kwd = kwd.replace(/"/g,'%22');	     	     
 	     window.location.href= url+ 'search/'+kwd;     
	 }
}

/************  Thu nho - Mo rong Gui don dat hang **********/

var ie45,ns6,ns4,dom;
if (navigator.appName=="Microsoft Internet Explorer") ie45=parseInt(navigator.appVersion)>=4;
else if (navigator.appName=="Netscape"){ns6=parseInt(navigator.appVersion)>=5;ns4=parseInt(navigator.appVersion)<5;}
dom=ie45 || ns6;
function showhide(id) {
         elb = document.all ? document.all[id] :   dom ? document.getElementById(id) :   document.layers[id];
         els = dom ? elb.style : elb;
         if (dom){
             if (els.display == "none") {
                 els.display = "";
                 window.status="Mở form gửi đơn hàng";
             } else {
                 els.display = "none";
                 window.status="Đóng form gửi đơn hàng";
             }
         } else if (ns4){
             if (els.display == "show") {
                 els.display = "hide";
                 window.status="Mở form gửi đơn hàng";
             } else {
                 els.display = "show";
                 window.status="Đóng form gửi đơn hàng";
             }
         }
}

