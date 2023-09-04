<nav id="navbar" class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand d-lg-none" href="#"><img src="icons/ss.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbarToggler7" aria-controls="myNavbarToggler7" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myNavbarToggler7">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product-test.php">Catalog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-warning" href="sale.php">Sale</a>
            </li>
            <a class="d-none d-lg-block" href="#"><img src="icons/ss.png" width="50px"></a>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about_us.php">About</a>
            </li>
            <?php
            if (isset($_SESSION['user'])) {
                echo '<li class="nav-item">
                        <a class="nav-link" href="logout.php?logout">Logout</a>
                    </li>';
            } else {
                echo '<li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>';
            }
            ?>
        </ul>
        <a href="cart.php" class="position-relative">
            <img src="icons/cart-2.png" class="me-3" width="40px">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-black">
                <!-- {{number}} -->
                <span class="visually-hidden ">unread messages</span>
            </span>
        </a>
    </div>

</nav>