<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $servername = "localhost";
            $username="root";
            $password="";
            $conn = new mysqli($servername,$username,$password);
            if($conn->connect_error){
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "CREATE DATABASE Project";
            if($conn->query($sql) == TRUE){
                echo("Project database has been successfully created");
            }
            else{
                echo("Error creating database");
            }
            $close = $conn->close();
        ?>
    </body>
</html>


