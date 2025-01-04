<html>
    <head>
        <title>Sign-up</title>
        <link rel="icon" type="image/x-icon" href="IMAGES\Animation.gif"/>
        <link rel="stylesheet" href="CSS/SignUp.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
    </head>
    <body>
        <div  class="MainBody" id="jersey-10-regular">
            <form action="SIGNUPPROCESSING.php" method="post" target="">
                <p class="form-login">SIGN-UP</p>
                <img src="IMAGES/Animation.gif" alt="animation" class="gif"/>
                <?php if(isset($_GET['error'])){?>
                    <p style="color:red;text-align:center;font-size:24;"><?php echo $_GET['error'] ?></p><!-- comment -->
                <?php } ?>
               <table>
                <tr>
                    <td>
                        <div class="input">
                            <input type="text" name="fName" placeholder="Enter your firstname" />
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <input type="text" name="lName" placeholder="Enter your lastname" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                    <div class="input">
                            <input type="text" name="UserName" placeholder="Enter your Username" />
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <input type="text" name="profilepic" placeholder="Enter PFP URL"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <div class="input">
                            <input type="email" name="Email" placeholder="Enter your Email" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input">
                            <input type="password" name="Password" placeholder="Enter your Password" />
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <input type="password" name="ConfirmPassword" placeholder="Confirm Password" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input">
                            <input type="text" name="Country" placeholder="Country"/>
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <input type="text" name="State" placeholder="State"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="input">
                            <input type="text" name="Address" placeholder="Address"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="input">
                            <input type="tel" name="telephone" placeholder="Full phonenumber"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="input">
                            <input type="text" name="CC" placeholder="Credit Card"/>
                        </div>
                    </td>
                </tr>
               </table>
               <button id="jersey-10-regular" class="button" type="submit">SIGN UP</button>
            </form>
            <div class="SIGNUP">
                    <p class="anchor">Already have an account? <a href="LoginPage.php">Login</a></p>
            </div>
        </div>
    </body>
</html>
