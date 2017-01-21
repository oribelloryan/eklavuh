<?php
include('db_conn.php');

$sql = "SELECT MAX(operation_id) as max FROM tbl_operations";
$row = $conn->query($sql);
$last_id = $row->fetch(PDO::FETCH_ASSOC);

$target = $_POST['target'];
$checkpoints = $_POST['checkpoints'];
$id = $last_id['max'];
$targetJson = json_decode($target);
$targetLat = json_encode($targetJson->lat);
$targetLng = json_encode($targetJson->lng);

$conn->query("INSERT INTO target(operation_id, lat, lng) VALUES ('$id', '$targetLat', '$targetLng')");

$sql = "INSERT INTO plotting(operation_id, target_location, checkpoint_targets) VALUES ('$id', '$target', '$checkpoints')";
$result = $conn->query($sql);

echo "Data have been saved";
?>