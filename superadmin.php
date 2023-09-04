<?php
require_once "db_connect.php";

session_start();

if(!isset($_SESSION["superadm"])){
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="superadmin.css">
</head>
<body>
    <form method="post" id="form">
        <input type="text" id="search" name="search">
    </form>

    <hr>

    <div class="user-container">
        <div class="user card">
            <div class="left">
                <div class="picture" style="background-image: url('profile_pictures/<?=$user_profile_picture?>')"></div>
                <p class="fname"><?=$user_fname?></p>
                <p class="lname"><?=$user_lname?></p>
            </div>
            <div class="right">
                <form method="post"></form>
            </div>
        </div>
    </div>
    
</body>
</html>