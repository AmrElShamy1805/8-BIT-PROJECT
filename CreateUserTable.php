<?php
    $servername="localhost";
    $username="root";
    $password="";
    $db="Project";
    $conn = new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "CREATE TABLE User (id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, email VARCHAR(50) NOT NULL , password varchar(50) NOT NULL , username varchar(50) NOT NULL , profilepic varchar(1000) , country varchar(100) NOT NULL , State varchar(100) NOT NULL , CC varchar(100) NOT NULL , Address varchar(1000) NOT NULL , PhoneNum varchar(1000) NOT NULL)";
    if(mysqli_query($conn,$sql)){
            echo("User table created successfully");
        }
    else{
            echo("ERROR Creating table: " . $conn->error);  
        }   
    $conn->close();