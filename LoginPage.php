<html>
    <head>
        <title>Login</title>
        <link rel="icon" type="image/x-icon" href="IMAGES\Animation.gif"/>
        <link rel="stylesheet" href="CSS/LoginPage.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
    </head>
    <body>
        <div  class="MainBody" id="jersey-10-regular">
            <form action="LOGINPROCESSING.php" method="post" target="">
                <p class="form-login">LOGIN</p>
                <img src="IMAGES/Animation.gif" alt="animation" class="gif"/>
                <div class="ERROR">
                    <?php if(isset($_GET['error'])){ ?>
                    <p><?php echo $_GET['error'] ?></p>
                    <?php } ?>
                </div>
                <br>
                <div class="input">
                    <input type="email" name="Email" placeholder="Enter your Email"/>
                </div>
                <div class="input">
                    <input type="password" name="Password" placeholder="Enter your Password"/>
                </div>
                <button id="jersey-10-regular" class="button" type="submit">Login</button>
                <div class="SIGNUP">
                    <p>Dont have an Account? <a href="SignUpPage.php">SIGN-UP</a></p>
                </div>
            </form>
        </div>
    </body>
</html>