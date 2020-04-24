<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/volunteer.css" type="text/css" />
    </head>
    <body>
        <nav>
            <ul>
                <li style="float:left;"> 
                    <a href="index.html" style="color: #183A37;"><strong>V4</strong></a>
      </li>

                <li class="hover"><a href="post_opportunity.php">Post</a></li>
                <li class="hover"><a href="rewards.php">Rewards</a></li>
                <li class="hover"><a href="volunteer.php">Volunteer</a></li>
                <li class="hover"><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </nav>

        <main>
            <h1>Volunteer</h1>
            
            <div class="search">
                <input type="text" placeholder="Search for Opportunities...">
                <input type="submit" value="Search" class="search_button">
            </div>

            <div class="posts-container">
                
            </div>
        </main>
    </body>
</html>
