
 <?php include '../includes/header.php' ?>
 <?php include '../includes/navbar.php' ?>
 <?php include '../includes/sidebar.php' ?>

<?php 
    global $conn;
    $categories  = getallcategories(); 
  if(isset($_GET['deleted'])){
      
    try {
      $id = $_GET['deleted'];
      $sql = "DELETE FROM category WHERE id=$id";
      if($conn->exec($sql)){
        $categories  = getallcategories(); 
        $message = "Record deleted successfully";

      }else{
        $message = "Record deleted successfully";
      }

    }catch(Exception $e) {
      $message =  'Message: ' .$e->getMessage();
    }
  
  }
 if(isset($_POST['update'])){
    $category =  $_POST['category'];
    $id       =  $_POST['cid'];
    $stmt = $conn->prepare("UPDATE CATEGORY SET category='$category' WHERE id='$id' ");
    if($stmt->execute()){
      $message = "Category Updated Successfully";
      $categories  = getallcategories(); 
    }
  }


  if(isset($_POST['add'])){
    $category =  $_POST['category'];
    $stmt = $conn->prepare("INSERT  INTO  CATEGORY (category) VALUES ('$category')");
    if($stmt->execute()){
      $message = "Category inserted Successfully";
      $categories  = getallcategories(); 
    }

  }


?>
 <style>
 .modal-lg {
    max-width: 50%;
}
 </style>


                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle"> <h2 class="text-md-left text-center">EDIT CATEGORY</h2></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form method="POST">
                            <div class="container">

                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card border-0 rounded shadow">
                                        <div class="card-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="category">
                                          </div>
                                          <div class="form-group">
                                            <button class="btn btn-success float-right" name="add">Add Category</button> 
                                          </div>
                                          
                                    </div>
                                </div><!--end col-->
                              </div><!--end row-->
                            </div><!--end container-->
                          </form>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categoires</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
         
        <?php if(isset($message)){	?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo $message; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
			    <?php	}	?>
             

          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                    <h3 class="card-title">Category</h3>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <a class="btn btn-primary float-right getmodal" data-toggle="modal" data-target="#add" href="">New categories</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Created_at</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                if($categories){
                foreach ($categories as $c) {
                  echo'
                    <tr>
                        <td>'.$c['id'].'</td>
                        <td>'.$c['category'].'</td>
                        <td>'.$c['created'].'</td>
                        <td><button type="button" data-toggle="modal" data-target="#edit'.$c['id'].'" class="btn btn-primary">
                              Edit 
                            </button>
                        <a class="btn btn-danger " href="category?deleted='.$c['id'].'">Delete</a></td>
                               

                        <div class="modal fade" id="edit'.$c['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle"> <h2 class="text-md-left text-center">EDIT CATEGORY</h2></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form method="POST">
                            <div class="container">

                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card border-0 rounded shadow">
                                        <div class="card-body">
                                        <input type="hidden" value="'.$c['id'].'" class="form-control" name="cid">
                                          
                                        <div class="form-group">
                                            <input type="text" value="'.$c['category'].'" class="form-control" name="category">
                                          </div>
                                          <div class="form-group">
                                            <button class="btn btn-success float-right" name="update">Update Category</button> 
                                          </div>
                                          
                                    </div>
                                </div><!--end col-->
                              </div><!--end row-->
                            </div><!--end container-->
                          </form>
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
