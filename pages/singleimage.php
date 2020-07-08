<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<?php if(isset($_GET['el'])){
        $id = $_GET['el'];
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM post WHERE id = '$id'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
		$user = users(isset($result['users_id']));
		$category = getCategory($result['category_id']);
		}
		
    ?>
	<section class="mn-sec">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="mn-vid-sc single_video">
						<div class="vid-1">
							<div class="vid-pr">
                             <?php echo'<img src="'.$result['images'].'" class="img-fluid"> '; ?>
							</div><!--vid-pr end-->
							<div class="vid-info">
								<div class="info-pr">
                                <div class="row">
                                    <div class="col-6">
                                        <?php echo'<h3>'.$result['title'].'</h3>'; ?>
                                    </div>
                                    <div class="col-6 ">
                                        <?php echo'<span class="my-4 float-right">'.number_format_short($result['views']).' views</span>';?>
                                    </div>
                                </div>
                                	<div class="clearfix"></div>
								</div><!--info-pr end-->
							</div><!--vid-info end-->
						</div><!--vid-1 end-->
						<div class="abt-mk">
							<div class="info-pr-sec">
								<div class="vcp_inf cr">
									<div class="vc_hd">
									<?php if($user['image']) {echo'<img src="'.$user['image'].'" alt="">';}
										  else{ echo'<img src="images/man.jpg" alt="">'; }
									?>
									</div>
									<div class="vc_info pr">
										<h4><a href="#" title=""><?php echo $user['username']?></a></h4>
										<span>Published on <?php echo $result['post_date']; ?></span>
									</div>
								</div><!--vcp_inf end-->							
								<ul class="chan_cantrz">
								<?php if(isset($_SESSION['authid'])){ 
											echo'<li>
												<a href="'.$result['images'].'" download title="" class="subscribe">Download</a>
											</li>';}else{
												echo'<li>
												<a href="signin" title="" class="subscribe">Download</a>
											</li>';}
											?>
								</ul><!--chan_cantrz end-->
							<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
							<div class="about-ch-sec">
								<div class="abt-rw">
									<h4>Category : </h4>
									<ul>
									<?php echo'<li><span>'.$category['category'].'</span></li>';?>
										
									</ul>
								</div>
								<div class="abt-rw">
									<h4>About : </h4>
									<?php echo'<p>'.$result['descriptions'].'</p>';?>
								</div>
								
							</div><!--about-ch-sec end-->
						</div><!--abt-mk end-->
				
					</div><!--mn-vid-sc end--->
				</div><!---col-lg-9 end-->
			
			</div>
		</div>
    </section><!--mn-sec end-->
    
<?php include "../includes/footer.php" ?>
