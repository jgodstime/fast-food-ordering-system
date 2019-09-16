<?php
include_once('includeFiles/login.class.php');
if (empty($user_name)){header('location:index.php');}else{}							
?>
<!DOCTYPE html>
<html>


<!-- Mirrored from theme3.adminplus-premium.themekit.io/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2017 03:17:48 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Food Ordering System</title>

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

  <!-- Charts CSS -->
  <link rel="stylesheet" href="examples/css/morris.min.css">

</head>

<body class="layout-container ls-top-navbar layout-sidebar-l3-md-up">

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-primary navbar-full navbar-fixed-top">

    <!-- Toggle sidebar -->
    <button class="navbar-toggler pull-xs-left hidden-md-up" type="button" data-toggle="sidebar" data-target="#sidebarLeft"><span class="material-icons">menu</span></button>

    <!-- Brand -->
    <a href="index1.php" class="navbar-brand first-child-md">Admin Panel</a>

    <!-- Menu -->
    <ul class="nav navbar-nav hidden-md-down">
      <li class="nav-item active">
        <a class="nav-link" href="index1.php">Dashboard</a>
      </li>
      
    </ul>
    <!-- // END Menu -->

    <!-- Menu -->
    <ul class="nav navbar-nav pull-xs-right hidden-sm-down nav-strip-right">

      <!-- Notifications dropdown -->
      <li class="nav-item dropdown">
        
        <ul class="dropdown-menu dropdown-menu-right notifications" aria-labelledby="Preview">
          <li class="dropdown-title">Emails</li>
          <li class="dropdown-item email-item">
            <a class="nav-link" href="index-2.html">
              <span class="media">
					<span class="media-left media-middle"><i class="material-icons">mail</i></span>
              <span class="media-body media-middle">
						<small class="pull-xs-right text-muted">12:20</small>
						<strong>John Food Ordering</strong>
						food ordering system
					</span>
              </span>
            </a>
          </li>
          <li class="dropdown-item email-item">
            <a class="nav-link" href="index-2.html">
              <span class="media">
					<span class="media-left media-middle">
						<i class="material-icons">mail</i>
					</span>
              <span class="media-body media-middle">
						<small class="text-muted pull-xs-right">30 min</small>
						<strong>Godstime Brain</strong>
						Partnership proposal
					</span>
              </span>
            </a>
          </li>
          <li class="dropdown-item email-item">
            <a class="nav-link" href="index-2.html">
              <span class="media">
					<span class="media-left media-middle">
						<i class="material-icons">mail</i>
					</span>
              <span class="media-body media-middle">
						<small class="text-muted pull-xs-right">1 hr</small>
						<strong>Marry Bless Downey</strong>
						UI Design
					</span>
              </span>
            </a>
          </li>
          <li class="dropdown-action center">
            <a href="email.html">Go to inbox</a>
          </li>
        </ul>
      </li>
      <!-- // END Notifications dropdown -->

      <!-- User dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false">
          <img src="assets/images/people/50/guy-6.jpg" alt="Avatar" class="img-circle" width="40">
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
          
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
      <!-- // END User dropdown -->

    </ul>
    <!-- // END Menu -->

  </nav>
  <!-- // END Navbar -->
  <!-- Sidebar -->
  <div class="sidebar sidebar-left sidebar-size-3 sidebar-visible-md-up sidebar-light ls-top-navbar-xs-up sidebar-transparent-md" id="sidebarLeft" data-scrollable>
    <ul class="sidebar-menu">
      <li class="sidebar-menu-item active">
        <a class="sidebar-menu-button" href="index1.php">
          <i class="sidebar-menu-icon material-icons"></i> Home
        </a>
      </li>
      <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="addFoodCat.php">
          <i class="sidebar-menu-icon material-icons"></i> Food Category
        
        </a>
      </li>
      <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="addFood.php">
          <i class="sidebar-menu-icon material-icons"></i> Add Food
        </a>
      </li>
      <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="displayOrders.php">
          <i class="sidebar-menu-icon material-icons"></i> Orders
        </a>
      </li>
      <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="displayUsers.php">
          <i class="sidebar-menu-icon material-icons"></i> Users
        </a>
      </li>
		
      <li class="sidebar-menu-item">
        <a class="sidebar-menu-button" href="logout.php">
          <i class="sidebar-menu-icon material-icons"></i> Logout
        </a>
      </li>		
		 
    </ul>
 
    </div>
  <!-- // END Sidebar -->

  <!-- Content -->
  <div class="layout-content" data-scrollable>
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li><a href="index1.php">Home</a></li>
        <li><a href="index1.php">Food Ordering System</a></li>
        <li class="active">Control Panel</li>
      </ol>

      <!-- Card Group -->
      <div class="card-group">

        <!-- Card -->
        <div class="card">
          <div class="p-absolute p-a-1">
            <small class="text-muted">
              <strong></strong>
            </small>
          </div>
          <div class="card-block center">
            <img src="assets/images/people/110/guy-8.jpg" alt="guy" class="img-circle p-t-2">
            <p class="m-b-0"><a class="lead text-muted" href="#">Welcome Admin</a></p>
            
            <a href="logout.php" class="text-muted"><i class="material-icons">You are log in. Click to logout</i></a>
          </div>
        </div>

        <!-- Card -->
        <div class="card">
          <div class="p-absolute p-a-1">
            <small class="text-muted">
              <strong>TOP TEAMS</strong>
            </small>
          </div>
          <div class="card-block">
            <div id="donut2" style="height:200px"></div>
          </div>
        </div>

        <!-- Card -->
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Rankings</h4>
          </div>
          <ul class="list-group list-group-fit">
            <li class="list-group-item active">
              <div class="media">
                <div class="media-left text-muted">1.</div>
                <div class="media-body media-middle"><a href="#">Red Team</a></div>
                <div class="media-right media-middle">54</div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media">
                <div class="media-left text-muted">2.</div>
                <div class="media-body media-middle"><a href="#">Blue Team</a></div>
                <div class="media-right media-middle">34</div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media">
                <div class="media-left  text-muted">3.</div>
                <div class="media-body media-middle"><a href="#">Green Team</a></div>
                <div class="media-right media-middle">26</div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media">
                <div class="media-left text-muted">4.</div>
                <div class="media-body media-middle">
                  <a href="#">Orange Team</a>
                </div>
                <div class="media-right media-middle">16</div>
              </div>
            </li>
          </ul>
        </div>
        <!-- // END Card -->

      </div>
      <!-- // END Card Group -->

      <!-- Stats -->
      <div class="card">
        <div class="card-block">
          <div class="row">
            <div class="col-md-6">
              <h4 class="card-title">Stats</h4>
            </div>
            <div class="col-md-6 right">
              <div class="form-group pull-md-right">
                <select class="c-select form-control">
                  <option selected>This Year</option>
                  <option value="1">2016</option>
                  <option value="2">2017</option>
                </select>
              </div>
            </div>
          </div>
          <div id="stats" style="height:180px;"></div>
        </div>
      </div>
      <!-- // END Stats -->

      

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

  <!-- Theme Colors -->
  <script src="assets/js/colors.js"></script>

  <!-- Charts JS -->
  <script src="assets/vendor/raphael.min.js"></script>
  <script src="assets/vendor/morris.min.js"></script>

  <!-- Initialize Charts -->
  <script src="examples/js/chart.js"></script>

</body>


<!-- Mirrored from theme3.adminplus-premium.themekit.io/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2017 03:18:24 GMT -->
</html>