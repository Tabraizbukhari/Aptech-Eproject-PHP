<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<?php
	if(isset($_GET['delete'])){
		$id 	= $_GET['delete'];
		$stmt = $conn->prepare("DELETE FROM post WHERE id = '$id'");
    	if($stmt->execute()){
			?><script>
			
			$(document).ready(function () {
				var title = "Delted Successfully";
				var text  =	"your post is deleted successfully"
				 success(title, text);
				})
			
				</script>

			<?php
			 header('location: profile');
		}
	}
?>


<section class="user-account">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="sidebar">
							<div class="widget video_info pr sp">
								<span class="vc_hd">
									<img src="images/resources/sn.png" class="img-fluid" alt="">
								</span>
								<h4><?php if(isset($_SESSION['auth'])){ echo $_SESSION['auth']; } ?></h4>
								<p>since: <?php if(isset($_SESSION['authcreated'])){ echo date("d-M, y", strtotime($_SESSION['authcreated'])); } ?> </p>
							</div><!--video_info pr-->
							<div class="widget account">
								<h2 class="hd-uc"> <i class="icon-user"></i> Account</h2>
								<ul>
									<li><a href="account">My Account</a></li>
									<li><a href="#"> Change Password</a></li>
								</ul>
							</div><!--account end-->
						</div><!--sidebar end-->
					</div>
					<div class="col-lg-9" id="myprofile">
						<div class="video-details">
							<div class="latest_vidz">
								<div class="latest-vid-option">
									<h2 class="hd-op"> {{ message }}</h2>
									<div class="clearfix"></div>
								</div><!--latest-vid-option end-->
								<div class="vidz_list">
									<div class="tb-pr" v-for="img in images"> 
										<div class="row">
											<div class="col-xl-8 col-lg-9 col-md-9 col-sm-12">
												<div class="tab-history acct_page">
													<div class="videoo">
														<div class="vid_thumbainl ms br">
															<a href="single_video_page.html" title="">
																<img :src="img.image" style="height:200px;" alt="">
																<span class="vid-time"></span>
																
															</a>	
														</div><!--vid_thumbnail end-->
														<div class="video_info ms br">
															<h3><a href="single_video_page.html" title="">{{ img.title }}</a></h3>
															<h4><a href="Single_Channel_Home.html" title="">{{ img.category }}</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
															<span><span v-if="img.views != 0">{{ img.views+"views"}}</span> · {{ img.created }}</span>
															<!-- <ul>
																<li><span class="br-1">Inactive</span></li>
																<li><span class="br-2">Successful</span></li>
															</ul> -->

															<h4>Description:</h4>
															<h5><a href="Single_Channel_Home.html" title="">{{ img.content.substring(0,100)+".."  }}</a></h5>
														</div>
														<div class="clearfix"></div>
													</div><!--videoo end-->
												</div>
											</div>
											<div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
												<div class="icon-list">
													<ul>
														<li><a href="#" title=""><i class="icon-pencil"></i></a></li>
														<li><a :href="'profile?delete='+img.id" title=""><i class="icon-cancel"></i></a></li>
													</ul>
												</div><!--icon-list end-->
											</div>
										</div>
									</div><!--tb-pr end-->
									<div class="text-center">
									<infinite-loading v-cloak direction="bottom" :identifier="infiniteId"  spinner="waveDots"  @infinite="infiniteimages" >
										<div class="text-dark" slot="no-more">no more images</div>
									</infinite-loading> 
								</div>
								</div><!--vidz_list end-->
							</div><!--latest_vidz end-->
						</div><!--video-details end-->
					</div>
				</div>
			</div>
		</section><!--user-account end-->

<?php include "../includes/footer.php" ?>