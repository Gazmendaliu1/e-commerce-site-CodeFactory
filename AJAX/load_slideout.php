<?php
require_once "../db_connect.php";

session_start();

$admin_id = $_SESSION["adm"];
$selected_user_id = $_GET["x"];


if(isset($_SESSION["adm"])){
    
    $sql_selected_user = "SELECT * FROM `users` WHERE `id` = '$selected_user_id'";
    $result_selected_user = mysqli_query($connect, $sql_selected_user);
    $row_selected_user = mysqli_fetch_assoc($result_selected_user);
    
    $selected_user_picture = $row_selected_user["picture"];
    $selected_user_fname = $row_selected_user["FirstName"];
    $selected_user_lname = $row_selected_user["LastName"];
    $selected_user_email = $row_selected_user["email"];
    // echo $selected_user_fname;
    // die();

   
}
// echo json_encode(["right"=> $right, "msg" => $card_message]);
echo "<img class='user-profile-picture' src='profile_pictures/$selected_user_picture' alt='users profile picture'>
    <p class='first-name'>First name:<br><span>$selected_user_fname</span></p>
    <p class='last-name'>Last name:<br><span>$selected_user_lname</span></p>
    <p class='email'>Email:<br><span>$selected_user_email</span></p>
    <p class='id'>User ID:<br><span id='slideout-id'>$selected_user_id</span></p>";