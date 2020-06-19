<?php include '../classes/adminDetails.php'; ?>
<?php
  $al = new AdminLogin();
  if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['registerbtn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pin = $_POST['pin'];

    $isLogedIn = $al->adminRegister($fname,$lname,$email,$pass,$pin,$_FILES);
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Register</title>

  <!-- Custom fonts for this template-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="fname" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lname" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <span class="small" id="message"></span>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="number" id="inputPin" name="pin" class="form-control" placeholder="Pin Number" required="required">
              <label for="inputPin">Pin No</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="file" id="inputPin" name="proImage" class="form-control" placeholder="Pin Number" required="required">
              <label for="inputPin">Profile Image 32px x 30px</label>
            </div>
          </div>

          <button type="submit" name="registerbtn" id="register" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="d-flex text-center mt-2">
          <span class="d-flex">Already have an account? <a class="ml-2" href="login.html">Login Now</a></span>
          <a class="ml-5" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script>
$(document).ready(function(){

  $("#confirmPassword").blur(function(){

  if ($('#inputPassword').val() == $('#confirmPassword').val()) {

    $('#message').html('Password Matched').css('color', 'green');
    $('#register').attr('disabled',false);

  } else{ 

    $('#message').html('Password Not Matching').css('color', 'red');
    $('#register').attr('disabled',true);
  }
  });
});
</script>
</body>

</html>
