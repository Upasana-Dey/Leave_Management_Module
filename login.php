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


if(isset($_POST['form_submitted']))
{
	$n=$_POST['EMPLOYEEID'];
    $p=$_POST['PASSWORD'];
    $sql = "SELECT * FROM employee where empno = ".$n." and password='".md5($p)."'";
    $result = $conn->query($sql);

    if(!empty($result) && $result->num_rows > 0){

        echo "success";
    }
    else
    {
        echo "error";
    }
}
$conn->close();
?>