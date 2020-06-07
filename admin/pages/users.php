 <?php include '../../database/database.php' ?>
 <?php include '../../function/function.php' ?>
 <?php include '../includes/header.php' ?>
 <?php include '../includes/navbar.php' ?>
 <?php include '../includes/sidebar.php' ?>

 <?php 
    $users = getallusers($conn);
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
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
              <h3 class="card-title">Users</h3>
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
                        <td><a class="btn btn-success" href="#">View Detail</a></td>
                        <td>
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action 
                                    </button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Approved</a>
                                    </div>
                                </div>
                        </td>
                    </tr>
                    ';}   ?>
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
