<?php

    require_once "db_connect.php";
    session_start();
    require_once "function.php";

    

    $id_product = $_GET["x"];
    $a = $_GET["availability"];

    $sql_product = "SELECT * FROM `products` WHERE `id` = '$id_product' ";
    $result_product = mysqli_query($connect, $sql_product);
    $row_product = mysqli_fetch_assoc($result_product);
    $product_picture = $row_product['picture'];

    $nav_logged_out = "<li><a href='login.php'>Log in</a></li>
                        <li><a href='register.php'>Register</a></li>";
    $nav_logged_in = "<li><a href='logout.php?logout'>Logout</a></li>";

    
    if(isset($_SESSION["user"])){
        
        $id_user = $_SESSION["user"];
        
        
    }elseif(isset($_SESSION["adm"])){

        $id_user = $_SESSION["adm"];
    }

    if(isset($_SESSION["user"]) || isset($_SESSION["adm"])){
        $nav = $nav_logged_in;

        $sql_user = "SELECT * FROM `users` WHERE `id` = '$id_user'";
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

    $alert = "test";

    $card_question = $question_question = $question_answear = "";



    if(isset($_SESSION["user"]) || isset($_SESSION["adm"])){
    
        $add_question_btn = "<button id='add-question'>Add a question</button>";
    }
    else{
    
        $add_question_btn = "<button id='add-question-logged-out'>Add a question</button>";
    }
   
    

    if(isset($_POST["send-question"])){

        $title = $_POST["title"];
        $question = $_POST["question"];

        $sql_new_question = "INSERT INTO `questions`(`titel`, `question`, `answeared`, `userId`, `productId`) VALUES ('$title', '$question','no','$id_user','$id_product')";
        $result_new_question = mysqli_query($connect, $sql_new_question);

        header("Location: product-details.php?x=1");
    }


    $new_answear_question_id = "";

    if(isset($_POST["send-answear"])){

        $answear = $_POST["answear"];
        $question_id = $_POST["qid"];

        $sql_new_answear = "INSERT INTO `answears`(`answear`, `question_id`, `id_user`, `id_product`) VALUES ('$answear','$question_id','$id_user','$id_product')";
        $result_new_answear = mysqli_query($connect, $sql_new_answear);
        
        $sql_update_question = "UPDATE `questions` SET `answeared`='yes' WHERE `id` = '$question_id'";
        $result_nupdate_question = mysqli_query($connect, $sql_update_question);

        header("Location: product-details.php?x=1");
    }

    
    $div_alert = "$alert
    <button class='button-alert'>Okay</button>";
    
    $add_question = "<p class='header'>Please enter you question</p>
    <form method='post'>
        <input type='text' class='title'name='title' placeholder='Title'>
        <textarea class='question' name='question' placeholder='Your question'></textarea>
        <button type='submit' name='send-question'>Send</button>
        </form>";

    $add_answear = "<p class='header'>Please enter you answear</p><form method='post'><textarea class='question' name='answear' placeholder='Your answear'></textarea><button type='submit' name='send-answear'>Send</button></form>";
        
    $div_center = $add_answear;
        

    // -------------------------------------------------Reviews------------------------

    $check_if_review = "<input name='check_if_review' value='guest' id='check_if_review' style='display: none;'";

    if(isset($_SESSION["user"])){

        $sql_check_review = "SELECT * FROM `reviews` WHERE `userId` = '$id_user' AND `productId` = $id_product";
        $result_check_review = mysqli_query($connect, $sql_check_review);
        if(mysqli_num_rows($result_check_review) > 0){
            $check_if_review = "<input name='check_if_review' value='yes' id='check_if_review' style='display: none;'";
        }else{
            $check_if_review = "<input name='check_if_review' value='no' id='check_if_review' style='display: none;'";
        }
    }



        
    if(!isset($_SESSION["adm"]) && !isset($_SESSION["superadm"])){
        include "inc/message.php";
        include "inc/ban.php";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $row_product["title"] ?></title>
    <link rel="stylesheet" href="styles/details.css">
</head>
<body>

    <input type="text" id="product-id" value="<?=$id_product?>" style="display: none;">
    <?=$check_if_review?>

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
                <li><a href="cart.php?id=<?=$row_product["id"]?>"><img src="icons/cart-2.png" height="30" loading="lazy"></a></li>
            </ul>
        </nav> 
    </header>

    <main>


        <div id="alert-container">
        </div>
        <div id="alert">
        </div>



        <div class="container-product">
            <div class="product-picture" style="background-image: url('productpictures/<?=$product_picture?>');"></div>
            <div class="text">
                <p class="title"><?=$row_product["title"]?></p>
                <div class="container-stars">
                    <div class="stars">
                            <a><img class="star margin-right" src="icons/star.png" alt="star"></a>
                            <a><img class="star margin-right" src="icons/star.png" alt="star"></a>
                            <a><img class="star margin-right" src="icons/star.png" alt="star"></a>
                            <a><img class="star margin-right" src="icons/star.png" alt="star"></a>
                            <a><img class="star" src="icons/star.png" alt="star"></a>
                            
                           <!-- <div class="hide-stars">
                                <img class="star margin-right" src="icons/star-empty.png" alt="star">
                                <img class="star margin-right" src="icons/star-empty.png" alt="star">
                                <img class="star margin-right" src="icons/star-empty.png" alt="star">
                                <img class="star margin-right" src="icons/star-empty.png" alt="star">
                                <img class="star" src="icons/star-empty.png" alt="star">
                            </div>-->
                        </div>
                        <p class="review-count" id="top-review-counter">(0)</p>
                    </div>

                <p class="card-title">100+ bought in past month</p>

                <h2 class="price">€ <?=$row_product["price"]?></h2>

                <p class="description"><?=$row_product["description"]?></p>


                
                <form method="post" class="buy-form">
                    <button href='product-details.php?x={$rowProduct["id"]}&availability={$rowProduct["availability"]}' type="submit" class="addToCart test-user">Add to cart</button>
                    <button class="addToCart test-user"><a href="product-test.php">Back to products</a></button>
                </form>
            </div>
        </div>

        <hr>

        <div class="table">

            <div class="measurement">
                <p class="product-size-header">Measurements of this product:</p>
                <p class="product-size">Chest: 100cm,  Hip: 70cm,  Legs: 100cm</p>
            </div>

            <table>
                <tr id="first-row">
                    <td class="first-td" id="border-left"></td>
                    <td class="border-bottom">Small</td>
                    <td class="border-bottom">Medium</td>
                    <td class="border-bottom">Large</td>
                    <td class="border-bottom" id="border-right">XLarge</td>
                </tr>
                <tr>
                    <td class="first-td">Chest</td>
                    <td>70cm</td>
                    <td>90cm</td>
                    <td>110cm</td>
                    <td>130cm</td>
                </tr>
                <tr>
                    <td class="first-td">Hip</td>
                    <td>70cm</td>
                    <td>80cm</td>
                    <td>90cm</td>
                    <td>100cm</td>
                </tr>
                <tr>
                    <td class="first-td">Legs</td>
                    <td>70cm</td>
                    <td>90cm</td>
                    <td>110cm</td>
                    <td>130cm</td>
                </tr>
            </table>
        </div>

        <hr>

        <div class="review">
            <p class="review-header">Reviews about this product</p>
            <div class="container-rating">
                <div class="left">
                    
                    <div class="container-average">
                        <p class="average" id="average"></p>
                        <p class="average" id="no-reviews-header">/ 5</p>
                    </div>

                    <div class="stars">
                                <a><img class="star margin-right" src="icons/star.png" alt="star"></a>
                                <a><img class="star margin-right" src="icons/star.png" alt="star"></a>
                                <a><img class="star margin-right" src="icons/star.png" alt="star"></a>
                                <a><img class="star margin-right" src="icons/star.png" alt="star"></a>
                                <a><img class="star" src="icons/star.png" alt="star"></a>
                
                                <div class="hide-stars">
                                    <img class="star margin-right" src="icons/star-empty.png" alt="star">
                                    <img class="star margin-right" src="icons/star-empty.png" alt="star">
                                    <img class="star margin-right" src="icons/star-empty.png" alt="star">
                                    <img class="star margin-right" src="icons/star-empty.png" alt="star">
                                    <img class="star" src="icons/star-empty.png" alt="star">
                                </div>
                            </div>

                    <div class="container-review-count">
                        <p class="review-count" id="review-count"></p>
                        <p class="review-count" id="no-reviews">Reviews</p>
                    </div>
                </div>

                <div class="middle">
                    <div class="rating-line">
                        <div class="rating-star">
                            <p>5</p>
                            <img src="icons/star.png" alt="star">
                        </div>
                        <div class="line-grey">
                            <div class="line-yellow"></div>
                        </div>
                        <p class="rating-count" id="rating-count-5"></p>
                    </div>
                    <div class="rating-line">
                        <div class="rating-star">
                            <p>4</p>
                            <img src="icons/star.png" alt="star">
                        </div>
                        <div class="line-grey">
                            <div class="line-yellow"></div>
                        </div>
                        <p class="rating-count" id="rating-count-4"></p>
                    </div>
                    <div class="rating-line">
                        <div class="rating-star">
                            <p>3</p>
                            <img src="icons/star.png" alt="star">
                        </div>
                        <div class="line-grey">
                            <div class="line-yellow"></div>
                        </div>
                        <p class="rating-count" id="rating-count-3"></p>
                    </div>
                    <div class="rating-line">
                        <div class="rating-star">
                            <p>2</p>
                            <img src="icons/star.png" alt="star">
                        </div>
                        <div class="line-grey">
                            <div class="line-yellow"></div>
                        </div>
                        <p class="rating-count" id="rating-count-2"></p>
                    </div>
                    <div class="rating-line">
                        <div class="rating-star">
                            <p>1</p>
                            <img src="icons/star.png" alt="star">
                        </div>
                        <div class="line-grey">
                            <div class="line-yellow"></div>
                        </div>
                        <p class="rating-count" id="rating-count-1"></p>
                    </div>
                </div>

                <div class="right">
                    <p class="write-review">Write a Review</p>
                    <button class="btn-write-review" id="test-review">Write Review</button>
                </div>
            </div>

            <div class="reviews" id="reviews">
                
            </div>
        </div>

        <hr>

        <div class="questions">
            <p class="questions-header">Questions about this product</p>

            <div class="add-question">
                <?=$add_question_btn?>
            </div>

            <div class="questions-container" id="questions-container">
            <?=$card_question?>
            </div>
        </div>


        <div id="empty" style="display: none;"></div>

        


    </main>

    <script>
        const addQuestion = document.getElementById("add-question");
        const addQuestionLoggedOut = document.getElementById("add-question-logged-out");
        const alert =  document.getElementById("alert");
        const alertContainer = document.getElementById("alert-container");
        const productId = document.getElementById("product-id");

        // if(localStorage){
        //     localStorage.getItem('scrollPosition');
        //     if (scrollPosition != "undefined" || scrollPosition != "null") {
        //         document.documentElement.scrollTop = scrollPosition;
        //     } else{
        //         document.documentElement.scrollTop = 0;
        //     }
        //     // localStorage.removeItem('scrollPosition');
        // }

      
        

        



        
        
        const xhttp = new XMLHttpRequest();
        const hideStars = document.getElementsByClassName("hide-stars");
        const stars = document.getElementsByClassName("stars");
        const AJAXaverage = document.getElementsByClassName("ajax-average");
        const ratingCount = document.getElementsByClassName("rating-count");
        const lineYellow = document.getElementsByClassName("line-yellow");
        
        
        window.addEventListener("DOMContentLoaded", function(){
            loadAverage();
            // loadReviews();
        })
        
        
        
        function loadAverage(){
            
            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", "AJAX/Average_Rating.php?x="+productId.value);
            xhttp.onload = function() {
                if(xhttp.status == 200){
                    // console.log(this.responseText);
                // document.body.innerHTML += this.responseText;
                document.getElementById("empty").innerHTML = this.responseText;
                
                let array = [];
                for(let z = 0 ; z < AJAXaverage.length ; z++){
                    array += AJAXaverage[z].value;
                }

                if(array.length > 0){

                    const Average = () =>{
                        let sum = 0;
                        for(let a in array){
                            sum = sum + Number(array[a]);
                        }
                        let Average = sum / array.length;
                        return Average
                    };
                    
                    const Width = () =>{
                        let onePercent = 5 / 100;
                        let PercentOfAverage = Average() / onePercent;
                        let width = 103 - PercentOfAverage;
                        return width;
                    };
                    
                    for(let s = 0 ; s < hideStars.length ; s++){
                        let width = Width()+"%";
                        hideStars[s].style.width = width;
                    };
                    
                    const average = document.getElementById("average");
                    average.innerHTML = Average().toFixed(1);

                    const reviewCount = document.getElementById("review-count");
                    const topReviewCounter = document.getElementById("top-review-counter");
                    reviewCount.innerHTML = array.length;
                    topReviewCounter.innerHTML = '('+array.length+')'

                }else{
                    const noReviewsHeader = document.getElementById("no-reviews-header");
                    const noReviews = document.getElementById("no-reviews");
                    for(let s = 0 ; s < hideStars.length ; s++){
                        hideStars[s].style.width = '100%';
                    };

                    for(let p = 0 ; p < lineYellow.length ; p++){
                        lineYellow[p].style.width = '0px';
                    }

                    noReviewsHeader.innerHTML = '0';
                    noReviews.innerHTML = 'No reviews yet';
                }
                    document.getElementById("rating-count-1").innerHTML = '('+document.getElementById("rating-1").value+')';
                    document.getElementById("rating-count-2").innerHTML = '('+document.getElementById("rating-2").value+')';
                    document.getElementById("rating-count-3").innerHTML = '('+document.getElementById("rating-3").value+')';
                    document.getElementById("rating-count-4").innerHTML = '('+document.getElementById("rating-4").value+')';
                    document.getElementById("rating-count-5").innerHTML = '('+document.getElementById("rating-5").value+')';


                    function chart(){
                        for(let l = 0 ; l < ratingCount.length ; l++){
                            const inputRating = document.getElementsByClassName("input-rating");
                                let chartlength = 100 / (array.length / inputRating[l].value);
                                lineYellow[l].style.width = chartlength+'%';
                        }
                    };
                    chart();

                    
                }   
            }
            xhttp.send();
        };
        
        
        function loadReviews(){
            const reviews = document.getElementById("reviews");
            
            let xhttp = new XMLHttpRequest();
         
            xhttp.open("GET", "AJAX/load_reviews.php?x="+productId.value);
            xhttp.onload = function() {
                if(xhttp.status == 200){
                        reviews.innerHTML = "";
                        reviews.innerHTML += this.responseText;
                        reviews.scrollTop = reviews.scrollHeight;
                    
                  
                    if(reviews.scrollHeight < 600){
                        reviews.classList.add("test");
                    }
                    if(reviews.scrollHeight > 600){
                        reviews.classList.remove("test");
                    }
                    // console.log(this.responseText)
                };
                
            };

            xhttp.send();
        }
        loadReviews()


        function loadQuestions(){
            const questions = document.getElementById("questions-container");
            
            let xhttp = new XMLHttpRequest();
         
            xhttp.open("GET", "AJAX/load_questions.php?x="+productId.value);
            xhttp.onload = function() {
                if(xhttp.status == 200){
                    
                    questions.innerHTML = "";
                    questions.innerHTML += this.responseText;
                    questions.scrollTop = questions.scrollHeight;
                  ;
                    if(questions.scrollHeight < 600){
                        questions.classList.add("test");
                    }
                    if(questions.scrollHeight > 600){
                        questions.classList.remove("test");
                    }
                    addAnswerBtns();
                };
                
            };

            xhttp.send();
        }
        loadQuestions()



            const writeReview = document.getElementById("test-review");
            const checkIfReview = document.getElementById("check_if_review");
            writeReview.addEventListener("click", function(){
                if(checkIfReview.value == "no"){
                    
                    alert.innerHTML = "<p class='header check'>Please write you review</p><div class='stars-write-review'><div class='star empty' id='star1'></div><div class='star empty' id='star2'></div><div class='star empty' id='star3'></div><div class='star empty' id='star4'></div><div class='star empty' id='star5'></div></div><form method='post' id='new-rating-form'><input type='text' name'new-rating' id='new-rating' style='display: none;'><input type='text' name='title-new-rating' class='title'name='title' id='title-new-rating' placeholder='Title'><textarea class='question' name='review-new-rating' id='review-new-rating' placeholder='Your review'></textarea><button type='submit' name='send-question'>Send</button></form>";
                }
                if(checkIfReview.value == "yes"){
                    alert.innerHTML = "<p class='header'>You allready wrote a review about this product</p>";
                }
                if(checkIfReview.value == "guest"){
                    alert.innerHTML = "<p class='header'>Log in to write a review</p><a href='login.php' id='link-login'>Log in</a>";
                }
                alertContainer.style.opacity = '1';
                alertContainer.style.zIndex = '100';
                alert.style.zIndex = '110';
                alert.style.opacity = '1';
                alert.style.width = '550px';
                alert.style.height = '350px';
                document.body.style.overflow = 'hidden';

                    alertContainer.addEventListener("click", function(){
                    alertContainer.style.opacity = '0';
                    alertContainer.style.zIndex = '-100';
                    alert.style.opacity = '0';
                    alert.style.zIndex = '-110';
                    document.body.style.overflow = 'scroll';

                })

                const star1 = document.getElementById("star1");
                const star2 = document.getElementById("star2");
                const star3 = document.getElementById("star3");
                const star4 = document.getElementById("star4");
                const star5 = document.getElementById("star5");
                const newRating = document.getElementById("new-rating");

                star1.addEventListener("mouseenter", function(){
                    star1.classList.remove("empty");
                    star2.classList.remove("fixed");
                    star3.classList.remove("fixed");
                    star4.classList.remove("fixed");
                    star5.classList.remove("fixed");
                    star1.addEventListener("mouseleave", function(){
                        star1.classList.add("empty");
                    })
                    star1.addEventListener("click", function(){
                        star1.classList.add("fixed");
                        star2.classList.remove("fixed");
                        star3.classList.remove("fixed");
                        star4.classList.remove("fixed");
                        star5.classList.remove("fixed");
                        newRating.value = '1';
                    })
                })

                star2.addEventListener("mouseenter", function(){
                    star1.classList.remove("empty");
                    star2.classList.remove("empty");
                    star3.classList.remove("fixed");
                    star4.classList.remove("fixed");
                    star5.classList.remove("fixed");
                        star2.addEventListener("mouseleave", function(){
                            star1.classList.add("empty");
                            star2.classList.add("empty");
                        })
                        star2.addEventListener("click", function(){
                        star1.classList.add("fixed");
                        star2.classList.add("fixed");
                        star3.classList.remove("fixed");
                        star4.classList.remove("fixed");
                        star5.classList.remove("fixed");
                        newRating.value = '2';
                    })
                })
                star3.addEventListener("mouseenter", function(){
                    star1.classList.remove("empty");
                    star2.classList.remove("empty");
                    star3.classList.remove("empty");
                    star4.classList.remove("fixed");
                    star5.classList.remove("fixed");
                        star3.addEventListener("mouseleave", function(){
                            star1.classList.add("empty");
                            star2.classList.add("empty");
                            star3.classList.add("empty");
                        })
                        star3.addEventListener("click", function(){
                        star1.classList.add("fixed");
                        star2.classList.add("fixed");
                        star3.classList.add("fixed");
                        star4.classList.remove("fixed");
                        star5.classList.remove("fixed");
                        newRating.value = '3';
                    })
                })
                star4.addEventListener("mouseenter", function(){
                    star1.classList.remove("empty");
                    star2.classList.remove("empty");
                    star3.classList.remove("empty");
                    star4.classList.remove("empty");
                    star5.classList.remove("fixed");
                        star4.addEventListener("mouseleave", function(){
                            star1.classList.add("empty");
                            star2.classList.add("empty");
                            star3.classList.add("empty");
                            star4.classList.add("empty");
                        })
                        star4.addEventListener("click", function(){
                        star1.classList.add("fixed");
                        star2.classList.add("fixed");
                        star3.classList.add("fixed");
                        star4.classList.add("fixed");
                        star5.classList.remove("fixed");
                        newRating.value = '4';
                    })
                })
                star5.addEventListener("mouseenter", function(){
                    star1.classList.remove("empty");
                    star2.classList.remove("empty");
                    star3.classList.remove("empty");
                    star4.classList.remove("empty");
                    star5.classList.remove("empty");
                        star5.addEventListener("mouseleave", function(){
                            star1.classList.add("empty");
                            star2.classList.add("empty");
                            star3.classList.add("empty");
                            star4.classList.add("empty");
                            star5.classList.add("empty");
                        })
                        star5.addEventListener("click", function(){
                        star1.classList.add("fixed");
                        star2.classList.add("fixed");
                        star3.classList.add("fixed");
                        star4.classList.add("fixed");
                        star5.classList.add("fixed");
                        newRating.value = '5';
                    })
                })

                document.getElementById("new-rating-form").addEventListener("submit", function(e){
                    
                    alertContainer.style.opacity = '0';
                    alertContainer.style.zIndex = '-100';
                    alert.style.opacity = '0';
                    alert.style.zIndex = '-110';
                    document.body.style.overflow = 'scroll';

                    e.preventDefault(); 
                    let rating = document.getElementById("new-rating").value;
                    // console.log(rating);
                    let title = document.getElementById("title-new-rating").value;
                    let review = document.getElementById("review-new-rating").value;
                    let params=`new-rating=${rating}&title-new-rating=${title}&review-new-rating=${review}`;
                    // console.log(params)
                    let request = new XMLHttpRequest();

                    request.open("POST", "AJAX/write_Review.php?x="+productId.value, true); 
                    request.setRequestHeader("Content-type","application/x-www-form-urlencoded"); //setting header for POST method
                    request.onload=function(){
                        if(this.status==200){
                        // console.log(this.responseText)
                        loadReviews()
                    }
                    }
                    request.send(params); 
                    
                    })
                })



                function addAnswerBtns(){

                    const addAnswear = document.getElementsByClassName("button-answear");
            
                    for(let a = 0 ; a < addAnswear.length; a++){
                        addAnswear[a].addEventListener("click", function(){
                            if(checkIfReview.value == "no" || checkIfReview.value == "yes"){
                    
                                alert.innerHTML = `<p class='header'>Please write you answear</p><form method='post' id='new-answear-form'><textarea class='question' name='answear' id='new-answear-text' placeholder='Your answear'></textarea><input type="text" name="qid" id='qid' value="${addAnswear[a].dataset.id}" hidden><button type='submit' name='send-answear'>Send</button></form>`;
                            }
                            if(checkIfReview.value == "guest"){
                                alert.innerHTML = "<p class='header'>Log in to write a answear</p><a href='login.php' id='link-login'>Log in</a>";
                            }
                            // $new_answear_question_id = addAnswear[i].dataset.id;
            
                            alertContainer.style.opacity = '1';
                            alertContainer.style.zIndex = '100';
                            alert.style.zIndex = '110';
                            alert.style.opacity = '1';
                            alert.style.width = '550px';
                            alert.style.height = '350px';
                            document.body.style.overflow = 'hidden';
                            
                            alertContainer.addEventListener("click", function(){
                                alertContainer.style.opacity = '0';
                                alertContainer.style.zIndex = '-100';
                                alert.style.opacity = '0';
                                alert.style.zIndex = '-110';
                                document.body.style.overflow = 'scroll';
            
                            })

                                document.getElementById("new-answear-form").addEventListener("submit", function(e){
                
                                alertContainer.style.opacity = '0';
                                alertContainer.style.zIndex = '-100';
                                alert.style.opacity = '0';
                                alert.style.zIndex = '-110';
                                document.body.style.overflow = 'scroll';
                    
                                e.preventDefault();
                                // console.log(rating);
                                let answear = document.getElementById("new-answear-text").value;
                                let qid = document.getElementById("qid").value;
                                let params=`answear=${answear}&qid=${qid}`;
                                // console.log(params)
                                let request = new XMLHttpRequest();
                    
                                request.open("POST", "AJAX/add_answear.php?x="+productId.value, true); 
                                request.setRequestHeader("Content-type","application/x-www-form-urlencoded"); //setting header for POST method
                                request.onload=function(){
                                    if(this.status==200){
                                    console.log(this.responseText)
                                    loadQuestions()
                                }
                                }
                                request.send(params); 
                                
                            })
                        })
                    }
                }




    
        if(addQuestion){
            addQuestion.addEventListener("click", function(){

                alert.innerHTML = "<p class='header'>Please write you question</p><form method='post' name='add-question-form' id='add-question-form'><input type='text' class='title' name='title' id='title-new-question' placeholder='Title'><textarea class='question' name='question' id='question-new-question' placeholder='Your question'></textarea><button type='submit' name='send-question'>Send</button></form>";
                alertContainer.style.opacity = '1';
                alertContainer.style.zIndex = '100';
                alert.style.zIndex = '110';
                alert.style.opacity = '1';
                alert.style.width = '550px';
                alert.style.height = '350px';
                document.body.style.overflow = 'hidden';
                
                alertContainer.addEventListener("click", function(){
                    alertContainer.style.opacity = '0';
                    alertContainer.style.zIndex = '-100';
                    alert.style.opacity = '0';
                    alert.style.zIndex = '-110';
                    document.body.style.overflow = 'scroll';

                })

                document.getElementById("add-question-form").addEventListener("submit", function(e){
                    
                    alertContainer.style.opacity = '0';
                    alertContainer.style.zIndex = '-100';
                    alert.style.opacity = '0';
                    alert.style.zIndex = '-110';
                    document.body.style.overflow = 'scroll';
        
                    e.preventDefault();
                    // console.log(rating);
                    let title = document.getElementById("title-new-question").value;
                    let question = document.getElementById("question-new-question").value;
                    let params=`title=${title}&question=${question}`;
                    // console.log(params)
                    let request = new XMLHttpRequest();
        
                    request.open("POST", "AJAX/add_question.php?x="+productId.value, true); 
                    request.setRequestHeader("Content-type","application/x-www-form-urlencoded"); //setting header for POST method
                    request.onload=function(){
                        if(this.status==200){
                        console.log(this.responseText)
                        loadQuestions()
                    }
                    }
                    request.send(params); 
                    
                })
            })
        }


        if(addQuestionLoggedOut){
        addQuestionLoggedOut.addEventListener("click", function(){
            alert.innerHTML = "<p class='header'>Log in to add a question</p><a href='login.php' id='link-login'>Log in</a>";
            alertContainer.style.opacity = '1';
            alertContainer.style.zIndex = '100';
            alert.style.zIndex = '110';
            alert.style.opacity = '1';
            alert.style.width = '550px';
            alert.style.height = '350px';
            document.body.style.overflow = 'hidden';

            // if(localStorage){
            //     const login = document.getElementById("link-login");

            //     login.addEventListener("click", function(){
            //         let scrollPosition = document.documentElement.scrollTop;
            //         let Url = window.location.href;

            //         localStorage.setItem('scrollPosition', scrollPosition);
            //         localStorage.setItem('Url', Url);
            //     })
            // }
            
            alertContainer.addEventListener("click", function(){
                alertContainer.style.opacity = '0';
                alertContainer.style.zIndex = '-100';
                alert.style.opacity = '0';
                alert.style.zIndex = '-110';
                document.body.style.overflow = 'scroll';

            })

        })
    }


    setInterval(function(){ 
       loadAverage()
                    }, 1000);
                    


                
            

    </script>
</body>
</html>