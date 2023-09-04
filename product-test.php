<?php

session_start();

// include 'inc/navbar.php';
require_once "db_connect.php";

if (isset($_SESSION["user"])) {
    include 'inc/navbar.php';
} elseif (isset($_SESSION["adm"])) {
    include 'inc/navbar_admin.php';
} else {
    include 'inc/navbar_guest.php';
}



$sql = "SELECT * FROM products";
$result = mysqli_query($connect, $sql);
$layout = "";


if (mysqli_num_rows($result) > 0) {
    while ($rowProduct = mysqli_fetch_assoc($result)) {
        $layout .= "<div class='row' style='margin-bottom: 170px;'>
            <div>
                <img src='productpictures/{$rowProduct["picture"]}' height='400px'  class='card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title mt-2'>{$rowProduct["title"]}</h5>


                     <h5 class='card-subtitle mb-2 text-dark mt-2'>$  {$rowProduct["price"]}</h5>
 <hr>
                    <div class='d-flex justify-content-evenly'>";

        if (isset($_SESSION["user"])) {
            $layout .= "<a href='product-details.php?x={$rowProduct["id"]}&availability={$rowProduct["availability"]}' class='btn btn-dark rounded-0 mt-3'>Details</a>
                        <a href='cart.php?id={$rowProduct["id"]}' class='btn btn-dark rounded-0 mt-3'>Add to cart</a>";
        } elseif (isset($_SESSION["adm"])) {
            $layout .= "<a href='product-details.php?x={$rowProduct["id"]}&availability={$rowProduct["availability"]}' class='btn btn-dark rounded-0 mt-3'>Details</a>
            <a href='delete.php?id={$rowProduct["id"]}' class='btn btn-dark rounded-0 mt-3'>Delete</a>
            <a href='updateproduct.php?id={$rowProduct["id"]}' class='btn btn-dark rounded-0 mt-3'>Update</a>";
        }

        $layout .= "</div>
                </div>
            </div>
        </div>";
    }
} else {
    $layout .= "No Result";
}
mysqli_close($connect);
?>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@500&family=Comfortaa&family=Overpass+Mono&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="product/styles.css">
    <link rel="stylesheet" href="styles/style_product_cards.css">
    <link rel="stylesheet" href="styles/style_navbar.css">
    <link href="styles/female.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_landing.css">
    <title>Document</title>
</head>

<body>
    <!-- courusel  -->
    <div id="carouselExampleAutoplaying" class="carousel slide courusel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active courusel">
                <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
            <div class="carousel-item courusel">
                <img src="https://images.unsplash.com/photo-1490915785914-0af2806c22b6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
            <div class="carousel-item courusel">
                <img src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
            <div class="carousel-item courusel">
                <img src="https://images.unsplash.com/photo-1508427953056-b00b8d78ebf5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- courusel end  -->
    <div class="container">
        <div>
            <h3 class="text-center mt-4">All Collection<h3>
        </div>
        <div class="mt-4 ms-2 row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1">

            <?= $layout ?>
        </div>
    </div>
    <?php include 'inc/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>