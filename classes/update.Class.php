<?php

include_once 'holder.php';

class updateC{
	private $db;
	
	function __construct($db)
	{
		$this -> db = $db;
	}



public function updateOrderStatus($orderCode){
		$query = $this->db->prepare("UPDATE order_tbl SET orderstatus=? WHERE ordercode = ?");
		$query->execute(array(1,$orderCode));
		if($query){
			echo '';
		}else{
			return false;
		}
}

		
}

if (isset($_POST['placeOrderBtn']) && isset($_SESSION['orderCode'])){
	$orderCode = $_SESSION['orderCode'];
	$object = new updateC($db);
	$object -> updateOrderStatus($orderCode);
}

?>