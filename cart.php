<?php
session_start();
require_once "function.php";
// session_start();

if (!isset($_SESSION["adm"]) && !isset($_SESSION["user"])) {
    header("Location: login.php");
}
require_once "./db_connect.php";

//delete

if (isset($_GET["delete_id"])) {
    $deleteId = $_GET["delete_id"];
    $deleteSql = "DELETE FROM cart WHERE productId = $deleteId";
    mysqli_query($connect, $deleteSql);
    header("Location: cart.php");
    exit;
}

if (isset($_GET["id"])) {
    $productId = $_GET["id"];
    $userId = isset($_SESSION["user"]) ? $_SESSION["user"] : $_SESSION["adm"];

    $checkSql = "SELECT * FROM cart WHERE userId = $userId AND productId = $productId";
    $checkResult = mysqli_query($connect, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {

        // if product already exists, update the quantity
        $updateSql = "UPDATE cart SET quantity = quantity + 1 WHERE userId = $userId AND productId = $productId";
        mysqli_query($connect, $updateSql);
    } else {
        // if product doesn't exist, insert with quantity 1
        $insertSql = "INSERT INTO cart (userId, productId, quantity) VALUES ($userId, $productId, 1)";
        mysqli_query($connect, $insertSql);
    }

    header("Location: product-test.php");
}
$myValue = 0;
$userId = isset($_SESSION["user"]) ? $_SESSION["user"] : $_SESSION["adm"];
$showCart = "SELECT users.*, cart.id as cartId, cart.quantity, products.* FROM products JOIN cart ON cart.productId = products.id JOIN users ON users.id = cart.userId WHERE cart.userId = $userId";
$result = mysqli_query($connect, $showCart);
$total_quantity = 0;
$cart_total_price = 0;
$total_price = 0;
$priceBeforePromo = 0;
$discountedPrice = 0;
$priceIncludingShipping = 0;
$layout = "";

$cart_items = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $item_price = $row["quantity"] * $row["price"];
        $total_quantity += $row["quantity"];
        $cart_total_price += $item_price;
        $total_price = $cart_total_price;
        $layout .= "
<div class='row mb-4 d-flex justify-content-between align-items-center'>
    <div class='col-md-2 col-lg-2 col-xl-2'>
        <h6 class='text-muted'>Title</h6>
        {$row["title"]}

        <img src='{$row["picture"]}' class='img-fluid rounded-3' alt=''>
    </div>

    <div class='col-md-3 col-lg-3 col-xl-3'>
        <h6 class='text-muted'>Quantity</h6>
        <h6 class='text-black mb-0'>{$row["quantity"]} </h6>
    </div>

    <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
        <div class=''>
            <h6 class='text-muted'>Item Price</h6>
            <h6 class='text-black mb-0'>{$row["price"]}</h6>
        </div>

    </div>

    <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
        <h6 class='text-muted'>Price</h6>
        <h6 class='mb-0'> {$total_price}</h6>
    </div>
    <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
        <button class='btn btn-link px-2' onclick='this.parentNode.querySelector(' input[type=number]').stepUp()>
            <a href='cart.php?delete_id={$row["id"]}' class='text-muted'><img src='icons/icon-delete.png' width='30px'></a></button>

    </div>
</div>";
    }
} else {
    $layout .= "<div><h4>Cart is empty. <span class=''> <a href='product-test.php' class='text-reset text-decoration-none font-weight-bold'>Let's shop!</span> </h4> </div>";
}

// promocode 

// function promoCodeDiscount($priceBeforePromo, $promo)
// {
//     $promoCode = array(
//         "SUMMER23" => 0.2,
//         "WINTER23" => 0.1
//     );

//     if (isset($promoCode[$promo])) {
//         $discount = $promoCode[$promo];
//         $discountAmount = $priceBeforePromo * $discount;
//         $discountedPrice = $priceBeforePromo - $discountAmount;
//         return $discountedPrice;
//     } else {
//         return $priceBeforePromo;
//     }
// }

$discounted_price = $total_price; // calculate discounted price with total price

if (isset($_POST["promo_code"])) {

    if ($_POST["promo_code"] === 'SUMMER23') {
        $myValue = 20;
        $discounted_price =
            $total_price - ($total_price / 100 * $myValue);
    }
}
//promocode ends 


