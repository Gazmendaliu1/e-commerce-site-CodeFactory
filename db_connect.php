<?php

    $localhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecommerce";

    $connect = mysqli_connect($localhost, $username, $password, $dbname);

    if(!$connect){
        die ("Connection failed");
    }

    function getConnection(){
        
    }