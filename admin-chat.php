<?php
    require_once "db_connect.php";
    session_start();

    if(!isset($_SESSION["adm"])){
        header("Location: index.php");
    }

    $admin_id = $_SESSION["adm"];
    

    // -------------------------------VARIABLES----------------------------
    
    $current_conversation_id = "";
    $selected_user_id = "";

    $nav_logged_out = "<li><a href='login.php'>Log in</a></li>
                        <li><a href='register.php'>Register</a></li>";
    $nav_logged_in = "<li><a href='logout.php?logout'>Logout</a></li>";
    
    // -----------------------------------------------------------


    if(isset($_SESSION["adm"])){
        $nav = $nav_logged_in;

        $sql_user = "SELECT * FROM `users` WHERE `id` = '$admin_id'";
        $result_user = mysqli_query($connect, $sql_user);
        $row_user = mysqli_fetch_assoc($result_user);
        $profile_picture = $row_user["picture"];

        $session = "user";
    }
    else{
        $nav = $nav_logged_out;
        
        $session = "guest";
        
        $profile_picture = "avatar.png";
    }

    $right = "<p class='select-user'>Please select a user to chat</p>";
    $slideout = "";

//     if(isset($_POST["user"])){
//         $selected_user_id = $_POST["user_id"];

//         $sql_selected_user = "SELECT * FROM `users` WHERE `id` = '$selected_user_id'";
//         $result_selected_user = mysqli_query($connect, $sql_selected_user);
//         $row_selected_user = mysqli_fetch_assoc($result_selected_user);

//         $selected_user_picture = $row_selected_user["picture"];
//         $selected_user_fname = $row_selected_user["FirstName"];
//         $selected_user_lname = $row_selected_user["LastName"];
//         $selected_user_email = $row_selected_user["email"];

//         $sql_current_conversation = "SELECT * FROM `conversation` WHERE `user_id` = '$selected_user_id' AND `status` = 'open'";
//         $result_current_conversation = mysqli_query($connect, $sql_current_conversation);
//         $row_current_conversation = mysqli_fetch_assoc($result_current_conversation);
//         $current_conversation_id = $row_current_conversation["id"];

//         $sql_load_messages = "SELECT * FROM `messages` WHERE `conversation_id` = '$current_conversation_id'";
//         $result_load_messages = mysqli_query($connect, $sql_load_messages);

//         $card_message = "";
//         $bug_fix_con_id = $current_conversation_id;

//         while($row_load_messages = mysqli_fetch_assoc($result_load_messages)){

//                 $message = $row_load_messages["message"];
//                 $users_id = $row_load_messages["user_id"];
//                 $time = $row_load_messages["message_time"];
                
//                 if($row_load_messages["user_id"] != $admin_id){
                    
//                     // $sql_user_name = "SELECT * FROM `users` WHERE `id` = '$admin_id'";
//                     // $result_admin_name = mysqli_query($connect, $sql_admin_name);
//                     // $row_admin_name = mysqli_fetch_assoc($result_admin_name);
//                     // $admin_name = $row_admin_name["FirstName"];
                    
//                     $card_message .= "<div class='message-container2'>
//                     <div class='message2'>
//                     <div class='message-top'>
//                     <p class='name'>- $selected_user_fname $selected_user_lname -</p>
//                     </div>
//                     <div class='message-middle'>
//                     <p class='message-text'>$message
//                     </p>
//                     </div>
//                     <div class='message-bottom'>
//                     <p class='date'>$time</p>
//                     </div>
//                     </div>
//                     </div>";
//                 }else{
//                     $card_message .= "<div class='message-container'>
//                     <div class='message'>
//                     <div class='message-top'>
//                     <p class='name'>- you -</p>
//                     </div>
//                     <div class='message-middle'>
//                     <p class='message-text'>$message
//                     </p>
//                     </div>
//                     <div class='message-bottom'>
//                     <p class='date'>$time</p>
//                     </div>
//                     </div>
//                     </div>";
//                 }
//         }


//         $right = "<div class='header'>
//         <img src='profile_pictures/$selected_user_picture' alt='users profile-picture'>
//         <p class='user-name'>$selected_user_fname $selected_user_lname</p>
//         <img id='open-slideout' src='icons/arrow-down.png' alt='open slideout menu'>
//         <img id='open-slideout2' src='icons/arrow-down.png' alt='open slideout menu'>
//     </div>
    
//     <div class='middle' id='middle'>$card_message</div>
    
//     <div class='bottom'>
//         <form method='post' id='message-form'>
//             <textarea name='message' class='message' cols='30' rows='3' id='message' placeholder='Your message...'></textarea>
//             <input name='id_holder' id='selected-user-id' value='$selected_user_id' style='display: none;'>
//             <button type='submit' name='send' class='send'><img src='icons/send.png' alt='Send message'></button>
//         </form>
//     </div>";
    
