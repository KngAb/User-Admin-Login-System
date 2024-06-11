<?php
session_start();
if(!isset($_SESSION["username"])){
    header('location:index.html');
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
    <h1>THIS IS THE USER HOME PAGE</h1><?php echo  $_SESSION["username"] ?>

    <a href="index.html">Logout</a>
</body>
</html>
