<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<?php
    if(isset($_GET['search'])){
        global $conn;
        $category  = $_GET['search'];
        $stmt = $conn->prepare("SELECT * FROM category where category = '$category'");
        $stmt->execute();
        $category = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $category = $stmt->fetch();
        if($category){
            $id = $category['id'];
            $stmt = $conn->prepare("SELECT * FROM post where category_id = '$id'");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetchAll();
			if(count($result) > 0){
            $posts   = [];
                foreach ($result as $r) {
					$user = users($r['users_id']);
                    $category = getCategory($r['category_id']);
                    $x = [
						'id'		=> $r['id'],
                        'username'	=> $user['username'],
                        'title'		=> $r['title'],
                        'image'		=> $r['images'],
                        'category'	=> $category['category'],
                        'created'	=> time_elapsed_string($r['post_date']),
                        'views'		=> number_format_short($r['views']),

                    ];	
                        array_push($posts, $x);
                }
            }
        }
    }
?>

<section class="vds-main">
		<?php if(!empty($posts)){ ?>
			<div class="vidz-row">
				<div class="container">
					<div class="vidz_sec">
						<h3><?php if(isset($_GET['search'])) echo $_GET['search']; ?> Photos</h3>
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
											<h4><?php echo	'<a href="image?el='.$p['id'].'" title="">';?><?php echo $p['username'];  ?></a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
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


<?php include "../includes/footer.php" ?>