//     $slideout = "<img class='user-profile-picture' src='profile_pictures/$selected_user_picture' alt='users profile picture'>
//     <p class='first-name'>First name:<br><span>$selected_user_fname</span></p>
//     <p class='last-name'>Last name:<br><span>$selected_user_lname</span></p>
//     <p class='email'>Email:<br><span>$selected_user_email</span></p>
//     <p class='id'>User ID:<br><span>$selected_user_id</span></p>";
// }


// if(isset($_POST["send"]) && !empty($_POST["message"])){
//     $message = $_POST["message"];
//     $user_id_holder = $_POST["id_holder"];

//     $sql_bug_conversation = "SELECT * FROM `conversation` WHERE `user_id` = $user_id_holder AND `status` = 'open'";
//     $result_bug_conversation = mysqli_query($connect, $sql_bug_conversation);
//     $row_bug_conversation = mysqli_fetch_assoc($result_bug_conversation);
//     $bug_conversation_id = $row_bug_conversation["id"];

//     $sql_new_message = "INSERT INTO `messages`(`message`, `conversation_id`, `user_id`) VALUES ('$message', $bug_conversation_id,$admin_id)";
//     $result_new_message = mysqli_query($connect, $sql_new_message);


//     $sql_update_admin_id = "UPDATE `conversation` SET `admin_id`=$admin_id WHERE `id` = $bug_conversation_id";
//     $result_update_admin_id = mysqli_query($connect, $sql_update_admin_id);
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Chat</title>
    <link rel="stylesheet" href="styles/admin-chat.css">
