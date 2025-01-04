<?php
        session_start();
        if(isset($_SESSION['username'])&&isset( $_SESSION['password'])&&isset($_SESSION['firstname'])&&isset($_SESSION['lastname'])&&isset($_SESSION['email'])&&isset($_SESSION['profilepic'])){

                $uname= $_SESSION['username'];
                $pass= $_SESSION['password'];
                $email= $_SESSION['email'];
                $fname=$_SESSION['firstname'];
                $lname=$_SESSION['lastname'];
                $profilepic=$_SESSION['profilepic'];
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>8-bit</title>
    <link rel="icon" type="image/x-icon" href="images\Animation.gif"/>
    <link rel="stylesheet" href="CSS/ViewCatagory.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>
<body class="body">
    <div class="container">
        <header class="header">
            <div class="name">
                <a class="anchor" href="StartingPage.php">
                    <h3 class="titleofproj">8-bit</h3>
                    <img src="IMAGES/Animation.gif" alt="animation" class="gif"/>
                </a>
            </div>
            <div>
                <ul class="nav-links">
                    <li><a class="anchor" href="ViewComputer.php"><h3 class="oswald">Computer</h3></a></li>
                    <li><a class="anchor" href="ViewPhones.php"><h3 class="oswald">Mobile Phones</h3></a></li>
                    <li><a class="anchor" href="ViewConsoles.php"><h3 class="oswald">Consoles</h3></a></li>
                    <li><a class="anchor" href="ViewAccessories.php"><h3 class="oswald">Accessories</h3></a></li>
                    <li>
                    <div class="container-input">
                                                <form action="SearchResults.php" method="GET">
                                                        <input type="text" placeholder="Search" name="Search" class="input">
                                                        <button type="submit">
                                                        <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">        
                                                                <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
                                                        </svg>
                                                        </button>
                                                </form>
                                        </div>                     
                    </li>  
                </ul>
            </div>
            <div>
                <ul class="right-nav">
                    <li class="userlogo">
                    <?php
                        if(empty($_SESSION['password'])&&empty($_SESSION['email'])){
                            $redirect="LoginPage.php";
                        }
                        else{
                            $redirect= "Useroptions.php";
                        }
                        if(empty($profilepic)){
                            $profilepic="IMAGES/USERLOGO.png";
                        }    
                    ?>
                    <a href="<?php echo $redirect ?>"><img src="<?php echo $profilepic?>" alt="User" class="profilepic"></a>
                    </li>
                    <?php 
                                $redirectcart="cart(noaccess).php";
                                if(isset($_SESSION['id'])){
                                    if(empty($_SESSION['id'])){
                                        $redirectcart="cart(noaccess).php";
                                    }else{
                                        $redirectcart= "cart(access).php";
                                    }
                                }
                                ?>
                                <li class="cart">
                                        <a href="<?php echo $redirectcart?>"><img src="images\Shoppingcart.png" alt="Cart" width="30px" height="30px"></a>
                                </li>
                </ul>
            </div> 
        </header>
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <a class="anchor" href="MainPage.php">Home</a>
                </li>
                <li> 
                    <strong class="anchor">Phones</strong>
                </li>
            </ul>
        </div>
        <div class="maincontent">
            <div class="my-product-title">
                <h1>
                    <span class="anchor">Phones</span>
                </h1>
            </div>
            <div class="ORDER-BY">
                <form action="ViewPhones.php" method="POST" target="_self">
                    <select name="sort">
                        <option value="DEFAULT">Sort by:default</option>
                        <option value="PriceIncrease">Sort by:Price->Increasing</option>
                        <option value="PriceDecrease">Sort by:Price->Decreasing</option>
                        <option value="AlphabeticalIncrease">Sort by:Alphabetical->Increasing</option>
                        <option value="AlphabeticalDecrease">Sort by:Alphabetical->Decreasing</option>
                    </select>
                    <input type="submit" value="SORT"/>
                </form>
            </div>
            <div class="space"></div>
            <div class="items">
            <?php
                // Database connection
                $servername = "localhost";
                $username="root";
                $password="";
                $db="Project";
                $conn = new mysqli($servername,$username,$password,$db);
                if($conn->connect_error){
                    die("Connection failed: " . $conn->connect_error);
                }
                // SQL query to fetch product data
                if(isset($_POST['sort'])){
                    $sortby=$_POST['sort'];
                    $sql = "SELECT * FROM products WHERE category='Phone'";
                    if($sortby=='DEFAULT'){
                        $sql = "SELECT * FROM products WHERE category='Phone'";
                    }
                    else if($sortby== "PriceIncrease"){
                        $sql = "SELECT * FROM products WHERE category='Phone' ORDER BY price ASC";
                    }
                    else if($sortby== "PriceDecrease"){
                        $sql = "SELECT * FROM products WHERE category='Phone' ORDER BY price DESC";
                    }
                    else if( $sortby== "AlphabeticalIncrease"){
                        $sql = "SELECT * FROM products WHERE category='Phone' ORDER BY productname ASC";
                    }
                    else if( $sortby== "AlphabeticalDecrease"){
                        $sql = "SELECT * FROM products WHERE category='Phone' ORDER BY productname DESC";
                    }

                }
                else{
                    $sql = "SELECT * FROM products WHERE category='Phone'";
                }
                $result = mysqli_query($conn,$sql);
                 // Generate a card for each product
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

             ?>
                 <div class="product-card">
                    <form action="addToCart.php" method="GET">
                    <a href="ViewProduct.php?id=<?php echo $row['id'];?>" class="anchor">
                    <img src="<?php echo $row['productimage'];?>" alt="<?php echo $row['productname'];?>" class="product-image">
                    <div class="product-details">
                        <h2 class="product-name"><?php echo $row['productname'];?></h2>
                        <?php if(isset($row['Discount'])&&!empty($row['Discount'])){
                            $discount = $row['Discount'];
                            $price = $row['price']-($row['price']*($discount/100));
                            $AFTERDISCOUNT="DISCOUNT ON PRODUCT $discount%";
                            ?>
                        <p class="product-price"><?php echo $AFTERDISCOUNT?></p>
                        <p class="product-price"><?php echo $price;?> EGP</p>
                        <?php }else{?>
                            <p class="product-price"><?php echo $row['price'];?> EGP</p>
                            <?php }?>
                        <?php
                            if($row['stock']==0){
                                $stock="OUT OF STOCK";
                        ?>
                        <p class="product-price"><?php echo $stock?></p>
                        <?php } 
                        
                            else{
                                $prodstock=$row['stock'];
                                $stock="IN STOCK:$prodstock";
                        ?>
                        <p class="product-price"><?php echo $stock?></p>
                    </a>
                        <input type="number" name="quantity" min="1" max="<?php echo $prodstock?>"/>
                        <div class="icons">
                            <button class="add-to-cart" type="submit"><img src="IMAGES/Shoppingcart.png"></button>
                        </div>
                        <?php
                    }
                    ?>
                        
                         
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    
                    </form>
                </div> 
                <?php
                    }
                        } 
                        else {
                         echo "No products found";
                        }

                            // Close connection
                            $conn->close();
                ?>               
            </div>
            <footer class="footer">
                        <div class="Contactus">
                                <h1>CONTACT US!</h1>
                        </div>
            </footer>
            
        </div>
    </div>
</body>
</html>