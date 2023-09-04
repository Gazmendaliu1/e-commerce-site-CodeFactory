<?php
require_once "../db_connect.php";
session_start();

$user_id = $_SESSION["user"];

$product_id = $_GET["x"];

$sql_check_reveiews = "SELECT * FROM `reviews` WHERE `userId` = '$user_id' AND `productId` = $product_id";
$result_check_review = mysqli_query($connect, $sql_check_reviews);
if(mysqli_num_rows($result_check_reviews) > 0){
    echo "false";
}else{
    echo "true";
}