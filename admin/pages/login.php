
<?php
 include "../includes/database.php";
  if(isset($_POST['login'])){
      $email = $_POST['email'];
      $password = $_POST['password'];
      // $checkemail =  checkemail($conn, $email);

      // if(empty($email)){
      //   $emailerror = "Required Email Address";
      // }
      // if(empty($password)){
      //   $passworderror = "Required Password ";
      // }

      // if( $email != $checkemail){
      //     $emailerror = "The Email Address Was Not Found ";
      // }else if(empty($emailerror) && empty($passworderror)){

      $stmt = $conn->prepare("SELECT * FROM users where password='$password' AND usertype ='admin' ");
      $stmt->execute();
      $result = $stmt->fetch();
     
      if($result){
       
          $_SESSION['usertype'] = $result['usertype'];
          $_SESSION['firstname']= $result['firstname'];
         
          header('location: index.php');
      
      }else{
        $passworderror = "Incorrect password ";  
      }
    // }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<?php  
    
    if(isset($error))
    echo  '<div class="alert alert-danger" role="alert">
                    '.$error.'</div>';
    ?>
<div class="login-box">
  <div class="login-logo">
    <b>Dashboard</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">

        <label>Email Address <span class="text-danger">*</span></label>
        <div class="input-group mb-1">
          <input type="email" class="form-control <?php if(isset($emailerror)) echo "is-invalid";  ?>" name="email" placeholder="Email Address"  value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?php if(isset($emailerror))
                echo '<span class="text-danger py-1" >'.$emailerror.'</span>';
          ?> 
          <br/>
        <label>Password <span class="text-danger">*</span></label>
        <div class="input-group mb-1">
          <input type="password" class="form-control <?php if(isset($passworderror)) echo "is-invalid";  ?>" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php if(isset($passworderror))
                echo '<span class="text-danger py-1" >'.$passworderror.'</span>';
          ?> 
        <br/>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    <!--   <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      <p class="mb-0">
        <a href="signup" class="text-center">Register a new Account</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
