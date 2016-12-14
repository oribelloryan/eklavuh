<?php
session_start();
$db_username='root';
$db_password='';
$db_name = 'interceptor_db';

$conn = mysqli_connect("localhost",$db_username,$db_password,$db_name);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(isset($_POST["submit"])){

$op_name = $_POST['operation_name'];
$op_pass = $_POST['operation_password'];
$date_execute = $_POST['execute'];
$officers = $_POST['num_officers'];

$sql_insert = "INSERT INTO tbl_operations (operation_name, operation_password, date_plan, date_execute, num_officers)
VALUES ('$op_name','$op_pass',current_date(),'$date_execute','$officers')";

if ($conn->query($sql_insert) === TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
header('location:plotting.php');
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql_insert . "<br>" . $conn->error."');</script>";
}
}
?>