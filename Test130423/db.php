<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$con = mysqli_connect("localhost","root","","calcio");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>