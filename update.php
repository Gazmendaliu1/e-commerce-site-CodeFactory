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
require_once "file_upload.php";

$id = isset($_SESSION["user"]) ? $_SESSION["user"] : $_SESSION["adm"]; // taking the value of id from the URL

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

$backBtn = "index.php";

if (isset($_SESSION["adm"])) {
    $backBtn = "index.php";
}

if (isset($_POST["update"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    
    $picture = fileUpload($_FILES["picture"]);
    /* checking if a picture has been selected in the input for the image */
    if ($_FILES["picture"]["error"] == 0) {
        /* checking if the picture name of the product is not avatar.png to remove it from pictures folder */

        if (file_exists("pictures/{$row['picture']}")) {
            unlink("pictures/{$row['picture']}");
        }
        $sql = "UPDATE users SET FirstName = '$fname', LastName = '$lname', picture = '$picture[0]', email = '$email' WHERE id = {$id}";
    } else {
        $sql = "UPDATE users SET FirstName = '$fname', LastName = '$lname', email = '$email' WHERE id = {$id}";
    }

    if (mysqli_query($connect, $sql)) {
        echo "<div class='alert alert-success' role='alert'>
         has been updated, {$picture[1]}
      </div>";
        header("refresh: 3; url=$backBtn");
    } else {
        echo "<div class='alert alert-danger' role='alert'>
        error found, {$picture[1]}
      </div>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="scss/style.scss">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Edit profile</h1>
        <form method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="fname" class="form-label">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value="<?= $row["FirstName"] ?>">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" value="<?= $row["LastName"] ?>">
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Profile picture</label>
                <input type="file" class="form-control" id="picture" name="picture">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="<?= $row["email"] ?>">
            </div>
            <button name="update" type="submit" class="btn btn-outline-dark rounded-0">Update profile</button>
            <a href="<?= $backBtn ?>" class="btn btn-outline-dark rounded-0">Back</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>