 <?php
    session_start();
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    include("conn.php");
    if(isset($_SESSION['id'])){
        $uid= $_SESSION['id'];
    }
    $sql="SELECT * FROM cart WHERE User_id='$uid'";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $cartid= $row["cart_id"];
    $sql="DELETE FROM cartitems WHERE CartItem_id='$id'";
    mysqli_query($conn, $sql);
    $conn->close();
    header("Location:cart(access).php");