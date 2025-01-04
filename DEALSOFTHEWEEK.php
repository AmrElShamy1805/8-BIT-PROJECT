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
<html>
    <head>
        <title>8-bit</title>
        <link rel="icon" type="image/x-icon" href="IMAGES\Animation.gif"/>
        <link rel="stylesheet" href="CSS\mainpage.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">  
                <header class="header">
                        <div>
                                <a class="anchor" href="StartingPage.php"><h2 class="titleofproj">8-bit</h2></a>
                                <a class="logo" href="StartingPage.php"><img src="images/Animation.gif" alt="8-bit" width="25px" height="25px"></a>
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
                <div class="MainContent">
                        <div class="Marquee">
                                <marquee>DEALS RANGE FROM 5% TO 25% OFF</marquee>
                        </div>
                        <div class="FeaturedProductsTitle">
                                <h1>FEATURED DEALS</h1>
                        </div>
                        <div class="Featuredproducts">
                                <div class="card-container">
                                        <?php
                                        $servername = "localhost";
                                        $username="root";
                                        $password="";
                                        $db="Project";
                                        $conn = new mysqli($servername,$username,$password,$db);
                                        if($conn->connect_error){
                                                die("Connection failed: " . $conn->connect_error);
                                                }
                                                // SQL query to fetch product data
                                                $sql = "SELECT * FROM products WHERE Discount>0";
                                                $result = mysqli_query($conn,$sql);
                                                // Generate a card for each product
                                                if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                ?>
                                                                <div class="card">
                                                                        <a class="anchor" href="ViewProduct.php?id=<?php echo $row['id']?>">
                                                                                <img class="card-image" src="<?php echo $row['productimage']; ?>" alt="<?php echo $row['productname']; ?>">
                                                                                <div class="card-content"> 
                                                                                <?php
                                                                                $productid=$row['id']; 
                                                                                if(isset($row['Discount'])&&!empty($row['Discount'])){
                                                                                    $price = $row['price']-($row['price']*($row['Discount'])/100);

                                                                                }
                                                                                else{
                                                                                    $price = $row['price'];
                                                                                } 
                                                                                ?>               
                                                                                <div class="card-price"><?php echo $price ?> EGP</div>
                                                                                <div class="card-title"><?php echo $row['productname']; ?></div>
                                                                                <?php
                                                                                        if($row['stock']==0){
                                                                                                $stock="OUT OF STOCK";
                                                                                        }
                                                                                        else{
                                                                                                $prodstock=$row['stock'];
                                                                                                $stock="In Stock: $prodstock";
                                                                                        }
                                                                                        
                                                                                ?>
                                                                                <div class="Product-stock"><?php echo $stock?></div>
                                                                                </div>
                                                                    
                                                                        </a>
                                                                </div>
                                                <?php
                                                        }
                                                } else {
                                                        echo "No products found";
                                                }
                                                 $conn->close();
                                        ?>
                                </div>
                        </div>
                        <div class="Deal-of-the-week">
                                <div class="Deal-of-the-week-title">
                                        <h3>DEALS OF THE WEEK!</h3>
                                </div>
                                <div class="Deal-of-the-week-desc">
                                        <p>VIEW THE ULTIMATE COLLECTION OF TECH WITH THE BEST DEALS THIS WEEK!</p>
                                </div>
                                <div class="Visit-deal-of-the-week">
                                        <button>
                                                <a class="anchor" href="DEALSOFTHEWEEK.php" style="color: black;"> 
                                                        <span class="box">
                                                                Visit Now
                                                                <img src="IMAGES/STARGIF.gif" class="stargif"/>
                                                        </span>
                                                </a>
                                        </button>
                                </div>
                                <div class="GIFLEFT">
                                        <img src="IMAGES/LAPTOPGIF.gif" class="Laptopgif"/>
                                </div>
                                <div class="GIFRIGHT">
                                        <img src="IMAGES/PHONEGIF.gif" class="phonegif"/>
                                </div>

                        </div>
                </div>
                <footer class="footer">
                        <div class="Contactus">
                                <h1>CONTACT US!</h1>
                        </div>
                </footer>
        </div>  
    </body>
</html>