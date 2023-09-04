<?php

require_once "../db_connect.php";

session_start();

$user_id = $_GET["x"];

$sql_conversation = "UPDATE `conversation` SET `status`='closed' WHERE `user_id` = $user_id AND `status` = 'open'";
$result = mysqli_query($connect, $sql_conversation);
