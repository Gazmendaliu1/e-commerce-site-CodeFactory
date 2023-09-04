<?=

require_once "../db_connect.php";

$product_id = $_GET["x"];


$sql_review_rating_1 = "SELECT * FROM `reviews` WHERE `rating` = '1'";
$result_review_rating_1 = mysqli_query($connect, $sql_review_rating_1);
$row_review_rating_1 = mysqli_fetch_assoc($result_review_rating_1);
if($rating_1 = $row_review_rating_1["rating"]){
    echo "<input id='rating-1' value='$rating_1'>";
}else{
    echo "<input id='rating-1' value='0'>";
}


$sql_review_rating_2 = "SELECT * FROM `reviews` WHERE `rating` = '2'";
$result_review_rating_2 = mysqli_query($connect, $sql_review_rating_2);
$row_review_rating_2 = mysqli_fetch_assoc($result_review_rating_2);
if($rating_2 = $row_review_rating_2["rating"]){
    echo "<input id='rating-2' value='$rating_2'>";
}else{
    echo "<input id='rating-2' value='0'>";
}


$sql_review_rating_3 = "SELECT * FROM `reviews` WHERE `rating` = '3'";
$result_review_rating_3 = mysqli_query($connect, $sql_review_rating_3);
$row_review_rating_3 = mysqli_fetch_assoc($result_review_rating_3);
if($rating_3 = $row_review_rating_3["rating"]){
    echo "<input id='rating-3' value='$rating_3'>";
}else{
    echo "<input id='rating-3' value='0'>";
}


$sql_review_rating_4 = "SELECT * FROM `reviews` WHERE `rating` = '4'";
$result_review_rating_4 = mysqli_query($connect, $sql_review_rating_4);
$row_review_rating_4 = mysqli_fetch_assoc($result_review_rating_4);
if($rating_4 = $row_review_rating_4["rating"]){
    echo "<input id='rating-4' value='$rating_4'>";
}else{
    echo "<input id='rating-4' value='0'>";
}


$sql_review_rating_5 = "SELECT * FROM `reviews` WHERE `rating` = '5'";
$result_review_rating_5 = mysqli_query($connect, $sql_review_rating_5);
$row_review_rating_5 = mysqli_fetch_assoc($result_review_rating_5);
if($rating_5 = $row_review_rating_5["rating"]){
    echo "<input id='rating-5' value='$rating_5'>";
}else{
    echo "<input id='rating-5' value='0'>";
}
