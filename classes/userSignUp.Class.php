<?php
class userSignupC{
private $db;
public	$errorArray = array();

function __construct($name,$email,$phone,$password,$address,$db)
{
    $this -> db = $db;
    $this -> userSignupF($name,$email,$phone,$password,$address,$db);
}
    
public function  userSignupF($name,$email,$phone,$password,$address,$db){
    if(empty($name)){
        return   $this -> errorArray["0"] = "Your full name is required";      
    }else if(empty($email)){
        return  $this -> errorArray["0"] = "Your email is required";    
    }else if(empty($phone)){
        return  $this -> errorArray["0"] = "Your phone number is required";    
    }else if(empty($password)){
        return  $this -> errorArray["0"] = "Your password is required";    
    }else if(empty($address)){
        return  $this -> errorArray["0"] = "Your address is required";    
    }else{
	
        $query = $this->db->prepare("SELECT * FROM users_tbl WHERE email=? LIMIT 1");
        $query->execute(array($email));
		
        if($query->rowCount()>0){ 
//      		return  $this -> errorArray["0"] = "Sorry! this email has already been used."; 
            echo '<script>alert("Sorry! this email has already been used")</script>';
		}else{
			
					$passwordHah = password_hash($password, PASSWORD_DEFAULT);
					$queryCreate = $this->db->prepare("INSERT INTO users_tbl 
					(id, useridhash, fullname, email, phone, password, address, regdate) 
					VALUES (?,?,?,?,?,?,?,Now())");
					$queryCreate->execute(array('','0',$name,$email,$phone,$passwordHah,$address));
					if($queryCreate){
						
						$userId = $this->db->lastInsertId();
						$userIdHash = password_hash($userId, PASSWORD_DEFAULT);
						
						$queryUpdate = $this->db->prepare("UPDATE users_tbl SET useridhash=? WHERE id=?");
						$queryUpdate -> execute(array($userIdHash,$userId));
						
				        $_SESSION["orderCode"] = rand(2000,1000).rand(400,1000);
                        setcookie("fos", $userIdHash, time()+60*60*48*120, "/");
//							return $this -> errorArray["1"] = "Congratulation! Your account registration was successful. Start ordering ";
						header('location:index.php?s=1');
						
						
						
						// $_SESSION["writerId"] = $writerIdHash;
						// setcookie("_dtty", $writerIdHash, time()+60*60*48*120, "/");
						// $pageName = $_SERVER['REQUEST_URI'];
						// header('location:'.$pageName.'');
					
						
					}else{  
						return  $this -> errorArray["0"] = "Unable to register you at this time please try again";
				}    
					
			
			}
    }
    
   
}   
    
}


if(isset($_POST['signupBtn'])){
	$name = ucwords(strtolower(trim(htmlentities(strip_tags($_POST['name'])))));
	
	$email = ucwords(strtolower(trim(htmlentities(strip_tags($_POST['email'])))));
	$phone = ucwords(strtolower(trim(htmlentities(strip_tags($_POST['phone'])))));

	$password = strtolower(trim(htmlentities(strip_tags($_POST['password']))));
    $address = ucwords(strtolower(trim(htmlentities(strip_tags($_POST['address'])))));
	
	$userSignup = new userSignupC($name,$email,$phone,$password,$address,$db);
}
?>