//shipping

function shipping($discounted_price, $shipping_price)
{
    $priceIncludingShipping = $discounted_price + $shipping_price;

    return $priceIncludingShipping;
}


if (isset($_POST["checkout"])) {
    if (isset($_POST['promoCode'])) {
        $myValue = $_POST['promoCode'];
    }

    if ($myValue && $myValue != 0) {
        $discounted_price = $total_price - ($total_price / 100 * $myValue);
    } else $discounted_price = $total_price;


    $selectedShippingId = $_POST["select"];
    $shippingSql = ("SELECT * FROM shipping WHERE shippingID = $selectedShippingId");
    $shippingResult = mysqli_query($connect, $shippingSql);


    if ($shippingResult && mysqli_num_rows($shippingResult) > 0) {
        $shippingRow = mysqli_fetch_assoc($shippingResult);
        $shipping_price = (float) $shippingRow["price"];
        $priceIncludingShipping = shipping($discounted_price, $shipping_price);
    } else {
        $layout .= "<div><h4>You can pick up your purchase in our store for free</h4></div>";
    }
}

//shipping ends

?>




<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="styles/style_cart.css" rel="stylesheet">
    <title>Cart</title>
</head>

<body> -->
<?php include 'inc/navbar.php'; ?>

<!-- cart -->

<section class="h-100 " style="background-color: #36454F">
    <div class="container py-5 h-75 ">
        <div class="row d-flex justify-content-center align-items-center h-100 ">
            <div class="col-12">
                <div class="card card-registration card-registration-2 rounded-0">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                    </div>
                                    <hr class="my-4">
                                    <?php echo $layout;
                                    ?>

                                    <hr class="my-4">
                                    <class="my-4">
                                        <div class="pt-5">
                                            <button class="btn btn-dark btn-block btn-lg mt-1 rounded-0 "><a href="female.php" class="text-reset text-decoration-none">Back to shop</a></button>

                                        </div>
                                </div>
                            </div>

                            <div class="col-lg-4 bg-grey rounded-0">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">Price for <?php echo $total_quantity; ?> items</h5>
                                        <h5><?php echo "€  " . number_format($total_price, 2); ?></h5>
                                    </div>

                                    <h5 class="text-uppercase mb-3">PROMO code</h5>

                                    <div class="mb-5">
                                        <div class="form-outline">
                                            <form method="POST">
                                                <input type="text" id="form3Examplea2" name="promo_code" class="form-control form-control-lg rounded-0" placeholder="Enter promo code" />
                                                <button class="btn btn-dark btn-block btn-lg mt-1 rounded-0 " name="promo">Apply</button>

                                            </form>


                                        </div>
                                    </div>


                                    <h5 class="text-uppercase mb-3">Shipping</h5>

                                    <div class="mb-4 pb-2 rounded-0">
                                        <form method="POST">
                                            <select class="select rounded-0 form-control-lg" name="select">
                                                <option value="0">Choice Delivery Method</option>
                                                <option value="1">Post - €4.00</option>
                                                <option value="2">DHL - €5.00</option>
                                                <option value="3">DPD - €6.00</option>
                                                <option value="4">Pick up at the store - free</option>
                                            </select>
                                            <button type="submit" class="btn btn-dark btn-block btn-lg rounded-0 mt-1" data-mdb-ripple-color="dark" name="checkout">Check Out</button>
                                            <?php if ($myValue) {
                                                echo   " <input type='number' value = 20 name='promoCode' id='promoCode' class='invisible'>  ";
                                            } ?>



                                        </form>
                                    </div>


                                    <hr class="my-4">


                                    <div class="d-flex justify-content-between mb-5">
                                        <h5>PRICE (after discount)</h5>
                                        <h5><?php echo "€  " . number_format($discounted_price, 2); ?></h5>

                                    </div>
                                    <div class="d-flex justify-content-between mb-5">

                                        <h5>TOTAL PRICE <span>(incl. delivery)</span></h5>
                                        <h5><?php echo "€  " . number_format($priceIncludingShipping, 2); ?></h5>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>