<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'header.php';?>

<link rel="stylesheet" href="css/empdetails-s.css">
</head>
<body>
<section class="wrapper container-fluid">

  <header class="w-100">
    <nav id="nhead">
      <a><img src="images/logo.png" height="33" width="131" class="headerimg"/></a>
    </nav>
  </header>

<section class="container-fluid">    
  <div class="row">
    <?php include 'menu.php';?>

    <div class="col-sm-10"> 
          <div>
          <table>
 <div>
<tr>
<td><p class="hiderow">Abc</p></td>
<th class="tableheading" id="tabheadfont"><b>MANAGE LEAVE</b></th> </tr>    
<td><p class="hiderow">Abc</p></td>
<tr  class="headings"  >
<td bgcolor="white"><p class="hiderow">Abc</p></td>
<th style="color:white;" bgcolor="#012236">Sl.No</th>
<th style="color:white;" bgcolor="#012236">Employee name</th>
<th style="color:white;" bgcolor="#012236">Reason</th>
<th style="color:white;" bgcolor="#012236">Start Date</th>
<th style="color:white;" bgcolor="#012236">End Date</th>
<th style="color:white;" bgcolor="#012236">State</th>
<th colspan="2" style="color:white;" bgcolor="#012236">Action</th>
<td><p class="hiderow" bgcolor="white">Abc</p></td>
</tr>
<!--<tr>-->

<!--<td><p class="hiderow">Abc</p></td>-->
<!--<td>01</td>
<td>abc</td>
<td>loreum consectetur adipisicing elit, sed do eiusmod tempor</td>
<td>Tuesday-21-August-2018</td>
<td>Friday-24-August-2018</td>
<td style="color:red";>Rejected</td>-->
<?php
include 'dis.php';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
    	echo "<td><p>&nbsp;</p></td>";
    	$id = $row["empid"];
    	$stmt = "SELECT fname, lname FROM employee WHERE empno = $id";
    	$res = $conn->query($stmt);
        echo "<td>" . $row["id"] . "</td>";
    	//echo "id: " . $row["id"];
        if ($res->num_rows > 0) {
    // output data of each row
    while($r = $res->fetch_assoc()) {
    	//echo "fname: " . $r["fname"];
        echo "<td>" . $r["fname"] . " " . $r["lname"] . "</td>";
    }
}
		//echo "reasonforrequest: " . $row["reasonforrequest"];
		//echo "fromdate: " . $row["fromdate"];
		//echo "todate: " . $row["todate"];
		//echo "status: " . $row["status"];
		//echo "<br>";
        echo "<td>" . $row["reasonforrequest"] . "</td>";
        echo "<td>" .  $row["fromdate"]. "</td>";
        echo "<td>" . $row["todate"]. "</td>";
        echo '<td style="color:green">' . $row["status"] . "</td>";
        echo '<td><a href="#" class="reject" onclick="return updateinfo("Rejected",$id)"><u>Reject</u></a></td><td><a href="#" onclick="return updateinfo("Approved",$id)"><u>Approval</u></td><td><p>&nbsp;</p></td>';
        echo "</tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<script>
	function updateinfo(empstate,empnum)
	{
		document.write("Hi");
		<?php
		include 'dis.php';
		$st = "UPDATE leavetable
SET status = empstate
WHERE empid=empnum";
if ($conn->query($st) === TRUE) {
    
   if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
    	echo "<td><p>&nbsp;</p></td>";
    	$id = $row["empid"];
    	$stmt = "SELECT fname, lname FROM employee WHERE empno = $id";
    	$res = $conn->query($stmt);
        echo "<td>" . $row["id"] . "</td>";
    	//echo "id: " . $row["id"];
        if ($res->num_rows > 0) {
    // output data of each row
    while($r = $res->fetch_assoc()) {
    	//echo "fname: " . $r["fname"];
        echo "<td>" . $r["fname"] . " " . $r["lname"] . "</td>";
    }
}
		//echo "reasonforrequest: " . $row["reasonforrequest"];
		//echo "fromdate: " . $row["fromdate"];
		//echo "todate: " . $row["todate"];
		//echo "status: " . $row["status"];
		//echo "<br>";
        echo "<td>" . $row["reasonforrequest"] . "</td>";
        echo "<td>" .  $row["fromdate"]. "</td>";
        echo "<td>" . $row["todate"]. "</td>";
        echo '<td style="color:green">' . $row["status"] . "</td>";
        echo '<td><a href="#" class="reject" onclick="updateinfo("Rejected",$id)"><u>Reject</u></a></td><td><a href="#" onclick="updateinfo("Approved")"><u>Approval</u></td><td><p>&nbsp;</p></td>';
        echo "</tr>";
    }
} else {
    echo "0 results";
}
}
		else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?> 	
		
	}
