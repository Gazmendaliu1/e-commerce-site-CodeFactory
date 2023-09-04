<?php

require_once "db_connect.php";
?>

<!-- <?php

        function my_shopping_cart_total_product_count()
        {
            $product_count = 0;

            if (isset($_SESSION['user'])) {
                $product_count = array_sum(array_column($_SESSION['user'], 'product_quantity'));
            }
            return $product_count;
        } ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Street Style</title>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@500&family=Comfortaa&family=Overpass+Mono&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="styles/style_landing.css" rel="stylesheet">
    <link href="styles/style_cart.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_navbar.css">
</head>

<body>
    <!--Main Navigation-->

    <nav id="navbar" class="navbar navbar-expand-lg bg-body-tertiary nav sticky-top">

        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="myNavbarToggler7">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><img src="icons/ss.png" alt="" loading="lazy" width="50px" /></a>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link pt-3" href="product-test.php">All collection</a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link pt-3" href="female.php">Women</a></h5>
                    </li>

                    <li class="nav-item">
                        <h5><a class="nav-link pt-3" href="male.php">Men</a></h5>
                    </li>

                </ul>


                <!-- search -->
                <form class="d-flex w-50" role="search">
                    <input class="form-control me-2 rounded-0" type="search" placeholder="Search" aria-label="Search">
                    <button class=" border-0 bg-body-tertiary" type="submit"><img src="icons/search.png" height="20px" loading="lazy" /></button>
                </form>
                <!-- search ends -->

                <!-- dropdown language -->
                <ul class="list-unstyled mt-3">
                    <li class="nav-item dropdown me-2">
                        <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown">
                            <img src="icons/united-kingdom.png" height="30" alt="English" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a href="#" class="language-switch text-decoration-none text-dark" data-language="english">
                                    <img src="icons/united-kingdom.png" height="30" alt="English" loading="lazy" /> English
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a href="#" class="language-switch text-decoration-none text-dark" data-language="german">
                                    <img src="icons/germany-flag.png" height="30" alt="German" loading="lazy" /> German
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- dpordown languge end -->

                <!-- icon contact us  -->
                <ul class="list-unstyled  mt-3 ms-1 me-1">
                    <li class="nav-item me-3 me-lg-0">
                        <a class="nav-link" href="contact.php">
                            <img src="icons/email.png" height="35" alt="" loading="lazy" />

                        </a>
                    </li>
                </ul>
                <!-- icon contact us ends  -->

                <!-- icon about us -->
                <ul class="list-unstyled  mt-3 ms-1 me-1">
                    <li class="nav-item me-1 me-lg-0">
                        <a class="nav-link" href="about_us.php">
                            <img src="icons/question.png" height="33" alt="" loading="lazy" />

                        </a>
                    </li>
                </ul>
                <!-- icon about us ends -->

                <!-- cart start -->
                <ul>
                    <button class="btn btn-light border-dark rounded-0 mt-3 me-3"><a class='nav-lin text-decoration-none text-dark' href='login.php'>Login</a></button>
                </ul>
            </div>
        </div>
        <!-- cart ends -->
    </nav>

    <style>
        .logo-nav {
            margin-right: 100px;
        }
    </style>

    <script src="js/navbar_shrink.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>