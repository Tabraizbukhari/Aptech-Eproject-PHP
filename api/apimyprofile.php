<?php
include '../includes/database.php';
$limit    =    (isset($_GET['limit']))? $_GET['limit']: 10;
$page     =    (isset($_GET['page']))? $_GET['page']: 0;
$id       =    (isset($_SESSION['authid']))?$_SESSION['authid']: '';
postes($limit, $page, $id);

function postes($limit, $page, $id){	
    global $conn;
	$stmt = $conn->prepare("SELECT * FROM post Where users_id = 1  ORDER BY id DESC LIMIT $limit OFFSET $page ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultdata = $stmt->fetchAll();
    echo json_encode($resultdata);
    return;
    }
        
?>