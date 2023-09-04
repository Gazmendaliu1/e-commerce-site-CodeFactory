<?php
session_start();

if (isset($_SESSION["user"])) { // if a session "user" is exist and have a value
    header("Location: index.php"); // redirect the user to the home page
}

if (isset($_SESSION["adm"])) { // if a session "adm" is exist and have a value
    header("Location: index.php"); // redirect the admin to the dashboard page
}

require_once "db_connect.php";

$error = false;  // by default, a varialbe $error is false, means there is no error in our form

function cleanInputs($input)
{
    $data = trim($input); // removing extra spaces, tabs, newlines out of the string
    $data = strip_tags($data); // removing tags from the string
    $data = htmlspecialchars($data); // converting special characters to HTML entities, something like "<" and ">", it will be replaced by "&lt;" and "&gt";

    return $data;
}

$email = ""; // define variables and set them to empty string
$emailError = $passError = ""; // define variables that will hold error messages later, for now empty string

if (isset($_POST["login"])) {
    $email = cleanInputs($_POST["email"]);
    $password = cleanInputs($_POST["password"]);

    // simple validation for the "date of birth"
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // if the provided text is not a format of an email, error will be true
        $error = true;
        $emailError = "Please enter a valid email address";
    }

    // simple validation for the "password"
    if (empty($password)) {
        $error = true;
        $passError = "Password can't be empty!";
    }

    if (!$error) { // if there is no error with any input, data will be inserted to the database
        // hashing the password before inserting it to the database
        $password = hash("sha256", $password);

        $sql = "SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password'";

        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            if ($row["status"] == "adm") {
                $_SESSION["adm"] = $row["id"]; // here a new session will be created with the name adm and it will save the user id
                header("Location: index.php");
            } else {
                $_SESSION["user"] = $row["id"]; // here a new session will be created with the name user and it will save the user id
                header("Location: index.php");
            }
        } else {
            echo "<div class='alert alert-danger'>
                        <p>Something went wrong, please try again later ...</p>
                      </div>";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">STREET STYLE</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Welcome to login</h2>
                                <p>Don't have an account?</p>
                                <a href="register.php" class="btn btn-white btn-outline-white rounded-0">Register here</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>

                            </div>
                            <!--  <form action="#" class="signin-form"> -->
                            <form action="login.php" method="post" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="Email address" value="<?= $email ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control rounded-0" id="password" name="password">
                                    <span class="text-danger"><?= $passError ?></span>
                                </div>
                                <div class="form-group">
                                    <button name="login" type="submit" class="form-control btn btn-primary submit px-3 rounded-0">Log In</button>
                                </div>

                            </form>



                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>