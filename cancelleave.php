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
echo "Hello";
$rowId = 0;
  foreach(json_decode($_COOKIE['user'], true) as $obj){
    if($obj['name'] == "EMPLOYEEID"){
      $rowId = $obj['value'];
    }
  }

  echo $_POST['form_submitted'];

if(isset($_POST['form_submitted']))
{

	
	$reasonforrequest=$_POST['reasonforrequest'];
	$status="Cancelled";
	
	
$sql = "UPDATE leavetable SET reasonforrequest = '$reasonforrequest', status = '$status'  WHERE empid=$rowId ";


if ($conn->query($sql) === TRUE) 
    echo "success";
 else 
    echo "Error: " . $sql . "<br>" . $conn->error;

}
else
{
	echo "Else part";
}

$conn->close();
?>