<?php

session_start();

if (isset($_SESSION["user"])) {
    include 'inc/navbar.php';
} elseif (isset($_SESSION["adm"])) {
    include 'inc/navbar_admin.php';
} else {
    include 'inc/navbar_guest.php';
}
require_once "db_connect.php";


$sql = "SELECT * FROM products WHERE `gender` = 'male'";

$result = mysqli_query($connect, $sql);
$layout = "";

if (mysqli_num_rows($result) > 0) {
    while ($rowProduct = mysqli_fetch_assoc($result)) {
        $layout .= "<div class='card mx-auto  row row-col-lg-4 row-col-md-3 row-col-sm-2 row-col-xs-1 border-0'
        style='width: 20rem;'>
                <br>
                <img src='productpictures/{$rowProduct["picture"]}'  height='400px'  class='card-img-top ' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'> {$rowProduct["title"]}</h5>
                    <h4 class='card-title'> € {$rowProduct["price"]}</h4>
                    <hr>
                <div class='pinki'>
                    <a href='product-details.php?x={$rowProduct["id"]}&availability={$rowProduct["availability"]}' class='btn btn-outline-dark rounded-0'>Details</a>
                    <a href='cart.php?id={$rowProduct["id"]}' class='btn btn-outline-dark rounded-0'>Add to Cart</a>
                </div>
                </div>
                </div>";
    }
} else {
    $layout .= "No Result";
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="styles/style_landing.css" rel="stylesheet">
    <link href="styles/female.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_navbar.css">
    <title>Document</title>

</head>

<body>
    <!-- courusel  -->
    <div id="carouselExampleAutoplaying" class="carousel slide courusel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active courusel">
                <img src="https://images.unsplash.com/photo-1610384104075-e05c8cf200c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=928&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
            <div class="carousel-item courusel">
                <img src="https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
            <div class="carousel-item courusel">
                <img src="https://images.unsplash.com/photo-1446214814726-e6074845b4ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1070&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
            <div class="carousel-item courusel">
                <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
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
        <div class="row row-col-lg-4 row-col-md-3 row-col-sm-2 row-col-xs-1">
            <div>
                <h3 class="text-center mt-4">Men Collection<h3>
            </div>
            <?= $layout ?>
        </div>
    </div>

    <?php include 'inc/footer.php' ?>



    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/navbar_shrink.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>