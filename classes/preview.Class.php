<?php

include_once 'holder.php';

class previewC{
	private $db;
	
	function __construct($db)
	{
		$this -> db = $db;
	}


public function displayAllFood(){
?>
<?php		 
		$query = $this->db->prepare("SELECT * FROM food_list_tbl");
		$query->execute();
		if($query->rowCount()>0){ 
			 while($row=$query->fetch(PDO::FETCH_ASSOC)){  
				$id = $row['id'];
				$catId= $row['categoryid'];
				$foodName =$row['foodname'];
				$amount =$row['amount'];
				$note =$row['note'];
				$foodImage =$row['foodimage'];
				$foodStatus =$row['foodstatus'];
				$note =$row['note'];
				$noteTrim = trimTitle($note);
				
				?>
                    
                       <div class="col-md-3  text-center">
                           <div style="margin:5px; padding:5px; background-color:white;" class="rounded border border-info ">
						<img src="admin/foodImage/<?php echo $foodImage; ?>" class="img-fluid rounded-circle border border-primary">
							<hr style="margin-top:7px;margin-bottom:6px;" >
							<div class="row">
							    <span class="btn">
								    <?php echo $foodName;?> <span class="badge badge-info ">&#8358; <?php echo $amount;?></span>
								</span>
								<div class="col text-right">
								<?php 
								if(isset($_SESSION['orderCode'])){
									echo '<a href="#" onclick="javascript:submitForm(this);return false;" data-info="'.$id.'" type="button" class="btn btn-outline-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-shopping-cart"></i> Add</a>';
								}else{
									echo '<a href="#" type="button" class="btn btn-outline-info btn-sm" role="button" aria-pressed="true" data-toggle="modal" data-target="#signin" data-whatever="@mdo"><i class="fa fa-shopping-cart"></i> Add</a>';
								}
								   
								?>
								
								</div>
							</div>
                               <div class="">
                                <hr style="margin-top:7px;margin-bottom:6px;" >
                                <small class="">
<?php
								echo $noteTrim;
                               echo ' <a href="#" type="button" class=" btn-outline-info" role="button" aria-pressed="true" data-toggle="modal" data-target="#foodDetail" data-whatever="@mdo"  onclick="javascript:foodDetails(this);return false;" data-info="'.$id.'"><i class="fa fa-comment"></i> Details</a>';
                                
?>
                                </small>
								
                               </div>
						</div>
                </div>

<?php
					}	
		
					 
					 ?>
        
<?php
		}else{
			
		}
	}
	
public function displayAllFoodById($foodCatId){
?>
<?php		 
		$query = $this->db->prepare("SELECT * FROM food_list_tbl WHERE categoryid=?");
		$query->execute(array($foodCatId));
		if($query->rowCount()>0){ 
			 while($row=$query->fetch(PDO::FETCH_ASSOC)){  
				$id = $row['id'];
				$catId= $row['categoryid'];
				$foodName =$row['foodname'];
				$amount =$row['amount'];
				$note =$row['note'];
				$foodImage =$row['foodimage'];
				$foodStatus =$row['foodstatus'];
				$note =$row['note'];
				$noteTrim = trimTitle($note);
				
                ?>
                 
                      <div class="col-md-3  text-center">
                           <div style="margin:5px; padding:5px; background-color:white;" class="rounded border border-info ">
						<img src="admin/foodImage/<?php echo $foodImage; ?>" class="img-fluid rounded-circle border border-primary">
							<hr style="margin-top:7px;margin-bottom:6px;" >
							<div class="row">
							<span class="btn">
								<?php echo $foodName;?> <span class="badge badge-info ">&#8358; <?php echo $amount;?></span>
								</span>
								<div class="col text-right">
								<?php 
								if(isset($_SESSION['orderCode'])){
									echo '<a href="#" onclick="javascript:submitForm(this);return false;" data-info="'.$id.'" type="button" class="btn btn-outline-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-shopping-cart"></i> Add</a>';
								}else{
									echo '<a href="#" type="button" class="btn btn-outline-info btn-sm" role="button" aria-pressed="true"  data-toggle="modal" data-target="#signin" data-whatever="@mdo"><i class="fa fa-shopping-cart"></i> Add</a>
';
								}
								
								?>
								
								</div>
							</div>
                                <div class="">
                                <hr style="margin-top:7px;margin-bottom:6px;" >
                                <small class="">
<?php
								echo $noteTrim;
                               echo ' <a href="#" type="button" class=" btn-outline-info" role="button" aria-pressed="true" data-toggle="modal" data-target="#foodDetail" data-whatever="@mdo"  onclick="javascript:foodDetails(this);return false;" data-info="'.$id.'"><i class="fa fa-comment"></i> Details</a>';
                                
?>
                                </small>
								
                               </div>
						</div>
                </div>
                <?php

					}	
		
					 
					 ?>
        
<?php
		}else{
			echo '<h4>Food not found in this category</h4>';
		}
	}

public function displayAllCat(){
?>
<?php		 
		$query = $this->db->prepare("SELECT * FROM food_category_tbl");
		$query->execute();
		if($query->rowCount()>0){ 
			 while($row=$query->fetch(PDO::FETCH_ASSOC)){  
				$id = $row['id'];
				$foodName = $row['categoryname'];
				    echo ' <a class="dropdown-item" href="index.php?foodCatId='.$id.'">'.$foodName.'</a>';          
					}	
		
					 
					 ?>
        
<?php
		}else{
			echo 'No cat found';
		}
	}



    
    
//    display food full details on modal
public function displayFoodInDetails($foodIdDetailsById){
?>
<?php		 
		$query = $this->db->prepare("SELECT * FROM food_list_tbl WHERE id=?");
		$query->execute(array($foodIdDetailsById));
		if($query->rowCount()>0){ 
			 while($row=$query->fetch(PDO::FETCH_ASSOC)){  
				$id = $row['id'];
				$catId= $row['categoryid'];
				$foodName =$row['foodname'];
				$amount =$row['amount'];
				$note =$row['note'];
				$foodImage =$row['foodimage'];
				$foodStatus =$row['foodstatus'];
				
				
                ?>
                 
                <div style="margin:5px; padding:5px; background-color:white;" class="rounded border border-info ">
                      <div class="text-center">
                        
						<img  src="admin/foodImage/<?php echo $foodImage; ?>" class="img-fluid  rounded-circle border border-primary">
							
                          <hr style="margin-top:7px;margin-bottom:6px;" >
							<div class="row">
							<span class="btn">
								<?php echo $foodName;?> <span class="badge badge-info ">&#8358; <?php echo $amount;?></span>
				            </span>
							
							</div>
                          <p class="text-justify"><?php echo $note;?> </p>
						</div>
                </div>
                <?php

					}	
		
					 
					 ?>
        
<?php
		}else{
			echo '<h4>Null</h4>';
		}
	}
    
    

public function getFoodData($foodId){
	$query = $this->db->prepare("SELECT * FROM food_list_tbl WHERE id = ? LIMIT 1");
	$query -> execute(array($foodId));
	$result = $query->fetch(PDO::FETCH_ASSOC);
	return $result;
}

    
    
public function getServiceFeeData(){
	$query = $this->db->prepare("SELECT * FROM service_fee_tbl LIMIT 1");
	$query -> execute();
	$result = $query->fetch(PDO::FETCH_ASSOC);
	return $result;
}

public function sumCartOrderWhenOne($orderCode){
	 $querySum = $this->db->prepare("SELECT SUM(amount) AS amount_sum FROM  order_tbl WHERE ordercode=? AND orderstatus=?");
	 $querySum -> execute(array($orderCode,1));
	 $row=$querySum->fetch(PDO::FETCH_ASSOC);
	return $inCartSum = $row['amount_sum'];
}
 
    
public function sumCartOrderWhenZero($orderCode){
	 $querySum = $this->db->prepare("SELECT SUM(amount) AS amount_sum FROM  order_tbl WHERE ordercode=? AND orderstatus=?");
	 $querySum -> execute(array($orderCode,0));
	 $row=$querySum->fetch(PDO::FETCH_ASSOC);
	return $inCartSum = $row['amount_sum'];
}
    
    
//display whats in cart as far as the orderstatus is = 0... 
	public function displayWhatsInCartWhenZero($orderCode){
    $query = $this->db->prepare("SELECT * FROM  order_tbl WHERE ordercode=? AND orderstatus=? ORDER BY id ASC");
    $query->execute(array($orderCode,0));
    if($query->rowCount()>0){
		?>
        <div class="text-center">
             <h4>Not Ordered</h4>
        <small>Click "Place Order Now" to order or add to your current order.</small>
        </div>
       
        <table class="table table-sm table-bordered table-hover"> 
		<thead>
		<tr>
			<th>Category Name</th>
			<th>Amount</th>
			<th>Delete</th>
		</thead>
        <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
				$id = $row['id'];
				$userId = $row['userid'];
				$foodId = $row['foodid'];
				$foodCatId = $row['foodcatid'];
				$orderCode = $row['ordercode'];
				$amount = $row['amount'];
				$orderDate = $row['orderdate'];
				$orderStatus = $row['orderstatus'];

				$foodName = $this ->getFoodData($foodId)['foodname'];
				$inCartSum = $this -> sumCartOrderWhenZero($orderCode);
				$serviceFee = $this -> getServiceFeeData()['servicefee'];
		?>	  
			<tr>
				<td><?php echo $foodName ;?></td>
				<td><?php echo $amount ;?></td>

			  <td class="text-center"> 
			  	<a href="#" onclick="javascript:deleteFromCart(this);return false;" data-remove-cart="<?php echo $id;?>" type="button" class="btn btn-outline-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-remove"></i>
				</a>
			  </td>
     	 </tr>
		 
	  
	 	  
		<?php
		 }   
		  
		?>
		
		 <tr class="bg-light">
			<td>  Sub Total</td>
			<td colspan="2">&#8358;<?php echo $inCartSum ;?></td>
		  </tr>
		   <tr class="bg-light">
			<td>Service Charge</td>
			<td colspan="2">&#8358;<?php echo $serviceFee ;?></td>
		  </tr>
		   <tr class="bg-light">
			<td >Total Amout Payable</td>
			<td colspan="2">&#8358;<?php echo $inCartSum + $serviceFee ;?></td>
		
		  </tr>	
		  
		     </tbody>  
          </table>
  
		<?php

    }else{
        return false;
    }
}

    
    
