<?php 
session_start();
include("conn.php");

// Check if user is logged in
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $id = $_SESSION['id'];
    
    
  
    $sql = "SELECT * FROM cart WHERE User_id='$id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $cartID= $row["cart_id"];
       
        if(isset($_GET['id']) && isset($_GET['quantity'])){
            
           
           if(empty($_GET['quantity'])){
            $quantity=1;
           }
           else{
            $quantity=$_GET['quantity'];
           }
            $productid = $_GET['id'];
            // Check if the item the user clicked on is already a part of their cart , if it is just update the quantity they purchased of it instead of inserting a new row
            $sql= "SELECT * FROM cartitems WHERE Product_id='$productid' AND Cart_id='$cartID'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
                $currentQuantity = $row['Quantity'];
                $newQuantity = $currentQuantity + $quantity;
                // Getting item stock
                $sql="SELECT * FROM products WHERE id='$productid'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result); 
                $maxAllowedQuantity=$row['stock'];
                // Check if the new quantity exceeds the maximum allowed quantity
                if($newQuantity > $maxAllowedQuantity){
                    $productquantity = $maxAllowedQuantity; 
                } else {
                    $productquantity = $newQuantity;
                }
                
                $updatesql = "UPDATE cartitems SET Quantity='$productquantity' WHERE Product_id='$productid' AND Cart_id='$cartID'";
                mysqli_query($conn,$updatesql);
            }
            else{
            $sql = "INSERT INTO cartitems (Quantity, Product_id, Cart_id) VALUES ('$quantity', '$productid', '$cartID')";
            mysqli_query($conn,$sql);
            }
        }
        header("Location:cart(access).php");
    }
} else {
    
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
       
        if(empty($_GET['quantity'])){
            $quantity=1;
           }
           else{
            $quantity=$_GET['quantity'];
           }
        $_SESSION['cart'][$id] = array('quantity' => $quantity);
    }
    header("Location:cart(noaccess).php");
}

$conn->close();
?>
