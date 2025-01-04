<?php
session_start();
include('../conn.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('location: adminlogin.php');
}

if(isset($_POST['submit'])){
   $ProductName= $_POST['productname'];
   $ProductDescription= $_POST['ProductDescription'];
   $ProductPrice= $_POST['ProductPrice'];
   $Productcategory= $_POST['Productcategory'];
   $Productimage= $_POST['Productimage'];
   $stock=$_POST['stock'];

   $sql="INSERT into products(productname,productDescription,price,category,stock,productimage) VALUES('$ProductName','$ProductDescription','$ProductPrice','$Productcategory',$stock,'$Productimage')";
   if(mysqli_query($conn,$sql)){
    echo"new record created successfully";
     
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .jersey-10-regular {
    font-family: "Jersey 10", sans-serif;
    font-weight: 400;
    font-style: normal;
}
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Jersey 10", sans-serif;
}
body{
    background: rgb(2,0,36);
    background: radial-gradient(circle, rgba(2,0,36,1) 44%, rgba(18,9,121,1) 79%, rgba(3,0,255,1) 93%);
}
    </style>
</head>
<body>
    <form action="addProduct.php" method="post">
       <div>
        <label for="">Product Name</label><br>
        <input type="text" name="productname">
       </div>
       <div>
        <label for="">Product Description</label><br>
        <textarea name="ProductDescription" id="" cols="30" rows="10"></textarea>
       </div>
       <div>
        <label for="">Product Price</label><br>
        <input type="text" name="ProductPrice">
       </div>
       <div>
        <label for="">Product category</label><br>
        <input type="text" name="Productcategory">
       </div>
       <div>
        <label for="">Product image</label><br>
        <input type="text" name="Productimage">
       </div>
       <div>
        <label for="">stock</label><br>
        <input type="number" name="stock">
       </div>
       <div>
        
        <input type="submit" name="submit">
       </div>
    </form>
</body>
</html>