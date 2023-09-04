<?php

require_once "../db_connect.php";

session_start();

$product_id = $_GET["x"];


$sql_question = "SELECT * FROM `questions` WHERE `productId` = '$product_id' ";
$result_question = mysqli_query($connect, $sql_question);


if(mysqli_num_rows($result_question) > 0){

    while($row_question = mysqli_fetch_assoc($result_question)){

    $question_user_id = $row_question["userId"];

    $sql_question_user = "SELECT * FROM `users` WHERE `id` = '$question_user_id'";
    $result_question_user = mysqli_query($connect, $sql_question_user);
    $row_question_user = mysqli_fetch_assoc($result_question_user);
    
    $question_user = $row_question_user["FirstName"];
    $question_title = $row_question["titel"];
    $question_question = $row_question["question"];
    $id_question = $row_question["id"];

    
    
    if($row_question["answeared"] == "yes"){
        $sql_answear = "SELECT * FROM `answears` WHERE `question_id` = '$row_question[id]' ";
        $result_answear = mysqli_query($connect, $sql_answear);
        $row_answear = mysqli_fetch_assoc($result_answear);

        $sql_answear_user = "SELECT * FROM `users` WHERE `id` = '$row_answear[id_user]'";
        $result_answear_user = mysqli_query($connect, $sql_answear_user);
        $row_answear_user = mysqli_fetch_assoc($result_answear_user);
        
        $question_answear = $row_answear["answear"];

        $answear = "<hr>
        <span class='answear'>$question_answear
            <p class='answear-user'>answear from -$row_answear_user[FirstName]</p>
        </span>";

    }elseif($row_question["answeared"] == "no"){

        $answear = "<div class='answear-button'><button class='button-answear' data-id='$id_question'>Answear</button></div>";
    }

        echo "<div class='card-question'>
        <div class='top'>
            <p class='question-title'>$question_title</p>
            <p class='question-user'>question from - $question_user</p>
        </div>
        <div class='bottom'>
            <p class='question-question'>$question_question
            </p>
            $answear
        </div>
    </div>";
    }
}else{
    echo "<div class='card-question'>
    <div class='no-question'>No questions about this product yet</div>
</div>";
}