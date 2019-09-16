<?php

include_once 'dbconfig.php';

class select_class_view{
	private $db;
	
	function __construct($DB_con)
	{
		$this -> db = $DB_con;
	}




//FREE MESSAGE TABLE DISPLAY
	public function freeMessageTableDsplay(){
    $query = $this->db->prepare("SELECT * FROM  free_message_tbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">List of Uploaded Free Messages </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							  <th>#</th>
							  <th>Message Title</th>
							  <th>Message Date</th>
							  <th>Message File Name</th>
							  <th>Date Uploaded</th>
							  <th>Delete Message</th>
							</tr>
						  </thead>
                          <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
		?>	  
			<tr>
              <th><?php echo $row["id"];?></th>
              <td><?php echo $row["message_title"];?></td>
              <td><?php echo $row["message_date"];?></td>
			  <td><?php echo $row["message_file_path"];?></td>
			  <td><?php echo $row["upload_date"];?></td>
			  <td><a href="deleteData.php?freeMessageDeleteId=<?php echo $row["id"].'&messageFileName='.$row["message_file_path"]?>" class="btn btn-danger btn-xs">Delete</a></td>
            </tr>			  

 
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else {
        echo 'No free message added yet';
    }
}

	
	
	
	
//DELETE FREE MESSAGE 
	public function deleteFreeMessage($messageId,$messageFileName){
    $query = $this->db->prepare("SELECT id FROM  free_message_tbl WHERE id=? AND message_file_path=?");
    $query->execute(array($messageId,$messageFileName));
    if($query->rowCount()>0){
		$queryDelete = $this->db->prepare("DELETE FROM free_message_tbl WHERE id=?");
    	$queryDelete->execute(array($messageId));	
		if($queryDelete){
			 @unlink('upload/'.$messageFileName);
			header('location:freeMessageRecords.php?message=Message deleted successfully');
			
		}else{
			header('location:freeMessageRecords.php?message=Unable to delete message at this time, please try again');
			 
		}

    }else {
        echo 'No message found';
    }
}
	
	

	
	
	
//PAID MESSAGE TABLE DISPLAY
	public function paidMessageTableDsplay(){
    $query = $this->db->prepare("SELECT * FROM  paid_message_tbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">List of Uploaded Paid Messages </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							  <th>#</th>
							  <th>Message Code</th>
							  <th>Message Title</th>
							  <th>Message Date</th>
							  <th>Message File Name</th>
							  <th>Date Uploaded</th>
							  <th>Delete Message</th>
							</tr>
						  </thead>
                          <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
		?>	  
			<tr>
              <th><?php echo $row["id"];?></th>
			  <td><?php echo $row["message_code"];?></td>
              <td><?php echo $row["message_title"];?></td>
              <td><?php echo $row["message_date"];?></td>
			  <td><?php echo $row["message_file_path"];?></td>
			  <td><?php echo $row["upload_date"];?></td>
			  <td><a href="deleteData.php?paidMessageDeleteId=<?php echo $row["id"].'&messageFileName='.$row["message_file_path"]?>" class="btn btn-danger btn-xs">Delete</a></td>
            </tr>			  

 
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else {
        echo 'No free message added yet';
    }
}	
	
	
	
//DELETE PAID MESSAGE 
	public function deletePaidMessage($paidMessageId,$messageFileName){
    $query = $this->db->prepare("SELECT id FROM  paid_message_tbl WHERE id=? AND message_file_path=?");
    $query->execute(array($paidMessageId,$messageFileName));
    if($query->rowCount()>0){
		$queryDelete = $this->db->prepare("DELETE FROM paid_message_tbl WHERE id=?");
    	$queryDelete->execute(array($paidMessageId));	
		if($queryDelete){
			 @unlink('paidUpload/'.$messageFileName);
			header('location:paidMessageRecords.php?message=Message deleted successfully');
			
		}else{
			header('location:paidMessageRecords.php?message=Unable to delete message at this time, please try again');
			 
		}

    }else {
        echo 'No message found';
    }
}	
	

	

//EVENT TABLE DISPLAY
	public function eventTableDsplay(){
    $query = $this->db->prepare("SELECT * FROM  event_tbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">List of Uploaded Church Event </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							  <th>Event Caption</th>
							  <th>Event Date</th>
							  <th>Event Image</th>
							  <th>Upload Date</th>
							 <th>Delete Event</th>
							</tr>
						  </thead>
                          <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
		?>	  
			<tr>
              <th><?php echo $row["event_caption"];?></th>
			  <td><?php echo $row["event_date"];?></td>
              <td><?php echo '<img src="'. $row["event_img_path"].'" height="60" width="70">' ?> </td>
			  <td><?php echo $row["upload_date"];?></td>
			  <td><a href="deleteData.php?eventDeleteId=<?php echo $row["id"].'&eventFileName='.$row["event_img_path"]?>" class="btn btn-danger btn-xs">Delete</a></td>
            </tr>			  

 
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else {
        echo 'No event added yet';
    }
}	
		
	

	
//DELETE EVENT 
	public function deleteEvent($eventId,$eventFileName){
    $query = $this->db->prepare("SELECT id FROM  event_tbl WHERE id=? AND event_img_path=?");
    $query->execute(array($eventId,$eventFileName));
    if($query->rowCount()>0){
		
		if ($eventFileName=='event/twp.png'){
			
			$queryDelete = $this->db->prepare("DELETE FROM event_tbl WHERE id=?");
    	$queryDelete->execute(array($eventId));	
		if($queryDelete){
			 
			header('location:eventRecords.php?message=Event deleted successfully');
			
		}else{
			header('location:eventRecords.php?message=Unable to delete event at this time, please try again');
		
		}
			
		}else{
		$queryDelete = $this->db->prepare("DELETE FROM event_tbl WHERE id=?");
    	$queryDelete->execute(array($eventId));	
		if($queryDelete){
			 @unlink($eventFileName);
			header('location:eventRecords.php?message=Event deleted successfully');
			
		}else{
			header('location:eventRecords.php?message=Unable to delete event at this time, please try again');
		
		}
			 
		}

    }else {
        echo 'No event found';
    }
}	
	
	

	
	

//PICTURE TABLE DISPLAY
	public function pictureTableDsplay(){
    $query = $this->db->prepare("SELECT * FROM  picturetbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">List of Uploaded Church Photos </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							  <th>Photos</th>
							  <th>Upload Date</th>
							 <th>Delete Photo</th>
							</tr>
						  </thead>
                          <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
		?>	  
			<tr>
              <td><?php echo '<img src="'. $row["picture_path"].'" height="60" width="70">' ?> </td>
			  <td><?php echo $row["upload_date"];?></td>
			  <td><a href="deleteData.php?photoDeleteId=<?php echo $row["id"].'&photoFileName='.$row["picture_path"]?>" class="btn btn-danger btn-xs">Delete</a></td>
            </tr>			  

 
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else {
        echo 'No event added yet';
    }
}	
	
	
	
	
//DELETE PHOTO
	public function deletePhoto($photoId,$phototFileName){
    $query = $this->db->prepare("SELECT id FROM  picturetbl WHERE id=? AND picture_path=?");
    $query->execute(array($photoId,$phototFileName));
    if($query->rowCount()>0){
		$queryDelete = $this->db->prepare("DELETE FROM picturetbl WHERE id=?");
    	$queryDelete->execute(array($photoId));	
		if($queryDelete){
			 @unlink($phototFileName);
			header('location:pictureRecords.php?message=Photo deleted successfully');
			
		}else{
			header('location:pictureRecords.php?message=Unable to delete photo at this time, please try again');
			 
		}

    }else {
        echo 'No photo found';
    }
}		
	
	
	
	
//STAFF TABLE DISPLAY
	public function staffTableDsplay(){
    $query = $this->db->prepare("SELECT * FROM staff_tbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">List of Uploaded Church Staff </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							  <th>Staff Name</th>
							  <th>Staff Position</th>
							  <th>Position Description</th>
								<th>Staff Photo</th>
								<th>Upload Date</th>
							 <th>Delete Photo</th>
							</tr>
						  </thead>
                          <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
		?>	  
			<tr>
				<td><?php echo $row["staff_name"];?></td>
				<td><?php echo $row["staff_position"];?></td>
				<td><?php echo $row["position_desc"];?></td>
              <td><?php echo '<img src="'. $row["img_file_path"].'" height="60" width="70">' ?> </td>
			  <td><?php echo $row["upload_date"];?></td>
			  <td><a href="deleteData.php?staffDeleteId=<?php echo $row["id"].'&staffFileName='.$row["img_file_path"]?>" class="btn btn-danger btn-xs">Delete</a></td>
            </tr>			  

 
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else {
        echo 'No event added yet';
    }
}		
	
	
	
	
//DELETE STAFF
	public function deleteStaff($staffId,$staffFileName){
    $query = $this->db->prepare("SELECT id FROM  staff_tbl WHERE id=? AND img_file_path=?");
    $query->execute(array($staffId,$staffFileName));
    if($query->rowCount()>0){
		$queryDelete = $this->db->prepare("DELETE FROM staff_tbl WHERE id=?");
    	$queryDelete->execute(array($staffId));	
		if($queryDelete){
			 @unlink($staffFileName);
			header('location:staffRecords.php?message=Staff deleted successfully');
			
		}else{
			header('location:staffRecords.php?message=Unable to delete staff at this time, please try again');
			 
		}

    }else {
        echo 'No staff found';
    }
}
	
	
	
	
//comment TABLE DISPLAY
	public function commentTableDsplay(){
    $query = $this->db->prepare("SELECT * FROM comment_tbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">List of Church Service Comment</div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							  <th>Full Name</th>
							  <th>Phone Number</th>
							  <th>Comment</th>
								<th>Comment Date</th>
							 <th>Delete Comment</th>
							</tr>
						  </thead>
                          <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
		?>	  
			<tr>
				<td><?php echo $row["full_name"];?></td>
				<td><?php echo $row["phone_number"];?></td>
				<td><?php echo $row["comment"];?></td>
				<td><?php echo $row["comment_date"];?></td>
			  <td><a href="deleteData.php?commentDeleteId=<?php echo $row["id"].'&phone='.$row["phone_number"]?>" class="btn btn-danger btn-xs">Delete</a></td>
            </tr>			  

 
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else {
        echo 'No event added yet';
    }
}		
		
	
	

//DELETE COMMENT
	public function deleteComment($commentId,$phoneNumber){
    $query = $this->db->prepare("SELECT id FROM  comment_tbl WHERE id=? AND phone_number=?");
    $query->execute(array($commentId,$phoneNumber));
    if($query->rowCount()>0){
		$queryDelete = $this->db->prepare("DELETE FROM comment_tbl WHERE id=?");
    	$queryDelete->execute(array($commentId));	
		if($queryDelete){
	
			header('location:commentRecords.php?message=Comment deleted successfully');
			
		}else{
			header('location:commentRecords.php?message=Unable to delete comment at this time, please try again');
			 
		}

    }else {
        echo 'No comment found';
    }
}	
	
	
	
	
//PAID DOWNLOADED MESSAGE TABLE DISPLAY
	public function downloadedMessageTableDsplay(){
    $query = $this->db->prepare("SELECT * FROM  downloaded_paid_message_tbl ORDER BY id ASC");
    $query->execute();
    if($query->rowCount()>0){
		?>
		<div class="card">
        <div class="card-header">List of Downloaded Paid Messages </div>
        <table class="table table-bordered"> 
                          <thead>
							<tr>
							  <th>#</th>
							  <th>Message Code</th>
							  <th>Message Title</th>
							  <th>Message Date</th>
							  <th>Message File Name</th>
							  <th>Date Downloaded</th>
							  <th>Regenerate Message Code</th>
							</tr>
						  </thead>
                          <tbody>  
		<?php 
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
		?>	  
			<tr>
              <th><?php echo $row["id"];?></th>
			  <th><?php echo $row["message_code"];?></th>
              <td><?php echo $row["message_title"];?></td>
              <td><?php echo $row["message_date"];?></td>
			  <td><?php echo $row["message_file_path"];?></td>
			  <td><?php echo $row["download_date"];?></td>
			  <td><a href="deleteData.php?downloadedPaidMessageDate=<?php echo $row["message_date"].'&paidMessageCode='.$row["message_code"]?>" class="btn btn-info btn-xs">Generate</a></td>
            </tr>			  

 
		<?php
		 }    
		?>
		     </tbody>  
          </table>
      </div>
		<?php

    }else {
        echo 'No Download yet';
    }
}
	
	
	
	

//GENERATE MESSAGE CODE
	public function generateNewMessageCode($downloadedPaidMessagetDate,$paidMessageCode){
    $query = $this->db->prepare("SELECT message_date, message_code FROM  paid_message_tbl WHERE message_date=? AND message_code=?");
    $query->execute(array($downloadedPaidMessagetDate,$paidMessageCode));
    if($query->rowCount()>0){
		
		$ran1=rand(200,4000);
		$ran2=rand(100,2000);
		$newMessageCode = 'WISDOM'.$ran1.$ran2;
		
		$querySelect = $this->db->prepare("SELECT message_code FROM  paid_message_tbl WHERE message_code=?");
    	$querySelect->execute(array($newMessageCode));	
		
		if($querySelect->rowCount()>0){
			 header('location:downloadedRecords.php?message=Sorry! Generated download code tallies with an existing one, try again now!');
		}else{
			$queryUpdate = $this->db->prepare("UPDATE paid_message_tbl SET message_code=? WHERE message_code=?");
    		$queryUpdate->execute(array($newMessageCode,$paidMessageCode));
			if($queryUpdate){
				 header('location:downloadedRecords.php?message= Message code changed successfully');
			}else{
				 header('location:downloadedRecords.php?message= Unable to change message download code at this time. Try again later');
			}
		}
		
		
	
    }else {
		header('location:downloadedRecords.php?message=Download code has been change already, download code can be changed again on next download');
	
        
    }
}	
			
}
?>