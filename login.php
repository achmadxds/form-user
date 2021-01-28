<?php 
session_start();
require 'auth.php';
ini_set('display_errors', 1);

if(isset($_SESSION['login'])){
  header('Location: index.php');
}

if(isset($_POST['task'])){
  switch ($_POST['task']) {
    case 'checkemail':
      CekEmail();
      break;
  }
}

if(isset($_POST['login'])){
  $username = mysqli_real_escape_string($conn, $_POST['usernameLogin']);
  $password = mysqli_real_escape_string($conn, $_POST['passwordLogin']);
  $result   = mysqli_query($conn, 'SELECT `username`, `password` FROM `users` WHERE `username`="'.$username.'" ');

  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row['password'])) {
      $_SESSION['login'] = true;
      echo "<script> alert('password bener bro!'); </script>";
      header('Location: index.php');
      exit;
    } else {
      echo "<script> alert('password salah bro!'); </script>";
    }
  } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>Login</title>
</head>
<body>
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <!-- <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div> -->
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-block">
                <div class="mb-4">
                  <h3>Sign In to <strong>Colorlib</strong></h3>
                  <p class="mb-4"></p>
                </div>
                <form action="" method="post">
                  <div class="form-group first">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="usernameLogin">

                  </div>
                  <div class="form-group last mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="passwordLogin">
                    
                  </div>
                  
                  <div class="d-flex mb-5 align-items-center">
                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                      <input type="checkbox" checked="checked"/>
                      <div class="control__indicator"></div>
                    </label>
                    <span class="ml-auto resetpw"><a href="#" data-toggle="modal" data-target="#exampleModal" class="forgot-pass">Forgot Password</a></span> 
                  </div>

                  <input type="submit" value="Log In" name="login" class="btn btn-pill text-white btn-block btn-primary">

                  <span class="d-block text-center my-4 text-muted"> or create your <a href="register.php">account</a></span>
                </form>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">RESET PASSWORD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="emailConfirm" class="text-secondary">Email :</label><br>
              <input type="email" id="emailConfirm" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer float-right" style="display : block">
            <button type="button" class="btn btn-success" id="checkemail">Go Ahead</button>
          </div>
        </form>    
      </div>
    </div>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>