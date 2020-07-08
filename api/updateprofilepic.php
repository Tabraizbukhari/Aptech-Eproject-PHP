<?php
include '../includes/function.php';
session_start();
$id       =    (isset($_SESSION['authid']))?$_SESSION['authid']: '';
if($_FILES['file']['name'] != ''){
           global $conn;

        $img = $_FILES['file']['name'];
		$imgtemp = $_FILES['file']['tmp_name'];
		$target_dir  = "../images/";
		$imageupload = $target_dir.basename($img);
        $imgsave     = 'images/'.basename($img);
        move_uploaded_file($imgtemp, $imageupload);
    $stmt = $conn->prepare("UPDATE users SET image ='$imgsave' WHERE id='$id'");
    $stmt->execute();
    echo $imgsave;
}
?>