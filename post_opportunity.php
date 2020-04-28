<?php

  include("config.php");
  session_start();
  $userID = $_SESSION['user_ID'];
  if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $des = mysqli_real_escape_string($db, $_POST['description']);
    $estimated_duration = mysqli_real_escape_string($db, $_POST['estimated_duration']);
    $vol_num = mysqli_real_escape_string($db, $_POST['vol_num']);
    $hours = mysqli_real_escape_string($db, $_POST['estimated_duration']);
    $image = mysqli_real_escape_string($db, $_POST['fileToUpload']);
    
      $pathName = "images/";
      $concat = $pathName.$image;
      
      
    $sql = "INSERT INTO Sessions (userID, sessionTitle, estimatedHours, sessionDescription, location, sessionDate, image, estimatedVolunteers) VALUES ('$userID', '$title', '$hours', '$des', '$location', '$date', '$concat', '$vol_num')";
      
      if (mysqli_query($db, $sql)) {
           header("refresh:0; url=post_opportunity.html");
                   }
        else {
           echo "Error adding Session: " . mysqli_error($db);
        }
      


    
  }
?>
