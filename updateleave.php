<?php
if(!empty($_POST)){
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

$empstate = $_POST['empstate'];
$empnum = $_POST['empnum'];

$st = "UPDATE leavetable SET status = '$empstate' WHERE id=$empnum";
if ($conn->query($st) === TRUE) {
    echo "ok";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close(); 
}

?>