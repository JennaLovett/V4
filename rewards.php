<?php
include("config.php");
session_start();
$userID = $_SESSION['user_ID'];

//$query = "SELECT * FROM Users";
$query = "SELECT u.userName as un, sum(s.estimatedHours) as sumHrs
FROM Users u
LEFT OUTER JOIN Session_Volunteers v ON u.userID = v.userID
LEFT OUTER JOIN Sessions s ON v.idsession = s.idsession
GROUP BY v.userID
ORDER BY sumHrs DESC";
$result = mysqli_query($db, $query);

if(!$result) { 
    die('Could not get data: ' . mysql_error());
 }

$badgeQuery = "SELECT badgeImage, badgeDescription
FROM Rewards
WHERE userID = $userID";
$badgeImgs = mysqli_query($db, $badgeQuery);

if(!$badgeImgs) {
    die('Could not get data: ' . mysql_error());
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rewards</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/rewards.css" type="text/css" />
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
            <div id="rewards-container">
                <h1>Rewards</h1>
                <div id="badges">
                    <h2><center>
                        <?php while($q = mysqli_fetch_array($badgeImgs)):
                            echo "<img src=" . $q['badgeImage'] . " alt=\"" . $q['badgeDescription'] . "\" title=\"" . $q['badgeDescription'] . "\" height=\"100\" width=\"100\">"; 
                            endwhile;
                        ?>
                    </center></h2>
                </div>
                <div id="rewards-table">
                    <table>
                        <thead>
                            <tr class="th1">
                                <th colspan="3">Leaderboard</th>
<!--                                 <th colspan="3">This Month</th>
                                <th colspan="3">This Week</th> -->
                            </tr>
                            <tr class="th2">
                                <th>Rank</th>
                                <th>Volunteer</th>
                                <th>Hours</th>
                              <!--   <th>Rank</th>
                                <th>Volunteer</th>
                                <th>Hours</th>
                                <th>Rank</th>
                                <th>Volunteer</th>
                                <th>Hours</th> -->
                            </tr>
                            <?php 
                                $count = 1;
                                while($r = mysqli_fetch_array($result)):
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $r['un']; ?></td>
                                <td><?php echo $r['sumHrs']; ?></td>
                            <!--     <td>1</td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                                <td></td> -->
                              </tr>
                              <?php
                                $count += 1;
                                if($count > 10){
                                    break;
                                }
                                endwhile;
                              ?>
                        </thead>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>
