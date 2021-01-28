<?php  
session_start();
require 'auth.php';

if($_SESSION['login'] == false){
	header('Location: login.php');
}

if(isset($_POST['logout'])){
	$_SESSION['login'] = false;
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
</head>
<body>
	<h5>
		HADEHH
		<form method="POST">
			<input type="submit" value="Log Off" name="logout">
		</form>
	</h5>
</body>
</html>