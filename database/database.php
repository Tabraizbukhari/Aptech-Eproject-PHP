<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=eproject", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  // sql to create table
  // $sql = "CREATE TABLE users (
  // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  // username VARCHAR(50),
  // firstname VARCHAR(50) NOT NULL,
  // lastname VARCHAR(50) NOT NULL,
  // email VARCHAR(50),
  // password VARCHAR(50),
  // image VARCHAR(50) NULL,
  // country VARCHAR(50) NULL,
  // city VARCHAR(50) NULL,
  // state VARCHAR(50) NULL,
  // address VARCHAR(50) NULL,
  // contact_no VARCHAR(50) NULL,
  // aboutus VARCHAR(100) NULL,
  // usertype ENUM('admin', 'user') NOT NULL,
  // status ENUM('1', '0') DEFAULT '0',
  // reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  // )";
  // $conn->exec($sql);
  // echo "Table Users created successfully";

  // // sql to create table
  //   $sql = "CREATE TABLE faq (
  //   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  //   question VARCHAR(30) NOT NULL,
  //   answere VARCHAR(30) NOT NULL,
  //   status ENUM('1', '0') DEFAULT '0',
  //   reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  //   )";
  //   $conn->exec($sql);
  //   echo "Table Users created successfully";

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>