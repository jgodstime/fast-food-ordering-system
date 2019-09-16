<?php
include_once('classes/delete.class.php');

if(isset($_GET['catId']) && isset($_GET['categoryname'])){
    $catId = $_GET['catId'];
    $categoryName = $_GET['categoryname'];
    $object = new deleteC($DB_con);
    $object-> deleteFoodCategory($catId,$categoryName);
}elseif(isset($_GET['foodId']) && isset($_GET['image'])){
     $foodId = $_GET['foodId'];
    $image= $_GET['image'];
    $object = new deleteC($DB_con);
    $object-> deleteFood($foodId,$image);
}
?>