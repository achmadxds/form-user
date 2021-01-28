$(document).ready(function() {
	$("#checkemail").click(function() {
		CheckEmail();
	});
});

function CheckEmail() {
	var email = $("#emailConfirm").val();
	console.log(email);

	if(email != ""){
		$.ajax({
			type : "POST",
			data : {task : "checkemail", emailcek : email},
			success: function(data) {
				console.log("Dapet email");
			} 
		});
	}
}

$(function() {
	'use strict';

	
	$('.form-control').on('input', function() {
		var $field = $(this).closest('.form-group');
		if (this.value) {
			$field.addClass('field--not-empty');
		} else {
			$field.removeClass('field--not-empty');
		}
	});
});