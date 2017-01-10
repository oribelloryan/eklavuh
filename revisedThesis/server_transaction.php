<?php

class query{
		private $conn;
 
 	 function __construct($DB_con){
  		$this->conn = $DB_con;
	 }

  	 function selectId(){
     	 $sql= $this->conn->query("SELECT MAX(operation_id) as id FROM tbl_operations");
      	 while($row = $sql->fetch(PDO::FETCH_ASSOC)){
      		$last_id = $row['id'];
      		$current_id = $last_id + 1;
      		$_SESSION['id'] = $current_id;
    	 }
      	return $current_id;
 	 }

}


?>