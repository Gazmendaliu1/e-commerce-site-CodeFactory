<?php
session_start();

if (isset($_SESSION["user"])) {
    include 'inc/navbar.php';
} elseif (isset($_SESSION["adm"])) {
    include 'inc/navbar_admin.php';
} else {
    include 'inc/navbar_guest.php';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Street Style</title>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@500&family=Comfortaa&family=Overpass+Mono&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="styles/style_landing.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style_navbar.css">
    <script src="js/index.js"></script>


</head>

<body>

    <!-- courusel  -->
    <div id="carouselExampleAutoplaying" class="carousel slide courusel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active courusel">
                <img src="https://images.unsplash.com/photo-1558769132-cb1aea458c5e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
            <div class="carousel-item courusel">
                <img src="https://images.unsplash.com/photo-1557777586-f6682739fcf3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1035&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
            <div class="carousel-item courusel">
                <img src="https://images.unsplash.com/photo-1505022610485-0249ba5b3675?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
            </div>
            <div class="carousel-item courusel">
                <img src="https://images.unsplash.com/photo-1572705824045-3dd0c9a47945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1634&q=80" class="d-block w-100 h-100 poster object-fit-cover" alt="...">
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
    <div class="main-text">
        <h1 class="mt-3 mb-3">STREET STYLE</h1>
    </div>


    <!-- main photo -->


    <div height="300px">
        <img class="img-responsive object-fit-none" src="https://images.unsplash.com/photo-1464666495445-5a33228a808e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2012&q=80" alt="" height="700px" width="100%">
    </div>
    <div class="bg-danger pt-2 pb-2 text-center text-white ">🔥 20% discount on EVERYTHING! Only valid until 30.08. Code: SUMMER23 🔥 <span> <a href="product-test.php" class="text-reset text-decoration-none font-weight-bold fs-6">Shop now</a></span></div>
    <div class="container text-center">




        <!-- main photo ends -->
        <!--  women collection  -->

        <h3 class="mt-5">Women </h3>
        <div class="row">
            <div class="col-sm-4 py-2">
                <div class="card h-100 card-body border-0">
                    <img class="image" src="https://images.unsplash.com/photo-1564247589577-11141973c096?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="" width="100%">
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 border-light rounded-0 <div class=" card h-100 card-body bg-img bg-cover object-fit-fill" style="background-image: url('https://images.unsplash.com/photo-1518821703881-9da5a9f42038?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80); height:100%; width:100%;">
                    <div class="card-body">
                        <h3 class="card-title text-light pt-3">New Women Collection</h3>
                        <p class="card-text text-center text-light pt-5">Discover a range of vibrant colors and patterns that will add flair to your everyday look.</p>
                        <a href="female.php" class="btn btn-outline-light rounded-0">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 card-body border-0">
                    <img class="image" src="https://images.unsplash.com/photo-1523194258983-4ef0203f0c47?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="" width="100%">
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 border-light rounded-0 <div class=" card h-100 card-body bg-img bg-cover object-fit-fill" style="background-image: url('https://images.unsplash.com/photo-1518821703881-9da5a9f42038?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80'); height:100%; width:100%;">
                    <div class="card-body">
                        <h3 class="card-title text-light pt-3">From casual to formal</h3>
                        <p class="card-text text-center text-light pt-5">Shop now for the perfect blend of fashion and comfort in our women's clothing line.</p>
                        <a href="female.php" class="btn btn-outline-light rounded-0">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 card-body border-0">
                    <img class="image" src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="" width="100%">
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 border-light rounded-0 <div class=" card h-100 card-body bg-img bg-cover object-fit-fill" style="background-image: url('https://images.unsplash.com/photo-1518821703881-9da5a9f42038?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80'); height:100%; width:100%;">
                    <div class="card-body">
                        <h3 class="card-title text-light pt-3">Quality meets style</h3>
                        <p class="card-text text-center text-light pt-5">Express your individuality through fashion with our diverse collection of women's clothing.</p>
                        <a href="female.php" class="btn btn-outline-light rounded-0">Explore</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- women collection ends -->



        <!-- men collection  -->
        <h3 class="mt-5">Men </h3>
        <div class="row">
            <div class="col-sm-4 py-2">
                <div class="card h-100 card-body border-0">
                    <img class="image" src="https://images.unsplash.com/photo-1479064555552-3ef4979f8908?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="" width="100%">
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 border-light rounded-0 <div class=" card h-100 card-body bg-img bg-cover object-fit-fill" style="background-image: url('https://images.unsplash.com/photo-1602212477893-409e6c2d7cad?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80'); height:100%; width:100%;">
                    <div class="card-body">
                        <h3 class="card-title pt-3 text-white">Upgrade your wardrobe</h3>
                        <p class="card-text text-center pt-5 text-white">Find your fit effortlessly with our wide range of sizes and tailored designs.</p>
                        <a href="male.php" class="btn btn-outline-light rounded-0">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 card-body border-0">
                    <img class="image" src="https://images.unsplash.com/photo-1571153041701-728931a0ff63?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" alt="" width="100%">
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 border-light rounded-0 <div class=" card h-100 card-body bg-img bg-cover object-fit-fill" style="background-image: url('https://images.unsplash.com/photo-1602212477893-409e6c2d7cad?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80'); height:100%; width:100%;">
                    <div class="card-body">
                        <h3 class="card-title pt-3 text-white">Express your individual style</h3>
                        <p class="card-text text-center pt-5 text-white">Explore the season's hottest trends and timeless classics in our men's clothing store.</p>
                        <a href="male.php" class="btn btn-outline-light rounded-0">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 card-body border-0">
                    <img class="image" src="https://images.unsplash.com/photo-1560243563-062bfc001d68?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="" width="100%">
                </div>
            </div>
            <div class="col-sm-4 py-2">
                <div class="card h-100 border-light rounded-0 <div class=" card h-100 card-body bg-img bg-cover object-fit-fill style="background-image: url('https://images.unsplash.com/photo-1602212477893-409e6c2d7cad?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80'); height:100%; width:100%;">
                    <div class="card-body">
                        <h3 class="card-title pt-3 text-white">Uncompromising quality</h3>
                        <p class="card-text text-center pt-5 text-white"> Uncompromising quality and unbeatable style merge in our men's fashion offerings.</p>
                        <a href="male.php" class="btn btn-outline-light rounded-0">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- men collection ends -->


    <!-- <h3>Kids Collection</h3>
    </div>
    <div class="row">
        <div class="col-6 col-md-4 mt-2"><img class="image" src="https://images.unsplash.com/photo-1604467794349-0b74285de7e7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="" width="390px"></div>
        <div class="col-6 col-md-4 mt-2"><img class="image" src="https://images.unsplash.com/photo-1564584217132-2271feaeb3c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="" width="390px"></div>
        <div class=" col-6 col-md-4 mt-2"><img class="image" src="https://images.unsplash.com/photo-1545558014-8692077e9b5c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="" width="390px"></div>
    </div>-->
    <h3 class="mt-5 text-center">Special Offers</h3>

    <!-- special offers  -->


    <div id="carouselExampleControls" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card-wrapper container-sm d-flex  justify-content-around">
                    <div class="card ms-1 border-light rounded-0" style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Join our loyalty program and access member-only discounts.</h5>

                        </div>
                    </div>
                    <div class="card ms-1 border-light rounded-0" style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1507680434567-5739c80be1ac?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Don't miss out – free shipping on all orders for a limited period.</h5>

                        </div>
                    </div>
                    <div class="card ms-1 border-light rounded-0" style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Explore our exclusive online offers for unbeatable savings.</h5>

                        </div>
                    </div>
                    <div class="card ms-1 me-1 border-light rounded-0" style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Get beach-ready with swimwear at 25% off for a limited time.</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card-wrapper container-sm d-flex   justify-content-around">
                    <div class="card ms-1 border-light rounded-0 " style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1490114538077-0a7f8cb49891?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Use promocode SUMMER23 on all collections till 30.08</h5>

                        </div>
                    </div>
                    <div class="card  ms-1 border-light rounded-0" style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1506152983158-b4a74a01c721?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Fall in love with fashion and save 30% on your order this week.</h5>

                        </div>
                    </div>
                    <div class="card ms-1 border-light rounded-0" style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Enjoy special perks and discounts as a valued customer.</h5>

                        </div>
                    </div>
                    <div class="card ms-1 me-1 border-light rounded-0" style="width: 18rem;">
                        <img src="https://plus.unsplash.com/premium_photo-1673502752899-04caa9541a5c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top rounded-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Limited time offer: Enjoy 20% off on all jeans!</h5>

                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>







</html>
<!-- special offers  end-->

</div>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="js/navbar_shrink.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>



<?php include 'inc/footer.php' ?>

</html>