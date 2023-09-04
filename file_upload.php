<?php

    function fileUpload($picture){

        if($picture["error"] == 4){
            $pictureName = "avatar.png";
            $message = "<div class='text-single'>No picture has been chosen, but you can uploade one any time</div>";
        }else{
            $checkIfImage = getimagesize($picture["tmp_name"]);
            $message = $checkIfImage ? "ok" : "Not an image";
        }

        if($message == "ok"){
            $ext = strtolower(pathinfo($picture["name"], PATHINFO_EXTENSION));
            $pictureName = uniqid("").".".$ext;
            $destination = "profile_pictures/{$pictureName}";
            move_uploaded_file($picture["tmp_name"], $destination);
        }elseif($message == "Not an image"){
            $pictureName = "avatar.png";
            $message = "The file that you selected is not an image you can uploade a picture later";
        }

        return [$pictureName, $message];
    }