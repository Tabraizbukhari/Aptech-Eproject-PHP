
<?php
 if(isset($_GET['search'])){
        global $conn;
        $category  = $_GET['search'];
        $stmt = $conn->prepare("SELECT * FROM category where category = '$category'");
        $stmt->execute();
        $category = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $category = $stmt->fetch();
        if($category){
            $id = $category['id'];
            $stmt = $conn->prepare("SELECT * FROM post where category_id = '$id'");
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetchAll();
			if(count($result) > 0){
            $posts   = [];
                foreach ($result as $r) {
					$user = users($r['users_id']);
                    $category = getCategory($r['category_id']);
                    $x = [
                        'username'	=> $user['username'],
                        'title'		=> $r['title'],
                        'image'		=> $r['images'],
                        'category'	=> $category['category'],
                        'created'	=> time_elapsed_string($r['post_date']),
                        'views'		=> number_format_short($r['views']),

                    ];	
                        array_push($posts, $x);
                }
                echo $posts;
            }
        }
    }

    ?>