
<?php
    include "../database/database.php";

    //for email check registeration
    if(isset($_GET['emailcheck'])){
      echo ''. checkemail($conn, $_GET['emailcheck']);
    }

    if(isset($_GET['usernamecheck'])){
        echo ''. checkusername($conn, $_GET['usernamecheck']);
    }
    //for email check username

function checkemail($conn, $email)
{
    $stmt = $conn->prepare("SELECT * FROM users where email= '$email'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    if($result){
        return 1;
    }else{
        return 0;
    }
}

function checkusername($conn, $username)
{
    $stmt = $conn->prepare("SELECT * FROM users where username= '$username'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    if($result){
    return 1;
    }else{
        return  0;
    }
}

function getallusers($conn)
{
    $stmt = $conn->prepare("SELECT * FROM users ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    if($result){
    return $result;
    }
}

function getuser($conn, $id)
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE ID = '$id' ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    if($result){
    return $result;
    }
}

function deleteuser($id)
{
    $sql = "DELETE FROM MyGuests WHERE id=$id";
    $conn->exec($sql);
    echo "Record deleted successfully";
}


function getallfaq($conn)
{
    $stmt = $conn->prepare("SELECT * FROM faq ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
    
}
?>