<?php include "includes/head.php" ?>
<?php include "includes/navbar.php" ?>
<?php include "includes/banner.php" ?>
<!-- Container (About Section) -->
<?php include "pages/about.php" ?>
<?php	$posts = Getpostall(); ?>
	

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
											<a href="single_video_page.html" title="">
												<img src="<?php echo $p['image'] ?>" style="height: 200px;" class='img-fluid' >
												<span class="vid-time"><?php echo $p['category'] ?></span>
												
											</a>	
										</div><!--vid_thumbnail end-->
										<div class="video_info">
											<h3><a href="single_video_page.html" title=""><?php echo $p['title']; ?></a></h3>
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

		<?php include "includes/counter.php" ?>
<?php include "includes/footer.php" ?>