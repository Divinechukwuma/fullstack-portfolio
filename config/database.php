<?php

  //this is a way to write manageable code 
    //create constants to store non repeating values
    // define('SITEURL','build/admin/');
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'divine-store');
    define('DB_PASSWORD', 'CHUKS989');
    define('DB_NAME', 'divine-store');

   // Create connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
  //the die function cut everything off
  die('Connection failed: ' . $conn->connect_error);
}

//echo 'Connected successfully';

?>