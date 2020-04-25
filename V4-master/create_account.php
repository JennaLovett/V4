<?php
   include("config.php");
   session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $name = mysqli_real_escape_string($db,$_POST['name']);
        $email = mysqli_real_escape_string($db,$_POST['email']); 
        $password = mysqli_real_escape_string($db,$_POST['password']); 
        $age = mysqli_real_escape_string($db,$_POST['age']); 
        $state = mysqli_real_escape_string($db,$_POST['state']); 
        $zip = mysqli_real_escape_string($db,$_POST['zipcode']); 
        $phone = mysqli_real_escape_string($db,$_POST['phone']); 
        
        $query = "INSERT INTO Users(`userName`, `email`, `phone`, `age`, `state`, `zip`, `userPassword`) 
        VALUES ('$name', '$email', '$phone', $age, '$state', $zip, '$password');";
        $result = mysqli_query($db, $query);
        
        //redirect back to index page so user can login
        header("Location: http://localhost:1234/V4/index.html");
    }
?>
