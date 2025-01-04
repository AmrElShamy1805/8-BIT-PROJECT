<?php
    session_start();
    include("conn.php");
    //CHECKING USER'S CREDIT CARD INFORMATION
    if(isset($_POST['CC'])){
        $CC=$_POST['CC'];
        if(isset($_SESSION['id'])){
            $id=$_SESSION['id'];
            $sql="SELECT * FROM User WHERE id='$id'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $CCCUSER= $row["CC"];
        }
    }
    //CHECKING IF THE ONE THEY ENTERED IS EQUAL TO THE ONE IN THE DATABASE
    if($CCCUSER==$CC){
        $sql="SELECT * FROM cart WHERE User_id='$id'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $UserCart=$row['cart_id'];
        CreateOrderDescription($UserCart,$id,$conn);
        
        $sql="DELETE FROM cartitems WHERE Cart_id='$UserCart'";
        mysqli_query($conn,$sql);
        $conn->close();
        
        header("Location:cart(access).php?message=ORDER COMPLETE");
        exit();
    }
    else{
        header("Location:cart(access).php?message=FAILED TO COMPLETE OPERATION , INVALID CREDIT CARD INFORMATION");
        exit();
    }
    //THIS FUNCTION GENERATES THE ORDER DESCRIPITION FOR THE USER IN ORDER TO STORE IT IN THE DATABASE
    function CreateOrderDescription($UserCart,$id,$conn){
        //GETTING ALL OF THE USER'S CART ITEM PRODUCT DETAILS FROM THE DATABASE
        $sql="SELECT products.* , cartitems.Quantity FROM products INNER JOIN cartitems ON products.id=cartitems.Product_id AND cartitems.Cart_id='$UserCart'";
        $result=mysqli_query($conn,$sql);
        $orderdesc="";
        $ordertotal=0;
        if(mysqli_num_rows($result)>0){
            while( $row=mysqli_fetch_assoc($result) ){
                
                $productname=$row["productname"];
                if(isset($row['Discount'])&&!empty( $row['Discount']))
                {
                    $productprice=$row['price']-($row['price']*$row['Discount']/100);
                }
                else{
                    $productprice=$row["price"];
                }
                if(isset($_GET['promocode'])&&!empty($_GET['promocode'])){
                    $promocode = $_GET['promocode'];
                }
                $Quantity= $row["Quantity"];
                $stock=$row['stock']-$Quantity;
                $productid=$row['id'];
                //UPDATE THE PRODUCT'S STOCKS AFTER THE PURCHASE/ORDER OCCURS
                $sql= "UPDATE products SET stock='$stock' WHERE id='$productid'";
                mysqli_query($conn,$sql);
                $producttotal=$productprice*$Quantity;
                $ordertotal+=$producttotal;
                $orderdesc=$orderdesc."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$productname&nbsp&nbsp&nbsp&nbspx$Quantity&nbsp&nbsp&nbsp&nbsp$producttotal<br><br>";

            }
        }
        if($promocode=='8-BIT'){
            $ordertotal=$ordertotal-($ordertotal*5/100);
        }
        $sql="INSERT INTO UserOrder (OrderDesc,user_id,Total) VALUES ('$orderdesc','$id','$ordertotal')";
        mysqli_query($conn,$sql);
        
       

        

    }
   
    
?>