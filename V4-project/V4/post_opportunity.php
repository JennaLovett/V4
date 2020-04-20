<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Post New Volunteer Opportunity</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/V4-project/V4/css/post_opportunity.css" type="text/css" />
  </head>
  <body>
    <nav>
      <ul>
        <li style="float:left;"> 
          <a href="#home" style="color: #183A37;"><strong>V4</strong></a>
        </li>
        <li class="hover"><a href="#Contact">Contact</a></li>
        <li class="hover"><a href="post_oppurtunity.php"><u>Post</u></a></li>
        <li class="hover"><a href="rewards.php">Rewards</a></li>
        <li class="hover"><a href="Volunteer.php">Volunteer</a></li>
        <li class="hover"><a href="dashboard.php">Dashboard</a></li>
      </ul>
    </nav>
    <main>
        <div id="Post-container">
            <h1>Post New Volunteer Opportunity</h1>
            <div id="post">
                <form>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title"placeholder="IE: Deliver my Grandma's Meds"  />

                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="Atlanta" />
                    
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" placeholder="mm/dd/yyyy" />

                    <label for="time">Time</label>
                    <input type="time" id="time" name="time" placeholder="12:00 PM" />
                    <div></div>
                    <label for="description">Description</label>
                    <textarea id="description" rows="4" cols="50" placeholder="Enter additional details here" ></textarea>
                    <div></div>
                    <label for="estimated_duration">Estimated Duration</label>
                    <input type="number" id="estimated_duration" name="estimated_duration" placeholder="30" />
                    <select id="time_type" name="time_type">
                        <option value="minutes">minutes</option>
                        <option value="hours">hours</option>
                        <option value="days">days</option>
                    </select>
                    <div></div>
                    <label for="vol_num"># Volunteers Needed</label>
                    <input type="number" id="vol_num" name="vol_num" placeholder="4" />
                
                    <div class="center">
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                Attach an Image:
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </form>
                            <div></div>
                        <input type="submit" value="Post" class="test"/>
                    </div>
                </form>
            </div>
        </div>
    </main>
  </body>
</html>