<?php  
session_start();
require 'auth.php';
ini_set('display_errors', 1);

if(!$_SESSION['login']){
  header('Location: login.php');
}

if(isset($_POST['logout'])){
	header('Location: login.php');
	$_SESSION['login'] = false;
	exit;
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