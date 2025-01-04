<?php
session_start();
include('conn.php'); 

// Initialize $cart as an empty array
$cart = [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS\cart.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8-bit</title>
    <link rel="icon" type="icon/x-icon" href="IMAGES/Animation.gif"/>
    <style>
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
.img{
    width:60px;
    height:60px;
}
    </style>
</head>
<body>

<div class="table">
    <div class="table_section">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            // Check if $_SESSION['cart'] is set before assigning it to $cart
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                foreach ($cart as $key => $value) {
                    $sql = "SELECT * from products where id=$key";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $price = $row['price'];
                    if (isset($row['Discount']) && !empty($row['Discount'])) {
                        $price = $row['price'] - ($row['price'] * $row['Discount'] / 100);
                    }
                    ?>
                    <tr class="col">
                        <td><img src="<?php echo $row['productimage'] ?>" class="img"/></td>
                        <td><a href="ViewProduct.php?id=<?php echo $row['id'] ?>"><?php echo $row['productname'] ?></a></td>
                        <td><?php echo $price ?></td>
                        <td><?php echo $value['quantity'] ?></td>
                        <td><?php echo $price * $value['quantity'] ?></td>
                        <td><a href="deleteCart(noaccess).php?id=<?php echo $key; ?>"><button class="remove">Remove</button></a></td>
                    </tr>
                    <?php
                    $total = $total + ($price * $value['quantity']);
                }
            }
            ?>
            </tbody>
        </table>
        <br>
        <div class="Check">
            <h1 style="color:white;text-align:center;">YOU MUST LOGIN/SIGN-UP BEFORE CHECKING OUT!</h1>
            <a href="MainPage.php"><button class="Checkout"><span >Shopping</span></button></a>
        </div>
    </div>
</div>

<br>
<div class="table">
    <div class="table_section">
        <table>
            <thead>
                <tr>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col">Total Amount: <?php echo $total ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
