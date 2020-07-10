<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<?php
    if(isset($_POST['btn'])){
        $nameerror = null;
        $lasterror = null;
        $countryerror   = null;
        $cityerror      = null;
        $stateerror     = null;
        $addresserror   = null;
        $contacterror   = null;

        $name       = $_POST['firstname'];
        $last       = $_POST['lastname'];
        $country    = $_POST['country'];
        $city       = $_POST['city'];
        $state      = $_POST['state'];
        $address    = $_POST['address'];
        $contact    = $_POST['contactno'];
        $about      = $_POST['aboutus'];
        $id         = $_SESSION['authid'];
        ($name == null)? $nameerror    ='First name is required': null;
        ($last == null)? $lasterror    ='Last name is required': null;
        ($country == null)? $countryerror ='Country name is required': null;
        ($city == null)? $cityerror    ='City name is required': null;
        ($state == null)? $stateerror       ='Sate name is required': null;
        ($address == null)? $addresserror     ='Address name is required': null;
        ($contact == null)? $contacterror     ='Contact name is required': null;

        if(empty($nameerror) && empty($lasterror) && empty($contacterror) && empty($cityerror) && empty($stateerror) && empty($addresserror) && empty($contacterror) ){
        global $conn;
        $stmt = $conn->prepare("UPDATE users SET firstname='$name', lastname='$last',state='$state', country='$country', city='$city', contact_no='$contact', address='$address', aboutus='$about' WHERE id ='$id'  ");
        if($stmt->execute()){
            $message = "Successfully Profile Updated";
        }else
        {
            $message = "Failed";
        }
            $user   = users($id);
        } 
    }
?>
<div class="card ">
    <div class="card-body">
        <div class="container bootstrap snippet py-5 my-5">
            <div class="row py-2">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                        <?php if(isset($user['image'])){ ?> 
                        <img src="<?php echo $user['image']; ?>" width='200' height="180" id="profilepic" class="avatar img-circle img-thumbnail" alt="avatar">
                        <?php  }else{ ?>
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="profilepic" class="avatar img-circle img-thumbnail" alt="avatar">
                        <?php  } ?>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input " id="inputGroupFile02">
                        <label class="custom-file-label btn btn-primary" for="inputGroupFile02">Upload Image</label>
                    </div>
            
                </div>
                    </hr>
                    <br>
            </div><!--/col-3-->
    	<div class="col-sm-9">
        <?php if(isset($message)){	?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo $message; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
			    <?php	}	?>
                
                <hr>
                  <form class="form" method="post" id="registrationForm">
                    <div class="form-group">
                        <div class="row">
                                <div class="col">
                                    <label><h4>First Name <span class="text-danger">*</span> </h4></label>
                                    <input name="firstname" type="text" value="<?php echo $user['firstname']; ?>" class="form-control" placeholder="First name">
                                    <?php if(isset($nameerror))
                                        echo '<span class="text-danger py-1" >'.$nameerror.'</span>';
                                    ?> 
                                </div>
                                <div class="col">
                                    <label><h4>Last Name <span class="text-danger">*</span> </h4></label>
                                    <input name="lastname" type="text" value="<?php echo $user['lastname']; ?>" class="form-control" placeholder="Last name">
                                    <?php if(isset($lasterror))
                                       echo '<span class="text-danger py-1" >'.$lasterror.'</span>';
                                    ?> 
                                </div>
                        </div>
                        </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input name="email" type="email" value="<?php echo $user['email']; ?>" class="form-control" Disabled name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                            <div class="col-xs-6">
                                <label><h4>Country<span class="text-danger">*</span> </h4></label>
                                <input name="country" type="text" value="<?php echo $user['country']; ?>" class="form-control" id="location" placeholder="Country Name" title="Country">
                                <?php if(isset($countryerror))
                                        echo '<span class="text-danger py-1" >'.$countryerror.'</span>';
                                ?> 
                            </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                                <div class="col">
                                    <label><h4>City: <span class="text-danger">*</span> </h4></label>
                                    <input name="city" type="text" value="<?php echo $user['city']; ?>" class="form-control" placeholder="City name">
                                    <?php if(isset($cityerror))
                                        echo '<span class="text-danger py-1" >'.$cityerror.'</span>';
                                    ?>
                                </div>
                                <div class="col">
                                    <label><h4>State: <span class="text-danger">*</span> </h4></label>
                                    <input name="state" type="text" value="<?php echo $user['state']; ?>" class="form-control" placeholder="State name">
                                    <?php if(isset($stateerror))
                                        echo '<span class="text-danger py-1" >'.$stateerror.'</span>';
                                    ?>
                                </div>
                        </div>
                      </div>
                      <div class="form-group">
                            <div class="col-xs-6">
                                <label><h4>Address: <span class="text-danger">*</span> </h4></label>
                                <input name="address" type="text" value="<?php echo $user['address']; ?>" class="form-control"  placeholder="user Address Name" title="Address">
                                <?php if(isset($addresserror))
                                    echo '<span class="text-danger py-1" >'.$addresserror.'</span>';
                                ?>
                            </div>
                      </div>
                      <div class="form-group">
                            <div class="col-xs-6">
                                <label><h4>Contact no: <span class="text-danger">*</span> </h4></label>
                                <input name="contactno" type="text" value="<?php echo $user['contact_no']; ?>" class="form-control" id="location" placeholder="Contact Number" title="Contact Number">
                                <?php if(isset($contacterror))
                                    echo '<span class="text-danger py-1" >'.$contacterror.'</span>';
                                ?>
                            </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label ><h4>About us</h4></label>
                              <textarea  name="aboutus" rows="6" class="form-control"><?php echo $user['aboutus']; ?></textarea>
               
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                              	<button class="btn btn-lg btn-success float-right" name="btn" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                            </div>
                      </div>
                      
          
              	</form>
              
              
                    
            </div><!--/col-9-->
            </br>
        </div>

        </div><!--/container-->
    </div><!--/card-->
</div><!--/card-->

<?php include "../includes/footer.php" ?>