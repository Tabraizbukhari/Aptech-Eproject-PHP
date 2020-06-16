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
                        else{   echo "<span class='badge badge-pill badge-secondary'>Not Approved</span>";}
                        echo'</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                       view Detail
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
                                    echo'  <a class="dropdown-item "  href=""user?status=0&el='.$u['id'].'">unapproved</a>';
                                    }
                                    echo '
                                    </div>
                                </div>
                        </td>
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