// when the user has already ordered its one 
	public function displayWhatsInCartWhenOne($orderCode){
    $query = $this->db->prepare("SELECT * FROM  order_tbl WHERE ordercode=? AND orderstatus=? ORDER BY id ASC");
    $query->execute(array($orderCode,1));
    if($query->rowCount()>0){
        
		?>
<div class="text-center">
<h4>Current Order</h4>
 <small>These are the items that will be delivered to you.</small>
</div>
        <table class="table table-sm table-bordered table-hover"> 
		<thead>
		<tr>
			<th>Category Name</th>
			<th>Amount</th>
			<th>Delete</th>
		</thead>
        <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
				$id = $row['id'];
				$userId = $row['userid'];
				$foodId = $row['foodid'];
				$foodCatId = $row['foodcatid'];
				$orderCode = $row['ordercode'];
				$amount = $row['amount'];
				$orderDate = $row['orderdate'];
				$orderStatus = $row['orderstatus'];

				$foodName = $this ->getFoodData($foodId)['foodname'];
				$inCartSum = $this -> sumCartOrderWhenOne($orderCode);
				$serviceFee = $this -> getServiceFeeData()['servicefee'];
		?>	  
			<tr>
				<td><?php echo $foodName ;?></td>
				<td><?php echo $amount ;?></td>

			  <td class="text-center"> 
			  	<a href="#" onclick="javascript:deleteFromCart(this);return false;" data-remove-cart="<?php echo $id;?>" type="button" class="btn btn-outline-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-remove"></i>
				</a>
			  </td>
     	 </tr>
		 
	  
	 	  
		<?php
		 }   
		  
		?>
		
		 <tr class="bg-light">
			<td>  Sub Total</td>
			<td colspan="2">&#8358;<?php echo $inCartSum ;?></td>
		  </tr>
		   <tr class="bg-light">
			<td>Service Charge</td>
			<td colspan="2">&#8358;<?php echo $serviceFee ;?></td>
		  </tr>
		   <tr class="bg-light">
			<td >Total Amout Payable</td>
			<td colspan="2">&#8358;<?php echo $inCartSum + $serviceFee ;?></td>
		
		  </tr>	
		  
		     </tbody>  
          </table>
  
		<?php

    }else{
        return false;
    }
}

