<?php
   define('DB_SERVER', 'myv4db.coondoclxh8y.us-east-1.rds.amazonaws.com:3306');
   define('DB_USERNAME', 'v4master');
   define('DB_PASSWORD', 'v4password');
   define('DB_DATABASE', 'v4');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>