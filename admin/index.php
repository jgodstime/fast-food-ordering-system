<?php
	include_once('includeFiles/login.class.php');
    // include_once('classes/`.php');
?>
<!DOCTYPE html>
<html>


<!-- Mirrored from theme3.adminplus-premium.themekit.io/login-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2017 03:19:31 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>

  <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
  <meta name="robots" content="noindex">

  <!-- Material Design Icons  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Roboto Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

  <!-- Simplebar.js -->
  <link type="text/css" href="assets/vendor/simplebar.css" rel="stylesheet">

  <!-- App CSS -->
  <link type="text/css" href="assets/css/style.min.css" rel="stylesheet">

</head>

<body class="login">

  <div class="row">
    <div class="col-sm-10 col-sm-push-1 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
      <h2 class="text-primary center m-a-2">
        <i class="material-icons md-36"></i> <span class="icon-text">Welcome Admin</span>
      </h2>
      <div class="card-group">
        <div class="card bg-transparent">
          <div class="card-block">
            <div class="center">
				
<?php
	if (isset($_POST['login_btn'])){
		 $user_name = $_POST['user_name'];
    	 $password = trim($_POST['password']);
		password_hash($password, PASSWORD_DEFAULT);
		if(!empty($user_name) && !empty($password)){
//echo password_hash($password, PASSWORD_DEFAULT);
		$object= new login_class($DB_con);
		$object -> login_check($user_name,$password);
          
		}else{
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">×</span>
		</button>
		<strong>Error!</strong> Please admin username and password.
	  </div>';
		}
	}
?>
              <h4 class="m-b-0"><span class="icon-text">Login</span></h4>
              <p class="text-muted">Access your account</p>
            </div>
            <form action="index.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="user_name" placeholder="Admin username">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
               
                <div class="clearfix"></div>
              </div>
              <div class="center">
                <button type="submit" name="login_btn" class="btn  btn-primary-outline btn-circle-large">
                  <i class="material-icons"></i>Login
					
                </button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="assets/vendor/jquery.min.js"></script>

  <!-- Bootstrap -->
  <script src="assets/vendor/tether.min.js"></script>
  <script src="assets/vendor/bootstrap.min.js"></script>

  <!-- Simplebar.js -->
  <script src="assets/vendor/simplebar.min.js"></script>

  <!-- Bootstrap Layout -->
  <script src="assets/vendor/bootstrap-layout.js"></script>

  <!-- Bootstrap Layout Scrollable Extension JS -->
  <script src="assets/vendor/bootstrap-layout-scrollable.js"></script>

</body>


<!-- Mirrored from theme3.adminplus-premium.themekit.io/login-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2017 03:19:31 GMT -->
</html>