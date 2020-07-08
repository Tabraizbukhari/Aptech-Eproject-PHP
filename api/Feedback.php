<?php
include '../includes/function.php';
session_start();
    if(isset($_POST['feedback'])){
     $feedback = $_POST['feedback'];
     $id = isset($_SESSION['authid']);
     global $conn;

     $sql = "INSERT INTO feedback (users_id,feedback)
     VALUES ('$id','$feedback')";
  if($conn->exec($sql)){
        echo "Succefully Feedback submitted";
    }else{
        echo "Try again";
    }
}
?>