</head>
<body>


        <div id="alert-container">
        </div>
        <div id="alert">
            <div class="header">Sure to close conversation?</div>
            <button id="yes">Yes</button>
        </div>


        <header>
        <nav>
            <ul class="left">
                <li><a href="index.php">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <form>
                <input type="text" placeholder="Search">
                <button><img src="icons/search.png" alt="search button"></button>
            </form>
            <ul class="right">
                <?=$nav?>
                <li><div class="profile-picture" style="background-image: url('profile_pictures/<?=$profile_picture?>')"></div></li>
            </ul>
        </nav>
    </header>

    <main>

        <div class="application">
            <div class="left">
                <div class="header">
                    <p class="user-header">
                        Open Chats
                    </p>
                    <hr>
                    <form method="POST" class="search-form" id="search-form">
                        <input name="search" id="search" type="text" class="search-field" placeholder="Search user...">
                    </form>
                </div>
                <div class="user-container" id="user-container">
                  
                    
                </div>
            </div>

            <div class="right" id="right">
                <?=$right?>
            </div>
            
            <div class="slideout" id="slideout">
                <p class="header" id="header">User Information</p>
                <div class="info-container" id="info-container">
                    <?=$slideout?>
                </div>
                <button class="close-conversation" id="close-conversation">Close conversation</button>
            </div>
        </div>
    </main>

    <script>
        const alertContainer = document.getElementById("alert-container");
        const alert = document.getElementById("alert");
        const slideout = document.getElementById("slideout");
        const openSlideout = document.getElementById("open-slideout");
        const openSlideout2 = document.getElementById("open-slideout2");
        const header = document.getElementById("header");
        const infoContainer = document.getElementById("info-container");
        const closeConversation = document.getElementById("close-conversation");
        const user_id = document.getElementsByClassName("user_id");
        let variable = "x";

       


        function loadUser(){
            
            let xhttp = new XMLHttpRequest();
            // console.log("test")
         
            xhttp.open("GET", "AJAX/load_users.php");
            xhttp.onload = function() {
                if(xhttp.status == 200){
                    const userContainer = document.getElementById("user-container");
                    userContainer.innerHTML = "";
                    userContainer.innerHTML += this.responseText;
                    
                    loadSecond()
                    
                    // console.log(userId)

                    // if(middle.scrollheight > middle.offsetHeight){
                    // middle.classList.remove("scroll");
                    // }else{
                    //     middle.classList.add("scroll")
                    // }
                    // middle.scrollTop = middle.scrollHeight;
                  
                };
                
            };

            xhttp.send();
        }
        loadUser()
        

            // const user_name_button = document.getElementsByClassName("user-name-buttton")
            
            // for(k = 0 ; k < user_name_button.length ; k++){

            //     user_name_button[k].addEventListener("click", function(e){
            //        e.preventDefault()
            //     })
            // }
            
            

            
        function searchUser(){
            search.addEventListener("keydown", function(){
                let xhttp = new XMLHttpRequest();
         
                xhttp.open("GET", "AJAX/search_user.php?x="+search.value);
                xhttp.onload = function() {
                    if(xhttp.status == 200){
                        const userContainer = document.getElementById("user-container")
                        userContainer.innerHTML = this.responseText
                    }
                }

                xhttp.send();
            })
        }

        function checkForSearch(){
            const search = document.getElementById("search");
            if(search.value = ""){
                loadUser()
                loadEventlisteners()
            }
        }



        function loadSecond(){
            searchUser()
            const user = document.querySelectorAll(".user");
            // loadUser()
            for(let u = 0 ; u < user.length ; u++){

                user[u].addEventListener("submit", (e)=>{
                    e.preventDefault();
                    // loadMessages()
                    // loadRight()


                    const questions = document.getElementById("middle");
                    const right = document.getElementById("right");
                    
                    let xhttp = new XMLHttpRequest();
                 
                    xhttp.open("GET", "AJAX/load_right_admin.php?x="+user_id[u].value)
                    xhttp.onload = function() {
                        // console.log(JSON.parse(this.responseText));
                        if(xhttp.status == 200){
                            // console.log(this.responseText)
                            right.innerHTML = "";
                            right.innerHTML = this.responseText;
                            const middle = document.getElementById("middle");
                            const slideout = document.getElementById("slideout");
                            const openSlideout = document.getElementById("open-slideout");
                            const openSlideout2 = document.getElementById("open-slideout2");
                            const infoContainer = document.getElementById("info-container");
                            const closeConversation = document.getElementById("close-conversation");

                            if(middle.scrollHeight > middle.offsetHeight){
                            middle.classList.add("scroll");
                            }else{
                                middle.classList.remove("scroll")
                            }
                            middle.scrollTop = middle.scrollHeight;

                            if(document.getElementById("message-form")){
                                document.getElementById("message-form").addEventListener("submit", function(){
                                    writeMessage(user_id[u].value)
                                })
                            }
                            if(document.getElementById("yes")){
                                document.getElementById("yes").addEventListener("click", function(){
                                    yesCloseConversation(user_id[u].value)
                                })
                            }
                            loadEventlisteners()
                        }
                    }
                    loadSlideout(user_id[u].value)
                    
                    xhttp.send();

                    for(let s = 0 ; s < user.length ; s++){
                       
                        user[s].classList.remove("selected")
                    }
                    
                        user[u].classList.add("selected")

                    repeatFunctionsVariable(user_id[u].value)
                })
            }
        }



        

        function writeMessage(userId){
            event.preventDefault()
            // console.log("hallo");
            let user_id = userId;
            let message = document.getElementById("message").value;
            let params=`user_id=${user_id}&message=${message}`;
            // console.log(params)
            let request = new XMLHttpRequest();

            request.open("POST", "AJAX/write-message-admin.php?x="+userId, true); 
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.onload=function(){
                if(this.status==200){
                // console.log("hallo")
                loadMessages(userId)
                document.getElementById("message").value = "";
            }
            }
            request.send(params);
        }

     
            function loadEventlisteners(){
                const middle = document.getElementById("middle");
                const slideout = document.getElementById("slideout");
                const openSlideout = document.getElementById("open-slideout");
                const openSlideout2 = document.getElementById("open-slideout2");
                const infoContainer = document.getElementById("info-container");
                const closeConversation = document.getElementById("close-conversation");
                const searchForm = document.getElementById("search-form");
                const search = document.getElementById("search");

                closeConversation.addEventListener("click", function(){

                    alertContainer.style.opacity = '1';
                    alertContainer.style.zIndex = '1000';
                    alert.style.zIndex = '1100';
                    alert.style.opacity = '1';
                    alert.style.width = '550px';
                    alert.style.height = '350px';
                    document.body.style.overflowY = 'hidden';
                    // console.log(alertContainer);

                    alertContainer.addEventListener("click", function(){

                        alertContainer.style.opacity = '0';
                        alertContainer.style.zIndex = '-100';
                        alert.style.opacity = '0';
                        alert.style.zIndex = '-110';
                        document.body.style.overflowY = 'scroll';

                    })
                })
        
            
            
            openSlideout.addEventListener("click", function(){
                slideout.style.minWidth = `350px`;
                slideout.style.width = '30vw';
                middle.style.width = '100%';
                openSlideout.style.transform = 'translateY(-50%) rotate(-90deg)';
                openSlideout2.style.transform = 'translateY(-50%) rotate(-90deg)';
                openSlideout.style.visibility = 'hidden';
                openSlideout2.style.visibility = 'visible';
                openSlideout.style.zIndex = '-50';
                openSlideout2.style.zIndex = '50';
                slideout.style.opacity = '1';
                header.style.marginRight = '0';
                infoContainer.style.marginRight = '0';
                closeConversation.style.marginRight = '0';
                
                openSlideout2.addEventListener("click", function(){
                    slideout.style.minWidth = '0px';
                    slideout.style.width = '0px';
                    middle.style.width = '100%';
                    openSlideout.style.transform = 'translateY(-50%) rotate(90deg)';
                    openSlideout2.style.transform = 'translateY(-50%) rotate(90deg)';
                    openSlideout.style.visibility = 'visible';
                    openSlideout2.style.visibility = 'hidden';
                    openSlideout.style.zIndex = '50';
                    openSlideout2.style.zIndex = '-50';
                    slideout.style.opacity = '0';
                    header.style.marginRight = '-20rem';
                    infoContainer.style.marginRight = '-20rem';
                    closeConversation.style.marginRight = '-20rem';
                })
            })
        }

        


        function loadMessages(userId){
            // const right = document.getElementById("right");
            
            let xhttp = new XMLHttpRequest();
         
            xhttp.open("GET", "AJAX/load_messages_admin.php?x="+userId);
            xhttp.onload = function() {
                // console.log("test")
                if(xhttp.status == 200){
                    const middle = document.getElementById("middle");
                    middle.innerHTML = "";
                    middle.innerHTML += this.responseText;
                    
                    // console.log(middle.scrollHeight)
                    console.log(middle.offsetHeight)

                    if(middle.scrollHeight > middle.offsetHeight){
                    middle.classList.add("scroll")
                        middle.classList.remove("scroll")
                    }
                  
                };
                
            };

            xhttp.send();
        }


        function loadSlideout(userId){
            // const right = document.getElementById("right");
            
            let xhttp = new XMLHttpRequest();
         
            xhttp.open("GET", "AJAX/load_slideout.php?x="+userId);
            xhttp.onload = function() {
                // console.log("test")
                if(xhttp.status == 200){
                    const infoContainer = document.getElementById("info-container")
                    infoContainer.innerHTML = ""
                    infoContainer.innerHTML += this.responseText;
                    
                    // console.log(userId)
                    
                }
                
            }
            
            xhttp.send()
        }
        
        
        function yesCloseConversation(userId){

            const middle = document.getElementById("middle");
            const slideout = document.getElementById("slideout");
            const openSlideout = document.getElementById("open-slideout");
            const openSlideout2 = document.getElementById("open-slideout2");
            const infoContainer = document.getElementById("info-container");
            const closeConversation = document.getElementById("close-conversation");
            const userIdSlideout = document.getElementById("slideout-id");
            
            event.preventDefault()
            // console.log("hallo");
            let user_id = userIdSlideout.innerHTML;
            let params=`user_id=${user_id}`;
            // console.log(params)
            let request = new XMLHttpRequest();
            
            request.open("POST", "AJAX/close_conversation.php?x="+user_id, true); 
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.onload=function(){
                if(this.status==200){
                    const right = document.getElementById("right");
                    right.innerHTML = '';
                    infoContainer.innerHTML = "";
                    right.innerHTML = "<p class='select-user'>Please select a user to chat</p>";

                    slideout.style.minWidth = '0px';
                    slideout.style.width = '0px';
                    middle.style.width = '100%';
                    openSlideout.style.transform = 'translateY(-50%) rotate(90deg)';
                    openSlideout2.style.transform = 'translateY(-50%) rotate(90deg)';
                    openSlideout.style.visibility = 'visible';
                    openSlideout2.style.visibility = 'hidden';
                    openSlideout.style.zIndex = '50';
                    openSlideout2.style.zIndex = '-50';
                    slideout.style.opacity = '0';
                    header.style.marginRight = '-20rem';
                    infoContainer.style.marginRight = '-20rem';
                    closeConversation.style.marginRight = '-20rem';
                    
                    alertContainer.style.opacity = '0';
                    alertContainer.style.zIndex = '-100';
                    alert.style.opacity = '0';
                    alert.style.zIndex = '-110';
                    document.body.style.overflowY = 'scroll';
                    loadUser()
                    clearInterval(Interval)
            }
            }
            request.send(params);
        }

        let Interval = "test";

        function repeatFunctionsVariable(value){
            if(variable != "x"){

                clearInterval(Interval)
            }

            variable = value
            repeatFunctions(value)
            // loadEventlisteners()
        }
        


        function repeatFunctions(userId){
             Interval = setInterval(function(){ 
                checkForSearch()
                loadMessages(userId)
            }, 3000);
        }


        



       

    </script>
</body>
</html>