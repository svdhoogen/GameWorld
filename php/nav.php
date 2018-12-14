<?php
    echo "<nav class=\"nav\">";
    echo    "<a href=\"index.php\">";
    echo        "<p class=\"nav-left\">Home</p>";
    echo    "</a>";
    echo    "<a href=\"about.php\">";
    echo        "<p class=\"nav-left\">About us</p>";
    echo    "</a>";
    echo    "<a href=\"contact.php\">";
    echo        "<p class=\"nav-left\">Contact</p>";
    echo    "</a>";
    echo    "<a href=\"purchase.php\">";
    echo        "<p class=\"nav-right\">Cart</p>";
    echo    "</a>";
    echo    "<div class=\"dropDown\">";
    echo        "<button onclick=\"dropDown()\" class=\"dropBtn\">Browse games!</button>"; // Has javascript onclick event which will run logic to show/ hide the dropdown options.
    echo        "<a href=\"shop.php?platform=1\">";
    echo            "<div id=\"myDropDown1\" class=\"dropDown-content\">";
    echo                "Ps3";
    echo            "</div>";
    echo        "</a>";
    echo        "<a href=\"shop.php?platform=2\">";
    echo            "<div id=\"myDropDown2\" class=\"dropDown-content\">";
    echo                "PC";
    echo            "</div>";
    echo        "</a>";
    echo        "<a href=\"shop.php?platform=3\">";
    echo            "<div id=\"myDropDown3\" class=\"dropDown-content\">";
    echo                "Xbox";
    echo            "</div>";
    echo        "</a>";
    echo    "</div>";
    echo    "<script>";

    // When dropdown button is clicked, show the different platforms available.

    echo        "function dropDown() {"; // Create function for dropDown button, which will be ran when it is clicked
    echo            "document.getElementById(\"myDropDown1\").classList.toggle(\"show\");";
    echo            "document.getElementById(\"myDropDown2\").classList.toggle(\"show\");";
    echo            "document.getElementById(\"myDropDown3\").classList.toggle(\"show\");";
    echo        "}";

    // When user clicks outside of the dropdown menu, it closes it.

    echo        "window.onclick = function(event) {"; // When user clicks anywhere on page, run following function.
    echo            "if (!event.target.matches('.dropBtn')) {"; // If clicked anywhere on page besides the dropdown button.
    echo                "var dropDowns = document.getElementsByClassName(\"dropDown-content\");"; // Initialize variable dropDowns, which gets all dropdown options elements.
    echo                "var num = 0;"; // Initialize variable num, which will be used in for loop.
    echo                "for (num = 0; num < dropDowns.length; num++) {"; // Set int num to 0. As long as int num is smaller then total amount of dropDown options, run through loop and add 1 to num after completion.
    echo                    "var openDropDown = dropDowns[num];"; // Create variable opDropDown.
    echo                    "if (openDropDown.classList.contains('show')) {"; // If the dropDown item is currently shown, hide it.
    echo                        "openDropDown.classList.remove('show');"; // Hides current dropDown item.
    echo                    "}";
    echo                "}";
    echo            "}";
    echo        "}";
    echo    "</script>";
    echo "</nav>";
?>