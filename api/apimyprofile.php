<?php
include '../includes/database.php';
header('Content-type: application/json'); 
$limit    =    (isset($_POST['limit']))? $_POST['limit']: 10;
$page     =    (isset($_POST['page']))? $_POST['page']: '';
$id       =    (isset($_SESSION['authid']))?$_POST['authid']: '';
postes($limit, $page, $id);

function postes($limit, $page, $id){	
    global $conn;
	$stmt = $conn->prepare("SELECT * FROM post Where users_id = 1 ORDER BY id DESC");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultdata = $stmt->fetchAll();
    echo json_encode($resultdata);
    return;
    }
        
?>