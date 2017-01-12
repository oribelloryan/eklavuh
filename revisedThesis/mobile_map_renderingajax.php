<?php
 include('db_conn.php');

 $id = $_POST['id'];

 $sql = "SELECT opp.operation_name AS operation_name, opp.date_plan AS date_plan, opp.date_execute AS date_execute, plo.target_location AS target_location, plo.checkpoint_targets AS checkpoint_targets, opp.num_officers AS num_officers FROM tbl_operations opp INNER JOIN plotting plo ON opp.operation_id = plo.operation_id WHERE opp.operation_id = $id";
 $result = $conn->query($sql);
 while($row = $result->fetch(PDO::FETCH_ASSOC)){
 $data = array(
 'name' => $row['operation_name'],
 'date_plan' => $row['date_plan'],
 'date_execute' => $row['date_execute'],
 'officers' => $row['num_officers'],
 'target' => $row['target_location'],
 'checkpoints' => $row['checkpoint_targets']
 );
};
 echo json_encode($data);
 
?>