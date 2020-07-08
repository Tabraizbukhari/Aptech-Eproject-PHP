
 <?php include '../includes/header.php' ?>
 <?php include '../includes/navbar.php' ?>
 <?php include '../includes/sidebar.php' ?>

<?php 
    global $conn;
    $posts  = getAllpost(); 
    $categorie = getallcategories();
  if(isset($_GET['deleted'])){
      
    try {
      $id = $_GET['deleted'];
      $sql = "DELETE FROM post WHERE id=$id";
      if($conn->exec($sql)){
           $message = "Record deleted successfully";
           header('location: posts');

      }else{
        $message = "Record deleted successfully";
      }

    }catch(Exception $e) {
      $message =  'Message: ' .$e->getMessage();
    }
  
  }
 if(isset($_POST['update'])){
    $category =  $_POST['category'];
    $id       =  $_POST['pid'];
    $title    =  $_POST['title'];
    $descrip  =  $_POST['description'];
        $img = $_FILES['image']['name'];
		$imgtemp = $_FILES['image']['tmp_name'];
		$target_dir = "../images/";
		$imageupload = $target_dir . basename($img);
		$imgsave	 = "images/" . basename($img);
		if(!empty($img)){
			move_uploaded_file(  $imgtemp , $imageupload);
            $stmt = $conn->prepare("UPDATE post SET title='$title',descriptions='$descrip',category_id='$category',images='$imgsave'  WHERE id='$id' ");
    }else{
            $stmt = $conn->prepare("UPDATE post SET title='$title',descriptions='$descrip',category_id='$category' WHERE id='$id' ");
    } 
    if($stmt->execute()){
      $message = "Posts Updated Successfully";
        $posts  = getAllpost(); 
    }
  }


//   if(isset($_POST['add'])){
//     $pategory =  $_POST['category'];
//     $stmt = $conn->prepare("INSERT  INTO  CATEGORY (category) VALUES ('$pategory')");
//     if($stmt->execute()){
//       $message = "Category inserted Successfully";
//       $pategories  = getallcategories(); 
//     }

//   }


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
                                            <button class="btn btn-success float-right" name="add">Add POsts</button> 
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
            <h1>Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
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
                    <h3 class="card-title">Posts</h3>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Images</th>
                  <th>Edit/Delete</th>

                </tr>
                </thead>
                <tbody>

                <?php 
                if($posts){
                foreach ($posts as $p) {
                    $category = getcategory($p['category_id']);
                    $user = getuser($p['users_id']);

                  echo'
                    <tr>
                        <td>'.$p['id'].'</td>
                        <td>'.$user['username'].'</td>
                        <td>'.$category['category'].'</td>
                        <td>'.$p['title'].'</td>
                        <td>'.$p['descriptions'].'</td>
                        <td><img src=../'.$p['images'].'  width="80px" height="70px" class="img-fluid" ></td>

                        <td><button type="button" data-toggle="modal" data-target="#edit'.$p['id'].'" class="btn btn-primary">
                              Edit 
                            </button>
                        <a class="btn btn-danger " href="posts?deleted='.$p['id'].'">Delete</a></td>
                               

                        <div class="modal fade" id="edit'.$p['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle"> <h2 class="text-md-left text-center">EDIT POSTS</h2></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                            <div class="container">

                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card border-0 rounded shadow">
                                        <div class="card-body">
                                        <input type="hidden" value="'.$p['id'].'" class="form-control" name="pid">
                                        <div class="form-group">
                                           '; if($p['images'])
                                            echo'   <img src="../'.$p['images'].'" class="img-fluid class="text-center" width="100px" >
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="'.$p['title'].'" class="form-control" name="title">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="category">
                                            <option  selected disabled >Select Categories</option>';
                                            
                                                foreach ($categorie as $c) {
                                                    if($c['category'] == $category['category']){
                                                        echo '<option selected value="'.$c['id'].'">'.$c['category'].' </option>';
                                                    }else{
                                                        echo '<option  value="'.$c['id'].'">'.$c['category'].' </option>';
                                                        }
                                                }
                                             echo'  
                                            <select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="'.$p['descriptions'].'" class="form-control" name="description">
                                          </div>
                                          <div class="form-group">
                                            <button class="btn btn-success float-right" name="update">Update Posts</button> 
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
