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

  echo $_POST['form_submitted'];

if(isset($_POST['form_submitted']))
{

	
	$fromdate=$_POST['fromdate'];
	$todate= $_POST['todate'];
	$leavetype=$_POST['leavetype'];
	$reasonforrequest=$_POST['reasonforrequest'];
	$contactno=$_POST['contactno'];
	$currentaddress=$_POST['currentaddress'];
	
$sql = "UPDATE leavetable SET fromdate = '$fromdate', todate = '$todate', leavetype = '$leavetype', reasonforrequest = '$reasonforrequest', contactno = '$contactno', currentaddress = '$currentaddress' WHERE empid=$rowId";


if ($conn->query($sql) === TRUE) 
{
	//echo "New record created successfully";
	echo "<script>
alert('Successfully edited leave');
window.location.href='manageleave-employee.php';
</script>";

}
    
 else 
    echo "Error: " . $sql . "<br>" . $conn->error;

}
else
{
	echo "Else part";
}

$conn->close();
?>