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

