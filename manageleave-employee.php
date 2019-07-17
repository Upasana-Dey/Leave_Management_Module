<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'header.php';?>
 <link rel="stylesheet" href="css/table.css" />
  
<script>
  function submitForm(form){
            // console.log(form);return false;
            var formData  = $(form).serializeArray();
            console.log(formData);   
            $.ajax({
                url: "cancelleave.php",
                type: 'post',
                data: formData,
                success: function(data){
                    console.log(data);
                    if(data == "user id not found"){
                        document.getElem
                        return 

                    }
                    if($.trim(data) == 'success'){
                        //setCookie('user', JSON.stringify(formData));
                        //console.log(getCookie('user'));
                        window.alert("Succesfully submitted");
                        window.location.href = "/mock/manageleave-employee.php";
                        // $(anchor).parent().parent().find('td:eq(5)').text('Rejected');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
            return false;
        }

</script>
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
      

    <div class="col-sm-10 content-wrapper"> 
            <h2>Manage Leave</h2>
              <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
                        <tr>
                            <th>Sl.No</th>
                            <th>Employee name</th>
                            <th>Reason</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>State</th>
                            <th colspan="2">Action</th>
                        </tr>

  <script type='text/javascript'>
    function updatinfo(id, anchor){

jQuery.post("editleave.php", {empstate: $.trim($(anchor).text()), empnum: id}).done(function(data){
                  
 console.log(data);

if(data == 'ok'){
$(anchor).parent().parent().find('td:eq(6)').text($(anchor).text());
}
});
return false;
}
function cancel(id, anchor){
show();
}
</script>
<?php
include 'dis.php';
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr>";

$id = $row["empid"];
$stmt = "SELECT fname, lname FROM employee WHERE empno = $id";
$res = $conn->query($stmt);
echo "<td>" . $row["id"] . "</td>";

echo "<td>" . $row["applieddate"] . "</td>";
   
echo "<td>" .  $row["fromdate"]. "</td>";
echo "<td>" . $row["todate"]. "</td>";
echo '<td style="color:green">' . $row["status"] . "</td>";
$reject="Rejected";
$approve="Approved";

echo "<td><a href='editleave.php' class='black'><u>Edit</u></a></td><td><a href='javascript: void(0)' onclick='cancel(".$row["id"].",  this)' class='approve'><u>Cancel</u></td>";
echo "</tr>";
    }
} else {

    echo "0 results";
}

$conn->close();
?>
<div class="modal-content" id="mybox">
<div class="cross-button">
<button onclick="closing()">x</button>
</div>
<p><b>CANCEL YOUR LEAVE</b></p>
<form onsubmit="return submitForm(this)" method="POST">
<textarea class="reason" rows="4" cols="78" placeholder="Reason For Cancellation" name="reasonforrequest"></textarea>
<div class="reason-button">
<center>
<button class="button1" onclick="submit_button()">CANCEL</button>
<input type="hidden" value="1" name="form_submitted" >
<button class="button2" onclick="updatinfo(id,anchor)" type="submit">SUBMIT</button>

</center>
</div>
</form>
<script>
 function closing() {
document.getElementById('mybox').style.display="none";
}
function show()
{
document.getElementById('mybox').style.display="block";
}
</script>

 

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