//display order now button for current session
public function displayOrderButtonForClick($orderCode){
    $query = $this->db->prepare("SELECT * FROM  order_tbl WHERE ordercode=? ");
    $query->execute(array($orderCode));
    if($query->rowCount()>0){
        echo '<a href="" onclick="javascript:placeOrder();return false;" role="button" aria-pressed="true" class="btn btn-info">Place Order Now</a>';
    }else{
         echo '<a href="" onclick="javascript:nothigjustto();return false;" role="button" aria-pressed="true" class="btn btn-info">No food in cart</a>';
    }
}
    
public function displayWhatsInCart($orderCode){
   $this-> displayWhatsInCartWhenOne($orderCode);
   $this-> displayWhatsInCartWhenZero($orderCode);   
}
    
	
//display the number of food ordered in cart using the curent session order code that isset
public function orderPlaced($orderCode){
	$query = $this->db->prepare("SELECT * FROM order_tbl WHERE ordercode=?");
	$query->execute(array($orderCode));
	echo $query->rowCount();
}

	
	
}	



//method that gets 85 words from db body variable and still mantain the shoter strings
function trimTitle($value, $limit = 37, $end = '...'){
    $limit = $limit - mb_strlen($end); // Take into account $end string into the limit
    $valuelen = mb_strlen($value);
    return $limit < $valuelen ? mb_substr($value, 0, mb_strrpos($value, ' ', $limit - $valuelen)) . $end : $value;
}

if(isset($_POST['itemInCat']) && isset($_SESSION['orderCode'])){
   $orderCode = $_SESSION['orderCode'];
	 $object = new previewC($db);
	 $object -> orderPlaced($orderCode);

}

if(isset($_POST['cartTbl']) && isset($_SESSION['orderCode'])){
   	$orderCode = $_SESSION['orderCode'];
	$object = new previewC($db);
	$object -> displayWhatsInCart($orderCode);
}



if (isset($_POST['displayOrderButtonForClick']) && isset($_SESSION['orderCode'])){
    $orderCode = $_SESSION['orderCode'];
    $object = new previewC($db);
	$object -> displayOrderButtonForClick($orderCode);
}

if (isset($_POST['foodIdDetailsId'])){
    $foodIdDetailsById = $_POST['foodIdDetailsId'];
    $object = new previewC($db);
	$object -> displayFoodInDetails($foodIdDetailsById);
}

// check if its a mobile browser
function isMobile() {
   return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>