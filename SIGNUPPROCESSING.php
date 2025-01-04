<?php 
    session_start();
    $servername = "localhost";
    $username="root";
    $password="";
    $db="Project";
    $conn = new mysqli($servername,$username,$password,$db);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    //Check if inputs are not empty
   
    if(isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['UserName']) && isset($_POST['Password']) && isset($_POST['ConfirmPassword']) && isset($_POST['Email']) && isset($_POST['CC']) && isset($_POST['Country']) && isset($_POST['State']) && isset($_POST['Address']) && isset($_POST['telephone']) ){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    $fname = validate($_POST['fName']);
    $lname = validate($_POST['lName']);
    $uname = validate($_POST['UserName']);
    $password = validate($_POST['Password']);
    $confirm_password = validate($_POST['ConfirmPassword']);
    $email = validate($_POST['Email']);
    $profilepic=$_POST['profilepic'];
    $Country = validate($_POST['Country']);
    $State = validate($_POST['State']);
    $Address = validate($_POST['Address']);
    $Telephone = validate($_POST['telephone']);
    $CC = validate($_POST['CC']);
    $needle = " ";
    
    if(empty($fname)){
        header("Location:SignUpPage.php?error=FIRSTNAME IS REQUIRED!");
        exit();
    }
    else if(empty($lname)){
        header("Location:SignUpPage.php?error=LASTNAME IS REQUIRED!");
        exit();
    }
    else if(empty($uname)){
        header("Location:SignUpPage.php?error=USERNAME IS REQUIRED!");
        exit();
    }
    else if(empty($email)){
        header("Location:SignUpPage.php?error=EMAIL IS REQUIRED");
        exit();
    }
    else if(empty($password)){
        header("Location:SignUpPage.php?error=PASSWORD IS REQUIRED!");
        exit();
    }
    else if(empty($confirm_password)){
        header("Location:SignUpPage.php?error=YOU MUST CONFIRM YOUR PASSWORD!");
        exit();  
    }
    else if(empty($Country)){
        header("Location:SignUpPage.php?error=YOU MUST ENTER YOUR COUNTRY!");
        exit();  
    }
    else if(empty($State)){
        header("Location:SignUpPage.php?error=YOU MUST ENTER YOUR STATE!");
        exit();  
    }
    else if(empty($Address)){
        header("Location:SignUpPage.php?error=YOU MUST ENTER YOUR ADDRESS!");
        exit();  
    }
    else if(empty($Telephone)){
        header("Location:SignUpPage.php?error=YOU MUST ENTER YOUR PHONE NUMBER!");
        exit();  
    }
    else if(empty($CC)){
        header("Location:SignUpPage.php?error=YOU MUST ENTER YOUR CREDIT CARD INFO!");
        exit();  
    }
    //------------------------------------------------------------------------------------------------
    if(strlen($password)<8){
        header("Location:SignUpPage.php?error=THE PASSWORD MUST HAVE MORE THAN 8 CHARACTERS!");
        exit();
    }
    else if(strpos($password,$needle)!== false){
        header("Location:SignUpPage.php?error=THE PASSWORD CANNOT CONTAIN SPACES!");
        exit();
    }
    //------------------------------------------------------------------------------------------------
    if($password!=$confirm_password){
        header("Location:SignUpPage.php?error=THE PASSWORD YOU ENTERED DOES NOT MATCH THE ONE YOU WROTE!");
        exit();
    }
    //------------------------------------------------------------------------------------------------
    $sql = "SELECT * FROM User WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1){
        header("Location:SignUpPage.php?error=THE EMAIL YOU ARE USING IS CURRENTLY BEING USED FOR ANOTHER ACCOUNT!");
        exit();
    }
    else{
        $Insertsql = "INSERT INTO User(firstname,lastname,email,password,username,profilepic,country,State,CC,Address,PhoneNum) VALUES ('$fname','$lname','$email','$password','$uname','$profilepic','$Country','$State','$CC','$Address','$Telephone') ";
        if(mysqli_query($conn, $Insertsql)){
            echo("Successful Sign up!");
            $uid=$conn->insert_id;
            $_SESSION['id']= $uid;
            $_SESSION['firstname']=$fname;
            $_SESSION['lastname']=$lname;
            $_SESSION['email']=$email;
            $_SESSION['username']=$uname;
            $_SESSION['password']=$password;
            $_SESSION['profilepic']=$profilepic;
            $_SESSION['country']=$Country;
            $_SESSION['State']=$State;
            $_SESSION['CC']=$CC;
            $_SESSION['Address']=$Address;
            $_SESSION['PhoneNum']=$Telephone;
            $Insertsql="INSERT INTO cart (User_id) VALUES ('$uid')";
            mysqli_query($conn, $Insertsql);
            header("Location:MainPage.php");
            exit();   
        }
        
    }
    $conn->close();

