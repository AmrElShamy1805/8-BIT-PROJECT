<?php  
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "Project";
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if inputs are not empty
if (isset($_POST['Email']) && isset($_POST['Password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$Email = validate($_POST['Email']);
$Password = validate($_POST['Password']);
$Valid = true;

if (empty($Email)) {
    header("Location:LoginPage.php?error=EMAIL IS REQUIRED!");
    $Valid = false;
    exit();
} elseif (empty($Password)) {
    header("Location:LoginPage.php?error=PASSWORD IS REQUIRED!");
    $Valid = false;
    exit();
}

$sql = "SELECT * FROM User WHERE email='$Email' AND password='$Password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("Location:LoginPage.php?error=WRONG EMAIL OR PASSWORD!");
    exit();
} else {
   
    $row = mysqli_fetch_assoc($result);
    $uid = $conn->insert_id; 
    $_SESSION['id']=$row['id'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['profilepic'] = $row['profilepic'];
    $_SESSION['country'] = $row['country'];
    $_SESSION['State'] = $row['State'];
    $_SESSION['CC'] = $row['CC'];
    $_SESSION['PhoneNum'] = $row['PhoneNum'];
    $_SESSION['Address'] = $row['Address'];
    $conn->close();
    header("Location:MainPage.php");
    exit();
}
?>
