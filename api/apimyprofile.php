<?php
include '../includes/function.php';

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
    $data = [];
	foreach ($resultdata as $r) {
		$user = users($r['users_id']);
		$category = getCategory($r['category_id']);
		$x = [
			'id'		=> $r['id'],
			'username'	=> $user['username'],
			'title'		=> $r['title'],
            'image'		=> $r['images'],
			'content'	=> $r['descriptions'],
			'category'	=> $category['category'],
			'created'	=> time_elapsed_string($r['post_date']),
			'views'		=> number_format_short($r['views']),

		];	
		array_push($data, $x);
	}
    echo json_encode($data);
    return;
    }
        
?>