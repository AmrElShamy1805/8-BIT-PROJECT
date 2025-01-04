<?php
    $servername="localhost";
    $username="root";
    $password="";
    $db="Project";
    $conn = new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE TABLE Products (id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY, productname VARCHAR(30) NOT NULL, productDescription VARCHAR(1000) NOT NULL,price DOUBLE NOT NULL, productimage VARCHAR(1000) NOT NULL, category VARCHAR(30) NOT NULL , stock INT NOT NULL , Discount DOUBLE UNSIGNED)";
    if(mysqli_query($conn,$sql)){
            echo("Products table created successfully");
        }
    else{
            echo("ERROR Creating table: " . $conn->error);  
        }   
    $conn->close();