</script>
<!--<td><a href="#" class="reject"><u>Reject</u></a></td>
<td><a href="#"><u>Approval</u></td>
<td><p class="hiderow">Abc</p></td>
</tr>-->
<!--<tr>
<td><p class="hiderow">Abc</p></td>
<td>02</td>
<td>def</td>
<td>loreum consectetur adipisicing elit, sed do eiusmod tempor</td>
<td>Tuesday-21-August-2018</td>
<td>Thursday-23-August-2018</td>
<td style="color:green";>Approved</td>
<td><a href="#" class="reject"><u>Reject</u></a></td>
<td><a href="#"><u>Approval</u></td>
<td><p class="hiderow">Abc</p></td>
</tr>
<tr>
<td><p class="hiderow">Abc</p></td>
<td>03</td>
<td>ghi</td>
<td>loreum consectetur adipisicing elit, sed do eiusmod tempor</td>
<td>Tuesday-21-August-2018</td>
<td>Saturday-25-August-2018</td>
<td style="color:red";>Rejected</td>
<td><a href="#" class="reject"><u> Reject</u></a></td>
<td><a href="#"><u>Approval</u></td>
<td><p class="hiderow">Abc</p></td>
</tr>

<tr>
<td><p class="hiderow">Abc</p></td>
<td>04</td>
<td>def</td>
<td>loreum consectetur adipisicing elit, sed do eiusmod tempor</td>
<td>Tuesday-21-August-2018</td>
<td>thursday-23-august-2018</td>
<td style="color:green";>Approved</td>
<td><a href="#" class="reject"><u>Reject</u></a></td>
<td><a href="#"><u>Approval</u></td>
<td><p class="hiderow">Abc</p></td>
</tr>

<tr>
<td><p class="hiderow">Abc</p></td>
<td>05</td>
<td>def</td>
<td>loreum consectetur adipisicing elit, sed do eiusmod tempor</td>
<td>Tuesday-21-August-2018</td>
<td>Thursday-23-August-2018</td>
<td style="color:red";>Rejected</td>
<td><a href="#" class="reject"><u> Reject</u></a></td>
<td><a href="#"><u>Approval</u></td>
<td><p class="hiderow">Abc</p></td>
</tr>

<tr>
<td><p class="hiderow">Abc</p></td>
<td>06</td>
<td>def</td>
<td>loreum consectetur adipisicing elit, sed do eiusmod tempor</td>
<td>Tuesday-21-August-2018</td>
<td>Thursday-23-August-2018</td>
<td style="color:red";>Rejected</td>
<td><a href="#" class="reject"><u> Reject</u></a></td>
<td><a href="#"> <u>Approval</u></a></td>
<td><p class="hiderow">Abc</p></td>
</tr>              

<tr>
<td><p class="hiderow">Abc</p></td>
<td>07</td>
<td>def</td>
<td>loreum consectetur adipisicing elit, sed do eiusmod tempor</td>
<td>Tuesday-21-August-2018</td>
<td>Thursday-23-August-2018</td>
<td style="color:green";>Approved</td>
<td><a href="#" class="reject"> <u>Reject</u></a></td>
<td><a href="#"><u>Approval</u></a></td>
<td><p class="hiderow">Abc</p></td>
</tr>-->
<tr>
<td><p class="hiderow">Abc</p></td>
<td colspan="8" class="paragraph">
<p class="hiderow" >abc</p>
<p class="hiderow" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatu.
minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
<p class="hiderow" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
<p class="hiderow" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
<td><p class="hiderow">Abc</p></td>
</td>
</tr>
</table>
</div>
</div>
</div>
</section>
</section>
</body>
</html>
