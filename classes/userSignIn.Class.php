<?php
class userSignIn{
private $db;
public	$errorArray = array();

function __construct($email,$password,$db)
{
    $this -> db = $db;
    $this -> userLogIn($email,$password);
}

    
public function userLogIn($email,$password){
        if(!empty($email) or !empty($password)){
            $query = $this->db->prepare("SELECT id, email, password,useridhash FROM users_tbl WHERE email=? LIMIT 1");
            $query -> execute(array($email));
            if ($query->rowCount()>0){
                $result = $query->fetch(PDO::FETCH_ASSOC); 
                 $email= $result["email"];
                 $userId = $result["id"];
                 $userIdHash = $result["useridhash"];
                 $passwordDb = $result["password"];
                 
 
			
			$verify = password_verify($password,$passwordDb);
           
                if ($verify){
                    $previousOrderCode = $this->checkForPastUserOrders($userId);
                    if($previousOrderCode==false){
                        $_SESSION["orderCode"] = rand(2000,1000).rand(400,1000);
                        setcookie("fos", $userIdHash, time()+60*60*48*120, "/");
                    
                        $pageName = $_SERVER['REQUEST_URI'];
                        echo '<script>alert("You are logged In, Start adding to your food cart.")</script>';
                        header('location:'.$pageName.'');
                    }else{
                        $_SESSION["orderCode"] = $previousOrderCode;
                        setcookie("fos", $userIdHash, time()+60*60*48*120, "/");
                    
                        $pageName = $_SERVER['REQUEST_URI'];
                        echo '<script>alert("You are logged In, and already have food in your cart, click the cart icon t view.")</script>';
                      
                        header('location:'.$pageName.'');
                    }
                
                             
                }else{
                    echo '<script>alert("Invalid email and password combination.")</script>';
//                    return $this -> errorArray["0"] = "";
                }
          
			
			
		}else{
           
                echo '<script>alert("Invalid email and password combination.")</script>';
//				 return $this -> errorArray["0"] = "Invalid email and password combination";
		}
            
        }else{
                echo '<script>alert("Your email and password is requred.")</script>';

//            return $this -> errorArray["0"] = "Your email and password is requred";
			
        }
		

	}

public function checkForPastUserOrders($userId){
     $query = $this->db->prepare("SELECT * FROM order_tbl WHERE userid=? AND orderstatus=? LIMIT 1");
        $query -> execute(array($userId,0));
        if ($query->rowCount()>0){
            return $result = $query->fetch(PDO::FETCH_ASSOC)['ordercode']; 
        }else{
            return false;
        }
}
    
}



if(isset($_POST['signinBtn'])){
	$email= strtolower(trim($_POST['email']));
	$password = trim(strtolower($_POST['password']));

	$userSignInObject = new userSignIn($email,$password,$db);

}


?>