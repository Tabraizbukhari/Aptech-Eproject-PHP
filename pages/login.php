
<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<?php 
	if(isset($_SESSION['auth'])){
		return header('location: home');
	}
	if(isset($_POST['login'])){
		$emailerror = null;
		$passerror	= null;
		$checkemail	= checkemail($_POST['email']);
		if(empty($_POST['email'])){
				$emailerror = "Required Email Address";
		}else if($checkemail	== false){
			$emailerror = "Incorrect Email Address ";
		}
		if(empty($_POST['password'])){
			$passerror = "Required Password";
		}
		
		if(empty($emailerror) && empty($passerror)){
			$passerror = loginuser($_POST['email'], $_POST['password']);
		}
	}
?>
<section class="banner-section p120">
		<div class="container">
			<div class="banner-text">
				<h2>Sign In</h2>
				<p>Please sign in to have access to all videos and many more.</p>
			</div><!--banner-text end-->
		</div>
	</section><!--banner-section end-->

	<section class="form_popup">
	
		<div class="login_form" id="login_form">
		 	<div class="hd-lg">
		 		<img src="images/logo.png" alt="">
		 		<span>Log into your Oren account</span>
		 	</div><!--hd-lg end-->
			<div class="user-account-pr">
				<form method="POST">
					<div class="input-sec">
						<input type="email"	class="<?php if($emailerror) echo"is-invalid"; ?>" name="email" placeholder="Email Address"  value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
						<?php if(isset($emailerror)){ echo "<div class=' py-1'><span class=' my-1 text-danger'>".$emailerror."</span> </div>"; }?>
					
					</div>
					<div class="input-sec">
						<input type="Password" class="<?php if($passerror) echo"is-invalid"; ?>" name="password" placeholder="Password">
						<?php if(isset($passerror)){ echo "<div class=' py-1'><span class=' my-1 text-danger'>".$passerror."</span> </div>"; }?>

					</div>
					
					<div class="input-sec mb-0">
						<button name="login" type="submit">Login</button>
					</div><!--input-sec end-->
				</form>
				<!-- <a href="#" title="" class="fg_btn">Forgot password?</a> -->
			</div><!--user-account end--->
			<div class="fr-ps">
				<h1>Don’t have an account? <a href="signup" title="" class="show_signup">Signup here.</a></h1>
			</div><!--fr-ps end-->
		</div><!--login end--->

	</section><!--form_popup end-->


<?php include "../includes/footer.php" ?>
