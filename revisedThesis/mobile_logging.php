
<?php
include('db_conn.php');

$operation = $_GET['name'];
$password = $_GET['pass'];

$stmt = mysqli_query($conn, "SELECT * FROM tbl_operations WHERE operation_name = '$operation' AND operation_password ='$password'");
while($result = mysqli_fetch_assoc($stmt)){
	$data = $result['operation_id'];
}
 echo "<script src='js/cookies.js' type='text/javascript'></script>";
 echo "<script>setCookie('operationId', $data, 1);</script>";
$rows = mysqli_num_rows($stmt);
if($rows==1)//You are mixing the mysql and mysqli, change this line of code
    {
       	header('location:mobile_map_rendering.html');
      
		}else{
	   header('location:mobile_login.html');
	}
?>