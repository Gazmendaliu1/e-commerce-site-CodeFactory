<?php

function calculateCartCount($userId, $connect)
{

    $cartSql = "SELECT SUM(quantity) as total FROM cart WHERE userId = $userId";
    $cartResult = mysqli_query($connect, $cartSql);

    if ($cartResult) {

        $cartRow = mysqli_fetch_assoc($cartResult);
        $cartCount = $cartRow['total'];
        // $cartCount = 0;
    }

    return $cartCount;
}
