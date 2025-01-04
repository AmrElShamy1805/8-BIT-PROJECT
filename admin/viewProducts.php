<?php
session_start();
include('../conn.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email'])){
    header('location: adminlogin.php');
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
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
body{
    background: rgb(2,0,36);
    background: radial-gradient(circle, rgba(2,0,36,1) 44%, rgba(18,9,121,1) 79%, rgba(3,0,255,1) 93%);
    font-family: 'Poppins',sans-serif;
}
.table_section{
    height: 650px;
    overflow: auto;

}
table{
    width: 100%;
    table-layout: fixed;
    min-width: 1000px;
    border-collapse: collapse;
}
thead th{
    position: sticky;
    top: 0;
    background-color: #f6f9fc;
    color: #8493a5;
    font-size: 15px;
}
th,td{
    border-bottom: 1px solid #dddddd;
    padding: 10px 20px;
    word-break: break-all;
    text-align: center;
}
.col{
  color: #dddddd;
}
.img{
  height: 60px;
  width: 60px;
  object-fit: cover;
  border-radius: 15px;
  border: 5px solid #ced0d2;
}
tr:hover td{
  color: #0298cf;
  cursor: pointer;
  background-color: #f6f9fc;
}
.remove {
  padding: 15px 30px;
  font-size: 18px;
  outline: none;
  border: none;
  border-radius: 10px;
  transition: 0.5s;
  background: #1e1e1e;
  cursor: pointer;
  color: greenyellow;
  box-shadow: 0 0 10px #363636, inset 0 0 10px #363636;
}

.remove:hover {
  animation: a 0.5s 1 linear;
}

@keyframes a {
  0% {
    transform: scale(0.7, 1.3);
  }

  25% {
    transform: scale(1.3, 0.7);
  }

  50% {
    transform: scale(0.7, 1.3);
  }

  75% {
    transform: scale(1.3, 0.7);
  }

  100% {
    transform: scale(1, 1);
  }
  
}
.Checkout {
  background: #fff;
  border: none;
  padding: 10px 20px;
  display: inline-block;
  font-size: 15px;
  font-weight: 600;
  width: 120px;
  text-transform: uppercase;
  cursor: pointer;
  transform: skew(-21deg);
}

span {
  display: inline-block;
  transform: skew(21deg);
}
.img{
  width:60px;
  height:60px;
}
.Checkout::before {
  content: '';
  position: absolute;
  top: 0;
  bottom: 0;
  right: 100%;
  left: 0;
  background: rgb(20, 20, 20);
  opacity: 0;
  z-index: -1;
  transition: all 0.5s;
}

.Checkout:hover {
  color: #fff;
}

.Checkout:hover::before {
  left: 0;
  right: 0;
  opacity: 1;
}
.Check{
  margin-left: 650px;
}
    </style>
</head>
<body>
<div class="table">
         <div class="table_section">
             <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $sql="SELECT*from products";
                  $result=mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                      ?>
                    <tr class="col">
                        <td><?php echo $row['productname']?></td>
                        <td><?php echo $row['category']?></td>
                        <td><img class="img" src="<?php echo $row['productimage']?>"></td>
                        <td><a href="delproduct.php?id=<?php echo $row['id']?>">Delete</a></td>
                    </tr>
                      <?php
                    }
                  }
                  ?>
                   
                </tbody>
             </table>
</body>
</html>