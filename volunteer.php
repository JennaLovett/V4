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
                <?php
                    include("config.php");
                    session_start();

                    $query = "SELECT s.sessionTitle, u.userName, s.location, 
                    s.sessionDate, s.sessionTime, s.sessionDescription, s.image, s.isHot 
                    FROM Sessions s 
                    INNER JOIN Users u ON s.userID = u.userID";

                    $result = mysqli_query($db, $query);
                    if (!$result) 
                    {
                        printf("Error: %s\n", mysqli_error($db));
                        exit();
                    }
                    
                    //store all values in array
                    $post = array();
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                    {
                        $posts[] = $row;
                    }
                    
                    //iterate through rows in the posts array
                    foreach( $posts as $row )
                    {
                        $count = 0;
                        echo "<div class='post'>";
                        foreach($row as $element)
                        {
                            if($count == 0)
                            {
                                echo "Title: " . $element . "<br>";
                            }
                            else if($count == 1)
                            {
                                echo "Owner: " . $element . "<br>";
                            }
                            else if($count == 2)
                            {
                                echo "Location: " . $element . "<br>";
                            }
                            else if($count == 3)
                            {
                                echo "Date: " . $element . "<br>";
                            }
                            else if($count == 4)
                            {
                                echo "Time: " . $element . "<br>";
                            }
                            else if($count == 5)
                            {
                                echo "Description: " . $element . "<br>";
                            }
                            else if($count == 6)
                            {
                                echo "<img src='" . $element . "' />";
                            }
                            else if($count == 8)
                            {
                                if($element == 1)
                                {
                                    echo "<img src='/images/isHost.png' />";
                                }
                            }
                            
                            $count++;
                        }
                        echo "</div>";
                    }
                ?>
            </div>
        </main>
    </body>
</html>
