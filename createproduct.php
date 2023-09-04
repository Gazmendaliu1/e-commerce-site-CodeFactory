<?php
session_start();
require_once "db_connect.php";
require_once "file_uploadproduct.php";
include 'inc/navbar_admin.php';

// $currentId = $_SESSION['user']??$_SESSION["adm"];
$sql = "SELECT * FROM users";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);


if (isset($_POST['create'])) {
    $price = $_POST['price'];

    $title = $_POST['title'];
    $description = $_POST['description'];
    $gender = $_POST['gender'];
    $availability = $_POST['availability'];

    $picture = fileUpload($_FILES['picture'], "product");



    $sql = "INSERT INTO `products`(`picture`, `title`, `description`, `gender`, `availability`,`price`)
        VALUES ('$picture[0]','$title','$description','$gender','$availability','$price')";


    if (mysqli_query($connect, $sql)) {
        echo  "<div class='alert alert-success' role='alert'>
                New record has been created!,{$picture[1]}
              </div>";

        header('refresh: 3; url = product-test.php');
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                Record error , {$picture[1]}
              </div> <br>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>


    <div class="container mt-5 mb-5">
        <h2>Create a new item </h2>
        <form method="POST" enctype="multipart/form-data">


            <div class="container mt-5">
                <h2></h2>

                <div class="mb-1 mt-1">
                    <label for="title" class="form-label ">Title</label>
                    <input type="text" class="form-control rounded-0" id="title" name="title">
                </div>


                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-1 mt-1">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control rounded-0" id="price" name="price">
                    </div>




                    <div class="mb-1 mt-1">
                        <label for="description" class="form-label ">Description</label>
                        <textarea class="form-control rounded-0" id="description" name="description" rows="5"></textarea>
                    </div>


                    <div class="mb-1 mt-1">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select rounded-0" id="gender" name="gender">
                            <option value="male" <?= isset($row["gender"]) && $row["gender"] === 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= isset($row["gender"]) && $row["gender"] === 'female' ? 'selected' : '' ?>>Female</option>

                        </select>
                    </div>


                    <div class="mb-1 mt-1">
                        <label for="availability" class="form-label">Availability</label>
                        <select class="form-select rounded-0" id="availability" name="availability">
                            <option value="Yes" <?= isset($row["availability"]) && $row["availability"] === 'Yes' ? 'selected' : '' ?>>Yes</option>
                            <option value="No" <?= isset($row["availability"]) && $row["availability"] === 'No' ? 'selected' : '' ?>>No</option>
                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control rounded-0" id="picture" aria-describedby="picture" name="picture">
                    </div>
                    <button name="create" type="submit" class="btn btn-dark rounded-0">Create product</button>
                    <a href="product-test.php" class="btn btn-dark rounded-0">Back to home page</a>
                </form>
            </div>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>