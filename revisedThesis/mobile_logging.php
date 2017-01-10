<?php
include('db_conn.php');

$operation = $_POST['name'];
$password = $_POST['pass'];

$stmt = $conn->prepare("SELECT * FROM tbl_operations WHERE operation_name = :op AND operation_password = :pa LIMIT 1");
$stmt->bindValue(":op", $operation);
$stmt->bindValue(":pa", $password);
$stmt->execute();

if($stmt->rowCount() === 1)
{
	$row = $stmt->fetch(PDO::FETCH_ASSOC);;
    echo json_encode($row);
}else{
	echo json_encode('NoRecord');
}
?>