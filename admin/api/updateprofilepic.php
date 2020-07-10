<?php
include '../includes/function.php';
include '../includes/database.php';

// $id       =    (isset($_SESSION['authid']))?$_SESSION['authid']: '';
$id = $_POST['user_id'];
if($_FILES['file']['name'] != ''){
           global $conn;

        $img = $_FILES['file']['name'];
		$imgtemp = $_FILES['file']['tmp_name'];
		$target_dir  = "../../images/";
		$imageupload = $target_dir.basename($img);
        $imgsave     = 'images/'.basename($img);
        move_uploaded_file($imgtemp, $imageupload);
      
        $sql = "UPDATE users SET image ='$imgsave'
        WHERE ID ='$id'";
        if($conn->exec($sql)){
            $success = "User Successfully Updated";
            }
    echo $imgsave;
}
?>