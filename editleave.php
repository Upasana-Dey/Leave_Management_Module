<!DOCTYPE html>
<html lang="en">

<head>
     <?php include 'header.php';?>
    
    <script src="js/jquery-ui.js"></script>
    <link href="css/jquery-ui.css" rel="stylesheet">
    <script>
        $(document).ready(function () 
        {
            var minDate = new Date();
            $("#first").datepicker
            ({
                // showAnim: 'drop',
                numberOfMonth: 1,
                buttonImage: "images/ico-cal.png",
                showOn: "button",
                buttonText: "Select date",
                buttonImageOnly: true,
                // minDate: minDate,
                dateFormat: 'dd/mm/yy',
                onClose: function (selectedDate) {
                    $('#first').datepicker("option", "minDate", selectedDate);
                }
            });
            var minDate = new Date();
            $("#second").datepicker({
                // showAnim: 'drop',
                numberOfMonth: 1,
                buttonImage: "images/ico-cal.png",
                showOn: "button",
                buttonText: "Select date",
                buttonImageOnly: true,
                // minDate: 1,
                dateFormat: 'dd/mm/yy',
                onClose: function (selectedDate) {
                    $('#second').datepicker("option", "minDate", selectedDate);
                }
            });


        })
        function parseDate(str) {
            var mdy = str.split('/');
            console.log(mdy);
            return new Date(mdy[2], mdy[1] - 1, mdy[0]);
        }

        function datediff(first, second) {
            // Take the difference between the dates and divide by milliseconds per day.
            // Round to nearest whole number to deal with DST.
            return Math.round((second - first) / (1000 * 60 * 60 * 24));
        }
        function applyclick() {
            var startDate = document.getElementById("first").value;
            var endDate = document.getElementById("second").value;
            var x = datediff(parseDate(startDate), parseDate(endDate)) + 1;
            document.getElementById('res').placeholder = x;
            drop();
            reasonforrequest();
            // contact();
            // contactaddress();
        }
        // function contact() {
        //     var contactno = document.getElementById("contactno").value;
        //     // console.log(leavetype);
        //     if (contactno == "") {
        //         window.alert("please enetr contact number");
        //         formname.contactno.focus();
        //         return false;

        //     }
        // }

        function drop() {
            var leavetype = document.getElementById("dropdown").value;
            console.log(leavetype);
            if (leavetype == "") {
                window.alert("please sectect the leave type");
                formname.dropdown.focus();
                return false;

            }
        }

        function reasonforrequest() {
            var reasonforrequest = document.getElementById("reason").value;
            if (reasonforrequest == "") {
                window.alert("please enter the reason");
                formname.reason.focus();
                return false;

            }
        }
        // function contactaddress() {
        //     var contactaddress = document.getElementById("contactad").value;
        //     // console.log(leavetype);
        //     if (contactaddress == "") {
        //         window.alert("please enetr contact addrress");
        //         formname.contactad.focus();
        //         return false;

        //     }
        // }


    </script>
</head>

