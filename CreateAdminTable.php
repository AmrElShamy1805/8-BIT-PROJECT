<?php
 include("conn.php");
 $sql="CREATE TABLE admin_data(id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,firstname VARCHAR(4000) NOT NULL , lastname VARCHAR(4000) NOT NULL  , email VARCHAR(4000) NOT NULL , password VARCHAR(4000) NOT NULL)";
 if(mysqli_query($conn,$sql)){
    echo("admin_data table created successfully");
}
else{
    echo("ERROR Creating table: " . $conn->error);  
}   
$conn->close();