<?php

include_once 'dbconfig.php';

class displayC{
	private $db;
	
	function __construct($DB_con)
	{
		$this -> db = $DB_con;
	}




//display all food  category
	public function displayFoodCat(){
    $query = $this->db->prepare("SELECT * FROM  food_category_tbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">List of categories </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							
							  <th>Category Name</th>
							  <th>Delete</th>
						  </thead>
        <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  

		?>	  
			<tr>
		
				<td><?php echo $row["categoryname"];?></td>

			  <td><a href="deleteData.php?catId=<?php echo $row["id"].'&categoryname='.$row["categoryname"]?>" class="btn btn-danger btn-xs">Delete</a></td>
      </tr>			  
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else{
        echo '<h3>No Category found</h3>';
    }
}
    
    
//display all food  
	public function displayFood(){
    $query = $this->db->prepare("SELECT * FROM  food_list_tbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">List of Food,snackes,Drinks etc. </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							
							  <th>Category Name</th>
							  <th>Food Name</th>
							  <th>Amount</th>
							  <th>Note</th>
							  <th>Image</th>
							  <th>Delete</th>
                                
						  </thead>
        <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
                $foodId = $row['id'];            
                $foodCatId = $row['categoryid'];            
                $foodName = $row['foodname'];            
                $amount = $row['amount'];            
                $note = $row['note'];            
                $foodImage= $row['foodimage'];            
                
                $foodCatName = $this ->getFoodCategory($foodCatId)['categoryname'];

                
		?>	  
			<tr>
		
				<td><?php echo $foodCatName; ?></td>
				<td><?php echo $foodName;?></td>
				<td><?php echo $amount; ?></td>
				<td><?php echo $note;?></td>
				<td><?php echo '<img src="foodImage/'.$foodImage.'" height="50px" width="50px">';?></td>
                <td><?php echo '<a href="deleteData.php?foodId='.$foodId.'&image='.$foodImage.'">Delete</a>';?></td>
                
      </tr>			  
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else{
        echo '<h3>Not found</h3>';
    }
}

    
public function getFoodData($foodId){
	$query = $this->db->prepare("SELECT * FROM food_list_tbl WHERE id = ? LIMIT 1");
	$query -> execute(array($foodId));
	$result = $query->fetch(PDO::FETCH_ASSOC);
	return $result;
}
    
public function getUserData($userId){
	$query = $this->db->prepare("SELECT * FROM users_tbl WHERE id = ? LIMIT 1");
	$query -> execute(array($userId));
	$result = $query->fetch(PDO::FETCH_ASSOC);
	return $result;
}
    
public function getFoodCategory($foodCatId){
	$query = $this->db->prepare("SELECT * FROM food_category_tbl WHERE id = ? LIMIT 1");
	$query -> execute(array($foodCatId));
	$result = $query->fetch(PDO::FETCH_ASSOC);
	return $result;
}
    
    
    
//display service fee
	public function displayServiceCharge(){
    $query = $this->db->prepare("SELECT * FROM service_fee_tbl");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">Service fee </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							
							  <th>Service Fee</th>
							  <th>Service Fee Note</th>
						  </thead>
        <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
               
		?>	  
			<tr>
		
				<td><?php echo $row["servicefee"];?></td>
                <td><?php echo $row["servicefeenote"];?></td>

      </tr>			  
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else{
        echo '<h4>No service fee found</h4>';
    }
}


    //display order tbl
	public function displayAllOrder(){
    $query = $this->db->prepare("SELECT * FROM order_tbl");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header"><h4>Order Records</h4> </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							
							  <th>User Name</th>
                                  <th>Phone Number</th>
                                  <th>Email</th>
							  <th>User Address</th>
							  <th>Food Name</th>
							  <th>Food Category</th>
							  <th>Amount</th>
							  <th>Order Code</th>
							  <th>Order Date</th>
							  <th>Order Status</th>
						  </thead>
        <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
                 $userId = $row['userid'];
                $foodId = $row['foodid'];
                $foodCatId = $row['foodcatid'];
                $orderCode = $row['ordercode'];
                $amount= $row['amount'];
                $orderDate= $row['orderdate'];
                $orderStatus= $row['orderstatus'];
                
            $fullName = $this ->getUserData($userId)['fullname'];
            $phone = $this ->getUserData($userId)['phone'];
            $email = $this ->getUserData($userId)['email'];
            $address = $this ->getUserData($userId)['address'];
            $phone= $this ->getUserData($userId)['phone'];
                
            $foodName = $this ->getFoodData($foodId)['foodname'];
            $foodCatName = $this ->getFoodCategory($foodCatId)['categoryname'];
		?>	  
			<tr>
		
				<td><?php echo $fullName;?></td>
				<td><?php echo $phone;?></td>
				<td><?php echo $email;?></td>
				<td><?php echo $address;?></td>
				<td><?php echo $foodName;?></td>
				<td><?php echo $foodCatName;?></td>
				<td><?php echo $amount;?></td>
				<td><?php echo $orderCode;?></td>
				<td><?php echo $orderDate;?></td>
				<td><?php 
                        if($orderStatus==0){
                            echo 'Not Ordered';
                        }else if($orderStatus==1){
                            echo 'Ordered';
                        }else if($orderStatus==2){
                            echo 'Delivered';
                        }
                    ?></td>

      </tr>			  
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else{
        echo '<h4>No record found</h4>';
    }
}

    
    
    
    
    
//display order tbl by sorting
	public function displayOrderBySorting($sortValue){
       
              $query = $this->db->prepare("SELECT * FROM order_tbl WHERE orderstatus=?");
    $query->execute(array($sortValue));
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header"><h4>Records</h4> </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							
							  <th>User Name</th>
                              <th>Phone Number</th>
                              <th>Email</th>
							  <th>User Address</th>
							  <th>Food Name</th>
							  <th>Food Category</th>
							  <th>Amount</th>
							  <th>Order Code</th>
							  <th>Order Date</th>
							  <th>Order Status</th>
						  </thead>
        <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
                 $userId = $row['userid'];
                $foodId = $row['foodid'];
                $foodCatId = $row['foodcatid'];
                $orderCode = $row['ordercode'];
                $amount= $row['amount'];
                $orderDate= $row['orderdate'];
                $orderStatus= $row['orderstatus'];
                
            $fullName = $this ->getUserData($userId)['fullname'];
            $phone = $this ->getUserData($userId)['phone'];
            $email = $this ->getUserData($userId)['email'];
            $address = $this ->getUserData($userId)['address'];
            $phone= $this ->getUserData($userId)['phone'];
                
            $foodName = $this ->getFoodData($foodId)['foodname'];
            $foodCatName = $this ->getFoodCategory($foodCatId)['categoryname'];
		?>	  
			<tr>
		
				<td><?php echo $fullName;?></td>
				<td><?php echo $phone;?></td>
				<td><?php echo $email;?></td>
				<td><?php echo $address;?></td>
				<td><?php echo $foodName;?></td>
				<td><?php echo $foodCatName;?></td>
				<td><?php echo $amount;?></td>
				<td><?php echo $orderCode;?></td>
				<td><?php echo $orderDate;?></td>
				<td><?php 
                        if($orderStatus==0){
                            echo 'Not Ordered';
                        }else if($orderStatus==1){
                            echo 'Ordered';
                        }else if($orderStatus==2){
                            echo 'Delivered';
                        }
                    ?></td>

      </tr>			  
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else{
        echo '<h4>No record found</h4>';
    }

        }
  
    

    
//display users
	public function displayAllUser(){
    $query = $this->db->prepare("SELECT * FROM users_tbl");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header"><h4>Users Record</h4> </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							
							  <th>User Name</th>
                              <th>Email</th>
                                  <th>Phone Number</th>
                                  <th>Address</th>
                                  <th>Registration Date/Time</th>
							
						  </thead>
        <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
                $fullName= $row['fullname'];
                $email = $row['email'];
                $phone = $row['phone'];
                $address= $row['address'];
                $regDate= $row['regdate'];
           
		?>	  
			<tr>
		
				<td><?php echo $fullName;?></td>
				<td><?php echo $email;?></td>
                <td><?php echo $phone;?></td>
                <td><?php echo $address;?></td>
				<td><?php echo $regDate;?></td>
			

      </tr>			  
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else{
        echo '<h4>No record found</h4>';
    }
}

    
	
}	


if (isset($_POST['sortValue'])){
    $sortValue = $_POST['sortValue'];
    
    if($sortValue==""){
        
        $object = new displayC($DB_con);
        $object -> displayAllOrder();
    }else{
        $object = new displayC($DB_con);
        $object -> displayOrderBySorting($sortValue);
    }
}
?>