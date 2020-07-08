
<?php
	global $conn;
    
	$countusers = $conn->query('select count(*) from users')->fetchColumn();
    $countpost = $conn->query('select count(*) from post')->fetchColumn(); 
?>
<section class="services-sec">
			<div class="container">
				<div class="services-row">
					<div class="row">
						<div class="col-3">
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="service-col">
								<img src="images/sv2.png" class="img-fluid" alt="">
								<h3>Our Users</h3>
								<p><?php echo $countusers; ?></P>

							</div><!--service-col end-->
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="service-col">
								<img src="images/sv3.png" class="img-fluid" alt="">
								<h3>Uploaded images</h3>
								<p><?php echo $countpost; ?></P>
							</div><!--service-col end-->
						</div>
						<div class="col-3">
						</div>
					</div>
				</div><!--services-row end-->
			</div>
		</section><!--services-sec end-->