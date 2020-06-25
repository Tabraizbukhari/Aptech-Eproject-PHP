
<?php

global $conn;
if(!$conn){
  include("database.php");
}
    //for email check registeration
    if(isset($_GET['emailcheck'])){
      echo ''. checkemail($_GET['emailcheck']);
    }

    if(isset($_GET['usernamecheck'])){
        echo ''. checkusername($_GET['usernamecheck']);
    }
    //for email check username

 function loginuser($email, $password)
{
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM users where  email= '$email' && password='$password'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->fetch();
    if($result){
		if($result['status'] == 0){
			?>
			<script type="text/javascript">
				$(document).ready(function () {
					Approvalerror();
				})
			</script>	
			<?php
		}else{
		$_SESSION['auth']= $result['username'];
		header('location: home');
		}
    }else{
		return "Incorrect Password";
    }
}
function checkemail($email)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users where email= '$email'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    if($result){
        return 1;
    }else{
        return 0;
    }
}

function checkusername($username)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users where username= '$username'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    if($result){
    return 1;
    }else{
        return  0;
    }
}

function getallusers()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    if($result){
    return $result;
    }
}

function getuser($conn, $id)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE ID = '$id' ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    if($result){
    return $result;
    }
}

function deleteuser($id)
{
    global $conn;
    $sql = "DELETE FROM MyGuests WHERE id=$id";
    $conn->exec($sql);
    echo "Record deleted successfully";
}


function getallfaq($conn)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM faq ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
    
}

function adduser(){
    global $conn;

    if(isset($_POST['signup'])){
		$usernameerror 		= null;
		$firsnameerror 		= null;
		$lastnameerror 		= null;
		$emailerror			= null;
		$passworderror 		= null;
		$confirmpassworderror 	= null;
		$checkemail = checkemail($_POST['email']);
		$checkusername = checkusername($_POST['username']);
		
		if(empty($_POST['username'])){
				$usernameerror = "Required Username";
		}else if($checkusername == TRUE){
				$usernameerror = "Username is already exist ! try another";
			}else{
				$username = $_POST['username'];
		}
		if(empty($_POST['firstname'])){
			$firsnameerror = "Required First Name";
		}else{
			$firstname = $_POST['firstname'];
		}
		if(empty($_POST['lastname'])){
			$lastnameerror = "Required Last Name";
		}else{
			$lastname = $_POST['lastname'];
		}
		if(empty($_POST['email'])){   
			$emailerror = "Required Email Address ";  }
			else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$emailerror = "Invalid email format";
			}else if($checkemail == True){
				$emailerror = "Email is already exist. try another";
			}
			else{   $email = $_POST['email'];   }
      
		$password         = $_POST['password'];
		$confirmpassword  = $_POST['confirmpassword'];
		if(empty($password)){   $passworderror = "Required Password";  }
		else if (strlen($password) < 8) {
			$passworderror = "Required password at least 8 characters";
		}
		if(empty($confirmpassword)) {
			$confirmpassworderror = "Required Confirm Password";
		}else if($password != $confirmpassword ) { 
			$confirmpassworderror = "Passwords doesn't match";
		}

		if($usernameerror || $firsnameerror || $lastnameerror || $emailerror || $passworderror || $confirmpassworderror){
			$bigerror = "Please fill all the  feild as our requirment ";
		}

		if(empty($usernameerror) && empty($firstnameerror) && empty($lastnameerror) && empty($emailerror) && empty($passworderror) && empty($confirmpassworderror))
      	{
        	if($conn){
          		$sql = "INSERT INTO users (username,firstname, lastname, email, password, usertype)
                 		VALUES ('$username','$firstname', '$lastname', '$email','$password','user')";
                  	if($conn->exec($sql)){
                    //  $message = 'Registerd successfully..! Nw Wait for admistrator approval' ;
                     $_POST["firstname"] 	= null;
                     $_POST["lastname"] 	= null;
					 $_POST["email"] 		= null;
                     $_POST["username"] 	= null;
					?>
					<script type="text/javascript">
						$(document).ready(function () {
							successregister();
						})
					</script>	
					<?php
					}else{
						$error = 'Registerd Decliend Sorry..! Try Again ' ;
					}
        	}
	  	}else{
            return  [$usernameerror,$firsnameerror,$lastnameerror,$emailerror,$passworderror,$confirmpassworderror,$bigerror];
          }
	  
		
	}
}

?>