<?php include '../includes/header.php' ?>
 <?php include '../includes/navbar.php' ?>
 <?php include '../includes/sidebar.php' ?>
<?php 
    // $results = getallfaq($conn);

    if(isset($_POST['addnew'])){
        $qerror =   null;
        $aerror =   null;

        $q =    $_POST['ques'];
        if(empty($q)){
            $qerror = "Question Field is empty";
        }
        $a =    $_POST['ans'];
        if(empty($a)){
            $aerror = "Answere field is empty";
        }
        if(empty($aerror) && empty($qerror)){
        $sql = "INSERT INTO faq (question, answere)
        VALUES ('$q', '$a')";
        $conn->exec($sql);
        header('location: faqs');
    
        }
    }
    if(isset($_POST['edit'])){
        $qerror =   null;
        $aerror =   null;
        $q =    $_POST['ques'];
        $id =   $_GET['el'];

        if(empty($q)){
            $qerror = "Question Field is empty";
        }
        $a =    $_POST['ans'];
        if(empty($a)){
            $aerror = "Answere field is empty";
        }
        if(empty($aerror) && empty($qerror)){
        $sql = "UPDATE faq SET question='$q', answere='$a' where id='$id'";
        $conn->exec($sql);
        header('location: faqs');
    
        }
    }
    if(isset($_GET['el'])){
        $id =   $_GET['el'];
        $sql = "DELETE FROM faq WHERE id=$id";
        $conn->exec($sql);
        header('location: faqs');
    }
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header p-3">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Frequently Asked Questions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">faq's</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content p-3">
      <div class="row">
        <div class="col-md-12">
            <?php if(isset($qerror))
                echo '<span class="text-danger py-1" >'.$qerror.'</span>';
            ?>
            <?php if(isset($aerror))
                echo '<span class="text-danger py-1" >'.$qerror.'</span>';
            ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12">

                <div id="accordion">
                <div class="card">
                    <div class="card-header">
                    <div class="row">
                    <div class="col-md-4">
                    <h3 class="card-title">Faq's</h3>

                    </div>
                    <div class="col-md-4 offset-md-4">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addnew">
                                Add NEW
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            <?php 
             $i = 0;
            foreach ($results as $r) {  $i++
                ?>
              
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-info collapsed" data-toggle="collapse" data-target="#q<?php echo $r['id']; ?>" aria-expanded="false" aria-controls="collapseTwo">
                           <?php echo 'Q'.$i.")     ".$r['question']; ?>
                        </button>
                        <?php echo'
                        <a href="faqs?el='.$r['id'].'" class="btn mx-1 btn-outline-danger float-right" >';
                        ?>
                            <i class="fa fa-trash-o"> </i>
                        </a>
                        
                        <button type="button" class="btn btn-outline-success float-right"data-toggle="modal" data-target="#<?php echo'edit'.$r['id'];?>" >
                            Edit
                        </button>
                        
                    </h5>
                    </div>
                    <div id="q<?php echo $r['id']; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                    <?php echo $r['answere']; ?>
                    </div>
                    </div>
                </div>


                    <div class="modal fade" id="<?php echo'edit'.$r['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">FAQ'S</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="question">Questions</label>
                                        <input type="text" class="form-control" name="ques" value="<?php echo $r['question']; ?>" id="question" aria-describedby="emailHelp" placeholder="Enter a Question">
                                        <small id="emailHelp" class="form-text text-muted">Write a question according to faq's</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="answere">Answere</label>
                                        <textarea class="form-control" name="ans" id="answere" rows="3"><?php echo $r['answere']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="edit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

            <?php } ?>
                </div>
                </div>

            </div>
        </div>
    </section>
    </div>

  <!-- //add new faq -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">FAQ'S</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="question">Questions</label>
                            <input type="text" class="form-control" name="ques" id="question" aria-describedby="emailHelp" placeholder="Enter a Question">
                            <small id="emailHelp" class="form-text text-muted">Write a question according to faq's</small>
                        </div>
                        <div class="form-group">
                            <label for="answere">Answere</label>
                            <textarea class="form-control" name="ans" id="answere" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addnew" class="btn btn-primary">Add</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
  <!-- add end -->
<?php include '../includes/footer.php' ?>
