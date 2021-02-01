$(document).ready(function() {
	$("#checkemail").click(function() {
		CheckEmail();
	});

	$("#resetopasswordu").click(function() {
		ResetPasswords();
	});
});

var em;
function CheckEmail() {
	var email = $("#emailConfirm").val();

	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (regex.test(email) == true) {
		$.ajax({
			type : "POST",
			data : {task : "checkemail", emailcek : email},
			success: function(data) {
				if(data.payload){
					em = email;
					$('#modalReset').modal('show');
					$('#exampleModal').modal('hide');
				} else {
					alert('Email tidak ada');
				}
			}
		});
		
	}else{
		alert('Masukan email dengan benar');
	}
}

function ResetPasswords() {
	var pw        = $("#firstPassword").val();
	var confirmPW = $("#confirmPassword").val();

	if(pw != "" && confirmPW != ""){
		if(pw != confirmPW){
			alert('salah nih');
		} else {
			$.ajax({
				type : "POST",
				data : {task : "resetpw", firstpw : pw, confirmemail : em},
				success: function(data) {
					console.log(data);
					if(data.loadpay){
						alert("Berhasil ganti password");
					} else {
						alert("gagal ganti password");
					}
				}
			});
		}
	} else {
		alert('isi password baru dulu');
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