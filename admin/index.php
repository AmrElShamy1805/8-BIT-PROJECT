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
    <link rel="icon" type="icon/x-icon" href="IMAGES/Animation.gif"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jersey+10&display=swap');
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
.header{
    display: flex;
    width: 100%;
    height: 65px;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-image:linear-gradient(to left,blue,black);
    border-bottom: 2px solid rgb(0, 0, 0);
    box-shadow: 0px 0px 8px #444444ad;
}
.anchor{
    color: white;
    text-decoration: none;
}
.titleofproj{
    font-size:23px;
    width: 40px;
    display: inline-block;
}
.right-nav{
    list-style: none;
    display: flex;
    justify-content: space-between;
    width: 70%;
}
.right-nav:hover{
    color: #fff;
}
.nav-links{
    list-style: none;
    display: flex;
    justify-content: space-evenly;
    width: 100%;
    margin-right: 300px;
}
li{
    align-content:center;
}
.userlogo{
    margin-right: 20px;
   
}
.profilepic{
    width:30px;
    height:30px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius:30px;

}
.logo{
    height: 100%;
    width: 20px;
    position:absolute;
    display: inline-block;
    
}
.container-input {
    position: relative;
}
  
.input {
    width: 150px;
    padding: 10px 0px 10px 40px;
    border-radius: 9999px;
    border: solid 1px #333;
    transition: all .2s ease-in-out;
    outline: none;
    opacity: 0.8;
}
  
.container-input svg {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translate(0, -50%);
}
.input:focus {
    opacity: 1;
    width: 250px;
}
.oswald {
    font-family: "Oswald", sans-serif;
    font-optical-sizing: auto;
    font-weight: weight;
    font-style: normal;
    color: #e1e1e1;
    font-family: inherit;
    font-weight: 800;
    cursor: pointer;
    position: relative;
    border: none;
    background: none;
    text-transform: uppercase;
    transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
    transition-duration: 400ms;
    transition-property: color;
  }
.oswald:focus,
.oswald:hover{
    color: #fff;
}
.oswald:focus:after,
.oswald:hover:after {
   width: 100%;
   left: 0%;
}
.oswald:after {
    content: "";
    pointer-events: none;
    bottom: -2px;
    left: 50%;
    position: absolute;
    width: 0%;
    height: 2px;
    background-color: #fff;
    transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
    transition-duration: 400ms;
    transition-property: width, left;
}
.MainContent{
   min-height:calc(100vh-65px-75px);

}
.marquee{
   background-color:red;
   color:white;
   height:28px;
   font-weight:bold;
   font-size:26;
}
.FeaturedProductsTitle{
   color:white;
   text-align:center;
   font-size:28;
   font-weight:bold;
}

.card-container {
   display: flex;
   flex-wrap: wrap;
   justify-content: center;
   padding: 10px;
   margin-top:-15px;
   letter-spacing:1px;
}

.card {
   width: 200px;
   height: 300px;
   margin-top:290px;
   background-color:#4E4FEB;
   border-radius: 8px;
   box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
   margin: 10px;
   overflow: hidden;
   transition: transform 0.3s ease;
}

.card:hover {
   transform: translateY(-3px);
}

.card-image {
   width: 100%;
   height: 200px; 
   object-fit: cover;
   border-top-left-radius: 8px;
   border-top-right-radius: 8px;
   background-color: #068FFF;
}

.card-content {
   padding: 10px;
}

.card-title {
   font-size: 16px;
   font-weight:bold;
   margin-bottom: 6px;
}

.card-price {
   color: rgb(31, 0, 36);
   font-size: 14px;
   letter-spacing:1px;
   margin-top: 6px;
   font-weight:bold;
}
.Product-stock {
   color: rgb(31, 0, 36);
   font-size: 14px;
   margin-top: 6px;
   font-weight:bold;
}
.Deal-of-the-week {
   background-color:#FFFF;
   width:100%;
   height:250px;

}
.Deal-of-the-week-title{
   color:black;
   font-weight:bold;
   font-size:20px;
   text-align:center;
   position:relative;
   top:47%;
}
.Deal-of-the-week-desc{
   color:black;
   font-weight:bold;
   font-size:18px;
   text-align:center;
   position:relative;
   top:47%;
   
}
.box {
   width: 140px;
   height: auto;
   float: left;
   transition: .5s linear;
   position: relative;
   display: block;
   overflow: hidden;
   padding: 15px;
   text-align: center;
   margin: 0 5px;
   background: transparent;
   text-transform: uppercase;
   font-weight: 900;
   font-size:16px;
  }
  
  .box:before {
   position: absolute;
   content: '';
   left: 0;
   bottom: 0;
   height: 4px;
   width: 100%;
   border-bottom: 4px solid transparent;
   border-left: 4px solid transparent;
   box-sizing: border-box;
   transform: translateX(100%);
  }
  
  .box:after {
   position: absolute;
   content: '';
   top: 0;
   left: 0;
   width: 100%;
   height: 4px;
   border-top: 4px solid transparent;
   border-right: 4px solid transparent;
   box-sizing: border-box;
   transform: translateX(-100%);
  }
  
  .box:hover {
   box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
  }
  
  .box:hover:before {
   border-color: #262626;
   height: 100%;
   transform: translateX(0);
   transition: .3s transform linear, .3s height linear .3s;
  }
  
  .box:hover:after {
   border-color: #262626;
   height: 100%;
   transform: translateX(0);
   transition: .3s transform linear, .3s height linear .5s;
  }
  
  button {
   color: black;
   text-decoration: none;
   cursor: pointer;
   outline: none;
   border: none;
   background: transparent;
  }
  .Visit-deal-of-the-week{
   position:relative;
   top:50%;
   margin-left:45%;
  }
  .stargif{
   width:15px;
   height:auto;
  }
  .GIFLEFT{
   position:relative;
   top:2%;
   margin-left:20%;
   width:100px;
   height:100px;

  }
  .Laptopgif{
      width:200px;
      height:auto;
  }
  .GIFRIGHT{
   Position:relative;
   margin-left:65%;
   margin-top:-85px;
  }
  .phonegif{
   width:150px;
   height:auto;
  }
  .footer{
   width: 100%;
   height:75px;
   background-color:#333;
   position:absolute;
  }
  .Contactus{
   color:white;
   text-align:center;
  }
  
    </style>
</head>
<body>
<header class="header">
                        <div>
                                <a class="anchor" href="StartingPage.php"><h2 class="titleofproj">8-bit</h2></a>
                                <a class="logo" href="StartingPage.php"><img src="IMAGES/Animation.gif" alt="8-bit" width="25px" height="25px"></a>
                        </div>
                        <div>
                                <ul class="nav-links">
                                <li><a class="anchor" href="viewProducts.php"><h3 class="oswald">view Products</h3></a></li>
                                <li><a class="anchor" href="addProduct.php"><h3 class="oswald">add Product</h3></a></li>
         
                                
                                </ul>
                        </div>
                        <div>
                            <a href="adminlogin.php" alt="User" class="profilepic" style="color: white;">Login</a>
                            <a href="adminlogout.php" alt="User" class="profilepic" style="color: white;">Logout</a>
                            </div>  
                                
                                        
                </header>
                
                
</body>
</html>