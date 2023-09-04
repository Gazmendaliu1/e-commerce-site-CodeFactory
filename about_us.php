
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@500&family=Comfortaa&family=Overpass+Mono&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="styles/style_about_us.css" rel="stylesheet">
        <link href="styles/style_navbar.css" rel="stylesheet">
        <link href="styles/style_landing.css" rel="stylesheet">

        <title>About Us</title>
    </head>

    <body>

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



        <div class="container">

            <div id="first">

                <div id="image">

                    <h2>About Us</h2>

                    <hr id="hr1">

                    <img id="img" src="https://img.freepik.com/free-vector/workplace-culture-abstract-concept-vector-illustration-shared-values-belief-systems-attitude-work-company-team-corporate-culture-high-performance-employee-health-abstract-metaphor_335657-6126.jpg" alt="Image">
                </div>

                <div id="text">
                    <h4 id="h4">Welcome to our fashion online shop!</h4>

                    <br>

                    <p>As a team of fashion enthusiasts and experts, we offer carefully selected and affordable pieces that we believe will elevate your wardrobe.</p>

                    <p>Our personalized shopping experience caters to all fashion tastes, from trendy streetwear to classic essentials. We work with top designers, brands, and suppliers to bring you the latest trends, styles, and designs from around the world.</p>

                    <p>We are committed to promoting body positivity, inclusivity, and diversity in our fashion offerings. We want everyone to feel confident and beautiful in their own skin.</p>

                    <p id="lastP">Thank you for choosing our fashion online shop, and we look forward to being a part of your fashion journey.</p>
                </div>
            </div>

            <hr>

            <div id="second">
                <section class="team">
                    <h2 class="section-heading">Our Team</h2>
                    <div id="container">
                        <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1">
                            <div class="profile">
                                <a target="_blank" href="http://olga.codefactory.live/"><img src="https://cdn-icons-png.flaticon.com/512/921/921009.png" alt="" /><span class="name" id="olga">Olga</span></a>
                            </div>
                            <div class="profile">
                                <a target="_blank" href="https://gazmend.codefactory.live/"><img src="https://cdn-icons-png.flaticon.com/512/4202/4202835.png" alt="" /><span class="name" id="gazmend">Gazmend</span></a>
                            </div>

                            <div class="profile">
                                <a target="_blank" href="https://github.com/kraki16"><img src="https://cdn-icons-png.flaticon.com/512/6705/6705541.png" alt="" /><span class="name" id="christoph">Christoph</span></a>
                            </div>

                            <div class="profile">
                                <a target="_blank" href="https://github.com/UsernameIsAlwaysNotAvailable"><img src="https://cdn-icons-png.flaticon.com/512/6813/6813442.png" alt="" /><span class="name" id="narek">Narek</span></a>
                            </div>
                            <div class="profile">
                                <a target="_blank" href="https://pritesh.codefactory.live/Portfolio/"><img src="https://cdn-icons-png.flaticon.com/512/921/921006.png" alt="" /><span class="name" id="pritesh">Pritesh</span></a>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>

        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="js/navbar_shrink.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>


    <?php include 'inc/footer.php' ?>

    </html>