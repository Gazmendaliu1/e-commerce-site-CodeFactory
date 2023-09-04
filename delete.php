<?php 
    require_once "db_connect.php";

    $id = $_GET["id"]; // to take the value from the parameter "id" in the url
    $sql = "SELECT * FROM products WHERE id = $id"; // finding the product
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);  // fetching the data
    if($row["picture"] != "product.png"){ // if the picture is not product.png (the detault picture) we will delete the picture
        unlink("productpictures/$row[picture]");
    }
    $delete = "DELETE FROM products WHERE id = $id"; // query to delete a record from the database
    if(mysqli_query($connect, $delete)){
        header("Location: product-test.php");
    }else {
        echo "Error";
    }
    


    

?>