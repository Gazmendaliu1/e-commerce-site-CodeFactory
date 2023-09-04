<?php

require_once "../db_connect.php";

$product_id = $_GET["x"];

$sql_reviews = "SELECT * FROM `reviews` WHERE `productId` = '$product_id'";
$result_reviews = mysqli_query($connect, $sql_reviews);

while($row_reviews = mysqli_fetch_assoc($result_reviews)){
    $rating = $row_reviews["rating"];
    echo "<input class='ajax-average' value='$rating' style='display: none;'>";
}



$sql_review_rating_5 = "SELECT * FROM `reviews` WHERE `rating` = '5' AND `productId` = '$product_id'";
$result_review_rating_5 = mysqli_query($connect, $sql_review_rating_5);
if(mysqli_num_rows($result_review_rating_5) > 0){
    $rating_5 = mysqli_num_rows($result_review_rating_5);
    echo "<input id='rating-5' class='input-rating' value='$rating_5' style='display: none;'>";
}else{
    echo "<input id='rating-5' class='input-rating' value='0' style='display: none;'>";
}


$sql_review_rating_4 = "SELECT * FROM `reviews` WHERE `rating` = '4' AND `productId` = '$product_id'";
$result_review_rating_4 = mysqli_query($connect, $sql_review_rating_4);
if(mysqli_num_rows($result_review_rating_4) > 0){
    $rating_4 = mysqli_num_rows($result_review_rating_4);
    echo "<input id='rating-4' class='input-rating' value='$rating_4' style='display: none;'>";
}else{
    echo "<input id='rating-4' class='input-rating' value='0' style='display: none;'>";
}


$sql_review_rating_3 = "SELECT * FROM `reviews` WHERE `rating` = '3' AND `productId` = '$product_id'";
$result_review_rating_3 = mysqli_query($connect, $sql_review_rating_3);
if(mysqli_num_rows($result_review_rating_3) > 0){
    $rating_3 = mysqli_num_rows($result_review_rating_3);
    echo "<input id='rating-3' class='input-rating' value='$rating_3' style='display: none;'>";
}else{
    echo "<input id='rating-3' class='input-rating' value='0' style='display: none;'>";
}


$sql_review_rating_2 = "SELECT * FROM `reviews` WHERE `rating` = '2' AND `productId` = '$product_id'";
$result_review_rating_2 = mysqli_query($connect, $sql_review_rating_2);
if(mysqli_num_rows($result_review_rating_2) > 0){
    $rating_2 = mysqli_num_rows($result_review_rating_2);
    echo "<input id='rating-2' class='input-rating' value='$rating_2' style='display: none;'>";
}else{
    echo "<input id='rating-2' class='input-rating' value='0' style='display: none;'>";
}


$sql_review_rating_1 = "SELECT * FROM `reviews` WHERE `rating` = '1' AND `productId` = '$product_id'";
$result_review_rating_1 = mysqli_query($connect, $sql_review_rating_1);
if(mysqli_num_rows($result_review_rating_1) > 0){
    $rating_1 = mysqli_num_rows($result_review_rating_1);
    echo "<input id='rating-1' class='input-rating' value='$rating_1' style='display: none;'>";
}else{
    echo "<input id='rating-1' class='input-rating' value='0' style='display: none;'>";
}


// $sql_review_rating_2 = "SELECT * FROM `reviews` WHERE `rating` = '2' AND `productId` = '$product_id'";
// $result_review_rating_2 = mysqli_query($connect, $sql_review_rating_2);
// $row_review_rating_2 = mysqli_fetch_assoc($result_review_rating_2);
// $rating_2 = $row_review_rating_2["rating"];
// if($rating_2){
//     $rating_2 = $row_review_rating_2["rating"];
//     echo "<input id='rating-2' value='$rating_2' style='display: none;'>";
// }else{
//     echo "<input id='rating-2' value='0' style='display: none;'>";
// }


// $sql_review_rating_3 = "SELECT * FROM `reviews` WHERE `rating` = '3' AND `productId` = '$product_id'";
// $result_review_rating_3 = mysqli_query($connect, $sql_review_rating_3);
// $row_review_rating_3 = mysqli_fetch_assoc($result_review_rating_3);
// $rating_3 = $row_review_rating_3["rating"];
// if($rating_3){
//     $rating_3 = $row_review_rating_3["rating"];
//     echo "<input id='rating-3' value='$rating_3' style='display: none;'>";
// }else{
//     echo "<input id='rating-3' value='0' style='display: none;'>";
// }


// $sql_review_rating_4 = "SELECT * FROM `reviews` WHERE `rating` = '4' AND `productId` = '$product_id'";
// $result_review_rating_4 = mysqli_query($connect, $sql_review_rating_4);
// $row_review_rating_4 = mysqli_fetch_assoc($result_review_rating_4);
// $rating_4 = $row_review_rating_4["rating"];
// if($rating_4){
//     $rating_4 = $row_review_rating_4["rating"];
//     echo "<input id='rating-4' value='$rating_4' style='display: none;'>";
// }else{
//     echo "<input id='rating-4' value='0' style='display: none;'>";
// }


