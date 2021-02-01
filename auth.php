<?php  
$conn = mysqli_connect('localhost', 'root', '', 'form_login');

function Register($data)
{
	global $conn;
	$username        = strtolower(stripslashes($data['username']));
	$password        = mysqli_escape_string($conn, $data['password']);
	$email           = $_POST['email'];
	$email           = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email           = filter_var($email, FILTER_VALIDATE_EMAIL);
	$confirmPassword = mysqli_escape_string($conn, $data['confirmPassword']);

	$result          = mysqli_query($conn, 'SELECT `username` FROM `users` WHERE `username`="'.$username.'" ');
	if(mysqli_fetch_assoc($result)) {
		echo "<script> alert('EMAIL / USERNAME TELAH TERPAKAI!') </script>";
		return false;
	}

	if($password != $confirmPassword){
		echo "<script> alert('KONFIRMASI PASSWORD TIDAK SESUAI!') </script>";
		return false;	
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	$query    = 'INSERT INTO `users` (`username`, `password`, `email`) VALUES ("'.$username.'", "'.$password.'", "'.$email.'") ';
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn); 
}

function CekEmail()
{
	global $conn;

	$email = $_POST['emailcek'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);

	$getEmail = mysqli_query($conn, 'SELECT `email` FROM `users` WHERE `email`="'.$email.'" ');

	if(!mysqli_fetch_assoc($getEmail)) {
		return false;
	} else {
		return true;
	}
}

function ResetPassword(){
	global $conn;

	$email    = $_POST['confirmemail'];
	$pw       = $_POST['firstpw'];
	$pw       = password_hash($pw, PASSWORD_DEFAULT);
	$changepw = mysqli_query($conn, 'UPDATE `users` SET `password`="'.$pw.'" WHERE `email`="'.$email.'" ');

	if($changepw){
		return true;
	} else {
		return false;
	}
}

?>