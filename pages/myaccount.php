<?php include "../includes/head.php" ?>
<?php include "../includes/navbar.php" ?>
<div class="card ">
    <div class="card-body">
        <div class="container bootstrap snippet py-5 my-5">
            <div class="row py-2">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                
                    <div class="custom-file">
                        <input type="file" class="custom-file-input " id="inputGroupFile02">
                        <label class="custom-file-label btn btn-primary" for="inputGroupFile02">Upload Image</label>
                    </div>
            
                </div>
                    </hr>
                    <br>
            </div><!--/col-3-->
    	<div class="col-sm-9">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                    <div class="form-group">
                        <div class="row">
                                <div class="col">
                                    <label><h4>First Name <span class="text-danger">*</span> </h4></label>
                                    <input type="text" class="form-control" placeholder="First name">
                                </div>
                                <div class="col">
                                    <label><h4>Last Name <span class="text-danger">*</span> </h4></label>
                                    <input type="text" class="form-control" placeholder="Last name">
                                </div>
                        </div>
                        </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" Disabled name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                            <div class="col-xs-6">
                                <label><h4>Country<span class="text-danger">*</span> </h4></label>
                                <input type="text" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                            </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                                <div class="col">
                                    <label><h4>City<span class="text-danger">*</span> </h4></label>
                                    <input type="text" class="form-control" placeholder="First name">
                                </div>
                                <div class="col">
                                    <label><h4>State<span class="text-danger">*</span> </h4></label>
                                    <input type="text" class="form-control" placeholder="Last name">
                                </div>
                        </div>
                      </div>
                      <div class="form-group">
                            <div class="col-xs-6">
                                <label><h4>Contact no<span class="text-danger">*</span> </h4></label>
                                <input type="text" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                            </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label ><h4>About us</h4></label>
                              <textarea  rows="6" class="form-control"> </textarea>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                              	<button class="btn btn-lg btn-success float-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                            </div>
                      </div>
                      
          
              	</form>
              
              
                    
            </div><!--/col-9-->
            </br>
           
   
    </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9 offset-md-9">  
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title" style="font-size:32px"> Password Reset   <button class="btn btn-outline-primary btn-lg float-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Password Reset</button> </h1>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div><!--/container-->
    </div><!--/card-->
</div><!--/card-->

<?php include "../includes/footer.php" ?>