<?php
require_once "../db_connect.php";

session_start();

$product_id = $_GET["x"];

$user_id = $_SESSION["user"];



if(isset($_POST['answear']) && isset($_POST['qid'])){
    $qid = mysqli_real_escape_string($connect, $_POST['qid']);
    $answear = mysqli_real_escape_string($connect, $_POST['answear']);
    
    // echo $qid;
    // echo $answear;
    
    $sql_new_answear = "INSERT INTO `answears`(`answear`, `question_id`, `id_user`, `id_product`) VALUES ('$answear', $qid, $user_id, $product_id)";
    mysqli_query($connect, $sql_new_answear);

    // $sql_find_question = "SELECT * FROM `questions` WHERE `id` = $qid";
    // // mysqli_query($connect, $sql_find_question);
    // $find_qid = mysqli_fetch_assoc(mysqli_query($connect, $sql_find_question))["id"];

    $sql_update_question = "UPDATE `questions` SET `answeared`='yes'WHERE `id` = $qid";
    mysqli_query($connect, $sql_update_question);
 
    // if(mysqli_query($connect, $sql_new_answear)){
    //     echo "user added";
    // }else{
    //     echo mysqli_error($connect);
    // }
 };