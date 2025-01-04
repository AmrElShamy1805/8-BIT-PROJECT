<?php
        session_start();
        if(isset($_SESSION['username'])&&isset( $_SESSION['password'])&&isset($_SESSION['firstname'])&&isset($_SESSION['lastname'])&&isset($_SESSION['email'])&&isset($_SESSION['profilepic'])&&isset($_SESSION['country'])&&isset($_SESSION['State'])&&isset($_SESSION['CC'])&&isset($_SESSION['Address'])&&isset($_SESSION['PhoneNum'])){

                $uname= $_SESSION['username'];
                $pass= $_SESSION['password'];
                $email= $_SESSION['email'];
                $fname=$_SESSION['firstname'];
                $lname=$_SESSION['lastname'];
                $profilepic=$_SESSION['profilepic'];
                $country=$_SESSION['country'];
                $State=$_SESSION['State'];
                $PhoneNum = $_SESSION['PhoneNum'];
                $Address=$_SESSION['Address'];
        }
        
?>
<html>
    <head>
        <title>8-bit</title>
        <link rel="icon" type="image/x-icon" href="IMAGES\Animation.gif"/>
        <link rel="stylesheet" href="CSS\UserOptions.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="MainBody">
            <div class="PROFILE">
                <h1>PROFILE</h1>
            </div>
            <div class="Profilepic">
                <img src="<?php echo $profilepic ?>" class="pfp"/>
            </div>
            <div class="UserInfo">
                <table border="1" class="UserInfoTable" >
                    <tr>
                        <td>USER ID</td>
                        <td><?php echo $_SESSION['id'] ?></td>
                    </tr>
                    <tr>
                        <td>FULL NAME</td>
                        <td><?php echo $fname." ".$lname?></td>
                    </tr>
                    <tr>
                            <td>USER NAME</td>
                            <td><?php echo $uname?></td>
                     </tr>
                     <tr>
                        <td>Email</td>
                        <td><?php echo $email?></td>
                     </tr>
                     <tr>
                        <td>Country</td>
                        <td><?php echo $country?></td>
                     </tr>
                     <tr>
                        <td>State</td>
                        <td><?php echo $State?></td>
                     </tr>
                     <tr>
                        <td>Phone Number</td>
                        <td><?php echo $PhoneNum?></td>
                     </tr>
                     <tr>
                        <td>Address</td>
                        <td><?php echo $Address?></td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <h1 class="PURCHASE-HISTORY">PURCHASE HISTORY</h1>
            <?php
                include("conn.php");
                $id=$_SESSION['id'];
                $sql="SELECT * FROM UserOrder WHERE user_id='$id'";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)> 0){
                    echo('<table border="1" class="OrderInfoTable">');
                    echo('<tr>');
                    echo('<td>ORDER ID</td>');
                    echo('<td>ORDER DESCRIPTION</td>');
                    echo(' <td>USER ID</td>');
                    echo('<td>TOTAL</td>');
                    echo('</tr>');
                    while($row=mysqli_fetch_array($result)){
                        $userid= $row["user_id"];
                        $orderdesc=$row['OrderDesc'];
                        $order_id= $row['Order_id'];
                        $Total= $row["Total"];
                
            ?>
            <tr>
                <td><?php echo $order_id?></td>
                <td><?php echo $orderdesc?></td>
                <td><?php echo $userid?></td>
                <td><?php echo $Total?></td>
            </tr>
            <?php   }
                ?>
            </table>
            <?php }else{
                echo("<h1 class='NO-PURCHASES'>LOOKS LIKE YOU HAVEN'T PURCHASED ANYTHING YET!</h1>");
            }
                ?>

            
            <div class="LOGOUT">
                <button class="button">
                    <a href="Logout.php"><h1>Logout</h1></a>
                </button>
            </div>
        </div>
    </body>
</html>