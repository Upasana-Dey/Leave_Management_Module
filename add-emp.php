<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'header.php';?>
  <link rel="stylesheet" href="css/empdetails.css">

  <script language="javascript" type="text/javascript">
  
  function validate(form, anchor)
  {
   var FirstName=document.getElementById("fname").value,
    LastName=document.getElementById("lname").value,
     EmployeeE_mailID=document.getElementById("email").value,
     Designation=document.getElementById("des").value,
     gender=$('input[name=gender]').val();
     // console.log(gender);
     Dateofjoining=document.getElementById("doj").value,
     BirthDate=document.getElementById("bd").value,
     ContactNo=document.getElementById("ContactNo").value,
     BloodGroup=document.getElementById("bg").value,
     EmployeeNo=document.getElementById("EmployeeNo").value,
     CurrentAddress=document.getElementById("CA").value,
     PermanentAddress=document.getElementById("PA").value,
     ReportingManager=document.getElementById("RM").value,
      AccountNo=document.getElementById("AN").value,
      IFSCCode=document.getElementById("IC").value,
       BankName=document.getElementById("BN").value,
      BankBranchName=document.getElementById("BBN").value,
        IncomeTaxPAN=document.getElementById("ITP").value,
        AadharNumber=document.getElementById("AaN").value,
        PassportNumber=document.getElementById("Pass").value,
        UniversalAccountNumber=document.getElementById("UAN").value;
       if(FirstName=="")
      {
          window.alert("Please enter your First Name");
          registrationform.fname.focus();
          return false;
      }
      if(LastName=="")
      {
          window.alert("Please enter your Last Name");
          registrationform.lname.focus();
          return false;
      }
      if(Designation=="")
      {
        window.alert("Please select your Designation");
        registrationform.des.focus();
          return false;   
      }
      if (Dateofjoining == "")                                   
    { 
        window.alert("Please enter your date of joining."); 
        registrationform.doj.focus(); 
        return false; 
    } 
      if (EmployeeE_mailID == "")                                   
    { 
        window.alert("Please enter a valid e-mail address."); 
        registrationform.email.focus(); 
        return false; 
    } 

if (BirthDate == "")                                   
    { 
        window.alert("Please enter your birth date"); 
        registrationform.bd.focus(); 
        return false; 
    } 
    console.log(ContactNo)
    if(ContactNo=="")
    {
        alert("Please enter the phone number");
        registrationform.ContactNo.focus();
        return false;
    }
  
 
    if(BloodGroup=="")
      {
          window.alert("Please select your Blood Group");
          registrationform.bg.focus();
          return false;
      }
      if(EmployeeNo=="" || isNaN(EmployeeNo))
      {
        window.alert("please enter number like 8945612378 and number must be a 10 digit number"); 
        registrationform.EmployeeNo.focusg();	     
        return false;    
      }

      if(CurrentAddress=="")
      {
          window.alert("Please enter your Current Address");
          registrationform.CA.focus();
          return false;
      }
      if(PermanentAddress=="")
      {
          window.alert("Please enter your Permanent Address");
          registrationform.PA.focus();
          return false;
      }
      if(ReportingManager=="")
      {
          window.alert("Please enter your Reporting Manager");
          registrationform.RM.focus();
          return false;
      }
       if(AccountNo=="")
     {
         alert("Please enter the account number");
         registrationform.AccountNo.focus();
         return false;
     }
  

    if(IFSCCode=="")
     {
         alert("Please enter the ifsc code");
         registrationform.IFSCCode.focus();
         return false;
     }
     if(BankName=="")
     {
         alert("Please enter the BankName");
         registrationform.BankName.focus();
         return false;
     }
     if(BankBranchName=="")
     {
         alert("Please enter the BankBranchName");
         registrationform.BankBranchName.focus();
         return false;
     }
     if(IncomeTaxPAN=="")
     {
         alert("Please enter the income tax pan");
         registrationform.IncomeTaxPAN.focus();
         return false;
     }
     if(AadharNumber=="")
     {
         alert("Please enter the Aadhar number");
         registrationform.AadharNumber.focus();
         return false;
     }
     if(PassportNumber=="")
     {
         alert("Please enter the passport number");
         registrationform.PassportNumber.focus();
         return false;
     }
     if(UniversalAccountNumber=="")
     {
         alert("Please enter the UA number");
         registrationform.UniversalAccountNumber.focus();
         return false;
     }
     /*function setCookie(key, value) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (value * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
        }

        function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        }*/
      
            // console.log(form);return false;

       var formdata ={
         "fname" : FirstName,
         "lname" :LastName,
         "des" : Designation,
         "doj" :Dateofjoining,
         "email" :EmployeeE_mailID ,
         "bd" :BirthDate,
         "bg" : BloodGroup,
         "ContactNo" :ContactNo,
         "CA" : CurrentAddress,
         "PA" :PermanentAddress,
         "RM" : ReportingManager,
         "EmployeeNo" :EmployeeNo,
         "AN" : AccountNo,
         "IC" :IFSCCode,
         "BN" : BankName,
         "BBN" :BankBranchName,
         "ITP" : IncomeTaxPAN,
         "AaN" :AadharNumber,
         "Pass" : PassportNumber,
         "UAN" :UniversalAccountNumber,
         "gender": gender

       };

            $.ajax({
                url: "employee.php",
                type: 'post',
                data: formdata,
                success: function(data){
                    console.log(data);
                    // if(data == "user id not found"){
                    //     document.getElem
                    //     return 

                    // }
                    if($.trim(data) == 'success'){
                        // setCookie('user', JSON.stringify(formData));
                        // console.log(getCookie('user'));
                        window.location.href='/mock/editleave.php';
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
        <a><img src="images/logo.png" height="33" width="131" class="headerimg" /></a>
      </nav>
    </header>
    <section class="container-fluid">
      <div class="row">
        <?php include 'menu.php';?>
        <div class="col-sm-10 content-wrapper">
          <div class="empform">
            <form name="registrationform">
              <!-- <h5>ADD EMPLOYEE</h5> -->
              <section class="container-fluid">
                <div class="row">
                  <h4>ADD EMPLOYEE</h4>
                  <div class="blocks">
                    <div class="col-sm-4">
                      <div class="insidecol">
                        <label>First Name</label>
                        <input type="text" name="fname" id="fname"  value="" />

                        <label>Date of joining</label>
                        <input type="date" name="doj"id="doj" class="designcolums" />

                        <label>Contact No</label>
                        <input type="number" name="ContactNo" id="ContactNo" class="designcolums" />

                        <label>Employee No</label>
                        <input type="number" name="EmployeeNo" id="EmployeeNo" class="designcolums" />

                        <label>Manager</label>
                        <label class="radio-inline">
                          <input type="radio" name="role" checked>Yes
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="role">No
                        </label><br><br>

                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="insidecol">
                        <label>Last Name</label>
                        <input type="text" name="lname" id="lname"/>

                        <label>Employee E_mail ID</label>
                        <input type="text" name="email" id="email" class="designcolums" /><br><br>

                        <label>Gender</label><br>
                        <label class="radio-inline" id="radio-check">
                          <input type="radio" name="gender" value='Male' checked>Male
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="gender" value='Female'>Female
                        </label><br><br>

                        <label>Current Address</label><br>
                        <input type="text" name="CA" id="CA" class="designcolums" /><br><br>

                        <label>Reporting Manager</label>
                        <input type="text" name="RM" id="RM" class="designcolums" /><br>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="insidecol">
                        <label>Designation</label>
                        <select name="des" id="des" class="designcolums">
                          <option></option>
                          <option>UI designer</option>
                          <option>UX designer</option>
                          <option>Software Engineer</option>
                          <option>Project Manager</option>
                        </select><br><br>

                        <label>Birth Date</label>
                        <input type="date" name="bd"id="bd" class="designcolums" /><br><br>

                        <label>Blood Group</label>
                        <select name="bg" id="bg" class="designcolums">
                          <option></option>
                          <option>O</option>
                          <option>A+</option>
                          <option>A-</option>
                          <option>B+</option>
                          <option>B-</option>
                          <option>AB+</option>
                          <option>AB-</option>
                        </select><br><br>

                        <label>Permanent Address</label>
                        <input type="text" name="PA" id="PA" class="designcolums" /><br>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section class="container-fluid">
                <div class="row">
                  <h4 class="bandetails">BANK DETAILS</h4>
                  <div class="blocks">
                    <!-- <h4>BANK DETAILS</h4>  -->
                    <div class="col-sm-4">
                      <div class="insidecol">
                        <label>Account No</label>
                        <input type="number" name="AN" id="AN" class="designcolums" /><br><br>

                        <label>Bank Branch Name</label>
                        <input type="text" name="BBN" id="BBN" class="designcolums" /><br><br>

                        <label>Passport Number</label>
                        <input type="text" name="Pass" id="Pass" class="designcolums" /><br><br>



                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="insidecol">
                        <label>IFSC Code</label>
                        <input type="text" name="IC" id="IC" class="designcolums" /><br><br>

                        <label>Income Tax PAN</label>
                        <input type="text" name="ITP" id="ITP" class="designcolums" /><br><br>


                        <label>Universal Account Number (UAN)</label><br>
                        <input type="text" name="UAN" id="UAN" class="designcolums" /><br><br>


                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="insidecol">
                        <label>Bank Name</label>
                        <input type="text" name="BN" id="BN" class="designcolums" /><br><br>
                        <label>Aadhar Number</label>
                        <input type="number" name="AaN" id="AaN" class="designcolums" /><br>

                      </div>  
                    </div>
                  </div>
                </div>
                <div>
                       <input type="hidden"name="form_submitted" value="1"> 
                        <button type="button" value="submit" name="submit" onclick="validate(this)">submit</button>
                     <button type="submit" value="LOGIN">cancel</button>
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
