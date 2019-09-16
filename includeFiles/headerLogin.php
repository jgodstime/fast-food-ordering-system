<?php
include_once('classes/holder.php');
include_once('classes/preview.Class.php');
include_once('includeFiles/forms.php');
?>
<!DOCTYPE html>
<html lang="en">
    
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <title>Fast System</title>    
</head> 
<body class="bg-light">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-info">
        <a class="navbar-brand" href="#">Food-Affairs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"  data-toggle="modal" data-target="#aboutUs" data-whatever="@mdo"><i class="fa fa-info"></i> About Us</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"  data-toggle="modal" data-target="#contactUs" data-whatever="@mdo"><i class="fa fa-phone"></i> Contact Us</a>
                </li>
              

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link"  data-toggle="modal" data-target="#cart" data-whatever="@mdo"><i style="font-size:25px;" class="fa fa-shopping-cart"></i> <span class="badge badge-danger itemInCat"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Food Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                       <?php
                        $object = new previewC($db);
                        $object -> displayAllCat();
                        ?>
                         <a class="dropdown-item" href="index.php">All</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php"><i class="fa fa-arrow-circle-left"></i> Logout</a>
                </li>
               
            </ul>
        </div>
    </nav>
<div class="jumbotron jumbotron-fluid text-center" style="background: url(images/bgimage.jpg) no-repeat; color: white;">
  <div class="container">
    <h1 class=" bg-dark" style="opacity:0.4;color:white;padding-bottom:30px; font-size:80px;">Fast-Food Ordering System</h1>
    <p class="lead bg-dark" style="opacity:0.4;color:white;padding-bottom:30px;"><strong>At any time you can place order and be assured you'll have your favorite dish delivered.</strong></p>
  </div>
</div>
    
