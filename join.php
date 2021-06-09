<?php
  
// Username is root
$username = 'root';
$password = ''; 
  
// Database name is bank
$database = 'bank'; 
  
// Server is localhost with

$server='localhost';
$link = mysqli_connect($server, $username, $password, $database);
  
// Checking for connections
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
//echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);
?>