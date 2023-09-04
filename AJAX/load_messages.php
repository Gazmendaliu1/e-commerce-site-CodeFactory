<?php
require_once "../db_connect.php";

session_start();


if(isset($_SESSION["user"])){
    $user_id = $_SESSION["user"];
    
    $card_message = "";
    
    $sql_conversation = "SELECT * FROM `conversation` WHERE `user_id` = '$user_id' AND `status` = 'open'";
    $result_conversation = mysqli_query($connect, $sql_conversation);
    $row_conversation = mysqli_fetch_assoc($result_conversation);
    
    if(mysqli_num_rows($result_conversation) > 0){
        
        $conversation_id = $row_conversation["id"];
        
        $sql_messages = "SELECT * FROM `messages` WHERE `conversation_id` = '$conversation_id'";
        $result_messages = mysqli_query($connect, $sql_messages);
        
        
        while($row_messages = mysqli_fetch_assoc($result_messages)){

            $message = $row_messages["message"];
            $admin_id = $row_messages["user_id"];
            $time = $row_messages["message_time"];
            
            if($row_messages["user_id"] != $user_id){
                
                $sql_admin_name = "SELECT * FROM `users` WHERE `id` = '$admin_id'";
                $result_admin_name = mysqli_query($connect, $sql_admin_name);
                $row_admin_name = mysqli_fetch_assoc($result_admin_name);
                $admin_name = $row_admin_name["FirstName"];
                
                $card_message .= "<div class='message-container2'>
                <div class='message2'>
                <div class='message-top'>
                <p class='name'>- $admin_name -</p>
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
    }

    echo $card_message;
    
}else{
    echo "<div class='login-container'>
    <div class='card'>
        <p>Log in to chat</p>
        <a href='login.php'>Log in</a>
    </div>
</div>";
}