<?php

include_once 'holder.php';

class addFoodC{
	private $db;
	
	function __construct($db)
	{
		$this -> db = $db;
	}


	
public function getFoodData($foodId){
		$query = $this->db->prepare("SELECT * FROM food_list_tbl WHERE id = ? LIMIT 1");
		$query -> execute(array($foodId));
		$result = $query->fetch(PDO::FETCH_ASSOC);
		return $result;
}	
	

public function getUserDataFromCookies(){
		$query = $this->db->prepare("SELECT * FROM users_tbl WHERE useridhash = ? LIMIT 1");
		$query -> execute(array($_COOKIE['fos']));
		$result = $query->fetch(PDO::FETCH_ASSOC);
		return $result;
}	

public function addFoodProcessor($foodId){
	$userId = $this->getUserDataFromCookies()['id'];
	$foodCatId = $this->getFoodData($foodId)['categoryid'];
	$oderCode = $_SESSION['orderCode'];
	$foodAmount = $this->getFoodData($foodId)['amount'];
	if($this->addFood($userId,$foodId,$foodCatId,$oderCode,$foodAmount)==true){
			echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Done!</strong> Food Added to Food Cart
				</div>';
	}else{
			echo 'errro';
	}
}

public function addFood($userId,$foodId,$foodCatId,$oderCode,$foodAmount){
		$query = $this->db->prepare("INSERT INTO order_tbl (id,userid,foodid,foodcatid,ordercode,amount,orderdate,orderstatus)
		 VALUES (?,?,?,?,?,?,now(),?)");
		$query->execute(array('',$userId,$foodId,$foodCatId,$oderCode,$foodAmount,'0'));
		if($query){
			return true;
		}else{
			return false;
		}
}

		
}

if (isset($_POST['foodId']) && !empty($_POST['foodId'])){
	$foodId = $_POST['foodId'];
	$object = new addFoodC($db);
	$object -> addFoodProcessor($foodId);
}
?>