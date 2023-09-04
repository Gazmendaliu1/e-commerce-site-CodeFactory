<?php

require_once "../db_connect.php";

session_start();

$user_id = $_SESSION["user"];

if(isset($_POST["message"])){
    $message = $_POST["message"];

    if(!empty($message)){

        $sql_check_for_conversation = "SELECT * FROM `conversation` WHERE `user_id` = '$user_id' AND `status` = 'open'";
        $result_check_for_conversation = mysqli_query($connect, $sql_check_for_conversation);
        $row_check_for_conversation = mysqli_fetch_assoc($result_check_for_conversation);
        $check_for_conversation_id = $row_check_for_conversation["id"]; 

        if(mysqli_num_rows($result_check_for_conversation) > 0){
            
            $sql_new_message = "INSERT INTO `messages`(`message`, `conversation_id`, `user_id`) VALUES ('$message','$check_for_conversation_id','$user_id')";
            $result = mysqli_query($connect, $sql_new_message);

        }else{
            
            $sql_new_conversation = "INSERT INTO `conversation`(`user_id`, `status`) VALUES ('$user_id', 'open')";
            $result_new_conversation = mysqli_query($connect, $sql_new_conversation);

            $sql_find_new_conversation = "SELECT * FROM `conversation` WHERE `user_id` = '$user_id' AND `status` = 'open'";
            $result_find_new_conversation = mysqli_query($connect, $sql_find_new_conversation);
            $row_find_new_conversation = mysqli_fetch_assoc($result_find_new_conversation);
            $conversation_id = $row_find_new_conversation["id"];
            
            $sql_new_message = "INSERT INTO `messages`(`message`, `conversation_id`, `user_id`) VALUES ('$message','$conversation_id','$user_id')";
            $result_new_message = mysqli_query($connect, $sql_new_message);

        }
    }
}


