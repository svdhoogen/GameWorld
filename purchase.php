<?php
    include "php/database.php";

    // If button clear cart is pressed.
    if (isset($_POST["removeItems"])) {
        $clearCart = 1; // Set variable clearCart to 1 so session will be destroyed later on.
    }
?>

<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="Game World" content="gameworld checkout" />
        <title>Checkout</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php include "php/header.php"; ?> <!-- Include header from header.php in php folder. It's a standard element of each page so this saves a lot of lines. -->

        <div class="main-container">
            <?php include "php/nav.php"; ?> <!-- Include navigation from nav.php in php folder. It's a standard element of each page so this saves a lot of lines. -->
        </div>

        <div class="container-backdrop">
            <h1>Your order</h1>
            <div class="order-table">
                <div id="table-head">
                    <div id="table-head-image">
                        <p>Image</p>
                    </div>

                    <div id="table-head-count">
                        <p>Count</p>
                    </div>

                    <div id="table-head-game">
                        <p>Game</p>
                    </div>

                    <div id="table-head-des">
                        <p>Description</p>
                    </div>

                    <div id="table-head-price">
                        <p>Price</p>
                    </div>
                </div>

                <div class="clearFix clearDiv-border"></div>

                <?php // PHP magic-ery
                    // If connection is established to database, continue prosessing.
                    if(isset($conn)) {
                        session_start(); // Start session to access session variables, in specefic, cart items.

                        // This function will run if clear cart button is pressed. It will reset the value and destroy session, which will drop all session stored values, and then redirect user to homepage.
                        if (isset($clearCart) && $clearCart == 1) {
                            session_destroy(); // Dump all session stored values. Right now it will be only items in cart, if I use more session values in future this needs to be remade to reset only cart values.
                            header("Refresh:0;"); // Refresh the page to reset posted values, which will make sure clearCart is set to 0 again.
                        }

                        $totalPrice = 0; // Create int which will hold the sum of all prices.
                        $totalGames = 0; // Create int which will hold the sum of games.
                        $sql = "SELECT gameId FROM game"; // Create new variable $sqlId, which will contain database command which requests database items.
                        $result = $conn->query($sql); // $result is data from database connection $conn, specifically a request(query) using database command specified in $sqlId.
                        $num = 1; // Create int which will keep track of the number of times the following while function has looped.
                        $_SESSION["games"] = ""; // Create variable games, which will hold string which will be inserted into $sql database query later, so that corresponding games will be pulled from database.

                        // If session number isset, items are in cart. If it isn't there are no items in cart.
                        if(isset($_SESSION["number"])) {
                            $number = $_SESSION["number"]; // Set $number to session number.

                            while($number > 0)
                            {
                                $temp = "gameId = " . $_SESSION["game$number"];
                                $_SESSION["games"] = $_SESSION["games"] . $temp; // Paste string $temp onto string $games.
                                $number = $number - 1; // Add one to number.
                                
                                // Checks to see if there are more games to be added by string, and when there are " OR " will be printed after so that database query command will be correctly formatted.
                                if ($number != 0) {
                                    $_SESSION["games"] = $_SESSION["games"] . " OR "; // Paste " OR " after games, so that query command will be correctly formatted.
                                }
                            }

                            // Echoes to check under the hood operations for troubleshooting.
                            // echo $_SESSION["number"] . " ";
                            // echo $_SESSION["games"];
                        }

                        // Checks if variable games is empty, and if it is not, it will set gameId to 0,, which will only load the "none games in your cart!" product from the database.
                        if ($_SESSION["games"] != ""){} else {
                            $_SESSION["games"] = "gameId = 0"; // Set string games to gameId 0, which is the No games in your cart product.
                        }

                        $sql = "SELECT gameName, gameDescription, gamePrice, gameImage, gameId FROM game WHERE (" . $_SESSION["games"] . ")";  // Create new variable $sql, which will contain database command which requests database items.
                        $result = $conn->query($sql); // $result is data from database $conn, containing query specified in $sql variable above.

                        if ($result->num_rows > 0) {
                            // While there are rows left in the database, print a new button with name from database and a link to storepage.
                            while($row = $result->fetch_assoc()) {
                                echo "<div class=\"product-order\">"; // Add new div with class: product-order.
                                echo    "<div class=\"product-order-imageDiv\">";
                                echo        "<img class=\"product-order-image\" src=\"images\\thumbnails\\$row[gameImage]\">"; // Print corresponding game image with class product-order-image
                                echo    "</div>";
                                echo    "<div class=\"product-order-countDiv\">";
                                if ($row["gameId"] != 0) {
                                    echo    "<h6>";
                                    $gameIdEx = "total" . $row["gameId"];
                                    $totalPrice = $totalPrice + ($row["gamePrice"] * $_SESSION["$gameIdEx"]); // Add price of product to total.
                                    $totalGames = $totalGames + $_SESSION["$gameIdEx"]; // Add number of copies of current game to total game count.
                                    echo        "x " . $_SESSION["$gameIdEx"];
                                    echo    "</h6>";
                                }
                                else {
                                    echo    "<h6>";
                                    $totalPrice = $totalPrice + $row["gamePrice"]; // Add price of product to total.
                                    echo        "x 0";
                                    echo    "</h6>";
                                }
                                echo    "</div>";
                                echo    "<h4>$row[gameName]</h4>"; // Print game name.
                                echo    "<p>$row[gameDescription]</p>"; // Print game description.
                                echo    "<h5>€ $row[gamePrice]</h5>"; // Print game price.
                                echo "</div>"; // End div
                                echo "<div class=\"clearFix clearDiv-border\"></div>"; // Add a clearFix to clear:both; current product element.
                            }
                        }
                    } ?>

                <div id="order-footer">
                        <form  action="" method="post" id="removeItems-form">
                            <div id="order-footer-buyButtonDiv">
                                <input type="submit" name="orderItems" value="Buy Games!" id="order-footer-buyButton"/>
                            </div>

                            <div class="clearSide2pc"></div>

                            <div id="order-footer-clearButtonDiv">
                                <input type="submit" name="removeItems" value="Clear Cart" id="order-footer-clearButton"/>
                            </div>
                        </form>
                    <div class="clearSide10pc"></div>

                    <h2>
                        Total games: 
                        <?php
                            echo $totalGames; // Echo the total cost of purchasing current products.
                        ?>
                    </h2>

                    <h2>
                        Total price:
                        <?php
                            $totalPrice = number_format($totalPrice, 2);  // Format string to display 2 decimals, without it would display "289.9" for example, with this format it displays "289.90", which is the desired effect.
                            echo "€ " . $totalPrice; // Echo the total cost of purchasing current products.
                        ?>
                    </h2>
                </div>
                
                <div class="clearFix"></div>
            </div>
        </div>
        <?php include "php/footer.php"; ?> <!-- Include footer from footer.php in php folder. It's a standard element of each page so this saves a lot of lines. -->
    </body>
</html>