// $sql_review_rating_5 = "SELECT * FROM `reviews` WHERE `rating` = '5' AND `productId` = '$product_id'";
// $result_review_rating_5 = mysqli_query($connect, $sql_review_rating_5);
// $row_review_rating_5 = mysqli_fetch_assoc($result_review_rating_5);
// $rating_5 = $row_review_rating_5["rating"];
// if($rating_5){
//     $rating_5 = $row_review_rating_5["rating"];
//     echo "<input id='rating-5' value='$rating_5' style='display: none;'>";
// }else{
//     echo "<input id='rating-5' value='0' style='display: none;'>";
// }


// $sql_review_rating_2 = "SELECT * FROM `reviews` WHERE `rating` = '2' AND `productId` = '$product_id'";
// $result_review_rating_2 = mysqli_query($connect, $sql_review_rating_2);
// if($row_review_rating_2 = mysqli_fetch_assoc($result_review_rating_2)){
//     $rating_2 = $row_review_rating_2["rating"];
//     echo "<input id='rating-2' value='$rating_2' style='display: none;'>";
// }else{
//     echo "<input id='rating-2' value='0' style='display: none;'>";
// }


// $sql_review_rating_3 = "SELECT * FROM `reviews` WHERE `rating` = '3' AND `productId` = '$product_id'";
// $result_review_rating_3 = mysqli_query($connect, $sql_review_rating_3);
// if($row_review_rating_3 = mysqli_fetch_assoc($result_review_rating_3)){
//     $rating_3 = $row_review_rating_3["rating"];
//     echo "<input id='rating-3' value='$rating_3' style='display: none;'>";
// }else{
//     echo "<input id='rating-3' value='0' style='display: none;'>";
// }


// $sql_review_rating_4 = "SELECT * FROM `reviews` WHERE `rating` = '4' AND `productId` = '$product_id'";
// $result_review_rating_4 = mysqli_query($connect, $sql_review_rating_4);
// if($row_review_rating_4 = mysqli_fetch_assoc($result_review_rating_4)){
//     $rating_4 = $row_review_rating_4["rating"];
//     echo "<input id='rating-4' value='$rating_4' style='display: none;'>";
// }else{
//     echo "<input id='rating-4' value='0' style='display: none;'>";
// }


// $sql_review_rating_5 = "SELECT * FROM `reviews` WHERE `rating` = '5' AND `productId` = '$product_id'";
// $result_review_rating_5 = mysqli_query($connect, $sql_review_rating_5);
// if($row_review_rating_5 = mysqli_fetch_assoc($result_review_rating_5)){
//     $rating_5 = $row_review_rating_5["rating"];
//     echo "<input id='rating-5' value='$rating_5' style='display: none;'>";
// }else{
//     echo "<input id='rating-5' value='0' style='display: none;'>";
// }








// $sql_review_rating_2 = "SELECT * FROM `reviews` WHERE `rating` = '2'";
// $result_review_rating_2 = mysqli_query($connect, $sql_review_rating_2);
// $row_review_rating_2 = mysqli_fetch_assoc($result_review_rating_2);
// if($rating_2 = $row_review_rating_2["rating"]){
//     echo "<input id='rating-2' value='$rating_2' style='display: none;'>";
// }else{
//     echo "<input id='rating-2' value='0' style='display: none;'>";
// }


// $sql_review_rating_3 = "SELECT * FROM `reviews` WHERE `rating` = '3'";
// $result_review_rating_3 = mysqli_query($connect, $sql_review_rating_3);
// $row_review_rating_3 = mysqli_fetch_assoc($result_review_rating_3);
// if($rating_3 = $row_review_rating_3["rating"]){
//     echo "<input id='rating-3' value='$rating_3' style='display: none;'>";
// }else{
//     echo "<input id='rating-3' value='0' style='display: none;'>";
// }


// $sql_review_rating_4 = "SELECT * FROM `reviews` WHERE `rating` = '4'";
// $result_review_rating_4 = mysqli_query($connect, $sql_review_rating_4);
// $row_review_rating_4 = mysqli_fetch_assoc($result_review_rating_4);
// if($rating_4 = $row_review_rating_4["rating"]){
//     echo "<input id='rating-4' value='$rating_4' style='display: none;'>";
// }else{
//     echo "<input id='rating-4' value='0' style='display: none;'>";
// }


// $sql_review_rating_5 = "SELECT * FROM `reviews` WHERE `rating` = '5'";
// $result_review_rating_5 = mysqli_query($connect, $sql_review_rating_5);
// $row_review_rating_5 = mysqli_fetch_assoc($result_review_rating_5);
// if($rating_5 = $row_review_rating_5["rating"]){
//     echo "<input id='rating-5' value='$rating_5' style='display: none;'>";
// }else{
//     echo "<input id='rating-5' value='0' style='display: none;'>";
// }
