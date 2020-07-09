<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<?php
	if(isset($_SESSION['auth'])){
		return header('location: home');
	}
$user =  adduser();
if(isset($user)){
 $usernameerror = $user[0];
 $firsnameerror = $user[1];
 $lastnameerror = $user[2];
 $emailerror = $user[3];
 $passworderror = $user[4];
 $confirmpassworderror = $user[5];
 $bigerror = 	$user[6];
}

$subject = "Simple Email Test via PHP";
$body = "Hi,nn This is test email send by PHP Script";
$headers = "From: sender\'s email";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
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
						<?php if(isset($usernameerror)){ echo "<div id='usernameerror' class=' py-1'><span class=' my-1 text-danger'>".$usernameerror."</span> </div>"; }
						?>	
						<div id='usernamespan' class='py-1'> </div>
							
					</div>
					<div class="input-sec mgb25">
                        <div class="row">
                            <div class="col">
                                <input id="firstname" type="text" name="firstname" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>" class="<?php if(isset($firsnameerror)){ echo"is-invalid "; } ?>form-control" placeholder="First name">
								
								<?php if(isset($firsnameerror)) {echo "<div id='firstnameerror' class='py-1'> <span class=' my-1 text-danger'>".$firsnameerror."</span> </div>"; }
								else
								{	echo"<div id='firstnamespan' class='py-1'> </div>";	} ?>
						   </div>
                            <div class="col">
                                <input	id='lastname' type="text" name="lastname" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>" class="<?php if(isset($lastnameerror)){ echo"is-invalid "; } ?>form-control" placeholder="Last name">
								<?php if(isset($lastnameerror)){ echo "<div id='lastnameerror' class='py-1'> <span class=' my-1 text-danger'>".$lastnameerror."</span> </div>"; }
								else{ echo"<div id='lastnamespan' class='py-1'> </div>";
										}?>
							</div>
                        </div>
                    </div>
					<div class="input-sec">
						<input type="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" class="<?php if(isset($emailerror)){ echo"is-invalid "; } ?> form-control" id="emailid" placeholder="Email address">
						<?php if(isset($emailerror)){ echo "<div id='emailerror' class='py-1'> <span class=' my-1 text-danger'>".$emailerror."</span> </div>"; } ?>
						<div id="emailspan"> </div>
						
					</div>
					<div class="input-sec">
						<input id="password" type="Password" name="password" class="<?php if(isset($passworderror)){ echo"is-invalid "; } ?>form-control" placeholder="Password">
						<?php if(isset($passworderror)){ echo "<div id='passerror' class='py-1'> <span class=' my-1 text-danger'>".$passworderror."</span> </div>"; }
						else{ echo '<div id="passwordspan"> </div>';	}?>
					</div>
					<div class="input-sec">
						<input type="password" id="compass" name="confirmpassword" class="<?php if(isset($confirmpassworderror)){ echo"is-invalid "; } ?>form-control" placeholder="Re-enter password">
						<?php if(isset($confirmpassworderror)){ echo "<div id='compasserror' class='py-1'> <span class=' my-1 text-danger'>".$confirmpassworderror."</span> </div>"; }
						else{ echo '<div id="compasswordspan"> </div>';	}
						?>
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
