<?php include "../database/database.php" ?>
<?php include "../function/function.php" ?>
<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>


<?php
	if(isset($_POST['signup'])){
		$usernameerror 		= null;
		$firsnameerror 		= null;
		$lastnameerror 		= null;
		$emailerror			= null;
		$passworderror 		= null;
		$confirmpassworderror 	= null;
		$checkemail = checkemail($conn,$_POST['email']);
		$checkusername = checkusername($conn,$_POST['username']);

		
		if(empty($_POST['username'])){
				$usernameerror = "Required Username";
		}else if(isset($_POST['username']) == $checkusername){
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
			}else if($_POST['email'] == $checkemail){
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

		if(empty($firstnameerror) && empty($lastnameerror) && empty($emailerror) && empty($passworderror) && empty($confirmpassworderror))
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
	  	}
	  
		
	}
?>

	
	<section class="banner-section p120">
		<div class="container">
			<div class="banner-text">
				<h2>Register</h2>
				<p>Please Register to have access to all Images and many more.</p>
			</div><!--banner-text end-->
		</div>
	</section><!--banner-section end-->


	<section class="form_popup">
		
		<div class="signup_form" id="signup_form">
		 	<div class="hd-lg py-3 padding-top-zero">
		 		<img src="images/logo.png" alt="">
		 		<span>Register your  account</span>
		 	</div><!--hd-lg end-->
			 <?php if(isset($bigerror)){	?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo $bigerror; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
			<?php	}	?>
			<!-- <?php if(isset($message)){	?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<?php echo $message; ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>
						</div>
			<?php	}	?> -->

			<div class="p-5 padding-bottom-zero  m-5">
			
				<form method="POST">
					<div class="input-sec mgb25">
						<input type="text" name="username" id="username"  class="<?php if(isset($usernameerror)){ echo"is-invalid"; } ?> form-control" placeholder="Username" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>">
						<div id="usernamespan"> </div>
						<?php if(isset($usernameerror)) echo "<div class='py-1'><span class=' my-1 text-danger'>".$usernameerror."</span> </div>" ?>
						
					</div>
					<div class="input-sec mgb25">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="firstname" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>" class="<?php if(isset($firsnameerror)){ echo"is-invalid "; } ?>form-control" placeholder="First name">
								
								<?php if(isset($firsnameerror)) echo "<div class='py-1'> <span class=' my-1 text-danger'>".$firsnameerror."</span> </div>" ?>
						   </div>
                            <div class="col">
                                <input type="text" name="lastname" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>" class="<?php if(isset($lastnameerror)){ echo"is-invalid "; } ?>form-control" placeholder="Last name">
								<?php if(isset($lastnameerror)) echo "<div class='py-1'> <span class=' my-1 text-danger'>".$lastnameerror."</span> </div>" ?>
							</div>
                        </div>
                    </div>
					<div class="input-sec">
						<input type="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" class="<?php if(isset($emailerror)){ echo"is-invalid "; } ?> form-control" id="emailid" placeholder="Email address">
						<?php if(isset($emailerror)) echo "<div class='py-1'> <span class=' my-1 text-danger'>".$emailerror."</span> </div>" ?>
						<div id="emailspan"> </div>
					</div>
					<div class="input-sec">
						<input type="Password" name="password" class="<?php if(isset($passworderror)){ echo"is-invalid "; } ?>form-control" placeholder="Password">
						<?php if(isset($passworderror)) echo "<div class='py-1'> <span class=' my-1 text-danger'>".$passworderror."</span> </div>" ?>
					</div>
					<div class="input-sec">
						<input type="password" name="confirmpassword" class="<?php if(isset($confirmpassworderror)){ echo"is-invalid "; } ?>form-control" placeholder="Re-enter password">
						<?php if(isset($confirmpassworderror)) echo "<div class='py-1'> <span class=' my-1 text-danger'>".$confirmpassworderror."</span> </div>" ?>
					</div>
					
					<div class="input-sec mb-0">
						<button name="signup" class="btn btn-dark btn-block btn-submit "  type="submit">Signup</button>
					</div><!--input-sec end-->
				</form>
			</div><!--user-account end--->
			<div class="fr-ps p-0">
				<h1>Already have an account?<a href="signin"  title="" class="show_signup">&nbsp; Login here.</a></h1>
			</div><!--fr-ps end-->
		</div><!--login end--->
    </section><!--form_popup end-->


<?php include "../includes/footer.php" ?>
