<?php 
include('db_conn.php');

$stmt = $conn->prepare("SELECT * FROM tbl_operation WHERE operation_name = :name AND operation_password = :password");
$stmt->bindParam(':name', "Chorva");
$stmt->bindParam(':password', 10);
$stmt->execute();

while($data = $stmt->fetch_assoc()){
		$name = $data['operation_name'];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   </head>
   <body>
   </body>
    <script>
    	var jsonData = {
    			"name" : <?php echo $name; ?>,
    	}
    </script>
  </body>
</html>
