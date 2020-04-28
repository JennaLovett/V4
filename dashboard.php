<?php
include("config.php");
session_start();
    $userID = $_SESSION['user_ID']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/index.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    
</head>


<body>
<nav>
    <ul>
      <li style="float:left;">
        <a href="index.html" style="color: #183A37;"><strong>V4</strong></a>
      </li>

                <li class="hover"><a href="post_opportunity.html">Post</a></li>
                <li class="hover"><a href="rewards.php">Rewards</a></li>
                <li class="hover"><a href="volunteer.php">Volunteer</a></li>
                <li class="hover"><a href="dashboard.php">Dashboard</a></li>
    </ul>
  </nav>
    <div class="container">
        <div class="toppane">
            <h1>Welcome, <?php echo $_SESSION['login_user']; ?></h1>
        </div>

        <div class="leftpane">
            <h3 id="h3l">Your Sessions</h3>
                <button type="button" class="collapsible"><span>+</span><strong>What you've posted</strong></button>
            <div class="content">
                
                    <?php
                    $query = "select * from Sessions where userID = '$userID';";

                                $row = mysqli_query($db, $query);



                                        foreach($row as $r){

                                            echo "<p>";
                                            echo "<strong><h4>" .$r['sessionTitle'] ."</h4></strong>";

                                            echo "<strong> # of hours requested: " .$r['estimatedHours'] ."</strong>  <br>";

                                            echo "<strong>Description:</strong> " .$r['sessionDescription'] ."</li>";

                                            echo "<br><hr>";

                                            echo "</p>";
                                        }

                    ?>
            </div>
            <button type="button" class="collapsible"><span>+</span> <strong>Your Past Sessions</strong></button>
            <div class="content">

                <?php
                    $query = "select Sessions.sessionTitle, Sessions.estimatedHours, Sessions.sessionDescription, Sessions.location, Sessions.sessionDate, Sessions.sessionTime, Sessions.image from Session_Volunteers right join Sessions on Session_Volunteers.idSession = Sessions.idSession where Session_Volunteers.userID = '$userID';";

                            $row = mysqli_query($db, $query);

                    
                        
                    

                                    foreach($row as $r){

                                        echo "<p>";
                                        echo "<strong><h4>" .$r['sessionTitle'] ."</h4></strong>";

                                        echo "<strong> # of hours requested: " .$r['estimatedHours'] ."</strong>  <br>";

                                        echo "<strong>Description:</strong> " .$r['sessionDescription'] ."</li>";

                                        echo "<br><hr>";

                                        echo "</p>";
                                    }
                    
                ?>
            </div>
                <script>
                    var coll = document.getElementsByClassName("collapsible");
                    var i;

                    for (i = 0; i < coll.length; i++) {
                      coll[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var content = this.nextElementSibling;
                        if (content.style.display === "block") {
                          content.style.display = "none";
                        } else {
                          content.style.display = "block";
                        }
                      });
                    }
                </script>
        </div>

        <div class="middlepane">
            <h3 id="h3m">Opportunities Volunteered For</h3>
        

                    <?php
                        $query = "select Sessions.sessionTitle, Sessions.estimatedHours, Sessions.sessionDescription, Sessions.location, Sessions.sessionDate, Sessions.sessionTime, Sessions.image from Session_Volunteers right join Sessions on Session_Volunteers.idSession = Sessions.idSession where Session_Volunteers.userID = '$userID';";
                        
                    foreach($row as $r){

                        echo "<div class=\"borders\">";
                        $img_path = $r['image'];

                        echo "<img src= \"$img_path \" alt=\"Corgi\" height=\"160\" width=\"250\">";

                        echo "<p class=\"p1\">";

                        echo "<center><strong>" .$r['sessionTitle'] ."</strong></center>";
                        echo "<br><strong>Description: </strong>" .$r['sessionDescription'] ."<br><br><strong>Date & Time Needed:</strong>";
                        echo "<br>" .$r['sessionTime'] ."";
                        echo "<br>" .$r['sessionDate'] ."<br><br>";
                        echo "<strong>Location: </strong>" .$r['location'] ."";
                        echo "</p>";

                        echo "</div>";

                    }
            echo "</center>";
                        ?>
        </div>

        <div class="rightpane">
            <h3 id="h3r">Statistics</h3>
            <div id="piechart"></div>
            <!-- google pie chart-->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                // Load google charts
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                // Draw the chart and set the chart values
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([


                  ['Tasks Completed', 'Hours Volunteered'],

                   <?php
                        $query = "select Sessions.sessionTitle, Sessions.estimatedHours from Session_Volunteers right join Sessions on Session_Volunteers.idSession = Sessions.idSession where Session_Volunteers.userID = '$userID';";

                        $row = mysqli_query($db, $query);

                       foreach($row as $r){

                        echo "['" .$r['sessionTitle']. "', ".$r['estimatedHours']."],";
                      }
                      ?>
                ]);

                  // Optional; add a title and set the width and height of the chart
                  var options = {'title':'Your V4 Statistics', 'width':280, 'height':200};

                  // Display the chart inside the <div> element with id="piechart"
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                  chart.draw(data, options);
                }
            </script>

<form action = "removeSession.php" method="POST">
<hr>
<?php
     $x = 1;
    
   $query = "select Sessions.sessionTitle from Session_Volunteers right join Sessions on Session_Volunteers.idSession = Sessions.idSession where Session_Volunteers.userID = '$userID';";

    $row = mysqli_query($db, $query);
    echo "<center>";
    echo "<label >Remove A Session:</label>";
    echo "<select name=\"idNum\">";
   
    
    foreach($row as $r){
              
        echo "<option value=\"$x\">" .$r['sessionTitle'] ."</option>";
        $x = $x + 1;
        
    }
    echo "</select>";
    ?>
    <input type="submit">
    
    </form>

    <p>Don't worry! We will let the poster know you can no longer volunteer!</p>
    <h3> News </h3>
    <p> New addition to V4! Users can now vote if your post is 'Hot!' This will put your post higher on the feed! </p>
        </div>

    
</body>

</html>
