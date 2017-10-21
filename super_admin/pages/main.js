$(document).ready(function(){
	//functions//
	total_customers();
	total_customers_males();
	total_customers_females();
	total_superadmin();
	total_admin();
	total_products();
	get_superadmin_info();
	total_messages();

	//add customers//
$("#add_customer").click(function(event){
	event.preventDefault();
	$.ajax({
		url : "action/customer_reg.php",
		method : "POST",
		data : $("form").serialize(),
		success : function(data){
			$("#add_customer_msg").html(data);
		}
	})
})
	//add admin//
$("#add_admin").click(function(event){
	event.preventDefault();
	$.ajax({
		url : "action/admin_reg.php",
		method : "POST",
		data : $("form").serialize(),
		success : function(data){
			$("#add_admin_msg").html(data);
		}
	})
})
	//add product//
$("#add_product").click(function(event){
	event.preventDefault();
	$.ajax({
		url : "action/product_reg.php",
		method : "POST",
		data : $("form").serialize(),
		success : function(data){
			$("#add_product_msg").html(data);
		}
	})
})
	//function total customer//
function total_customers(){
	$.ajax({
		url : "action/action.php",
		method : "POST",
		data : {total_customers:1},
		success : function(data){
			$("#total_customers").html(data);
		}
	})
}
	//function total male//
function total_customers_males(){
	$.ajax({
		url : "action/action.php",
		method : "POST",
		data : {total_customers_males:1},
		success : function(data){
			$("#total_customers_males").html(data);
		}
	})
}
	//function total female//
function total_customers_females(){
	$.ajax({
		url : "action/action.php",
		method : "POST",
		data : {total_customers_females:1},
		success : function(data){
			$("#total_customers_females").html(data);
		}
	})
}
	//function total super admin//
function total_superadmin(){
	$.ajax({
		url : "action/action.php",
		method : "POST",
		data : {total_superadmin:1},
		success : function(data){
			$("#total_superadmin").html(data);
		}
	})
}
	//function total admin//
function total_admin(){
	$.ajax({
		url : "action/action.php",
		method : "POST",
		data : {total_admin:1},
		success : function(data){
			$("#total_admin").html(data);
		}
	})
}
	//function total products//
function total_products(){
	$.ajax({
		url : "action/action.php",
		method : "POST",
		data : {total_products:1},
		success : function(data){
			$("#total_products").html(data);
		}
	})
}
	//function total messages//
function total_messages(){
	$.ajax({
		url : "action/action.php",
		method : "POST",
		data : {total_messages:1},
		success : function(data){
			$(".badge").html(data);
		}
	})
}
	//login superadmin//
$("#login_superadmin").click(function(event){
var username = $("#username123").val();
var password = $("#password").val();
		$.ajax({
			url	: "action/login.php",
			method : "POST",
			data : {login:1,username:username,password:password},
			success : function(data){
				$("#login_msg").html(data);
			}
		})
})

	//refresh page superamin//
$("#refresh").click(function(){
	$.ajax({
			url	: "action/refresh.php",
			method : "POST",
			data : {refresh:1},
			success : function(data){
			if(data == "true"){
				location.reload();
			}
				}
			
		})
})
	//function personal info super admin//
	function get_superadmin_info(){
	$.ajax({
		url : "action/action.php",
		method : "POST",
		data : {superadmin_info:1},
		success : function(data){
			$("#superadmin_info_msg").html(data);
		}
	})
}
$("#add_products").click(function(event){
	event.preventDefault();
	$.ajax({
		url : "action/product_reg.php",
		method : "POST",
		data : $("form").serialize(),
		success : function(data){
			$("#add_products_msg").html(data);
		}
	})
})
	$('#modal_product').on('hidden.bs.modal', function () {
	 		location.reload();
	})
	$('#modal_password').on('hidden.bs.modal', function () {
	 		location.reload();
	})
	$('#modal_customer').on('hidden.bs.modal', function () {
	 		location.reload();
	})
	$('#modal_admin').on('hidden.bs.modal', function () {
	 		location.reload();
	})
	$('#modal_edit_admin').on('hidden.bs.modal', function () {
	 		location.reload();
	})
	$('#modal_edit_admin1').on('hidden.bs.modal', function () {
 		location.reload();
})
	$('#modal_edit_admin1').modal({
    backdrop: 'static',
    keyboard: false
})
	$('#modal_edit_customer1').on('hidden.bs.modal', function () {
 		location.reload();
})
	$('#modal_edit_customer1').modal({
    backdrop: 'static',
    keyboard: false
})
	$('#modal_edit_password_admin').on('hidden.bs.modal', function () {
 		location.reload();
})
	$('#modal_edit_password_admin').modal({
    backdrop: 'static',
    keyboard: false
})
	$('#modal_edit_password_customer').on('hidden.bs.modal', function () {
 		location.reload();
})
	$('#modal_edit_password_customer').modal({
    backdrop: 'static',
    keyboard: false
})

	$('#modal_edit_product').on('hidden.bs.modal', function () {
 		location.reload();
})
	$('#modal_edit_password_customer').modal({
    backdrop: 'static',
    keyboard: false
})
	$('#modal_edit_product_product').on('hidden.bs.modal', function () {
 		location.reload();
})
	$('#modal_edit_product_product').modal({
    backdrop: 'static',
    keyboard: false
})
	 $('#username123').keyup(function(event) {
            var textBox = event.target;
            var start = textBox.selectionStart;
            var end = textBox.selectionEnd;
            textBox.value = textBox.value.charAt(0).toUpperCase() + textBox.value.slice(1);
            textBox.setSelectionRange(start, end);
        });
});



