<?php
include_once('includeFiles/login.class.php');
include_once('includeFiles/select.class.php'); //coming back for u
include_once ('classes/insert.class.php');
include_once"classes/display.class.php";

if (empty($user_name)){header('location:index.php');}else{}	
?>
<!DOCTYPE html>
<html>


<!-- Mirrored from theme3.adminplus-premium.themekit.io/forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2017 03:18:35 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Order Record</title>

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

  <!-- Datepicker -->
  <link rel="stylesheet" href="examples/css/bootstrap-datepicker.min.css">

  <!-- Timepicker -->
  <link rel="stylesheet" href="examples/css/bootstrap-timepicker.min.css">

  <!-- Required by summernote -->
  <link rel="stylesheet" href="../cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css">

  <!-- Summernote WYSIWYG -->
  <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css">
  <link rel="stylesheet" href="examples/css/summernote.min.css">

  <!-- Touchspin -->
  <link rel="stylesheet" href="examples/css/bootstrap-touchspin.min.css">

</head>

<body class="layout-container ls-top-navbar layout-sidebar-l3-md-up">

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-primary navbar-full navbar-fixed-top">

    <!-- Toggle sidebar -->
    <button class="navbar-toggler pull-xs-left hidden-md-up" type="button" data-toggle="sidebar" data-target="#sidebarLeft"><span class="material-icons">Menu</span></button>

    <!-- Brand -->
    <a href="index1.php" class="navbar-brand first-child-md">Admin Panel</a>

    <!-- Menu -->
    <ul class="nav navbar-nav hidden-md-down">
      <li class="nav-item active">
        <a class="nav-link" href="displayOrders.php">Order</a>
      </li>
     
    </ul>
   
    <ul class="nav navbar-nav pull-xs-right hidden-sm-down nav-strip-right">

      

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

      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">List of Orders</li>
      </ol>
		<div class="card-header">
          <h4 class="card-title">Order Record</h4>
        </div>
    
      <div class="row">
		  
	       <div class="col-sm-10 col-sm-push-1 col-md-4 col-md-push-3 col-lg-4 col-lg-push-1">
      <div class="card-group">
        <div class="card bg-transparent">
          <div class="card-block">
            <div class="center">
		  
            </div>
	  		<form action="addFood.php" method="POST" enctype="multipart/form-data">
            
				  
                <fieldset class="form-group">
                  <label for="exampleInputEmail1">Sort Record</label>
                      <select class="form-control" name="sortRecord"  onfocus="this.selectIndex=-1;" id="sortValue" onchange="sortOnChangeEvent()">
                    <option></option>
                    <option value="2">Delivered</option>
                    <option value="1">Ordered</option>
                    <option value="0">Not Ordered</option>
                      
                    </select>
                </fieldset>
                
              </form>
          </div>
        </div>
        
      </div>
    </div>
          
        <div class="col-sm-10 col-sm-push-1 col-md-4 col-md-push-3 col-lg-4 col-lg-push-1">
      <div class="card-group">
        <div class="card bg-transparent">
          <div class="card-block">
            <div class="center">
		      <?php
                if(isset($_POST['updateOrderStatusBtn'])){
                     $orderCode = $_POST['orderCode'];

                    if (!empty($orderCode)){
                        $object = new insertC($DB_con);
                        $object -> updateOrderStatusViaOrderCode($orderCode);
                    }else{
                        echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <strong>Error!</strong> Enter order code.
                      </div>';
                    }
                  }
                ?>
            </div>
	  		<form action="displayOrders.php" method="POST">
            
				  
                <fieldset class="form-group">
                  <label for="exampleInputEmail1">Update Order Status By Order Code</label>
                      <input type="text" name="orderCode" class="form-control">
                </fieldset>
                
                 
                
                <button type="submit" name="updateOrderStatusBtn" class="btn btn-primary">Update</button>
              </form>
          </div>
        </div>
        
      </div>
    </div>
          
            <div class="col-sm-12  col-md-12  col-lg-12">
                 <div class="card-group">
                    <div class="card bg-transparent">
                      <div class="card-block">
                          <div class="center displayOrderRecord">
                            
                          </div>
                        </div>
                     </div>
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

  <!-- Vendor JS -->
  <script src="assets/vendor/jquery.bootstrap-touchspin.js"></script>
  <script src="assets/vendor/bootstrap-datepicker.min.js"></script>
  <script src="assets/vendor/bootstrap-timepicker.js"></script>
  <script src="assets/vendor/summernote.min.js"></script>

  <!-- Init -->
  <script src="examples/js/date-time.js"></script>
  <script src="examples/js/summernote.js"></script>
  <script src="examples/js/touchspin.js"></script>
  <script type="text/javascript" src="assets/js/mine.js"></script>

</body>


<!-- Mirrored from theme3.adminplus-premium.themekit.io/forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2017 03:18:46 GMT -->
</html>