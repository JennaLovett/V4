<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/V4-project/V4/css/index.css" type="text/css" />
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
    <div class="container">
        <div class="toppane">
            <h1>Welcome, <?php echo $_SESSION['login_user']; ?></h1>
        </div>
    
        <div class="leftpane">
            <h3 id="h3l">Your Sessions</h3>
                <button type="button" class="collapsible"><span>+</span> <strong>What you've posted</strong></button>
            <div class="content">
                <p>
                        <strong><h4>Help with Algo, please!</h4></strong>
                        
                        <strong># of hours requested:</strong> 5 <br>
                        <strong>Description:</strong> I need help with understanding dynamic programming and the knapsack problem</li>
                    
                    <br><hr>
                        <strong><h4>Help with Algo, please!</h4></strong>
                        
                        <strong># of hours requested:</strong> 5 <br>
                        <strong>Description:</strong> I need help with understanding dynamic programming and the knapsack problem
                    
                    <br><hr>
                        <strong><h4>Help with Algo, please!</h4></strong>
                        
                        <strong># of hours requested:</strong> 5 <br>
                        <strong>Description:</strong> I need help with understanding dynamic programming and the knapsack problem
                    
                    <br><hr>
                        <strong><h4>Help with Algo, please!</h4></strong>
                        
                        <strong># of hours requested:</strong> 5 <br>
                        <strong>Description:</strong> I need help with understanding dynamic programming and the knapsack problem
                    
                </p>
            </div>
            <button type="button" class="collapsible"><span>+</span> <strong>Your Past Sessions</strong></button>
            <div class="content">
                <p>
                        <strong><h4>Help with Algo, please!</h4></strong>
                        
                        <strong># of hours requested:</strong> 5 <br>
                        <strong>Description:</strong> I need help with understanding dynamic programming and the knapsack problem</li>
                    
                    <br><hr>
                        <strong><h4>Help with Algo, please!</h4></strong>
                        
                        <strong># of hours requested:</strong> 5 <br>
                        <strong>Description:</strong> I need help with understanding dynamic programming and the knapsack problem
                    
                    <br><hr>
                        <strong><h4>Help with Algo, please!</h4></strong>
                        
                        <strong># of hours requested:</strong> 5 <br>
                        <strong>Description:</strong> I need help with understanding dynamic programming and the knapsack problem
                    
                    <br><hr>
                        <strong><h4>Help with Algo, please!</h4></strong>
                        
                        <strong># of hours requested:</strong> 5 <br>
                        <strong>Description:</strong> I need help with understanding dynamic programming and the knapsack problem
                    
                </p>
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
                <div class="borders">
                   <!--- <div><button type="button" value="null" id="button">X</button></div> -->
                    
                    <img src="/V4-project/V4/images/corgi.jpg" alt="Corgi" height="130" width="250">
                <p class="p1">
                    <strong>Help me walk Tinkles the Dog!</strong> <br> Unfortuntely due to my incomming work schedule, I am unable to walk my dog tinkles. <br><strong>Date Needed:</strong> 4/4/2020 <br><br><strong>Date Volunteered:</strong> 4/3/2020
                </p>
                </div>
                
                <div class="borders">
                    <img src="/V4-project/V4/images/build.jpg" alt="house" height="130" width="250">
                <p class="p1">
                    <strong>Come build community houses with us!</strong> <br> Join BH4U (build houses for you) and help us build houses for locals.<br><strong>Date Needed:</strong> 4/10/2020 <br><br> <strong>Date Volunteered:</strong> 4/3/2020
                </p>
                </div>

                <div class="borders">
                    <img src="/V4-project/V4/images/cs.jpg" alt="house" height="130" width="250">
                <p class="p1">
                    <strong>Help tutor Computer Science Students!</strong> <br> Join BH4U (build houses for you) and help us build houses for locals.<br><strong>Date Needed:</strong> 4/10/2020 <br><br> <strong>Date Volunteered:</strong> 4/3/2020
                </p>
                </div>

                <div class="borders">
                    <img src="/V4-project/V4/images/build.jpg" alt="house" height="130" width="250">
                <p class="p1">
                    <strong>Come build community houses with us!</strong> <br> Join BH4U (build houses for you) and help us build houses for locals.<br><strong>Date Needed:</strong> 4/10/2020 <br><br> <strong>Date Volunteered:</strong> 4/3/2020
                </p>
                </div>
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
                  ['Walking Tinkles', 3],
                  ['Build for BH4U', 10],
                  ['Tutor', 3],
                  
                ]);
                
                  // Optional; add a title and set the width and height of the chart
                  var options = {'title':'Your V4 Statistics', 'width':280, 'height':200};
                
                  // Display the chart inside the <div> element with id="piechart"
                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                  chart.draw(data, options);
                }
            </script>
        </div>

    </div>
</body>

</html>