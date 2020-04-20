<?php
   define('DB_SERVER', 'v4.c4pbktdjfsor.us-east-1.rds.amazonaws.com:3306');
   define('DB_USERNAME', 'V4admin');
   define('DB_PASSWORD', 'password');
   define('DB_DATABASE', 'V4');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
