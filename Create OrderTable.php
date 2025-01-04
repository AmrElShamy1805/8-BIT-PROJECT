<?php
 include("conn.php");
 $sql="CREATE TABLE UserOrder(Order_id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,OrderDesc VARCHAR(4000) NOT NULL , user_id INT(12) UNSIGNED  NOT NULL, TOTAL DOUBLE NOT NULL , FOREIGN KEY(user_id) REFERENCES User(id))";
 if(mysqli_query($conn,$sql)){
    echo("UserOrder table created successfully");
}
else{
    echo("ERROR Creating table: " . $conn->error);  
}   
$conn->close();