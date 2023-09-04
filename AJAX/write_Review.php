<?php

require_once "../db_connect.php";

session_start();

$product_id = $_GET["x"];


$user_id = $_SESSION["user"];

// echo "test";


if(isset($_POST['new-rating']) && isset($_POST['title-new-rating']) && isset($_POST['review-new-rating'])){
   $rating = mysqli_real_escape_string($connect, $_POST['new-rating']);
   $title = mysqli_real_escape_string($connect, $_POST['title-new-rating']);
   $review = mysqli_real_escape_string($connect, $_POST['review-new-rating']);

   echo $rating;
   echo $title;
   echo $review;

   $query = "INSERT INTO `reviews`(`rating`, `title`, `review`, `userId`, `productId`) VALUES ($rating, '$title', '$review', $user_id, $product_id)";
   mysqli_query($connect, $query);

//    if(mysqli_query($connect, $query)){
//        echo "user added";
//    }else{
//        echo mysqli_error($connect);
//    }
};
