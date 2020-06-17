 <?php include '../../database/database.php' ?>
 <?php include '../../function/function.php' ?>
 <?php include '../includes/header.php' ?>
 <?php include '../includes/navbar.php' ?>
 <?php include '../includes/sidebar.php' ?>

 <?php 
    $users = getallusers($conn);
    if(isset($_GET['deleted'])){
      $id = $_GET['deleted'];
      $sql = "DELETE FROM users WHERE id=$id";
      $conn->exec($sql);
      header('location: user');
    }
    if(isset($_GET['status']) && isset($_GET['el'])){
      $status = $_GET['status'];
      $id = $_GET['el'];
      
      $sql = "UPDATE users SET status= $status WHERE id=$id";
      $conn->exec($sql);
      header('location: user');
     
     }
 ?>
 <style>
 .modal-lg {
    max-width: 50%;
}
 </style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
         

          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                    <h3 class="card-title">Users</h3>

                    </div>
                    <div class="col-md-4 offset-md-4">
                        <a class="btn btn-primary float-right getmodal" href="">Add New Users</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Details</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                if($users){
                foreach ($users as $u) {
                  echo'
                    <tr>
                        <td>'.$u['firstname'].'</td>
                        <td>'.$u['lastname'].'</td>
                        <td>'.$u['email'].'</td>
                        <td>';
                        if($u['image']){  
                            echo '<img src="'.$u['image'].'" class="img-fluid rounded" width="50px" height="50px">';
                            }else{
                                echo '<img src="images/man.jpg" class="img-fluid rounded" width="50px" height="50px">';
                            }
                        echo'
                        </td>
                        <td>'.$u['usertype'].'</td>
                        <td>';
                        if($u['status'] == 1){ echo "<span class='badge badge-pill badge-success'>Approved</span>"; }
                        else{   echo "<span class='badge badge-pill badge-danger'>Not Approved</span>";}
                        echo'</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-whatever="@fat" data-target="#edit'.$u['id'].'">
                       View Details
                      </button></td>
                        <td>
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action 
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="useredit?el='.$u['id'].'">Edit</a>
                                      <a class="dropdown-item " href="user?deleted='.$u['id'].'">Delete</a>
                                      <div class="dropdown-divider"></div>
                                      <h6 class="dropdown-header bg-info text-white">Change Status</h6>
                                      
                                      ';
                                    if($u['status'] == 0){
                                    echo'  <a class="dropdown-item "  href="user?status=1&el='.$u['id'].'">Approved</a>';
                                    }else{
                                      echo'  <a class="dropdown-item "  href="user?status=0&el='.$u['id'].'">Unapproved</a>';
                                    }
                                    echo '
                                    </div>
                                </div>
                        </td>

                        <div class="modal fade" id="edit'.$u['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle"> <h2 class="text-md-left text-center">Account Details</h2></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <div class="container">

                            <div class="row justify-content-center">
                        
                                <div class="col-lg-12">
                                    <div class="card border-0 rounded shadow">
                                        <div class="card-body">
                                           
                        
                                            <div class="mt-3 text-md-left d-flex justify-content-center text-center d-sm-flex">
                                                <img id="profilepicture" src="'.$u['image'].'" class="avatar float-md-center avatar-large shadow mr-md-4" alt="">
                                            <?php } else{ ?>
                                                <img id="profilepicture" src="https://via.placeholder.com/200"  class="avatar float-md-center avatar-large shadow mr-md-4" alt="">
                                            <?php } ?>
                                            </div>
                                    
                                                <div class="row mt-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>First Name <span class="disabled">*</span></label>
                                                            <i class="fa fa-user icon-sm icons"></i>
                                                            <input type="text" class="form-control pl-5 " name="fullname" id="fullname" placeholder="First Name" value="'.$u['firstname'].'" disabled>
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>Last Name <span class="disabled">*</span></label>
                                                            <i class="fa fa-user-plus icon-sm icons"></i>
                                                            <input type="text" name="lastname" id="lastname" value="'.$u['lastname'].'" class="pl-5 form-control" disabled placeholder="Last Name">
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>Email Address <span class="text-muted"></span></label>
                                                            <i class="fa fa-briefcase icon-sm icons"></i>
                                                            <input type="text" class="form-control pl-5" placeholder="Email Address" id="email" name="email" disabled value="'.$u['email'].'" >
                                                        </div>
                                                    </div><!--end col-->
                                                  
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>Address <span class="disabled">*</span></label>
                                                            <i class="fa fa-location-arrow icon-sm icons"></i>
                                                            <input type="text" class="form-control pl-5 "  placeholder="Address" id="address" name="address"  disabled value="'.$u['address'].'" >
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>Country <span class="disabled">*</span></label>
                                                            <i class="fa fa-globe icon-sm icons"></i>
                                                            <input type="text" class="form-control pl-5"  placeholder="Country name" id="country" name="country"  disabled value="'.$u['country'].'" >
                        
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>State <span class="disabled">*</span></label>
                                                            <i class="fa fa-dot-circle-o icon-sm icons"></i>
                                                            <input type="text" class="form-control pl-5"  placeholder="State name" id="state" name="state"  disabled value="' .$u['state'].'" >
                        
                                                        </div>
                                                    </div><!--end col-->                           
                                                    <div class="col-md-6">
                                                        <div class="form-group ">
                                                            <label>City <span class="disabled">*</span></label>
                                                            <i class="fa fa-building icon-sm icons"></i>
                                                            <input type="text" class="form-control pl-5"  placeholder="City name" id="city" name="city"  disabled value="'.$u['city'].'" >
                        
                                                        </div>
                                                       
                                                    </div><!--end col-->
                                                   
                        
                                                    <div class="col-md-12">
                                                        <div class="form-group ">
                                                            <label>About Us</label>
                                                            <i class="fa fa-comment icon-sm icons"></i>
                                                            <textarea disabled class="form-control pl-5" name="aboutus"   id="aboutus"  rows="3">'.$u['aboutus'].'</textarea>
                                                        </div>
                                                    </div><!--end col-->
                                            
                                                </div><!--end row-->
                                                
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end container-->
                            </div>
                            
                          </div>
                        </div>
                        </div>
                    </tr>
                    ';}  
                    } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 <?php include '../includes/footer.php' ?>
