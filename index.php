<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "user";

session_start();

$conn = mysqli_connect($servername,$user,$password,$dbname) or die('Error: unable to connect');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="SELECT * FROM login WHERE username='".$username."'AND password='".$password."'";

    $result=mysqli_query($conn,$sql);

    $row=mysqli_fetch_array($result);

    if($row['usertype']=="user"){
        $_SESSION["username"]=$username;
        header("location:userpanel.php");
    }
    elseif($row['usertype']=="admin"){
        $_SESSION["username"]=$username;

        header("location:adminpanel.php");
    }else{
        echo"username or password incorrect";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <h1>Login Form</h1>
    <br>
    <br>
    <br>
    <br>
    <div style="background-color: grey; width: 500px;">
    <br>
    <br>
    <form action='#' method="POST">
    <div>
        <label>username</label>
        <input type="text" name="username" require>
    </div>
    <br><br>
    <div>
        <label>password</label>
        <input type="password" name="password" require>
    </div>
    <br><br>
    <div>
        <input type="submit" value="Login">
    </div>
    </form>
    <br><br>
    </div>
    
</center>
</body>
</html>
