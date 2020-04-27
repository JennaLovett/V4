<?php

  include("config.php");
  session_start();
  $userID = $_SESSION['user_ID'];
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $estimated_duration = mysqli_real_escape_string($db, $_POST['estimated_duration']);
    $vol_num = mysqli_real_escape_string($db, $_POST['vol_num']);
    $fileToUpload = mysqli_real_escape_string($db, $_POST['fileToUpload']);

    $sql = "INSERT INTO Sessions (sessionTitle, location, date, time, sessionDescription, estimatedHours, vol_num, fileToUpload) VALUES ('$title', '$location', '$date', '$time', '$description', '$estimated_duration', '$vol_num', '$fileToUpload')";
    header("refresh:0; url=post_opportunity.html");
  }
?>