<body>
    <header class="w-100">
        <nav id="nhead">
            <a><img src="images/logo.png" height="33" width="131" class="headerimg" /></a>
        </nav>
    </header>
    <section class="container-fluid">
        <div class="row">
             <?php include 'menu.php';?>
            <div class="col-sm-10">
                <div class="empform">
                    <form name="formname" action="edit.php" method="post">

                        <section class="container-fluid">
                            <div class="row">
                                <h4>EDIT LEAVE</h4>
                                <div class="blocks">
                                    <div class="col-sm-4">
                                        <div class="insidecol">
                                            <label>From Date<sup>*</sup></label>
                                            <input type="text" name="fromdate" id="first" placeholder=
                                            '<?php
                                            include 'editcode.php';
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                $a=$row["fromdate"];
                                                echo "$a";
                                                    $b=$row["todate"];
                                                    
                                                    $c=$row["reasonforrequest"];

                                                    $d=$row["contactno"];

                                                    $e=$row["currentaddress"];

                                                    $f=$row["leavetype"];
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            
                                            ?>'> </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="insidecol">
                                            <label>End Date<sup>*</sup></label>
                                            <input type="text" name="todate" id="second" onchange="setDuration()" placeholder=
                                            '<?php
                                            include 'editcode.php';
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                $a=$row["fromdate"];
                                                
                                                    $b=$row["todate"];
                                                    echo "$b";
                                                    
                                                    $c=$row["reasonforrequest"];

                                                    $d=$row["contactno"];

                                                    $e=$row["currentaddress"];

                                                    $f=$row["leavetype"];
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            
                                            ?>'>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="insidecol">
                                            <label>Leave type<sup>*</sup></label>
                                            <div class="select_box"><select name="leavetype" id="dropdown" placeholder=
                                            '<?php
                                            include 'editcode.php';
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                $a=$row["fromdate"];
                                                
                                                    $b=$row["todate"];
                                                    // echo "$b";
                                                    
                                                    $c=$row["reasonforrequest"];

                                                    $d=$row["contactno"];

                                                    $e=$row["currentaddress"];

                                                    $f=$row["leavetype"];
                                                    echo "$f";

                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            
                                            ?>'>
                                                    <option></option>
                                                    <option>SICK LEAVE</option>
                                                    <option>PERSONAL LEAVE</option>
                                                    <option>CASUAL LEAVE</option>
                                                    <option>HOLIDAY</option>
                                                </select><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="container-fluid">
                            <div class="row">
                                <div class="blocks">
                                    <div class="col-sm-4">
                                        <div class="insidecol">
                                            <label>Duration<sup>*</sup></label>
                                            <input type="text" name="duration" id="res"  />
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="insidecol">
                                            <label>Reason For Request<sup>*</sup></label>
                                            <input type="text" name="reasonforrequest" id="reason" placeholder=
                                            '<?php
                                            include 'editcode.php';
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                $a=$row["fromdate"];
                                                // echo "$a";
                                                    $b=$row["todate"];
                                                    
                                                    $c=$row["reasonforrequest"];echo "$c";

                                                    $d=$row["contactno"];

                                                    $e=$row["currentaddress"];

                                                    $f=$row["leavetype"];
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            
                                            ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="container-fluid">
                            <div class="row">
                                <h4>Alternative Contact Details</h4>
                                <div class="blocks">
                                    <div class="col-sm-4">
                                        <div class="insidecol">
                                            <label>Contact No</label>
                                            <input type="text" name="contactno" id="contactno" placeholder=
                                            '<?php
                                            include 'editcode.php';
                                            
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                $a=$row["fromdate"];
                                                // echo "$a";
                                                    $b=$row["todate"];
                                                    
                                                    $c=$row["reasonforrequest"];

                                                    $d=$row["contactno"];echo "$d";

                                                    $e=$row["currentaddress"];

                                                    $f=$row["leavetype"];
                                                }
                                            } else {
                                                echo "0 results";
                                            }

                                            ?>'>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="insidecol">
                                            <label>Current Address</label>
                                            <input type="text" name="currentaddress" id="contactad" placeholder=
                                            '<?php
                                            
                                            include 'editcode.php';
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                $a=$row["fromdate"];
                                                // echo "$a";
                                                    $b=$row["todate"];
                                                    
                                                    $c=$row["reasonforrequest"];

                                                    $d=$row["contactno"];

                                                    $e=$row["currentaddress"];echo "$e";

                                                    $f=$row["leavetype"];
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            $conn->close();
                                            ?>'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div>
                                <button type="button" value="apply" class="applybutton"
                                    onclick="applyclick()">Submit</button>
                                <button type="submit" value="cancle">Cancel</button>
                            </div> -->
                            <div>
                                <input type="hidden" value="1" name="form_submitted" >
                                <a href="edit.php"><button type="submit" value="apply" class="applybutton"
                                    onclick="applyclick()">Apply</button></a>
                                <button type="submit" value="cancle">Cancel</button>
                            </div>
                        </section>
                </div>
            </div>
    </section>
    </form>
    </div>
    </div>
    </div>
    </section>
    </section>
</body>

</html>