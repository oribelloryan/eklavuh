<?php
include('db_conn.php');

if(isset($_POST["submit"]) && $_POST['location']=="server_create_plan"){

$op_name = $_POST['operation_name'];
$op_pass = $_POST['operation_password'];
$date_execute = $_POST['execute'];
$officers = $_POST['num_officers'];

$sql_insert = "INSERT INTO tbl_operations (operation_name, operation_password, date_plan, date_execute, num_officers)
VALUES ('$op_name','$op_pass',current_date(),'$date_execute','$officers')";

$commit = $conn->query($sql_insert);
$_SESSION['id'] = $conn->lastInsertId();
// var_dump($_SESSION['id']);
header('location: server_plotting.php');
}else if($_POST['location']=="server_plotting"){
$target = $_POST['target'];
$checkpoints = $_POST['checkpoints'];
$id = $_SESSION['id'];

$sql = "INSERT INTO plotting(operation_id, target_location, checkpoint_targets) VALUES ('$id', '$target', '$checkpoints')";
$result = $conn->query($sql);

echo "Data have been saved";
}
?>