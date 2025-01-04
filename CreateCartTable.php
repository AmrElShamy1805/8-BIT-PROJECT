<?php
 include("conn.php");
 $sql="CREATE TABLE cart(cart_id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,User_id INT(12) UNSIGNED , FOREIGN KEY(User_id) REFERENCES User(id))";
 if(mysqli_query($conn,$sql)){
    echo("cart table created successfully");
}
else{
    echo("ERROR Creating table: " . $conn->error);  
}   
$conn->close();