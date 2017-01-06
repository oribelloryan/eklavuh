<?php
include('db_conn.php');
//$json = $_POST['points'];
//$myDataArray = json_decode($json,true);
//print_r($myDataArray);
$target = $_GET['target'];
$checkpoints = $_GET['checkpoints'];
$id = $_SESSION['id'];
$checkpoint = $points;

$sql = "INSERT INTO plotting(operation_id, target_location, checkpoint_targets) VALUES ('$id', '$target', '$checkpoints')";
$result = $conn->query($sql);

?>