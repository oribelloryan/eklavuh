<?php
include('db_conn.php');

$target = $_POST['target'];
$checkpoints = $_POST['checkpoints'];
$id = $_SESSION['id'];

$sql = "INSERT INTO plotting(operation_id, target_location, checkpoint_targets) VALUES ('$id', '$target', '$checkpoints')";
$result = $conn->query($sql);

echo "Data have been saved";
?>