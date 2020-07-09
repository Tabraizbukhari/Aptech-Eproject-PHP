
 <?php include 'includes/header.php' ?>
 <?php include 'includes/navbar.php' ?>
 <?php include 'includes/sidebar.php' ?>

 <?php
	global $conn;
  	$countusers     = $conn->query('select count(*) from users')->fetchColumn();
    $countpost      = $conn->query('select count(*) from post')->fetchColumn(); 
    $countfeedback  = $conn->query('select count(*) from feedback')->fetchColumn(); 

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $countusers; ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $countpost; ?></h3>

                <p>New Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
               </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $countfeedback; ?><sup style="font-size: 20px">%</sup></h3>

                <p>Users feedback</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
       <!-- /.row -->
        </div>
</section>
  </div>
  <!-- /.content-wrapper -->

 <?php include 'includes/footer.php' ?>
