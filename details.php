<?php
require_once "db_connect.php";
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $a = $_GET['availability'];

    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $layout = "";

    if (mysqli_num_rows($result) > 0) {
        while ($rowProduct = mysqli_fetch_assoc($result)) {
            $layout .= "



<!-- / begin -->
<div class='container d-flex justify-content-around'>
    <div class='row'>
    <div class='col-md-7'>
        <img src='productpictures/{$rowProduct["picture"]}' height='500px' class='card-img-top rounded-0 mb-5' style='width: 80%' alt='Product Image'>
        </div>
        <div class='col-md-5'>
            <div class='mt-0'>

                <h4 class='mb-0'>{$rowProduct["title"]}</h4>
                <p class='card-title'>100+ bought in past month</p>
                 <br>
                <h3 class='card-title'>€ {$rowProduct["price"]} </h3>


                 <!-- dropdown language -->
                <ul class='list-unstyled mt-3'>
                    <li class='nav-item dropdown me-2'>
                        <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'>
                            Size
                        </a>
                        <ul class='dropdown-menu'>
                            <li class='dropdown-item'>
                                <a href='#' class='size-switch text-decoration-none text-dark' data-size='english'>
                                     XS
                                </a>
                            </li>
                            <li class='dropdown-item'>
                                <a href='#' class='size-switch text-decoration-none text-dark' data-size='german'>
                                   S
                                </a>
                            </li>
                            <li class='dropdown-item'>
                                <a href='#' class='size-switch text-decoration-none text-dark' data-size='german'>
                                   M
                                </a>
                            </li>
                            <li class='dropdown-item'>
                                <a href='#' class='size-switch text-decoration-none text-dark' data-size='german'>
                                   L
                                </a>
                            </li><li class='dropdown-item'>
                                <a href='#' class='size-switch text-decoration-none text-dark' data-size='german'>
                                   XL
                                </a>
                            </li>
                            <li class='dropdown-item'>
                                <a href='#' class='size-switch text-decoration-none text-dark' data-size='german'>
                                   XX
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- dpordown languge end -->

            </div>

            <div class=' mt-5 mb-5'>

                        <p class='card-title'>{$rowProduct["description"]}</p>
                        <br>
                        <p class='card-title'> 𝐆𝐞𝐧𝐝𝐞𝐫 {$rowProduct["gender"]}</p>
                        <br>
                        <p class='card-title'> 𝐀𝐯𝐚𝐢𝐥𝐚𝐛𝐥𝐞";

            if ($a === 'Yes') {
                $layout .= '<img src="icons/check.png" width="20px" class="ms-2">';
            } elseif ($a === 'No') {
                $layout .= '<img src="icons/false.png" width="20px" class="ms-2">';
            }

            $layout .= "</p>
                        <br>
                        <hr>

                        <a href='cart.php?id={$rowProduct["id"]}' class='btn btn-outline-dark rounded-0 mt-5'>Add to cart</a>

            </div>


        </div>


    </div>
</div>";
        }
    } else {
        $layout .= "No Result";
    }
    // mysqli_close($connect);
}
?>



<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="product/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@500&family=Comfortaa&family=Overpass+Mono&family=Roboto:wght@300&display=swap" rel="stylesheet">

    <title>Details</title>
</head> -->

<body>
    <?php
    if (isset($_SESSION["user"])) {
        include 'inc/navbar.php';
    } elseif (isset($_SESSION["adm"])) {
        include 'inc/navbar_admin.php';
    } else {
        include 'inc/navbar_guest.php';
    } ?>

    <div class="container-fluid" style='margin-top: 70px;'>
        <div>
            <?= $layout ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

<?php include 'inc/footer.php' ?>

</html>