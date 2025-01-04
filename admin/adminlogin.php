<?php
session_start();
include('../conn.php');
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT *from admin_data where email='$email' and password='$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $_SESSION['email']=$email;
        header('location: index.php');
    }else{
        echo "incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <style>
    </style>
</head>
<body>
<form  method="post">
    <h1>Admin Login</h1>
    <label for="">Email :</label>
    <input type="text" name="email">
    <br>
    <label for="">Password :</label>
    <input type="password" name="password">
    <br>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>