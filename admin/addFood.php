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
  <title>Food</title>

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
        <a class="nav-link" href="addFood.php">Add food</a>
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
        <li class="active">Food Upload</li>
      </ol>
		<div class="card-header">
          <h4 class="card-title">Add Food</h4>
        </div>
    
      <div class="row">
		  
	       <div class="col-sm-10 col-sm-push-1 col-md- col-md-push-3 col-lg-8 col-lg-push-1">
      <div class="card-group">
        <div class="card bg-transparent">
          <div class="card-block">
            <div class="center">
				
<?php

      // //indicate which file to resize (can be any type jpg/png/gif/etc...)
      // $file = 'your_path_to_file/file.png';
      
      // //indicate the path and name for the new resized file
      // $resizedFile = 'your_path_to_file/resizedFile.png';
      
      // //call the function (when passing path to pic)
      // smart_resize_image($file , null, SET_YOUR_WIDTH , SET_YOUR_HIGHT , false , $resizedFile , false , false ,100 );
      // //call the function (when passing pic as string)
      // smart_resize_image(null , file_get_contents($file), SET_YOUR_WIDTH , SET_YOUR_HIGHT , false , $resizedFile , false , false ,100 );
      
      // //done




  if(isset($_POST['addFoodBtn'])){
      $foodName = $_POST['foodName'];   
      $foodCatId = $_POST['foodCatId'];
	  $amount = $_POST['amount'];
      $note = $_POST['note'];
	
      $file_name =$_FILES['file']['name'];
      $tmp_name = $_FILES['file']['tmp_name'];
      $location = 'foodImage/';
	  	
	if (!empty($foodName) && !empty($foodCatId) && !empty($amount) && !empty($note) && !empty($file_name)){
		
		$allowed =  array('jpeg','jpg','gif','png','');
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed)) {
			
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">×</span>
				</button>
				<strong>Error!</strong> Image File extension not supported (use jpeg, jpg,  gif or  png ).
			  </div>';
            
			}else{
				$object = new insertC($DB_con);
				$object -> insertFood($foodCatId,$foodName,$amount, $note,$file_name,$tmp_name,$location);
			}
	}else{
		echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">×</span>
		</button>
		<strong>Error!</strong> All fields are required.
	  </div>';
		
			
	}
  }
?>

		  
            </div>
	  		<form action="addFood.php" method="POST" enctype="multipart/form-data">
                <fieldset class="form-group">
                  <label for="food">Name of Food,Snacks,Drinks etc...</label>
                  <input type="text" name="foodName" class="form-control" id="food" placeholder="Enter name of food">
                </fieldset>
				  
                <fieldset class="form-group">
                  <label for="exampleInputEmail1">Food Category</label>
                      <select class="form-control" name="foodCatId">
                    <option></option>
                    <?php
                    $object = new insertC($DB_con);
                    $object -> selectFoodCat();
                    ?>   
                    </select>
                </fieldset>
                
                 <fieldset class="form-group">
                  <label for="amount">Amount</label>
                  <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter food amount">
                </fieldset>
			
				<fieldset class="form-group">
                  <label for="exampleInputPassword1">Note/Description</label>
					<textarea name="note" class="form-control" id="exampleTextarea" rows="3"></textarea>	 
                 
                </fieldset>
				
				   <fieldset class="form-group">
					 <label for="exampleInputName2">Select Food Photo:</label>
					 <input type="file" name="file" class="form-controlg" id="files">
				   </fieldset>
				 
                
                <button type="submit" name="addFoodBtn" class="btn btn-primary">Submit</button>
              </form>
          </div>
        </div>
        
      </div>
    </div>
          
            <div class="col-sm-10 col-sm-push-1 col-md- col-md-push-3 col-lg-8 col-lg-push-1">
                 <div class="card-group">
                    <div class="card bg-transparent">
                      <div class="card-block">
                          <div class="center">
                            
                              <?php
                              if(isset($_GET['message'])){
                                echo $_GET['message'];
                              }
                            $object = new displayC($DB_con);
                            $object -> displayFood();
                              ?>
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

</body>


<!-- Mirrored from theme3.adminplus-premium.themekit.io/forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Mar 2017 03:18:46 GMT -->
</html>