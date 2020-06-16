<?php include '../../database/database.php' ?>
 <?php include '../../function/function.php' ?>
 <?php include '../includes/header.php' ?>
 <?php include '../includes/navbar.php' ?>
 <?php include '../includes/sidebar.php' ?>
<?php
    if(isset($_GET['el']))
        {   
            $id     = $_GET['el'];
            $user   = getuser($conn, $id);
        }
    if(isset($_POST['save'])){
        $firstname= $_POST['firstname'];
        $lastname= $_POST['lastname'];

    }

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
<!-- Edit Profile Setting Start -->
<section class="section pb-3 py-5">
<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-12">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                    <h2 class="text-md-left text-center">Account Details</h2>

                    <div class="mt-3 text-md-left d-flex justify-content-center text-center d-sm-flex">
                       
                   <?php if($user['image']){?>

                        <img id="profilepicture" src="<?php echo $user['image']; ?>" class="avatar float-md-center avatar-large shadow mr-md-4" alt="">
                    <?php } else{ ?>
                        <img id="profilepicture" src="https://via.placeholder.com/300" class="avatar float-md-center avatar-large shadow mr-md-4" alt="">
                    <?php } ?>
                       
                        
                    </div>
                    <div class="mt-md-4 mt-3 mt-sm-0 d-flex justify-content-center">
                            <form  method="POST" enctype="multipart/form-data">
                                <input type="file" name="file" id="profileimage" class=" mt-2 btn-outline-primary"  required hidden>
                                <label class="btn btn-outline-primary mt-2 " for="profileimage">Change Picture</label>
                             
                            </form> 
                        </div>
                    <form  method="POST" enctype="multipart/form-data">
                      
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>First Name <span class="required">*</span></label>
                                    <i class="fa fa-user icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5 " name="fullname" id="fullname" placeholder="First Name" value="<?php echo $user['firstname']; ?>" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Last Name <span class="required">*</span></label>
                                    <i class="fa fa-user-plus icon-sm icons"></i>
                                    <input type="text" name="lastname" id="lastname" value="<?php echo $user['lastname']; ?>" class="pl-5 form-control" required placeholder="Last Name">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Email Address <span class="text-muted"></span></label>
                                    <i class="fa fa-briefcase icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5" placeholder="Email Address" id="companyname" name="companyname" value="<?php echo $user['email']; ?>" >
                                </div>
                            </div><!--end col-->
                          
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Address <span class="required">*</span></label>
                                    <i class="fa fa-location-arrow icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5 "  placeholder="Address" id="address" name="address"  required value="<?php echo $user['address']; ?>" >
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Country <span class="required">*</span></label>
                                    <i class="fa fa-globe icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5"  placeholder="Country name" id="country" name="country"  required value="<?php echo $user['country']; ?>" >

                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>State <span class="required">*</span></label>
                                    <i class="fa fa-dot-circle-o icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5"  placeholder="State name" id="state" name="state"  required value="<?php echo $user['state']; ?>" >

                                </div>
                            </div><!--end col-->                           
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>City <span class="required">*</span></label>
                                    <i class="fa fa-building icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5"  placeholder="City name" id="city" name="city"  required value="<?php echo $user['city']; ?>" >

                                </div>
                               
                            </div><!--end col-->
                           

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>About Us</label>
                                    <i class="fa fa-comment icon-sm icons"></i>
                                    <textarea class="form-control pl-5" name="aboutus"   id="aboutus"  rows="3"><?php echo $user['aboutus']; ?></textarea>
                                </div>
                            </div><!--end col-->
                    
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" id="submit" name="save"  class="btn btn-primary float-right" value="Save Changes">
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->

                    
                  
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->
</section><!--end section-->
<!-- Profile Setting End --> 
</div>
    
    <?php include '../includes/footer.php' ?>
