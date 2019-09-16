<?php

include_once 'dbconfig.php';

class deleteC{
	private $db;
	
	function __construct($DB_con)
	{
		$this -> db = $DB_con;
	}



	
	
//delete food cat
	public function deleteFoodCategory($catId,$categoryName){
    $query = $this->db->prepare("SELECT id FROM  food_category_tbl WHERE id=?");
    $query->execute(array($catId));
    if($query->rowCount()>0){
		$queryDelete = $this->db->prepare("DELETE FROM food_category_tbl WHERE id=?");
    	$queryDelete->execute(array($catId));	
		if($queryDelete){

			header('location:addFoodCat.php?message=Category deleted successfully');
			
		}else{
			header('location:addFoodCat.php?message=Unable to delete message at this time, please try again');
		}
    }else {
			header('location:addFoodCat.php?message=Sorry!  We detected something fishy. Try again later');
    }
}

    
public function deleteFood($foodId,$image){
    $query = $this->db->prepare("SELECT id FROM  food_list_tbl WHERE id=?");
    $query->execute(array($foodId));
    if($query->rowCount()>0){
		$queryDelete = $this->db->prepare("DELETE FROM food_list_tbl WHERE id=?");
    	$queryDelete->execute(array($foodId));	
		if($queryDelete){
             @unlink('foodImage/'.$image);
			header('location:addFood.php?message=Food deleted successfully');
			
		}else{
			header('location:addFood.php?message=Unable to delete food at this time, please try again');
		}
    }else {
			header('location:addFood.php?message=Sorry!  We detected something fishy. Try again later');
    }
}
	

	
	
			
}
?>