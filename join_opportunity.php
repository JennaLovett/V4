<?php
   include("config.php");
   session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        //get sessionID from form
        $sessionID = mysqli_real_escape_string($db,$_POST['idSession']);
        $userID = $_SESSION['user_ID'];
        
        //query Users table to check if user exists
        $query = "INSERT INTO Session_Volunteers(userID, idSession) VALUES ('" . $userID . "', '" . $sessionID . "');";
        $result = mysqli_query($db, $query);
       
        //redirect to volunteer page
        if($result)
        {
            echo "Success";
            header("Location: http://127.0.0.1:1234/V4-project/V4/volunteer.php");
        }
        else
        {
            echo "Error";
        }
        
    }
?>
