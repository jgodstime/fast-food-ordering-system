<?php
if(isset($_COOKIE['fos']) && isset($_SESSION['orderCode'])){
    include_once('headerLogin.php');
     include_once('cartForm.php');
}else{
     include_once('headerNoLogin.php');
     include_once('forms.php');
}
?>