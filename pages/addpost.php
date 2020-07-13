<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<?php $categories = getallCategory(); ?>
<?php	

$id = $_SESSION['authid'];		
if(isset($_POST['uploaded'])){
	global $conn;
	$countuserpost = $conn->query('select count(*) from post WHERE users_id = '.isset($_SESSION['authid']).'')->fetchColumn(); 

	$titleerror 	=	null;
	$categoryerror 	=	null;
	$descriperror	=	null;
	$imgerror		=	null;
	if($countuserpost <= 35){
	if(empty($_POST['title'])){
		$titleerror = "<span class='text-danger'>Required Post Title </span>";
	}
	
	if(empty($_POST['category'])){
		$categoryerror = "<span class='text-danger'>Required Post Category </span>";
	}
	if(empty($_POST['description'])){
		$descriperror = "<span class='text-danger'>Required Post Description </span>";
	}
	if(empty($_FILES['image']['name'])){
		$imgerror = "<span class='text-danger'>Required Image </span>";
	}

    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["image"]["tmp_name"])) {
		$imgerror = "<span class='text-danger'>Required Image </span>";
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
		$imgerror = "<span class='text-danger'>File type only jpg,png,jpeg accepted!</span>";
    } 

	if(empty($titleerror) && empty($categoryerror) && empty($descriperror) && empty($imgerror)){
		
		$img = $_FILES['image']['name'];
		$imgtemp = $_FILES['image']['tmp_name'];
		$target_dir = "../images/";
		$imageupload = $target_dir . basename($img);
		$imgsave	 = "images/" . basename($img);
		if(!empty($img)){
			move_uploaded_file(  $imgtemp , $imageupload);
			$category = $_POST['category'];
			$title = $_POST['title'];
			$descrip	= $_POST['description'];
		
			$sql = "INSERT INTO post (users_id,category_id, title, images, descriptions)
				 VALUES ('$id','$category', '$title', '$imgsave','$descrip')";
			  if($conn->exec($sql)){
			?> <script>
			
				$(document).ready(function () {
					var title = "Uploaded Successfully";
					var text  =	"your post is uploaded successfully"
					success(title, text);
					})
				
					</script>
			<?php
			}
		}
	}
	}else{
		?> <script>
			
				$(document).ready(function () {
					
					swal({
						title: "Alter Image Uploaded",
						text: "Each registered user should only be able to upload up to a maximum of 35 images. if user should delete one of the files to upload a new one.",
						icon: "warning",
						dangerMode: true,
					})
				})
				
					</script>
		<?php
	}
}
	?>
<section class="upload-videooz">
<form method="post" enctype="multipart/form-data">
			<div class="container">
				<div class="row m-0">
					<div class="col-lg-6 m-0">
						
						<div class="video-file p-0">
						<?php echo (isset($imgerror))? $imgerror.' </br>': ''; ?>
							<img src="images/images.svg" class="img-fluid hid" width="150px" height="150px" > 
							<!-- <i class="fas fa-image hid"></i> -->
							<div id="btncloseimg"><button hidden="hidden" class="btn m-1 btn-outline-primary float-right" id="btncloseimges">close</button></div>
							<img src="" id="imgupload" style="height:400px;" class="img-fluid"></img>

							<h3 class="hid m-0">Select images to upload </h3>
							<span class="hid m-0">upload image in hd</span>
							<div class="m-0">
								<label for="file-upload" class="custom-file-upload my-1">
								    Upload Images
								</label>
								<input hidden name="image"  id="file-upload" type="file"/>
							</div>
						</div><!--video-file end-->
					</div>
					<div class="col-lg-6 m-0">
					
                                <div class="form-group">
                                    <label >Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control <?php echo (isset($titleerror))? 'is-invalid': ''; ?>"  placeholder="Enter Title">
									<?php echo (isset($titleerror))? $titleerror: ''; ?>
								</div>
                                <div class="form-group">
                                    <label >Category <span class="text-danger">*</span></label>
                                    <select id="inputState" class="form-control <?php echo (isset($categoryerror))? 'is-invalid': ''; ?>" name="category" >
									   <?php if($categories){?> 
											<option value="" disabled selected>Choose...</option>
											<?php foreach ($categories as $category) {
												echo '<option value="'.$category['id'].'">'.$category['category'].'</option>';
											}
										}else{
											echo '<option selected>No Categoies Avialable</option>';
										}?>
										
									</select>
									<?php echo (isset($categoryerror))? $categoryerror: ''; ?>
                                </div>
                                <div class="form-group">
                                    <label >Description <span class="text-danger">*</span></label>
								   <textarea  class="form-control <?php echo (isset($descriperror))? 'is-invalid': ''; ?>"  rows="8" name="description"></textarea>
									<?php echo (isset($descriperror))? $descriperror: ''; ?>
								   
                                </div>
                                <button type="submit" name="uploaded" class="btn btn-outline-primary float-right">Submit</button>
                    			</div>
				</div>
			</div>
			</form>
		</section><!--upload-videooz end-->
		
		<section class="suggestions">
			<div class="container">
				<div class="sgst_content">
					<h3>Help & Suggestions</h3>
					<p>By submitting your videos to ProjectFitnessTV, you acknowledge that you agree to ProjectFitnessTV’s<a href="#" title=""> Terms of Service</a>and<a href="#" title="">Community Guidelines</a>. Please be sure not to violate others’ copyright or privacy rights.<a href="#"> Learn more</a></p>
				</div>
			</div>
		</section><!--Suggestions end-->

		<!-- <section class="abt-vidz">
			<ul>
				<li>
					<a href="#">Upload Instructions </a>
				</li>
				<li>
					<a href="#">Troubleshooting </a>
				</li>
				<li>
					<a href="#">Mobile Upload </a>
				</li>
			</ul>
        </section>
         -->


		 <!-- Button trigger modal -->
<?php include "../includes/footer.php" ?>