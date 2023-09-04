<?php
session_start();

if (isset($_SESSION["user"])) { // if a session "user" is exist and have a value
    header("Location: home.php"); // redirect the user to the home page
}

if (isset($_SESSION["adm"])) { // if a session "adm" is exist and have a value
    header("Location: dashboard.php"); // redirect the admin to the dashboard page
}

require_once "db_connect.php";
require_once "file_upload.php";

$error = false;  // by default, a varialbe $error is false, means there is no error in our form

function cleanInputs($input)
{
    $data = trim($input); // removing extra spaces, tabs, newlines out of the string
    $data = strip_tags($data); // removing tags from the string
    $data = htmlspecialchars($data); // converting special characters to HTML entities, something like "<" and ">", it will be replaced by "&lt;" and "&gt"; 

    return $data;
}

$fname = $lname = $email = $address = ""; // define variables and set them to empty string
$fnameError = $lnameError = $emailError = $dateError = $passError = $addressError = ""; // define variables that will hold error messages later, for now empty string 

if (isset($_POST["sign-up"])) {
    $fname = ($_POST["fname"]);
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = cleanInputs($_POST["password"]);
    $picture = fileUpload($_FILES["picture"]);
    $address = $_POST["address"];

    // simple validation for the "first name"
    if (empty($fname)) {
        $error = true;
        $fnameError = "Please, enter your first name";
    } elseif (strlen($fname) < 3) {
        $error = true;
        $fnameError = "Name must have at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $fname)) {
        $error = true;
        $fnameError = "Name must contain only letters and spaces.";
    }

    // simple validation for the "last name"
    if (empty($lname)) {
        $error = true;
        $lnameError = "Please, enter your last name";
    } elseif (strlen($lname) < 3) {
        $error = true;
        $lnameError = "Last name must have at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $lname)) {
        $error = true;
        $lnameError = "Last name must contain only letters and spaces.";
    }

    // simple validation for the "date of birth"


    // simple validation for the "date of birth"
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // if the provided text is not a format of an email, error will be true
        $error = true;
        $emailError = "Please enter a valid email address";
    } else {
        // if email is already exists in the database, error will be true
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) != 0) {
            $error = true;
            $emailError = "Provided Email is already in use";
        }
    }

    // simple validation for the "password"
    if (empty($password)) {
        $error = true;
        $passError = "Password can't be empty!";
    } elseif (strlen($password) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters.";
    }

    if (empty($address)) {
        $error = "ture";
        $addressError = "Please enter you address";
    }

    if (!$error) { // if there is no error with any input, data will be inserted to the database
        // hashing the password before inserting it to the database
        $password = hash("sha256", $password);

        $sql = "INSERT INTO users (`FirstName`, `LastName`, `email`, `password`, `address`, `picture`) VALUES ('$fname','$lname', '$email', '$password', '$address', '$picture[0]')";

        $result = mysqli_query($connect, $sql);

        if ($result) {
            echo "<div class='alert alert-success'>
                <p>New account has been created, $picture[1]</p>
            </div>";
            header('refresh: 2; url = login.php');
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
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="container test">
        <h1 class="text-center">Create an account</h1>
        <form method="post" autocomplete="off" enctype="multipart/form-data" class="mt-2 mb-5">
            <div class="mb-3 mt-3">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control rounded-0" id="fname" name="fname" placeholder="First name" value="<?= $fname ?>">
                <span class="text-danger"><?= $fnameError ?></span>
            </div>
            <div class="mb-3">
                <label for="lname" class="label">Last name</label>
                <input type="text" class="form-control rounded-0" id="lname" name="lname" placeholder="Last name" value="<?= $lname ?>">
                <span class="text-danger"><?= $lnameError ?></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="Email address" value="<?= $email ?>">
                <span class="text-danger"><?= $emailError ?></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-0" id="password" name="password">
                <span class="text-danger"><?= $passError ?></span>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Profile picture</label>
                <input type="file" class="form-control rounded-0" id="picture" name="picture">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Address</label>
                <input type="text" class="form-control rounded-0" id="address" name="address" placeholder="Address" value="<?= $address ?>">
                <span class="text-danger"><?= $addressError ?></span>
            </div>
            <button name="sign-up" type="submit" class="btn btn-primary rounded-0">Create account</button>

            <span>Do you have an account already? <a href="login.php">Sign in here</a></span>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>