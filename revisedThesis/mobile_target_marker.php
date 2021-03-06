<?php
require("db_conn.php");

// Get parameters from URL
$id = $_GET["id"];


// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Search the rows in the markers table
$query = "SELECT * FROM target WHERE operation_id = $id";
$result = $conn->query($query);

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name", $row['operation_id']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
}

echo $dom->saveXML();
?>