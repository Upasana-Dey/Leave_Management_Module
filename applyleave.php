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
// echo "connected";
$rowId = 0;
  foreach(json_decode($_COOKIE['user'], true) as $obj){
    if($obj['name'] == "EMPLOYEEID"){
      $rowId = $obj['value'];
    }
  }
$contact = $_POST['contactno'];
echo $contact; 

$fromdate=$_POST['fromdate'];
echo $fromdate;

$todate=$_POST['todate'];
echo $todate; 

$leavetype=$_POST['leavetype'];
echo $leavetype; 

$leavetype=$_POST['leavetype'];
echo $leavetype; 

$reasonforrequest=$_POST['reasonforrequest'];
echo $reasonforrequest; 

$currentaddress=$_POST['currentaddress'];
echo $currentaddress; 
 

$sql = "INSERT INTO leavetable (fromdate,todate,leavetype,reasonforrequest,contactno,currentaddress,status,empid)
VALUES ('$_POST[fromdate]','$_POST[todate]', '$_POST[leavetype]','$_POST[reasonforrequest]',$contact,'$_POST[currentaddress]','0',$rowId)";


if ($conn->query($sql) === TRUE) 
 {
 	echo "success";
 	echo "<script>
alert('Successfully applied leave');
window.location.href='manageleave-employee.php';
</script>";
 }
 else {
 	echo "<script>
alert('Error in the details');
window.location.href='apply-leave.php';
</script>";
 }
    // echo "Error: " . $sql . "<br>" . $conn->error;


$conn->close();
?>