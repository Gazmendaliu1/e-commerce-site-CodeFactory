<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ob_start();
session_start();

require_once 'vendor/autoload.php';


$message = '';

if (isset($_POST['send'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = $_POST['subject'];
    $email_text = $_POST['email_text'];

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'testcodefactoryolga@gmail.com';
        $mail->Password = 'jgeihmuxyvrkjpub';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('testcodefactoryolga@gmail.com', 'Admin');
        $mail->addAddress('testcodefactoryolga@gmail.com');
        $mail->addReplyTo('testcodefactoryolga@gmail.com');

        $mail->addAttachment('icons/ss.png');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $email_text;

        $mail->send();
        $message = 'Message has been sent';

        ob_end_clean(); // Clean the output buffer without sending it
        header('Location: index.php');
        exit();
    } catch (Exception $e) {
        $message = 'Message could not be sent.';
        $message .= 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@500&family=Comfortaa&family=Overpass+Mono&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style_contact.css">
    <link rel="stylesheet" href="styles/style_navbar.css">
</head>

<body>
    <?php
    if (isset($_SESSION["user"])) {
        include 'inc/navbar.php';
    } elseif (isset($_SESSION["adm"])) {
        include 'inc/navbar_admin.php';
    } else {
        include 'inc/navbar_guest.php';
    } ?>


    <div class="contact_us_6">
        <div class="responsive-container-block container">
            <?php if (empty($message)) { ?>
                <form class="form-box" method="post">
                    <div class="container-block form-wrapper">
                        <div class="mob-text">
                            <p class="text-blk contactus-head">
                                Get in Touch
                            </p>
                            <p class="text-blk contactus-subhead">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Felis diam lectus sapien.
                            </p>
                        </div>
                        <div class="responsive-container-block" id="i2cbk">
                            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i10mt-3">
                                <p class="text-blk input-title">
                                    FIRST NAME
                                </p>
                                <input type="text" class="input" id="ijowk-3 first_name" name="first_name" placeholder="First Name">
                            </div>
                            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="ip1yp">
                                <p class="text-blk input-title">
                                    LAST NAME </p>
                                <input type="text" class="input" id="ipmgh-3 last_name" name="last_name" placeholder="Last Name">
                            </div>
                            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="ih9wi">
                                <p class="text-blk input-title">
                                    SUBJECT </p>
                                <input type="text" class="input" id="imgis-3 subject" name="subject" placeholder="Subject">
                            </div>
                            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i634i-3">
                                <p class="text-blk input-title">
                                    YOUR MESSAGE </p>
                                <textarea class="textinput" id="i5vyy-3 email_text" name="email_text" placeholder="Your Message"></textarea>
                            </div>
                        </div>
                        <button class="submit-btn" id="w-c-s-bgc_p-1-dm-id-2" type="submit" name="send">
                            Send
                        </button>
                    </div>
                </form>

                <div class="responsive-cell-block wk-desk-7 wk-ipadp-12 wk-tab-12 wk-mobile-12" id="i772w">
                    <div class="map-part">
                        <p class="text-blk map-contactus-head" id="w-c-s-fc_p-1-dm-id">
                            Our Address
                        </p>
                        <div>
                            <p>𝐀𝐝𝐝𝐫𝐞𝐬𝐬: Kettenbrückengasse 23 / 2 / 12, 1050 Wien</p>
                            <p>
                            <table>
                                𝐇𝐨𝐮𝐫𝐬
                                <tr>
                                    <th>Mon: </th>
                                    <td>8am - 9pm</td>
                                </tr>
                                <tr>
                                    <th>Tue: </th>
                                    <td>8am - 9pm</td>
                                </tr>
                                <tr>
                                    <th>Wed: </th>
                                    <td>8am - 9pm</td>
                                </tr>
                                <tr>
                                    <th>Thu: </th>
                                    <td>8am - 1am</td>
                                </tr>
                                <tr>
                                    <th>Fri: </th>
                                    <td>8am - 1am</td>
                                </tr>
                                <tr>
                                    <th>Sat: </th>
                                    <td>9am - 10pm</td>
                                </tr>
                                <tr>
                                    <th>Sun: </th>
                                    <td>Closed</td>
                                </tr>
                            </table>
                            </p>
                            <p>𝐏𝐡𝐨𝐧𝐞: 0699 122 551 85</p>
                        </div>
                        <div class="social-media-links mob">
                            <a class="social-icon-link" href="https://www.instagram.com/" id="ix94i-2-2">
                                <img class="link-img image-block" src="icons/instagram.png" width="30px">
                            </a>
                            <a class="social-icon-link" href="https://www.facebook.com/" id="itixd">
                                <img class="link-img image-block" src="icons/facebook.png" width="30px">
                            </a>
                            <a class="social-icon-link" href="https://business.linkedin.com/" id="izxvt">
                                <img class="link-img image-block" src="icons/linkedin.png" width="30px">
                            </a>
                        </div>
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d73509.09643845176!2d16.311503326039954!3d48.19269126530977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476da8192fde39d7%3A0xe543f0731e2b5529!2sCodeFactory!5e0!3m2!1sen!2sat!4v1692019536108!5m2!1sen!2sat" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php } else {
                echo $message;
            } ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>