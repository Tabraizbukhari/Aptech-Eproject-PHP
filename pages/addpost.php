<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<section class="upload-videooz">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="video-file">
							<i class="icon-graphics_05"></i>
							<h3>Select images to upload </h3>
							<span>upload image in hd</span>
							<form>
								<label for="file-upload" class="custom-file-upload">
								    Upload Video
								</label>
								<input id="file-upload" type="file"/>
							</form>
						</div><!--video-file end-->
					</div>
					<div class="col-lg-6">
							<form>
                                <div class="form-group">
                                    <label >Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  placeholder="Enter Title">
                                </div>
                                <div class="form-group">
                                    <label >Category <span class="text-danger">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Description <span class="text-danger">*</span></label>
                                   <textarea  class="form-control"  rows="8" name="Description" > </textarea>
                                </div>
                               
                                <button type="submit" class="btn btn-outline-primary float-right">Submit</button>
                            
                    </div>
                    </form>
				</div>
			</div>
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
        
<?php include "../includes/footer.php" ?>