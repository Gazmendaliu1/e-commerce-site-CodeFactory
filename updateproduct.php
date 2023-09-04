<?php
require_once "db_connect.php";
require_once "file_uploadproduct.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['update'])) {

        $price = $_POST['price'];

        $title = $_POST['title'];
        $description = $_POST['description'];
        $gender = $_POST['gender'];
        $availability = $_POST['availability'];
        $picture = fileUpload($_FILES['picture'], "product");


        // Check if a picture is selected
        if ($_FILES["picture"]["error"] == 0) {
            if ($row["picture"] != "product.png") {
                unlink("productpictures/$row[picture]");
            }
        }

        $sql = "UPDATE products SET 
        price='$price', title='$title', description='$description', gender='$gender', availability='$availability',
        picture='$picture[0]' WHERE id = {$id}";


        if (mysqli_query($connect, $sql)) {
            echo "<div class='alert alert-success' role='alert'>
                Record has been updated successfully!
            </div>";
            header('refresh: 3; url = product-test.php');
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                Error updating record
            </div> <br>";
        }
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Update Product</title>
</head>

<body>
    <div class="container mt-5 mb-5">
        <h2>Update Product</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-1 mt-1">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control rounded-0" id="price" name="price" value="<?= isset($row["price"]) ? $row["price"] : '' ?>">
            </div>



            <div class="mb-1 mt-1">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control rounded-0" id="title" name="title" value="<?= isset($row["title"]) ? $row["title"] : '' ?>">
            </div>

            <div class="mb-1 mt-1">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control rounded-0" id="description" name="description" rows="5"><?= $row["description"] ?></textarea>
            </div>


            <div class="mb-1 mt-1">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select rounded-0" id="gender" name="gender">
                    <option value="male" <?= isset($row["gender"]) && $row["gender"] === 'male' ? 'selected' : '' ?>>Male</option>
                    <option value="female" <?= isset($row["gender"]) && $row["gender"] === 'female' ? 'selected' : '' ?>>Female</option>
                    <option value="children" <?= isset($row["gender"]) && $row["gender"] === 'children' ? 'selected' : '' ?>>Children</option>
                </select>
            </div>


            <div class="mb-1 mt-1">
                <label for="availability" class="form-label">Availability</label>
                <select class="form-select" id="availability" name="availability">
                    <option value="Yes" <?= isset($row["availability"]) && $row["availability"] === 'Yes' ? 'selected' : '' ?>>Yes</option>
                    <option value="No" <?= isset($row["availability"]) && $row["availability"] === 'No' ? 'selected' : '' ?>>No</option>
                </select>
            </div>



            <div class="mb-3">
                <label for="picture" class="form-label">picture</label>
                <input type="file" class="form-control" id="picture" aria-describedby="picture" name="picture">
            </div>
            <!-- Add more input fields for other product details -->

            <button name="update" type="submit" class="btn btn-outline-dark rounded-0">Update Product</button>
            <a href="product-test.php" class="btn btn-outline-dark rounded-0">Back to Home Page</a>
        </form>
    </div>
    <!-- Add the Bootstrap JS script here -->
</body>

</html>