<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/V4-project/V4/css/volunteer.css" type="text/css" />
    </head>
    <body>
        <nav>
            <ul>
                <li style="float:left;"> 
                    <a href="#home" style="color: #183A37;"><strong>V4</strong></a>
                </li>
                <li class="hover"><a href="#contact">Contact</a></li>
                <li class="hover"><a href="post_opportunity.php">Post</a></li>
                <li class="hover"><a href="rewards.php">Rewards</a></li>
                <li class="hover"><a href="volunteer.php">Volunteer</a></li>
                <li class="hover"><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
        <div class="pagediv">
            <h1>Volunteer</h1>
            <div class="search">
                <input type="text" placeholder="Search...">
                <input type="submit" value="Search" class="search_button">
            </div>
            <div class="posts">
                <p1><u>Recent Posts</u></p1>
                <ol>
                    <li>
                        <form>
                            <label for="title">Title:</label>
                            <label for="owner">Owner:</label>
                            <label for="location">Location:</label>
                            <label for="time">Time:</label>
                            <label for="description">Description:</label>
                            <input type="submit" value="Join" class="join">
                            
                        </form>
                    </li>
                </ol>
            </div>
        </div>
    </body>
</html>