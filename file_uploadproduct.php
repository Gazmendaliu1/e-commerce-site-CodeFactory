<?php
function fileUpload($picture, $source = "user")
{

    if ($picture["error"] == 4) { // checking if a file has been selected, it will return 0 if you choose a file, and 4 if you didn't
        $pictureName = "avatar.png"; // the file name will be avatar.png (default picture for a user)

        if ($source == "product") {
            $pictureName = "product.png";
        }

        $message = "No picture has been chosen, but you can upload an image later :)";
    } else {
        $checkIfImage = getimagesize($picture["tmp_name"]); // checking if you selected an image, return false if you didn't select an image
        $message = $checkIfImage ? "Ok" : "Not an image";
    }

    if ($message == "Ok") {
        $ext = strtolower(pathinfo($picture["name"], PATHINFO_EXTENSION)); // taking the extension data from the image
        $pictureName = uniqid("") . "." . $ext; // changing the name of the picture to random string and numbers
        $destination = "productpictures/{$pictureName}"; // where the file will be saved
        /*  >  ./ WORKS WITH USERS
            >   ../   WORKS WITH PRODUCTS    */

        if ($source == "product") {
            $destination = "productpictures/{$pictureName}";
        }

        move_uploaded_file($picture["tmp_name"], $destination); // moving the file to the pictures folder
    } elseif ($message == "Not an image") {
        $pictureName = "avatar.png"; // the file name will be avatar.png (default picture for a user)
        $message = "the file that you selected is not an image, you can upload a picture later";
    }

    return  [$pictureName, $message]; // returning the name of the picture and the message
}