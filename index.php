<?php include "includes/head.php" ?>
<?php include "includes/navbar.php" ?>
<?php include "includes/banner.php" ?>
<!-- Container (About Section) -->
<?php include "pages/about.php" ?>
<?php	$posts = Getpostall(); 
	global $conn;
    $stmt = $conn->prepare("SELECT * FROM faq ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$faquestions = $stmt->fetchAll();
	
?>
	

		<section class="vds-main">
		<?php if(!empty($posts)){ ?>
			<div class="vidz-row">
				<div class="container">
					<div class="vidz_sec">
						<h3>Popular Photos</h3>
						<div class="vidz_list">
							<div class="row">
							<?php  foreach ($posts as $p) {	?>
								<div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
									<div class="videoo">
										<div class="vid_thumbainl">
										<?php echo	'<a href="image?el='.$p['id'].'" title="">';?>
												<img src="<?php echo $p['image'] ?>" style="height: 200px;" class='img-fluid' >
												<span class="vid-time"><?php echo $p['category'] ?></span>
												
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<h3><?php echo	'<a href="image?el='.$p['id'].'" title="">';?><?php echo $p['title']; ?></a></h3>
											<h4><a href="Single_Channel_Home.html" title=""><?php echo $p['username'];  ?></a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
											<span ><?php echo ($p['views'])? $p['views'].' views':'';  ?> ⋅<small class="posted_dt "><?php 	echo $p['created'];  ?></small></span>
										</div>
									</div><!--videoo end-->
								</div>
							<?php	}  ?>
								
							</div>
						</div><!--vidz_list end-->
					</div><!--vidz_videos end-->
				</div>
			</div><!--vidz-row end-->
			<?php	}  ?>

			
		</section><!--vds-main end-->

	<?php if(count($faquestions) > 0 ){?> 
		<section class="faqs mr-4 py-4 my-4" data-spy="scroll" data-target=".navbar" id="faqs" data-offset="0">
		<div class="container py-3">
			<div class="row">
				<div class="col-10 mx-auto">
							<h1 class="faqsheading text-center my-4"> Frequently Asked Questions </h1>
					<div class="accordion" id="faqExample">
					<?php foreach ($faquestions as $fa) {
					echo'<div class="card">
							<div class="card-header p-2" id="headingTwo">
								<h5 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#e'.$fa['id'].'" aria-expanded="false" aria-controls="collapseTwo">
									'.$fa['question'].'
								</button>
							</h5>
							</div>
							<div id="e'.$fa['id'].'" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
								<div class="card-body">
								 '.$fa['answere'].'
								</div>
							</div>
						</div>
					';}?>
					</div>

				</div>
			</div>
			<!--/row-->
		</div>
		<!--container-->
		</section>
 
		<?php 
			}
		include "includes/counter.php" 
		?>
<?php include "includes/footer.php" ?>