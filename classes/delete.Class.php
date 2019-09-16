<?php

include_once 'holder.php';

class deleteC{
	private $db;
	
	function __construct($db)
	{
		$this -> db = $db;
	}


	
public function deleteFromCart($cartId,$orderCode){
		$query = $this->db->prepare("DELETE FROM order_tbl WHERE id = ? AND ordercode=? LIMIT 1");
		$query -> execute(array($cartId,$orderCode));
        
}	
	

public function getUserDataFromCookies(){
		$query = $this->db->prepare("SELECT * FROM users_tbl WHERE useridhash = ? LIMIT 1");
		$query -> execute(array($_COOKIE['fos']));
		$result = $query->fetch(PDO::FETCH_ASSOC);
		return $result;
}	




		
}

if (isset($_POST['cartId']) && !empty($_POST['cartId']) && isset($_SESSION['orderCode'])){
    $orderCode = $_SESSION['orderCode'];
    $cartId = $_POST['cartId'];
	$object = new deleteC($db);
	$object -> deleteFromCart($cartId,$orderCode);
}
?>