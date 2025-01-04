<?php
 include("conn.php");
 $sql="CREATE TABLE cartitems(CartItem_id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,Quantity INT(12) UNSIGNED , Product_id INT(12) UNSIGNED , Cart_id INT(12) UNSIGNED , FOREIGN KEY(Product_id) REFERENCES products(id), FOREIGN KEY(Cart_id) REFERENCES cart(cart_id))";
 if(mysqli_query($conn,$sql)){
    echo("cartitems table created successfully");
}
else{
    echo("ERROR Creating table: " . $conn->error);  
}   
$conn->close();