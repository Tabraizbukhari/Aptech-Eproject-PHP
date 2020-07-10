<?php include '../includes/header.php' ?>
 <?php include '../includes/navbar.php' ?>
 <?php include '../includes/sidebar.php' ?>
<?php
    if(isset($_GET['el']))
        {   
            $id     = $_GET['el'];
            $user   = getuser($id);
            echo '<input type="hidden" id="userimageid" value="'.$id.'">';
        }
        
    if(isset($_POST['save'])){

        try {
            $firstname      = $_POST['firstname'];
            $lastname       = $_POST['lastname'];
            $emailaddress   = $_POST['email'];
            $address        = $_POST['address'];
            $country        = $_POST['country'];
            $state          = $_POST['state'];
            $city           = $_POST['city'];
            $aboutus        = $_POST['aboutus'];    
            $sql = "UPDATE users SET firstname ='$firstname', lastname='$lastname', email='$emailaddress', address='$address',country='$country',state='$state',city='$city',aboutus='$aboutus'
            WHERE ID ='$id'";
            if($conn->exec($sql)){
                $success = "User Successfully Updated";
                }
    
          }
          catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
          }
    }

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
<!-- Edit Profile Setting Start -->
<section class="section pb-3 py-5">
<div class="container">
    <?php    if(isset($success)){ ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
            </div> 
        </div>
    </div>
    <?php  } ?>

    <div class="row justify-content-center">

        <div class="col-lg-12">
            <div class="card border-0 rounded shadow">
                <div class="card-body">
                <div class="row ">
                    <div class="col-12">
                    <a href="user" class="btn btn-outline-dark float-right" >  Back </a> 
                    </div>
                </div>
                    <h2 class=" text-center">Update User Profile</h2>
                    <div class=" d-flex justify-content-center d-sm-flex">
                    <?php if(isset($user['image'])){ ?> 
                        <img src="<?php echo $user['image']; ?>" width='200' height="180" id="profilepic" class="avatar img-circle img-thumbnail" alt="avatar">
                        <?php  }else{ ?>
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="profilepic" class="avatar img-circle img-thumbnail" alt="avatar">
                        <?php  } ?>
                   
                        
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input " id="inputGroupFile02">
                        <label class="custom-file-label btn btn-primary" for="inputGroupFile02">Upload Image</label>
                    </div>
                    <!-- <div class="mt-md-4 mt-3 mt-sm-0 d-flex justify-content-center">
                            <form  method="POST" enctype="multipart/form-data">
                                <input type="file" name="file" id="profileimage" class=" mt-2 btn-outline-primary"  required hidden>
                                <label class="btn btn-outline-primary mt-2 " for="profileimage">Change Picture</label>
                            </form> 
                        </div> -->
                    <form  method="POST" enctype="multipart/form-data">
                      
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>First Name <span class="required">*</span></label>
                                    <i class="fa fa-user icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5 " name="firstname"  placeholder="First Name" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : $user['firstname']; ?>" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Last Name <span class="required">*</span></label>
                                    <i class="fa fa-user-plus icon-sm icons"></i>
                                    <input type="text" name="lastname" id="lastname" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : $user['lastname']; ?> " class="pl-5 form-control" required placeholder="Last Name">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Email Address <span class="text-muted"></span></label>
                                    <i class="fa fa-briefcase icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5" placeholder="Email Address" id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : $user['email']; ?> " >
                                </div>
                            </div><!--end col-->
                          
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>Address <span class="required">*</span></label>
                                    <i class="fa fa-location-arrow icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5 "  placeholder="Address"  name="address"  required value="<?php echo isset($_POST["address"]) ? $_POST["address"] : $user['address']; ?>" >
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Country <span class="required">*</span></label>
                                    <i class="fa fa-globe icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5"  placeholder="Country name"   name="country"  required value="<?php echo isset($_POST["country"]) ? $_POST["country"] : $user['country']; ?>" >

                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>State <span class="required">*</span></label>
                                    <i class="fa fa-dot-circle-o icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5"  placeholder="State name"  name="state"  required value="<?php echo isset($_POST["state"]) ? $_POST["state"] : $user['state']; ?> " >

                                </div>
                            </div><!--end col-->                           
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>City <span class="required">*</span></label>
                                    <i class="fa fa-building icon-sm icons"></i>
                                    <input type="text" class="form-control pl-5"  placeholder="City name" name="city"  required value="<?php echo isset($_POST["city"]) ? $_POST["city"] : $user['city']; ?>" >

                                </div>
                               
                            </div><!--end col-->
                           

                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label>About Us</label>
                                    <i class="fa fa-comment icon-sm icons"></i>
                                    <textarea class="form-control pl-5" name="aboutus"    rows="3"><?php echo isset($_POST["aboutus"]) ? $_POST["aboutus"] : $user['aboutus']; ?> </textarea>
                                </div>
                            </div><!--end col-->
                    
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" id="submit" name="save"  class="btn btn-success float-right" value="Save Changes">
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
