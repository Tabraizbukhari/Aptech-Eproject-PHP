<?php include "database.php" ?>
<?php include "function.php" ?>
<?php   session_start();
        ob_start();     
        $id = (isset($_SESSION['authid'])? $_SESSION['authid']: null);
        $user   = users($id); 
    ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from oren.azyrusthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 12:32:42 GMT -->
<head>
<meta charset="UTF-8">
<title>Oren Video Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="icon" href="images/Favicon.png">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="css/fontello.css">
<link rel="stylesheet" type="text/css" href="css/fontello-codes.css">
<link rel="stylesheet" type="text/css" href="css/thumbs-embedded.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<script src="js/sweetalter.min.js"></script>
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body>
