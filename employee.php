<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apoxeo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
} 
$fname = $_POST['fname'];
// echo $fname; 

$lname=$_POST['lname'];
// echo $lname;

$des=$_POST['des'];
// echo $des; 

$doj=$_POST['doj'];
// echo $doj; 

$email=$_POST['email'];
// echo $email; 

$bd=$_POST['bd'];
// echo $bd;

$gender=$_POST['gender'];
// echo $; 

$bg = $_POST['bg'];
// echo $bg; 

$ContactNo=$_POST['ContactNo'];
// echo $ContactNo;

$EmployeeNo=$_POST['EmployeeNo'];
// echo $EmployeeNo; 

$CA=$_POST['CA'];
// echo $CA; 

$PA=$_POST['PA'];
// echo $PA; 

$RM=$_POST['RM'];
// echo $RM;

$EmployeeNo = $_POST['EmployeeNo'];
// echo $EmployeeNo; 

$AN=$_POST['AN'];
// echo $AN;

$IC=$_POST['IC'];
// echo $IC; 

$BN=$_POST['BN'];
// echo $BN; 

$BBN=$_POST['BBN'];
// echo $BBN; 

$ITP=$_POST['ITP'];
// echo $ITP;

$AaN=$_POST['AaN'];
// echo $AaN; 

$Pass=$_POST['Pass'];
// echo $Pass;

$UAN=$_POST['UAN'];
// echo $UAN;
 
// if(isset($_POST['form_submitted']))
// {
$sql = "INSERT INTO employee (fname,lname,designation,doj,empemail,dob,contactno,gender,bloodgroup,currentaddress,permanentaddress,password,pwdcreatedate,pwdupdatedate,role,reportmanager,empno)
VALUES ('$_POST[fname]','$_POST[lname]','$_POST[des]','$_POST[doj]','$_POST[email]','$_POST[bd]','$_POST[ContactNo]','$_POST[gender]','$_POST[bg]','$_POST[CA]','$_POST[PA]','".md5('test@123')."',NOW(),NOW(),'','$_POST[RM]','$_POST[EmployeeNo]')";

if ($conn->query($sql) === TRUE) {
    /*echo "<script>
alert('Added employee successfully');
window.location.href='addemp.html';
</script>";*/
	$abc = "INSERT INTO bankdetails (empno,accountno,ifsccode,bankname,bankbranchname,pan,aadharno,passportno,uan)
	VALUES ('$_POST[EmployeeNo]','$_POST[AN]','$_POST[IC]','$_POST[BN]','$_POST[BBN]','$_POST[ITP]','$_POST[AaN]','$_POST[Pass]','$_POST[UAN]')";

	if ($conn->query($abc) === TRUE) {
	    //echo "New record created successfully";
	    echo "success";
	} else {
	    echo "Error: " . $abc . "<br>" . $conn->error;
	}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// }
// $EmployeeNo = $_POST['EmployeeNo'];
// echo $EmployeeNo; 

// $AN=$_POST['AN'];
// echo $AN;

// $IC=$_POST['IC'];
// echo $IC; 

// $BN=$_POST['BN'];
// echo $BN; 

// $BBN=$_POST['BBN'];
// echo $BBN; 

// $ITP=$_POST['ITP'];
// echo $ITP;

// $AaN=$_POST['AaN'];
// echo $AaN; 

// $Pass=$_POST['Pass'];
// echo $Pass;

// $UAN=$_POST['UAN'];
// echo $UAN;


$conn->close();
?>