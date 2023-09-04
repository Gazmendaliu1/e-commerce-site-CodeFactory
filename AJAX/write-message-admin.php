<?php

require_once "../db_connect.php";

session_start();

$user_id = $_SESSION["adm"];
$user_id_holder= $_GET["x"];
echo "number 1";
if(isset($_POST["message"])){
    $message = $_POST["message"];
    $admin_id = $_SESSION["adm"];
        // $user_id_holder = $_POST["id_holder"];

    $sql_bug_conversation = "SELECT * FROM `conversation` WHERE `user_id` = $user_id_holder AND `status` = 'open'";
    $result_bug_conversation = mysqli_query($connect, $sql_bug_conversation);
    $row_bug_conversation = mysqli_fetch_assoc($result_bug_conversation);
    $bug_conversation_id = $row_bug_conversation["id"];

    $sql_new_message = "INSERT INTO `messages`(`message`, `conversation_id`, `user_id`) VALUES ('$message', $bug_conversation_id, $admin_id)";
    $result_new_message = mysqli_query($connect, $sql_new_message);


    $sql_update_admin_id = "UPDATE `conversation` SET `admin_id`= $admin_id WHERE `id` = $bug_conversation_id";
    $result_update_admin_id = mysqli_query($connect, $sql_update_admin_id);
}
echo "test";