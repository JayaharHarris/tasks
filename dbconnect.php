<?php
$servername = "localhost";
$username = "root";
$password = "ameex";
$dbname = "demo";

   $link = mysqli_connect($servername, $username, $password,$dbname);
   if(!$link){
      echo('Error connecting to the database: ' . mysqli_error());
      
   }
?>