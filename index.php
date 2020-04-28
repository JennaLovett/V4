<?php
   include("config.php");
   session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        //get email and password from post request
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['password']); 
        
        //query Users table to check if user exists
        $query = "SELECT * FROM Users WHERE email = '$email' and userPassword = '$password'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $userName = $row['userName'];
        $userID = $row['userID'];
      
        $count = mysqli_num_rows($result);
       
        //set session variables
        $_SESSION['login_user'] = $userName;
        $_SESSION['user_ID'] = $userID; 

        //if user exists
        if($count == 1) 
        {  
            //redirect to dashboard
            header("Location: http://127.0.0.1:1234/V4/dashboard.php");
            exit();
        }
        else 
        {
            //redirect to index page
            header("Location: http://127.0.0.1:1234/V4/index.html");
            exit();
        }
    }
?>
