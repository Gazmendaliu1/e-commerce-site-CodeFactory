<?php

if(isset($_SESSION["user"])){
    $id_current_user = $_SESSION["user"];
    $sql = "SELECT * FROM `users` WHERE `id` = $id_current_user AND `ban` = 'yes'";
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "<div id='ban-background'>
                    <div id='ban-container'>
                        <p>You account has been banned<br>Please try again later...</p>
                    </div>
                </div>";
    }

}

?>


<script>
    if(document.getElementById("ban-background")){
        document.body.style.overflow = 'hidden';
    }
</script>