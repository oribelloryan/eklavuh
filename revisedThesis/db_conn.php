<?php
session_start();
$db_username='root';
$db_password='';
$db_name = 'interceptor';

$conn = mysqli_connect("localhost",$db_username,$db_password,$db_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>