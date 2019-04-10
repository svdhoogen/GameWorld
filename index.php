<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="Game World" content="games shop" />
        <title>Welcome to Game World!</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <?php include "php/header.php"; include "php/database.php";?> <!-- Include header from header.php in php folder. It's a standard element of each page so this saves a lot of lines. -->

        <div class="main-container">
            <?php include "php/nav.php"; ?> <!-- Include navigation from nav.php in php folder. It's a standard element of each page so this saves a lot of lines. -->

            <div class="welcome-image">
                <img src="images/backdrop-blur.png">
                <h2>Welcome to Gameworld!</h2>
                <h3>The only webshop that doesn't actually deliver</h3>
            </div>

            <div class="platform-type">
                <?php // PHP magic-ery
                    // If
                    if(isset($conn)) {
                        $sql = "SELECT platformName FROM platform";
                        $result = $conn->query($sql);
                        $num = 1;

                        // If 
                        if ($result->num_rows > 0) {
                            // While there are rows left in the database, print a new button with name from database and a link to storepage.
                            while($row = $result->fetch_assoc()) {
                                // If the name of $row is not "None", go ahead. Needed to prevent platform none from being included as a platform option.
                                if ($row["platformName"] != "None") {
                                    echo "<a href=\"shop.php?platform=" . $num . "\">"; // Open link tag with link to shop, which will also set ?playform +$num, so that php from store page can get corresponding items.
                                        echo "<p id=\"platform" . $num . "\">"; // Open p tag with id of product + $num. Id is used to outline button on the left and right, since they need different margins.
                                            echo $row["platformName"]; // Echo corresponding platform name from database.
                                        echo "</p>"; // Close p tag.
                                    echo "</a>"; // Close a tag.

                                    $num = $num + 1; // Add 1 to num.
                                }
                            }
                        }
                        else {
                            echo "<p>Looks like something didn't load properly! Contact us with info so we can fix this bug.</p>";
                        }
                    }?>
            </div>

            <div class="clearFix"></div>
        </div>
        
        <?php include "php/footer.php"; ?> <!-- Include footer from footer.php in php folder. It's a standard element of each page so this saves a lot of lines. -->
    </body>
</html>