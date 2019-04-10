<?php
    $thankYou = "";

    if(isset($_POST['submit-form'])) {
        $subject = $_POST["ask-subject"];

        $msg = $_POST["ask-content"];
        $msg = $msg . "\n \n----------------\n\nSent by: " . $_POST["ask-sender"];

        mail("someone@example.com", $subject, $msg);

        $thankYou = "Thanks for asking a question!";
    }
    else {
        $thankYou = "";
    }
?>

<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="Game World" content="gamesworld contact" />
        <title>Contact Game World!</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php include "php/header.php"; ?> <!-- Include header from header.php in php folder. It's a standard element of each page so this saves a lot of lines. -->

        <div class="main-container">
            <?php include "php/nav.php"; ?> <!-- Include navigation from nav.php in php folder. It's a standard element of each page so this saves a lot of lines. -->
        </div>

        <div class="container-backdrop">
            <h1>Contact us</h1>
            <div class="clearFix clearDiv-lightBorder"></div>
            <div class="contact-info">
                <p class="left-aligned">Email us at:</p>
                <p class="center-aligned">mail@generic.com</p>
                <p class="left-aligned" id="left-aligned2">Call us at:</p>
                <p class="center-aligned">0492-660066</p>
                <p class="left-aligned" id="left-aligned3">Meet us at:</p>
                <p class="adress-aligned" id="adress-alignedtop">Generic Street 123</p>
                <p class="adress-aligned">1234 AB</p>
                <p class="adress-aligned">Generic Town, Generic Province</p>
                <p class="adress-aligned">Generic Nation</p>
            </div>

            <div class="contact-form">
                <h2>Ask us directly!</h2>
                <h4 id="contact-formH4Left">Summarize your question</h4>
                <h4 id="contact-formH4Right">Your Email-adress</h4>

                <form action="" method="post">

                    <div class="inputLine-single">
                        <input type="text" placeholder="Subject" name="ask-subject">
                        <input type="text" id="inputLine-singleRight" placeholder="E-Mail" name="ask-sender">
                    </div>

                    <div class="inputLine-multiple">
                        <h4>Describe it in detail</h4>
                        <textarea placeholder="Description" maxlength="512" rows="6" name="ask-content"></textarea>
                    </div>

                    <div class="clearFix clearDiv-lightBorder"></div>
                    
                    <div  id="submit-formDiv">
                        <input type="submit" name="submit-form" value="Submit question!" id="submit-form"/>
                    </div>
                </form>

                <?php if ($thankYou != ""){echo "<p id=\"thankYou\">$thankYou</p>";} ?>
            </div>

            <div class="clearFix clearDiv-lightBorder"></div>

            <div class="contactpage-message">
                <div class="smalltalk-contact">
                    <p class="smalltalk">We hope you can find what you need and if you are in need of help, we have staff available 24/7 to answer any questions you might have!</p>
                </div>
                
                <img height="129px" width="200px" src="images\site_logo.png" alt="Image not found.">
            </div>
        </div>

        <?php include "php/footer.php"; ?> <!-- Include footer from footer.php in php folder. It's a standard element of each page so this saves a lot of lines. -->
    </body>
</html>