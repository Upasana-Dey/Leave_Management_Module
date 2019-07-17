<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apoxeo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$rowId = 0;
  foreach(json_decode($_COOKIE['user'], true) as $obj){
    if($obj['name'] == "EMPLOYEEID"){
      $rowId = $obj['value'];
    }
  }

$sql = "SELECT * FROM leavetable where empid=".$rowId;

$result = $conn->query($sql);
?>