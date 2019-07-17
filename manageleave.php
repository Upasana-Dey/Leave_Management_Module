<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php';?>
        <link rel="stylesheet" href="css/table.css">
</head>

<body>
    <section class="wrapper container-fluid">
        <header class="w-100">
            <nav id="nhead">
                <a href="#"><img src="images/logo.png" height="33" width="131" class="headerimg" /></a>
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

                        <?php
                          include 'dis.php';
                          if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                          echo "<tr>";
                     //     echo "<td><p>&nbsp;</p></td>";
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

    echo "<td>" . $row["reasonforrequest"] . "</td>";
    echo "<td>" .  $row["fromdate"]. "</td>";
    echo "<td>" . $row["todate"]. "</td>";
    echo '<td style="color:green">' . $row["status"] . "</td>";
    $reject="Rejected";
    $approve="Approved";

echo "<td><a href='javascript: void(0)' onclick='updatinfo(".$row["id"].",  this)' class='reject'><u>Reject</u></a></td><td><a href='javascript: void(0)' onclick='updatinfo(".$row["id"].",  this)' class='approve'><u>Approve</u></td>";
    echo "</tr>";
}
} else {
echo "0 results";
}

$conn->close();
?>

                            
                    </table>

                </div>
        </section>
        <?php include 'footer.php';?>
    </section>
</body>
<script type='text/javascript'>
    function updatinfo(id, anchor) {

        jQuery.post("updateleave.php", {
            empstate: $.trim($(anchor).text()),
            empnum: id
        }).done(function(data) {

            if (data == 'ok') {
                $(anchor).parent().parent().find('td:eq(6)').text($(anchor).text());
            }
        });
        return false;
    }
</script>

</html>