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

                    $query = "SELECT s.isHot, s.image, s.sessionTitle, u.userName, s.location, 
                    s.sessionDate, s.sessionTime, s.sessionDescription   
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
                    //if it is a hot post, display first
                    $hot_post_count = 0;
                    foreach( $posts as $row )
                    {
                        $count = 0;
                        foreach($row as $element)
                        {
                            if($count == 0)
                            {
                                if($element == 1)
                                {
                                    if($hot_post_count == 0)
                                    {
                                        echo "<h2> Hot Posts </h2>";
                                    }
                                    echo "<div class='post'>";
                                    $hot_post_count++;
                                }
                                else
                                {
                                    break;
                                }
                            }
                            else if($count == 1)
                            {
                                echo "<div class='post-thumb'><img src='" . $element . "' /></div>";
                                
                            }
                            else if($count == 2)
                            {
                                echo "<div class='post-content'><div class='hot'><img src='images/isHot.png' /></div><h3>" . $element . "</h3>";
                            }
                            else if($count == 3)
                            {
                                echo "Owner: " . $element . "<br>";
                            }
                            else if($count == 4)
                            {
                                echo "Location: " . $element . "<br>";
                            }
                            else if($count == 5)
                            {
                                echo "Date: " . $element . "<br>";
                            }
                            else if($count == 6)
                            {
                                echo "Time: " . $element . "<br>";
                            }
                            else if($count == 7)
                            {
                                echo "Description: " . $element . "<br></div></div>";
                            }
                            
                            $count++;
                        }
                    }
                    
                    //iterate through rows in the posts array
                    //if it is not a hot post, display
                    $regular_post_counter = 0;
                    foreach( $posts as $row )
                    {
                        $count = 0;
                        foreach($row as $element)
                        {
                            if($count == 0)
                            {
                                if($element == 1)
                                {
                                    break;
                                }
                            }
                            else if($count == 1)
                            {
                                if($regular_post_counter == 0)
                                {
                                    echo "<h2> Recent Posts </h2>";
                                }
                                echo "<div class='post'><div class='post-thumb'><img src='" . $element . "' /></div>";
                                $regular_post_counter++;
                            }
                            else if($count == 2)
                            {
                                echo "<div class='post-content'><h3>" . $element . "</h3>";
                            }
                            else if($count == 3)
                            {
                                echo "Owner: " . $element . "<br>";
                            }
                            else if($count == 4)
                            {
                                echo "Location: " . $element . "<br>";
                            }
                            else if($count == 5)
                            {
                                echo "Date: " . $element . "<br>";
                            }
                            else if($count == 6)
                            {
                                echo "Time: " . $element . "<br>";
                            }
                            else if($count == 7)
                            {
                                echo "Description: " . $element . "<br></div></div>";
                            }
                            
                            $count++;
                        }
                    }
                ?>
            </div>
        </main>
    </body>
</html>
