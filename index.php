<?php
   include("config.php");
   session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
    
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['password']); 
        
        $query = "SELECT * FROM Users WHERE email = '$email' and userPassword = '$password'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $userName = $row['userName'];
      
        $count = mysqli_num_rows($result);
      
        if($count == 1) 
        {
            $_SESSION['login_user'] = $userName;
         
            header("Location: http://localhost:1234/V4-project/V4/dashboard.php");
        }
        else 
        {
            header("Location: http://localhost:1234/V4-project/V4/index.html");
        }
    }
?>