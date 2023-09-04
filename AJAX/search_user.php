<?php
require_once "../db_connect.php";
session_start();

$admin_id = $_SESSION["adm"];
$value = $_GET["x"];

$sql_open_conversations = "SELECT * FROM `conversation` WHERE `status` like 'open' AND `admin_id` IS NULL OR `admin_id` = '$admin_id' AND `status` = 'open'";
$result_open_conversations = mysqli_query($connect, $sql_open_conversations);
    
    if(mysqli_num_rows($result_open_conversations) > 0){

        $user = "";
        while($row_open_conversations = mysqli_fetch_assoc($result_open_conversations)){
            $open_conversations_user_id = $row_open_conversations["user_id"];
            
            $sql_users = "SELECT * FROM `users` WHERE `id` = '$open_conversations_user_id' AND `FirstName` LIKE '$value%' OR `id` = '$open_conversations_user_id' AND `LastName` LIKE '$value%'";
            $result_users = mysqli_query($connect, $sql_users);
            if(mysqli_num_rows($result_users) > 0){

                $row_users = mysqli_fetch_assoc($result_users);
                
                $users_picture = $row_users["picture"];
                $users_fname = $row_users["FirstName"];
                $users_lname = $row_users["LastName"];
                $users_id = $row_users["id"];
                
                $user .= "
                <div class='user'>
                <form method='post'>
                <input type='text' value='$users_id' name='user_id' class='user_id'>
                <button type='submit' name='user' class='user-name-button'>
                <img class='user-profile-picture' src='profile_pictures/$users_picture' alt='users profile picture'>
                <p class='user-name'>$users_fname $users_lname</p>
                </button>
                </form>
                </div>";

            }
        }
    }else{
        $user = "<p style='text-align: center;'>No results found</p>";
    }
    
    
echo $user;