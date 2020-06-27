
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

function users($id)
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



//getallpost 
function Getpostall()
{
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM post ORDER BY id DESC LIMIT 8");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
	$data = [];
	foreach ($result as $r) {
		$user = users($r['users_id']);
		$category = getCategory($r['category_id']);
		$x = [
			'username'	=> $user['username'],
			'title'		=> $r['title'],
			'image'		=> $r['images'],
			'category'	=> $category['category'],
			'created'	=> time_elapsed_string($r['post_date']),
			'views'		=> number_format_short($r['views']),

		];	
		array_push($data, $x);
	}
		return $data;
	
}

//get category 
function getCategory($id){
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM category where id = '$id'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
	if($result){
		return $result;
	}else{
		return 'get Category failed';
	}
}

//get category 
function getallCategory(){
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM category");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$result = $stmt->fetchAll();
	return $result;
	
}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 3600);
    $diff->d -= $diff->w * 3600;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function number_format_short( $n, $precision = 1 ) {
	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision);
		$suffix = '';
	} else if ($n < 900000) {
		// 0.9k-850k
		$n_format = number_format($n / 1000, $precision);
		$suffix = 'K';
	} else if ($n < 900000000) {
		// 0.9m-850m
		$n_format = number_format($n / 1000000, $precision);
		$suffix = 'M';
	} else if ($n < 900000000000) {
		// 0.9b-850b
		$n_format = number_format($n / 1000000000, $precision);
		$suffix = 'B';
	} else {
		// 0.9t+
		$n_format = number_format($n / 1000000000000, $precision);
		$suffix = 'T';
	}

  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
	if ( $precision > 0 ) {
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}

	return $n_format . $suffix;
}
?>