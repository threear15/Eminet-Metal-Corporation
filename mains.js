$(document).ready(function() {
	cat();
	cart_count();
	cart_checkout();

	$('.nav-trigger').click(function() {
		$('.side-nav').toggleClass('visible');
	
	});
function cat(){
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {category1:1},
		success	: function(data){
			$("#get_category1").html(data);
		}
	})
}


$("#signup_button").click(function(event){
		event.preventDefault();
		$.ajax({
			url		: "reg_function.php",
			method	: "POST",
			data	: $("form").serialize(),
			success	: function(data){
				$("#msg").html(data);
			}
		})
	})
$("body").delegate(".addme","click",function(event){
		event.preventDefault();
		var p_id = $(this).attr('pid');
		var color = $("#color").val();
		$.ajax({
			url : "../action.php",
			method : "POST",
			data : {addproduct:1,p_id:p_id,color:color},
			success : function(data){
				$("#msgadd").html(data);
			}
		})
	})
$("#login").click(function(event){
	event.preventDefault();
	var gmail = $("#gmail").val();
	var password12  = $("#password12").val();
	var status  = $("#status").val();
	var pending  = $("#pending").val();
	$.ajax({
		url : "login.php",
		method : "POST",
		data : {userlogin:1,usergmail:gmail,userpass12:password12,status:status,pending:pending},
		success : function(data){
			$("#msg").html(data);

		}
	})
})
$("#send_message1").click(function(event){
		event.preventDefault();
		$.ajax({
			url		: "message_function.php",
			method	: "POST",
			data	: $("form").serialize(),
			success	: function(data){
				$("#msg12").html(data);
			}
		})
	})
	$("#submit").click(function(event){
	event.preventDefault();
	var gmailforgot = $("#gmailforgot").val();
	var u_question  = $("#u_q_forgot").val();
	var u_answer  = $("#u_a_forgot").val();
	$.ajax({
		url : "forgot_password_function.php",
		method : "POST",
		data : {userforgot:1,gmailforgot:gmailforgot,u_question:u_question,u_answer:u_answer},
		success : function(data){
			$("#msgforgot").html(data);
			
		}
	})
})
	$("#close").click(function(){
		location.reload();
	})
	$('#myModal1').on('hidden.bs.modal', function () {
 		location.reload();
})
	$('#myactivate').on('hidden.bs.modal', function () {
 		location.reload();
})
	$("#submitnumber3").click(function(event){
		event.preventDefault();
		var as_number = $("#as_number").val();
		var true_number = $("#true_number").val();
		var true_gmail = $("#true_gmail").val();
		$.ajax({
			url : "forgot_password_function.php",
			method : "POST",
			data : {usertrue:1,as_number:as_number,true_number:true_number,true_gmail:true_gmail},
			success : function(data){
				$("#msgforgot").html(data);
			}
		})
	})
	$("#refresh").click(function(){
		location.reload();
	})
	$("#submitnumber45").click(function(event){
		event.preventDefault();
		var code = $("#code").val();
		var new_pass = $("#new_pass").val();
		$.ajax({
			url : "forgot_password_function.php",
			method : "POST",
			data : {update:1,code:code,new_pass:new_pass},
			success : function(data){
				$("#msgupdate").html(data);
			}
		})
	})
	$('#myModalverify').modal({
    backdrop: 'static',
    keyboard: false
})
	$("#activate").click(function(event){
		event.preventDefault();
		var approved = $("#approved").val();
		$.ajax({
			url : "forgot_password_function.php",
			method : "POST",
			data : {update_status:1,approved:approved},
			success : function(data){
				$("#msgstatus").html(data);
			} 
		}) 
	})
		$("body").delegate("#add","click",function(event){
		event.preventDefault();
		var p_id = $(this).attr('pid');
		$.ajax({
			url		: "login.php",
			method	: "POST",
			data	: {addproduct:1,proid:p_id},
			success	: function(data){
				$("#products_msg").html(data);
				
			}
		})
	})
		function cart_count(){
			$.ajax({
				url : "../action.php",
				method : "POST",
				data : {cart_count:1},
				success : function(data){
					$(".badge").html(data);
				}
			})
			cart_checkout();
		}
		function cart_checkout(){
			$.ajax({
				url : "../action.php",
				method : "POST",
				data : {cart_checkout:1},
				success : function(data){
					$("#cart_checkout").html(data);
				}
			})
		}
		$("body").delegate(".qty","click",function(){
			var pid = $(this).attr("pid");
			var qty = $("#qty-"+pid).val();
			var color = $("#color-"+pid).val();
			var price = $("#price-"+pid).val();
			var total = qty * price;
			$("#total-"+pid).val(total);
			
		})
		$("body").delegate(".remove","click",function(){
			var pid = $(this).attr("remove_id");
			$.ajax({
				url : "../action.php",
				method : "POST",
				data : {remove_from_cart:1,remove_id:pid},
				success : function(data){
					$("#msgremove").html(data);
					cart_checkout();
				}
			})
		})
		$("body").delegate(".update","click",function(){
			var pid = $(this).attr("update_id");
			var qty = $("#qty-"+pid).val();
			var price = $("#price-"+pid).val();
			var color = $("#color-"+pid).val();
			var total = $("#total-"+pid).val();
			$.ajax({
				url : "../action.php",
				method : "POST",
				data : {update_from_cart:1,update_id:pid,qty:qty,price:price,color:color,total:total},
				success : function(data){
					$("#msgupdate").html(data);
					cart_checkout();
				}
			})
		})
});

