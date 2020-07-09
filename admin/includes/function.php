<?php

function checkemail($email)
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users where email= '$email'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    if($result){
        return true;
    }else{
        return false;
    }
}

    function getallusers()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    function getallfeedback()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM feedback ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    function getallfaq()
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM faq ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    function getallcategories()
    {
        global $conn;
        $stmt   =   $conn->prepare('SELECT * FROM category ORDER BY id DESC');
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

     function getuser($id)
    {
        global $conn;
        $stmt   =   $conn->prepare("SELECT * FROM users WHERE id ='$id'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        return $result;
    }

    function getcategory($id)
    {
        global $conn;
        $stmt   =   $conn->prepare("SELECT * FROM category WHERE id ='$id'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        return $result;
    }

    function getAllpost()
    {
        global $conn;
        $stmt   =   $conn->prepare('SELECT * FROM post ORDER BY id DESC');
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }
?>

