<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<?php
	if(isset($_POST['update'])){
    $category =  $_POST['category'];
    $id       =  $_POST['pid'];
    $title    =  $_POST['title'];
    $descrip  =  $_POST['description'];
        $img = $_FILES['image']['name'];
		$imgtemp = $_FILES['image']['tmp_name'];
		$target_dir = "../images/";
		$imageupload = $target_dir . basename($img);
		$imgsave	 = "images/" . basename($img);
		if(!empty($img)){
			move_uploaded_file(  $imgtemp , $imageupload);
            $stmt = $conn->prepare("UPDATE post SET title='$title',descriptions='$descrip',category_id='$category',images='$imgsave'  WHERE id='$id' ");
    }else{
            $stmt = $conn->prepare("UPDATE post SET title='$title',descriptions='$descrip',category_id='$category' WHERE id='$id' ");
    } 
    if($stmt->execute()){
      $message = "Posts Updated Successfully";
        // $posts  = getAllpost(); 
	}

  }
  $category = getallCategory();
?>

<section class="user-account">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="sidebar">
							<div class="widget video_info pr sp">
								<span class="vc_hd">
								<?php if(isset($user['image'] )){?>
									<img src="<?php echo  $user['image']; ?>" class="img-fluid" alt="">
									<?php }else{ ?>
									<img src="images/man.jpg" class="img-fluid" alt="">
								<?php }?>	
								</span>
								<h4><?php if(isset($user['firstname'])){ echo $user['firstname']; } ?></h4>
								<p>since: <?php if(isset($user['reg_date'])){ echo date("d-M, y", strtotime($user['reg_date'])); } ?> </p>
							</div><!--video_info pr-->
							<div class="widget account">
								<h2 class="hd-uc"> <i class="icon-user"></i> Account</h2>
								<ul>
									<li><a href="edit-profile">Edit Profile</a></li>
									<!-- <li><a href="#"> Change Password</a></li> -->
								</ul>
							</div><!--account end-->
						</div><!--sidebar end-->
					</div>
					<div class="col-lg-9" id="myprofile">
						<div class="video-details">
							<div class="latest_vidz">
								<div class="latest-vid-option">
									<h2 class="hd-op">{{ message }}</h2>
									<div class="clearfix"></div>
								</div><!--latest-vid-option end-->
								<div class="vidz_list">
									<div class="tb-pr" v-for="img in images"> 
										<div class="row">
											<div class="col-xl-8 col-lg-9 col-md-9 col-sm-12">
												<div class="tab-history acct_page">
													<div class="videoo">
														<div class="vid_thumbainl ms br">
															<a :href="'image?el='+img.id" title="">
																<img :src="img.image" style="height:200px;" alt="">
																<span class="vid-time"></span>
																
															</a>	
														</div><!--vid_thumbnail end-->
														<div class="video_info ms br">
															<h3><a :href="'image?el='+img.id" title="">{{ img.title }}</a></h3>
															<h4><a :href="'image?el='+img.id" title="">{{ img.category }}</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
															<span><span v-if="img.views != 0">{{ img.views+"views"}}</span> · {{ img.created }}</span>
															<!-- <ul>
																<li><span class="br-1">Inactive</span></li>
																<li><span class="br-2">Successful</span></li>
															</ul> -->

															<h4>Description:</h4>
															<h5><a :href="'image?el='+img.id" title="">{{ img.content.substring(0,100)+".."  }}</a></h5>
														</div>
														<div class="clearfix"></div>
													</div><!--videoo end-->
												</div>
											</div>
											<div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
												<div class="icon-list">
													<ul>
													<li><a data-toggle="modal" :data-target="'#'+img.id">
														<i class="icon-pencil"></i>
															</a></li>
														<li><a  href="javascript:void(0)"  v-on:click="deletepost(img.id)" title=""><i class="icon-cancel"></i></a></li>
													</ul>
												</div><!--icon-list end-->
											</div>
										</div>
										<div class="modal fade" :id="img.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Edit Post</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data">
												<div class="modal-body">
												<input type="hidden" :value="img.id" class="form-control" name="pid">
												<div class="form-group" v-if="img.image">
												   <img :src="img.image" class="img-fluid text-center" width="100px" >
												</div>
												<div class="form-group">
													<input type="file" name="image">
												</div>
													<div class="form-group">
														<input type="text" :value="img.title" name="title" class="form-control">
													</div>
													<div class="form-group" >
														<select class="form-control" name="category" >
														<?php foreach ($category as $c) {
														 echo'<option value="'.$c['id'].'">'.$c['category'].'</option>';
														}?>
														</select>
													</div>
													<div class="form-group">
													<textarea  class="form-control" rows='8' name="description">{{ img.content }}</textarea>
													</div>
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" name="update" class="btn btn-primary">Save changes</button>
												</div>
											</form>
												</div>
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