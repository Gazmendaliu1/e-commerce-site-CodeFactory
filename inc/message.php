<?php 

if(isset($_SESSION["user"])){
    
    $id_user = $_SESSION["user"];
    
    
}elseif(isset($_SESSION["adm"])){
    
    $id_user = $_SESSION["adm"];
}

    
if(!isset($_SESSION["user"])){
 
    $messager = "
        <div class='login-container'>
            <div class='card'>
                <p>Log in to chat</p>
                <a href='login.php'>Log in</a>
            </div>
        </div>";

}else{

    $input_value = "user";
    $messager = "";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/message.css">
</head>
<body>

<input type="text" id="input" value="<?=$input_value?>" style="display: none;">

<div id="icon"></div>

<div id="messager">
    <div class="top">
        <img id="arrow" src="icons/arrow-down.png" alt="close messager">
        <p class="header">Live chat</p>
    </div>
    <div class="middle" id="middle">
       <?=$messager?>
    </div>
    <div class="bottom">
        <form class="form-text" name="form" method="post" id='form-message'><input type="text" name="user-id" id="user-id" value="<?=$id_user?>" style="display: none;"><textarea id="message" name="text" class="text" rows="2" placeholder="Write here..."></textarea>
        <button type="submit" name="send_msg" id="send_msg"><img src="icons/send.png" alt="send message"></button></form>
    </div>
</div>


        
    
<script>
    const icon = document.getElementById("icon");
    const messager = document.getElementById("messager");
    const arrow = document.getElementById("arrow");
    const middle = document.getElementById("middle");
    const send = document.getElementById("send_msg");


    
    
    
    
    icon.addEventListener("click", function(){
        // console.log(event);
        icon.style.bottom = '-100px';
        messager.style.bottom = '8vh';
        
        
        if(document.getElementById("input").value == "user"){
            loadMessages();
            middle.scrolltop = middle.scrollheight
        }

        arrow.addEventListener("click", function(){
            messager.style.bottom = 'calc(-55vh - 500px)';
            icon.style.bottom = '8vh';

        })
    })


        function loadMessages(){
            let xhttp = new XMLHttpRequest();
            
            xhttp.open("GET", "AJAX/load_messages.php");
            xhttp.onload = function() {
                if(xhttp.status == 200){
                    let scrollBottom = "no"
                    if(middle.scrollTop = middle.scrollHeight - middle.offsetHeight){
                        scrollBottom = "yes"
                    }
                    
                    // middle.innerHTML = "";
                    // console.log(scrollBottom)
                    if(this.responseText != middle.innerHTML){

                        middle.innerHTML = this.responseText;
                    }

                    if(middle.scrollHeight > middle.offsetHeight){
                    middle.classList.add("Scrollbar");
                    // console.log("test")
                    }else{
                        middle.classList.remove("Scrollbar")
                    }

                    if(scrollBottom == "yes"){

                        middle.scrollTop = middle.scrollHeight;
                    }
                };
                
            };
            xhttp.send();
        }

        document.getElementById("form-message").addEventListener("submit", writeMessage)

        function writeMessage(e){
            
        
                    e.preventDefault();
                    // console.log(rating);
                    let user_id = document.getElementById("user-id").value;
                    let message = document.getElementById("message").value;
                    let params=`user_id=${user_id}&message=${message}`;
                    // console.log(params)
                    let request = new XMLHttpRequest();
        
                    request.open("POST", "AJAX/write-message-user.php", true); 
                    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    request.onload=function(){
                        if(this.status==200){
                        // console.log(this.responseText)
                        loadMessages()
                        document.getElementById("message").value = "";
                        middle.scrollTop = middle.scrollHeight
                    }
                    }
                    request.send(params); 
                    
                }

              

                function repeatFunctions(){
                    Interval = setInterval(function(){ 
                        loadMessages()
                    }, 1000);
                }
                repeatFunctions()
        
    


</script>
</body>
</html>