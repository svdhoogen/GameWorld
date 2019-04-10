<?php
    include "php/database.php";
    session_start();

    if(isset($conn)) {
        // If platform is set in url, and it corresponds to a pre-existing platform value.
        if (isset($_GET['platform']) && $_GET['platform'] == 1 || $_GET['platform'] == 2 || $_GET['platform'] == 3) {
            $platform = "platform = " . $_GET['platform']; // Set variable $platform to "platform = " + catagoryId.
        }
        // If isn't set, default to playstation, which is 1.
        else {
            $platform = "platform = 1"; // Set variable $platform to "platform = 1".
        }

        $sql =  "SELECT gameName, gameId, gamePrice, gameImage  FROM game WHERE $platform"; // Create new variable $sql, which will contain database command which requests database items.
        $result = $conn->query($sql); // $result is data from database $conn, containing query specified in $sql variable above.
        
        // If there are more then 0 rows given back from database query above.
        if ($result->num_rows > 0) {
            // While there are rows left in the database, run through loop.
            while($row = $result->fetch_assoc()) {
                // if submitform with corresponding gameId is set, set $_SESSION product + gameId to 1, which will mean it is in your basket.
                if (isset($_POST['submit-form' . $row['gameId']])) {
                    // If session gameId isset.
                    $gameIdEx = "total" . $row["gameId"]; // Create variable which will hold the name for the session variable that will hold the times a product is ordered.
                    // Checks if a game is already in cart when user tries to order it again, and if it is already in the cart it will add 1 to the amount of times a user has ordered the product.
                    if (isset($_SESSION["$gameIdEx"]) && $_SESSION["$gameIdEx"] != 10) {
                        // If user is already at the purchasing limit(9 copies max per purchase) do nothing.
                        if ($_SESSION["$gameIdEx"] > 8) {}
                        // user is not yet at copy limit for this game, so add 1 to copies.
                        else {
                            $_SESSION["$gameIdEx"] = $_SESSION["$gameIdEx"] + 1;  // Add 1 to session variable that holds the number of copies user wants to buy of this game. 
                        }
                    }
                    // User is ordering a game not yet in cart, so it will get a new session variable
                    else {
                        // If session variable number exists, set $number to $_SESSION["number"]. This is so that you have, for example session[game$number] = 16, so that you can recall session[16], which is gameId 16
                        if(isset($_SESSION["number"])) {
                            $number = $_SESSION["number"]; // Set $number to session number.
                        }
                        else {
                            $number = 0; // Create int number if session variable number doesn't exist yet.
                        }

                        $number = $number + 1; // Add one to number.
                        $_SESSION["$gameIdEx"] = 1; // Create session variable with desired gameId and set it to 1, since user wants THIS product one time.
                        $_SESSION["game$number"] = $row["gameId"]; // Create session variable 
                        $_SESSION["number"] = $number; // Set $_SESSION number to $number.
                    }

                    header("Refresh:0;"); // Refresh the page to reset posted values, so that when you refresh the page you dont add a bunch of games unwanted to your basket.
                }
            }
        }
    }
?>

<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="Game World" content="gamesworld store shop storepage" />
        <title>Game World Storepage</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php include "php/header.php"; ?> <!-- Include header from header.php in php folder. It's a standard element of each page so this saves a lot of lines. -->

        <div class="main-container">
            <?php include "php/nav.php"; ?> <!-- Include navigation from nav.php in php folder. It's a standard element of each page so this saves a lot of lines. -->
        </div>

        <div class="product-container">
            <?php // PHP magic-ery
                $sql =  "SELECT gameName, gameId, gamePrice, gameImage  FROM game WHERE $platform"; // Create new variable $sql, which will contain database command which requests database items.

                // If connection is established to database, continue prosessing.
                if(isset($conn)) {
                    if (isset($_GET['platform'])) {
                        $platform = $_GET['platform'];
                    }

                    $result = $conn->query($sql); // $result is data from database $conn, containing query specified in $sql variable above.
                    $num = 1; // Create int num, which will keep track of current loop number.

                    // If there are more then 0 rows given back from database query above.
                    if ($result->num_rows > 0) {
                        // While there are rows left in the database, run through loop.
                        while($row = $result->fetch_assoc()) {
                            echo "<div class=\"product-item\">";
                            echo    "<img src=\"images\\thumbnails\\" . $row["gameImage"] . "\"alt=\"Image not found.\">";
                            $gameId = "total" . $row["gameId"];

                            if (isset($_SESSION["$gameId"])) {
                                echo    "<div class=\"product-amountTag product-color$platform\">";
                                echo        "<p id=\"product-amountNum\">x " . $_SESSION["$gameId"] . "</p>";
                                echo    "</div>";
                            }

                            echo    "<div class=\"product-priceTag product-color$platform\">";
                            echo        "<p>€ " . $row["gamePrice"] . "</p></div>";
                            echo    "<div class=\"product-title\">";
                            echo        "<p>" . $row["gameName"] . "</p></div>";
                            echo        "<div class=\"product-buybutton\" value=$row[gameId]>";
                            echo            "<form  action=\"\" method=\"post\" class=\"buy-form\">";
                            echo                "<input type=\"submit\" name=\"submit-form$row[gameId]\" value=\"Add to cart!\" class=\"product-buybutton product-buybutton$platform\"/>";
                            echo            "</form>";                            
                            echo        "</div>";
                            echo "</div>";
                            
                            $num = $num + 1; // Add 1 to num.
                        }
                    }
                    else {
                        echo "<p>Looks like the store doesn't have any content yet! Contact us with info so we can fix this bug.</p>";
                    }
                }
            ?>
        </div>
        <?php include "php/footer.php"; ?> <!-- Include footer from footer.php in php folder. It's a standard element of each page so this saves a lot of lines. -->
    </body>
</html>