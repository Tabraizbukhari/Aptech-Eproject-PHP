<?php
include '../includes/function.php';

	if(isset($_GET['id'])){
        $id 	= $_GET['id'];
        global $conn;
        $stmt = $conn->prepare("DELETE FROM post WHERE id = '$id'");
        $stmt->execute();
        echo true;
    }
?>
