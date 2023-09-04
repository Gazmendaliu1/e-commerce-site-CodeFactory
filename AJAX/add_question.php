<?php

require_once "../db_connect.php";

session_start();

$product_id = $_GET["x"];
$user_id = $_SESSION["user"];


// if(isset($_POST["send-question"])){

// $title = $_POST["title"];
// $question = $_POST["question"];

// $sql_new_question = "INSERT INTO `questions`(`titel`, `question`, `answeared`, `userId`, `productId`) VALUES ('$title', '$question','no','$id_user','$id_product')";
// $result_new_question = mysqli_query($connect, $sql_new_question);
// }






echo "test";


if(isset($_POST['title']) && isset($_POST['question'])){
   $title = mysqli_real_escape_string($connect, $_POST['title']);
   $question = mysqli_real_escape_string($connect, $_POST['question']);

//    echo $title;
//    echo $question;

   $query = "INSERT INTO `questions`(`titel`, `question`, `userId`, `productId`) VALUES ('$title', '$question', $user_id, $product_id)";

    mysqli_query($connect, $query);

//    if(mysqli_query($connect, $query)){
//        echo "user added";
//    }else{
//        echo mysqli_error($connect);
//    }
};
