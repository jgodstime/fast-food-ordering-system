<?php

include_once 'dbconfig.php';

class select_class{
	private $db;
	
	function __construct($DB_con)
	{
		$this -> db = $DB_con;
	}


// FREE MESSAGE 
public function freeMessage($messageTitle,$date,$file_name,$tmp_name,$location){
		$query = $this->db->prepare("SELECT message_title FROM free_message_tbl WHERE message_title=?");
		$query -> execute(array($messageTitle));
		if ($query->rowCount()>0){
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">×</span>
					</button>
					<strong>Error!</strong> A message with title '.$messageTitle.' already exist, refraim the title or add a date to the title earlier entered.
				  </div>';
		}else{
			
				
			if (file_exists($location.$file_name)){
				
				 echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Passport name already exist, please rename the Passport, and try again.
							  </div>';

			}else{
				
				if(move_uploaded_file($tmp_name, $location.$file_name)){
					$message_full_path = $file_name;
					$query = $this->db->prepare("INSERT INTO free_message_tbl (id,message_title,message_date,message_file_path,upload_date) VALUES (?,?,?,?,Now())");
			 		$query->execute(array('',$messageTitle,$date,$message_full_path));

				if ($query){
							
							echo '<div class="alert alert-success" role="alert">
									<strong>Done!</strong> Free Message successfully added.
								  </div>';
							}else{
					
							   echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to upload message at this time, Please try again.
							  </div>';
					
						
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to upload audio file at this time, Please try again.
							  </div>';
					 var_dump($_FILES['file']['error']);
				}	
			}
	
		}
	}
	
	
	
	
// PAID MESSAGE FUNCTION
public function paidMessage($messageCode,$messageTitle,$date,$file_name,$tmp_name,$location){
		$query = $this->db->prepare("SELECT message_title FROM paid_message_tbl WHERE message_title=?");
		$query -> execute(array($messageTitle));
	
	
		$query2 = $this->db->prepare("SELECT message_code FROM paid_message_tbl WHERE message_code=?");
		$query2 -> execute(array($messageCode));
	
		if ($query->rowCount()>0){
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">×</span>
					</button>
					<strong>Error!</strong> A message with title '.$messageTitle.' already exist, refraim the title or add a date to the title earlier entered.
				  </div>';
		}else if($query2->rowCount()>0){ 
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">×</span>
					</button>
					<strong>Error!</strong> Message code conflict try again.
				  </div>';
		}else{
			
				
			if (file_exists($location.$file_name)){
				
				 echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Passport name already exist, please rename the Passport, and try again.
							  </div>';

			}else{
				
				if(move_uploaded_file($tmp_name, $location.$file_name)){
					$message_full_path = $file_name;
					$query = $this->db->prepare("INSERT INTO paid_message_tbl (id,message_code,message_title,message_date,message_file_path,upload_date) VALUES (?,?,?,?,?,Now())");
			 		$query->execute(array('',$messageCode,$messageTitle,$date,$message_full_path));

				if ($query){
							
							echo '<div class="alert alert-success" role="alert">
									<strong>Done!</strong> Paid Message successfully added with code '.$messageCode.'.
								  </div>';
							}else{
					
							   echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to upload message at this time, Please try again.
							  </div>';
					
						
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to upload audio file at this time, Please try again.
							  </div>';
					 			var_dump($_FILES['file']['error']);
				}	
			}
	
		}
	}


	
// EVENT FUNCTION
public function event($eventCaption,$eventDate,$file_name,$noImage,$tmp_name,$location){
		
		if (!empty($noImage)){ //if it is checheked (use default image )
			
			
			$query = $this->db->prepare("INSERT INTO event_tbl (id,event_caption,event_date,event_img_path,upload_date) VALUES (?,?,?,?,Now())");
			 		$query->execute(array('',$eventCaption,$eventDate,'event/twp.png'));

				if ($query){
							
							echo '<div class="alert alert-success" role="alert">
									<strong>Done!</strong> Event successfully added.
								  </div>';
							}else{
					
							   echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to add event, Please try again.
							  </div>';	
							}
			}else{
				
				if(!empty($file_name)){
					
						if (file_exists($location.$file_name)){
				
				 echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">×</span>
						</button>
						<strong>Error!</strong> Image name already exist, please rename the image, and try again.
					  </div>';

				}else{
				
					if(move_uploaded_file($tmp_name, $location.$file_name)){
						$event_img_path = $location.$file_name;
						$query = $this->db->prepare("INSERT INTO event_tbl (id,event_caption,event_date,event_img_path,upload_date) VALUES (?,?,?,?,Now())");
						$query->execute(array('',$eventCaption,$eventDate,$event_img_path));

				if ($query){
							
							echo '<div class="alert alert-success" role="alert">
								  <strong>Done!</strong> Event successfully added.
								  </div>';
							}else{
					
							   echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to upload event at this time, Please try again.
							  </div>';
					
						
					}
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to upload image file at this time, Please try again.
							  </div>';
					 		//var_dump($_FILES['file']['error']);
				}	
			}
				}else{
					 echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">×</span>
						</button>
						<strong>Error!</strong> Please select an image for this event.
					  </div>';
				}
			
			
	
		}//ends here
	}
	
		
	
	

	
// Staff data upload
public function staffDataUpload($staffName,$position,$positionDescription,$file_name,$tmp_name,$location){
		$query = $this->db->prepare("SELECT staff_position FROM staff_tbl WHERE staff_position=?");
		$query -> execute(array($position));
		if ($query->rowCount()>0){
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">×</span>
					</button>
					<strong>Error!</strong> Staff Position already exist.
				  </div>';
		}else{
			
				
			if (file_exists($location.$file_name)){
				
				 echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">×</span>
						</button>
						<strong>Error!</strong> Immage name already exist, please rename the image, and try again.
					  </div>';

			}else{
				
				if(move_uploaded_file($tmp_name, $location.$file_name)){
					$img_file_path = $location.$file_name;
					$query = $this->db->prepare("INSERT INTO staff_tbl (id,staff_name,staff_position,position_desc,img_file_path,upload_date) VALUES (?,?,?,?,?,Now())");
			 		$query->execute(array('',$staffName,$position,$positionDescription,$img_file_path));

				if ($query){
							
							echo '<div class="alert alert-success" role="alert">
									<strong>Done!</strong> Staff information successfully added.
								  </div>';
							}else{
					
							   echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to upload staff information at this time, Please try again.
							  </div>';
							}
					}else{
						echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
								<strong>Error!</strong> Unable to upload image file at this time, Please try again.
							  </div>';
					 			var_dump($_FILES['file']['error']);
				}	
			}
	
		}
	}
	

	

//Jquery Bootgrid function to view payment dues
	public function paymentDues(){
    $query = $this->db->prepare("SELECT * FROM payment_tbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="table-responsive">  
                     <table id="employee_data" class="table table-bordered table-hover">  
                          <thead class="card-header">  
                               <tr>  
                                   <th data-column-id="id" data-type="numeric">Id</th>  
                                   <th data-column-id="member_id">Member id</th>  
                                   <th data-column-id="member_name">Member Name</th>  
                                   <th data-column-id="gender">Gender</th> 
								   <th data-column-id="marital_status">Marital Status</th> 
								   <th data-column-id="occupation">Occupation</th> 
								   <th data-column-id="phone">Phone</th> 
								   <th data-column-id="amount">Amount</th> 
								   <th data-column-id="month_paid">Month Paid</th> 
								   <th data-column-id="Entry_date">Entry Date</th> 
                               </tr>  
                          </thead>  
                          <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
		?>

				<tr>
					<td><?php echo $row["id"];?></td>
					<td><?php echo $row["member_id"];?></td>
					<td><?php echo $row["member_name"];?></td>
					<td><?php echo $row["gender"];?></td>
					<td><?php echo $row["marital_status"];?></td>
					<td><?php echo $row["occupation"];?></td>
					<td><?php echo $row["phone"];?></td>
					<td><?php echo $row["amount"];?></td>
					<td><?php echo $row["month_paid"];?></td>
					<td><?php echo $row["Entry_date"];?></td>
				</tr>

 
		<?php
		 }    
		?>
		     </tbody>  
          </table>  
     </div>
		<?php

    }else {
        echo 'No Payment yet';
    }
}


		
}
?>