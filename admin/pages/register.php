 <?php include '../../database/database.php' ?>
 <?php include '../../function/function.php' ?>
<?php
  if(isset($_POST['register'])){
      $firstnameerror = null;
      $lastnameerror = null;
      $emailerror = null;
      $passworderror = null;
      $confirmpassworderror = null;
      $checkemail = checkemail($conn,$_POST['email']);
      if(empty($_POST['firstname'])){   $firstnameerror = "Required First Name";  }
      else{   $firstname = $_POST['firstname'];   }

      if(empty($_POST['lastname'])){   $lastnameerror = "Required Last Name";  }
      else{   $lastname = $_POST['firstname'];   }

      if(empty($_POST['email'])){   $emailerror = "Required Email Address ";  }
      else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailerror = "Invalid email format";
      }else if($_POST['email'] == $checkemail){
        $emailerror = "Email is already exist. try another";
      }
      else{   $email = $_POST['email'];   }
      
      $password         = $_POST['password'];
      $confirmpassword  = $_POST['conpassword'];
      if(empty($password)){   $passworderror = "Required Password";  }
      else if (strlen($password) < 8) {
        $passworderror = "Required password at least 8 characters";
      }
      if(empty($confirmpassword)) {
        $confirmpassworderror = "Required Confirm Password";
      }else if($password != $confirmpassword ) { 
        $confirmpassworderror = "Passwords doesn't match";
      }
    
      if(empty($firstnameerror) && empty($lastnameerror) && empty($emailerror) && empty($passworderror) && empty($confirmpassworderror))
      {
        if($conn){
          $sql = "INSERT INTO users (firstname, lastname, email, password, usertype)
                  VALUES ('$firstname', '$lastname', '$email','$password','admin')";
                  if($conn->exec($sql)){
                     $message = 'Registerd successfully..! now login your account <a href="signin" class=" mx-2 btn btn-primary"> login </a>' ;
                     $_POST["firstname"] = null;
                     $_POST["lastname"] = null;
                     $_POST["email"] = null;
                  }else{
                    $error = 'Registerd Decliend Sorry..! Try Again ' ;
                  }
                  
        }
      }
  
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
<body class="hold-transition register-page">

<?php  
    if(isset($message))
       echo  '<div class="alert alert-success" role="alert">
                      '.$message.'</div>';
    if(isset($error))
    echo  '<div class="alert alert-danger" role="alert">
                    '.$error.'</div>';
    ?>
<div class="register-box">
  <div class="register-logo">
    <b>Dashboard </b>
 
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new user</p>

      <form  method="post" >
        <div class="row mb-3">
            <div class="col">
              <label>First Name<span class="text-danger">*</span></label>
              <input type="text" name="firstname" class="form-control  <?php if(isset($firstnameerror)) echo "is-invalid"; ?> " placeholder="First name" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>">
               <?php if(isset($firstnameerror))
                echo '<span class="text-danger" >'.$firstnameerror.'</span>';
                ?>
            </div>
            <div class="col">
              <label>Last Name<span class="text-danger">*</span></label>
              <input type="text" name="lastname" class="form-control <?php if(isset($lastnameerror)) echo "is-invalid"; ?>" placeholder="Last name" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>">
              <?php if(isset($lastnameerror))
                echo '<span class="text-danger py-1" >'.$lastnameerror.'</span>';
                ?>
            </div>
        </div>
          <label class="">Email Address<span class="text-danger">*</span></label> 
        <div class="input-group mb-1">
        <input type="text" name="email" class="form-control <?php if(isset($emailerror)) echo "is-invalid"; ?>" placeholder="Email Address" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
       
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
       </div>
       <?php if(isset($emailerror))
                echo '<span class="text-danger mb-2 py-1" >'.$emailerror.'</span>';
        ?><br>
        
         <label class="">Password<span class="text-danger">*</span></label>
        <div class="input-group mb-1">
          <input type="password" name="password" class="form-control <?php if(isset($passworderror)) echo "is-invalid";  ?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          </div>
        
          <?php if(isset($passworderror))
                echo '<span class="text-danger mb-2 py-1" >'.$passworderror.'</span>';
          ?>
        <br/>
         <label >Conform Password<span class="text-danger">*</span></label>
        <div class="input-group mb-1">
          <input type="password" name="conpassword" class="form-control <?php if(isset($confirmpassworderror)) echo "is-invalid";  ?>" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <?php if(isset($confirmpassworderror))
                echo '<span class="text-danger mb-3" >'.$confirmpassworderror.'</span>';
          ?>

        <div class="row py-3">
       
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="signin" class="text-center">I already have a account! Signin</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

