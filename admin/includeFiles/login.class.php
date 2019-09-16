<?php
session_start();
@$user_name = $_SESSION['user_name'];

include_once 'dbconfig.php';
class login_class{
	private $db;
	
	function __construct($DB_con)
	{
		$this -> db = $DB_con;
	}

	
	
	//function that checks if the is any material in a table
	public function login_check($user_name,$password){
		$query = $this->db->prepare("SELECT id, user_name, password FROM admin_tbl WHERE user_name=?");
		$query -> execute(array($user_name));
		if ($query->rowCount()==1){
			while($row=$query->fetch(PDO::FETCH_ASSOC)){  
			 $db_password = $row["password"];
			 $user_name = $row["user_name"];
			 
			}
			
			$verify = password_verify($password,$db_password);
			if ($verify){
				 $_SESSION['user_name']=$user_name; // setting session
        		header('location:index1.php');
			}else{
				
				echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">×</span>
					</button>
					<strong>Error!</strong> Incorrect user name/password combination.
				  </div>';
			}
			
		}else{
				echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">×</span>
					</button>
					<strong>Error!</strong> Incorrect user name/password combination.
				  </div>';
			
			
		}
	}
	
}
?>








