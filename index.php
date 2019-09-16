<?php
include_once('classes/preview.Class.php');
include_once('includeFiles/header.php');

?>

    
<div class="container-fluid">
    <div class="row">
       
        <div class=" col-md-4"></div>
        <div class="order placeOrder col-md-4">
         <?php
             if(isset($_GET['s']) && $_GET['s']==1){
                 echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Done!</strong> Congratulation! Your account registration was successful. click on the "Add" button to start adding food to cart
				</div>';
            }

        ?>
        </div>
        
        <div class="col-md-4"></div>
    </div>

    <div class="row no-gutters">
        <?php
           
            if(isset($_GET['foodCatId'])){
                $foodCatId = $_GET['foodCatId'];
                $object =  new previewC($db);
                $object -> displayAllFoodById($foodCatId);
            }else{
                $object =  new previewC($db);
                $object -> displayAllFood();
            }
           
        ?>
    </div>
</div>
   
<script type="text/javascript" src="jq/jquery-3.2.1.js"></script>
<script type="text/javascript" src="js/poper.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<?php
include_once('includeFiles/footer.php');
?>
