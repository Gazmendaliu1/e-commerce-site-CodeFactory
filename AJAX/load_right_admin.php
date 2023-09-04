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

    $sql_current_conversation = "SELECT * FROM `conversation` WHERE `user_id` = '$selected_user_id' AND `status` = 'open'";
    $result_current_conversation = mysqli_query($connect, $sql_current_conversation);
    $row_current_conversation = mysqli_fetch_assoc($result_current_conversation);
    $current_conversation_id = $row_current_conversation["id"];

    $sql_load_messages = "SELECT * FROM `messages` WHERE `conversation_id` = '$current_conversation_id'";
    $result_load_messages = mysqli_query($connect, $sql_load_messages);

    $card_message = "";
    // $bug_fix_con_id = $current_conversation_id;

    while($row_load_messages = mysqli_fetch_assoc($result_load_messages)){

            $message = $row_load_messages["message"];
            $users_id = $row_load_messages["user_id"];
            $time = $row_load_messages["message_time"];
            
            if($row_load_messages["user_id"] != $admin_id){
                
                $card_message .= "<div class='message-container2'>
                <div class='message2'>
                <div class='message-top'>
                <p class='name'>- $selected_user_fname $selected_user_lname -</p>
                </div>
                <div class='message-middle'>
                <p class='message-text'>$message
                </p>
                </div>
                <div class='message-bottom'>
                <p class='date'>$time</p>
                </div>
                </div>
                </div>";
            }else{
                $card_message .= "<div class='message-container'>
                <div class='message'>
                <div class='message-top'>
                <p class='name'>- you -</p>
                </div>
                <div class='message-middle'>
                <p class='message-text'>$message
                </p>
                </div>
                <div class='message-bottom'>
                <p class='date'>$time</p>
                </div>
                </div>
                </div>";
            }
    }


    $right = "<div class='header'>
    <img src='profile_pictures/$selected_user_picture' alt='users profile-picture'>
    <p class='user-name'>$selected_user_fname $selected_user_lname</p>
    <img id='open-slideout' src='icons/arrow-down.png' alt='open slideout menu'>
    <img id='open-slideout2' src='icons/arrow-down.png' alt='open slideout menu'>
</div>

<div class='middle scroll' id='middle'>$card_message</div>

<div class='bottom'>
    <form method='post' id='message-form'>
        <textarea name='message' class='message' cols='30' rows='3' id='message' placeholder='Your message...'></textarea>
        <input name='id_holder' id='selected-user-id' value='$selected_user_id' style='display: none;'>
        <button type='submit' name='send' class='send'><img src='icons/send.png' alt='Send message'></button>
    </form>
</div>";
}
// echo json_encode(["right"=> $right, "msg" => $card_message]);
echo $right;