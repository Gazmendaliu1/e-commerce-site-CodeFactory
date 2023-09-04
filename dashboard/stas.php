<?php

require_once "../db_connect.php";
$id = $_GET["id"];
$sql = "SELECT count(*) as num FROM `cart` WHERE cart.productId = $id AND cart.type = 'order'";
// $sql = "SELECT SUM(quantity) as num FROM `cart` WHERE cart.productId = $id AND cart.type = 'order'";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

echo $row["num"];