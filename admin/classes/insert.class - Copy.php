insertFood<?php

include_once 'dbconfig.php';

class insertC{
	private $db;
	
	function __construct($DB_con)
	{
		$this -> db = $DB_con;
	}

public function selectFoodCat(){
	$query = $this->db->prepare("SELECT * FROM food_category_tbl ORDER BY categoryname ASC");
    $query->execute();
    if($query->rowCount()>0){
        while($row=$query->fetch(PDO::FETCH_ASSOC)){ 
            $id = $row["id"];
            $categoryName = $row["categoryname"];
            echo '<option value='.$id.'>'.$categoryName.'</option>';
             }
	  }else{
		echo '<option></option>';
	}			
} 

// add food category
public function addFoodCategory($foodCatName){
		$query = $this->db->prepare("SELECT categoryname FROM  food_category_tbl WHERE categoryname = ?");
		$query -> execute(array($foodCatName));
		if ($query->rowCount()>0){
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">×</span>
					</button>
					<strong>Error!</strong> Food category with name "'.$foodCatName.'" already exist.
				  </div>';
		}else{
					$query = $this->db->prepare("INSERT INTO food_category_tbl (id,categoryname) VALUES (?,?)");
			 		$query->execute(array('',$foodCatName));

				if ($query){
							echo '<div class="alert alert-success" role="alert">
									<strong>Done!</strong> Food category "'.$foodCatName.'" successfully added.
								  </div>';
							}else{
							   echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to add food category at this time, Please try again later.
							  </div>';
					}
		}
	}
	
	
	// add food
public function insertFood($foodCatId,$foodName,$amount, $note,$file_name,$tmp_name,$location){
		$query = $this->db->prepare("SELECT foodname FROM food_list_tbl WHERE foodname=?");
		$query -> execute(array($foodName));
		if ($query->rowCount()>0){
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">×</span>
					</button>
					<strong>Error!</strong> Food name '.$foodName.' already exist.
				  </div>';
		}else{
				
			if (file_exists($location.$file_name)){
				
				 echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Food photo already exist, please rename the food photo and try again.
							  </div>';

			}else{
				
				if(move_uploaded_file($tmp_name, $location.$file_name)){
					$message_full_path = $file_name;
					$query = $this->db->prepare("INSERT INTO food_list_tbl (id,categoryid,foodname,amount,note,foodimage,foodstatus) VALUES (?,?,?,?,?,?,?)");
			 		$query->execute(array('',$foodCatId,$foodName,$amount, $note,$message_full_path,1));

				if ($query){
							
							echo '<div class="alert alert-success" role="alert">
									<strong>Done!</strong> Food successfully added.
								  </div>';
							}else{
					
							   echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to add food at this time, Please try again.
							  </div>';
					
						
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to upload food image at this time, Please try again.
							  </div>';
				}
				
					
			}
	
		}
	}
	
	

public function serviceCharge($serviceCharged,$serviceChargedNote){
		$query = $this->db->prepare("UPDATE service_fee_tbl SET servicefee=?,servicefeenote=? WHERE id = ?");
		$query->execute(array($serviceCharged,$serviceChargedNote,1));
		if($query){
			echo '<div class="alert alert-success" role="alert">
                    <strong>Done!</strong> Service charge successfully updated.
                  </div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> Unable to update service charge amount at this time, Please try again.
                  </div>';
		}
}

    
public function updateOrderStatusViaOrderCode($orderCode){
		$query = $this->db->prepare("UPDATE order_tbl SET orderstatus=? WHERE orderstatus = ? AND ordercode=?");
		$query->execute(array(2,1,$orderCode));
		if($query){
			echo '<div class="alert alert-success" role="alert">
                    <strong>Done!</strong> order status successfully updated to delivered.
                  </div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> Unable to update order status at this time, Please try again.
                  </div>';
		}
}
		
}
?>