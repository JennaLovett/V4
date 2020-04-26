<?php
   include("config.php");
   session_start();
    $userID = $_SESSION['user_ID'];
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        //get email and password from post request
        $x = mysqli_real_escape_string($db,$_POST['idNum']);
        
        
        
        //query Users table to check if user exists
        $query1 = "DELETE FROM Session_Volunteers WHERE idSession = " . $x . " and userID = " . $userID . ";";
        
        if (mysqli_query($db, $query1)) {
           echo "Record deleted successfully";
        }
        else {
           echo "Error deleting record: " . mysqli_error($db);
        }
        
        $query = "DELETE FROM Sessions WHERE idSession = " . $x . ";";
        
        //$result = mysqli_query($db, $query);
        
        if (mysqli_query($db, $query)) {
           echo "Record deleted successfully";
        }
        else {
           echo "Error deleting record: " . mysqli_error($db);
        }


        header('location:dashboard.php');
    }
    
?>
