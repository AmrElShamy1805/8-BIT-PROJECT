<?php

session_start();
include('../conn.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('location: adminlogin.php');
}
 if(isset($_GET['id'])){
  $id=$_GET['id'];
    $sql="DELETE FROM products where id='$id'";
    $result=mysqli_query($conn,$sql);
    header('location: viewproduct.php');
 }
?>