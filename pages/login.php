<?php include "../database/database.php" ?>
<?php include "../function/function.php" ?>
<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>

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
				<form>
					<div class="input-sec">
						<input type="text" name="username" placeholder="Username">
					</div>
					<div class="input-sec">
						<input type="Password" name="password" placeholder="Password">
					</div>
					<div class="chekbox-lg">
						<label>
							<input type="checkbox" name="remember" value="rem">
							<b class="checkmark"> </b>
							<span>Remember me</span>
						</label>
					</div>
					<div class="input-sec mb-0">
						<button type="submit">Login</button>
					</div><!--input-sec end-->
				</form>
				<a href="#" title="" class="fg_btn">Forgot password?</a>
			</div><!--user-account end--->
			<div class="fr-ps">
				<h1>Don’t have an account? <a href="signup" title="" class="show_signup">Signup here.</a></h1>
			</div><!--fr-ps end-->
		</div><!--login end--->

	</section><!--form_popup end-->


<?php include "../includes/footer.php" ?>
