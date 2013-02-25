
/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#frm_change");
	
	var name = $("#name_sp,#name_sp1");
	var nameInfo = $("#nameInfo,#nameInfo1");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	var pass1 = $("#pass1");
	var pass1Info = $("#pass1Info");
	var pass2 = $("#pass2");
	var pass2Info = $("#pass2Info");
//	var message = $("#message");
	
	var limit1 = $("#limit1");
	var gia1 = $("#input2").val();
	var gia2 = $("#input3").val();
	var gia3 = $("#input4").val();
	var gia4 = $("#input5").val();
	
	//On blur
	name.blur(validateName);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	
	//On key press
	name.keyup(validateName);
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	// message.keyup(validateMessage);
	//On Submitting
	form.submit(function(){
		if(validateName() && validateEmail() && validatePass1() && validatePass2())
			return true;
		else
			return false;
	});
	
	//validation functions
	function validateEmail(){
		//testing regular expression
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){
			email.removeClass("error");
			emailInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			email.addClass("error");
			emailInfo.text("Email không hợp lệ,vui lòng kiểm tra lại");
			emailInfo.addClass("error");
			return false;
		}
	}
	function validateName(){
		//if it's NOT valid
		if(name.val().length < 4){
			name.addClass("error");
			nameInfo.text("Lớn hơn 4 kí tự");
			nameInfo.addClass("error");
			return false;
		}else{
			name.removeClass("error");
			nameInfo.removeClass('error');
			return true;
		}
	}
	function validatePass1(){
		var a = $("#password1");
		var b = $("#password2");

		//it's NOT valid
		if(pass1.val().length < 4){
			pass1.addClass("error");
			pass1Info.text("Lớn hơn 4 kí tự");
			pass1Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			pass1.removeClass("error");
			pass1Info.text("");
			pass1Info.removeClass("error");
			validatePass2();
			return true;
		}
	}
	function validatePass2(){
		var a = $("#password1");
		var b = $("#password2");
		//are NOT valid
		if( pass1.val() != pass2.val() ){
			pass2.addClass("error");
			pass2Info.text("Passwords không đúng");
			pass2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			pass2.removeClass("error");
			pass2Info.text("");
			pass2Info.removeClass("error");
			return true;
		}
	}
	function validateMessage(){
		//it's NOT valid
		if(message.val().length < 10){
			message.addClass("error");
			return false;
		}
		//it's valid
		else{			
			message.removeClass("error");
			return true;
		}
	}
	function check_box(){
		//it not
				var countChecked = function() {
				  var n = $( "input:checked" ).length;
				  $( "div" ).text( n + (n === 1 ? " is" : " are") + " checked!" );
					};
					countChecked();
				 
				$( "input[type=checkbox]" ).on( "click", countChecked );
				
		
	}
	function delete_checkon(){
		var thisCheck = $(this);
		if (thischeck.is (':checked'))
		{
		// Do stuff
		}
	}
			

	
});