<?php

require_once "../db_connect.php";

$product_id = $_GET["x"];

$sq_reviews = "SELECT * FROM `reviews` WHERE `productId` = '$product_id'";
$result_reviews = mysqli_query($connect, $sq_reviews);


if(mysqli_num_rows($result_reviews) > 0 ){
    
    
    while($row_reviews = mysqli_fetch_assoc($result_reviews)){

        $user_id = $row_reviews["userId"];
        
        $sql_user = "SELECT * FROM `users` WHERE `id` = '$user_id'";
        $result_user = mysqli_query($connect, $sql_user);
        $row_user = mysqli_fetch_assoc($result_user);
        $user_name = $row_user["FirstName"];
    
        echo "<div class='card-review'>
        <div class='top'>
            <div class='stars'>";
    
             for($i = 0 ; $i < $row_reviews["rating"] ; $i++){
                echo "<img class='star margin-right' src='icons/star.png' alt='star'>";
            };
    
        echo "<p class='review-title'>";
            echo $row_reviews["title"];
            echo "</p>
            </div>
            <p class='review-user'>review from -";
            echo $user_name;
            echo "</p>
        </div>
        <div class='bottom'>";
            echo $row_reviews["review"];
        echo "</div>
    </div>";
    }
}else{
   echo "<div class='card-review'>No reviews about this product yet </div>";
}