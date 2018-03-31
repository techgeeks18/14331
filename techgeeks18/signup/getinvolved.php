<?php
  //session_start();
//$_SESSION["otpv"]=0;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techgeeks18";
// Create connection
$con=mysqli_connect($servername, $username, $password, $dbname)or die("bye");
      //mysqli_select_db($dbname)or die("bye");
// mysql_connect("localhost","root","");
// mysql_select_db("techgeeks18");
if (isset($_POST["insert"])) {
      $fname=$_POST["fname"];
      $lname=$_POST["lname"];
      $dob=$_POST["dob"];
      $gender=$_POST["gender"];
      $institute=$_POST["institute"];
      $program=$_POST["program"];
      $year=$_POST["year"];
      $mno=$_POST["mobilenumber"];
      $lno=$_POST["landlinenumber"];
      $district=$_POST["district"];
      $subdiv=$_POST["subdiv"];
      $block=$_POST["block"];
      $add=$_POST["add"];
      $pincode=$_POST["pincode"];
      $email=$_POST["email"];
      $password=md5($_POST["password"]);

      // echo "$fname";
      // echo "$lname";
      // echo "$dob";
      // echo "$gender";
      // echo "$institute";
      // echo "$program";
      // echo "$year";
      // echo "$mno";
      // echo "$lno";
      // echo "$district";
      // echo "$subdiv";
      // echo "$block";
      // echo "$add";
      // echo "$pincode";
      // echo "$email";
      // echo "$password";


      // echo("'$dob','$fname','$lname','$institute','$program','$year','$gender','$mno','$lno','$district','$subdiv','$block','$add','$pincode','$email','$password'");
      //$interest= "hello";
      //$interest=$_POST["interest"];
      //INSERT into volunteer values(4,1998-02-13,'mon','doshi','sakec','be','2018','M',9878466,65486,'mum','su','bl','jafhjhshkgjnkg',468666,'mo@g.com','social','monil')

      //$query=mysql_query("insert into volunteer values('$dob','$fname','$lname','$institute','$program','$year','$gender','$mno','$lno','$district','$subdiv','$block','$add','$pincode','$email','interest','$password')");
      // //INSERT into trial values('$mno')
      // mysql_query("INSERT into trial values('$mno')")
      // mysql_query("INSERT into trial values('$mno')");
      // $query1=mysql_query("INSERT into volunteer values (
      //     '$dob','$fname','$lname','$institute','$program','$year','$gender','$mno','$lno','$district','$subdiv','$block','$add','$pincode','$email','$password')");
      // if ($query1) {
      //   echo("inserted 1");
      // }
      // else{
      //   echo("sorry 1");
      // }
        // $query=mysql_query("INSERT into volunteer values(4,1998-02-13,'mon','doshi','sakec','be','2018','M',9878466,65486,'mum','su','bl','jafhjhshkgjnkg',468666,'mo@g.com','social','monil')");
        // if ($query) {
        //   echo("done");
        // }
        // else{
        //   echo("not done");
        // }


        $query=mysqli_query($con,"insert into volunteer (dob,fname,lname,institute,program,year,gender,mobilenumber,landlinenumber,district,subdivision,block,address,pincode,emailid,password)values('$dob','$fname','$lname','$institute','$program','$year','$gender','$mno','$lno','$district','$subdiv','$block','$add','$pincode','$email','$password') ") or die(mysqli_error($con));
        if ($query) {
          echo("Inserted");
          header("../index.php");
        }
        else{
          echo("Not inserted");
        }
    //   $query1=mysql_query("INSERT into volunteer (dateofbirth, fname, lname, institute, program, year, gender, mobilenumber, landlinenumber, district, subdivision,  block, address, pincode, emailid, password) values('$dob','$fname','$lname','$institute','$program','$year','$gender','$mno','$lno','$district','$subdiv','$block','$add','$pincode','$email','$password')");
    // if ($query1) {
    //   alert("inserted");
    //   header("login.php");
    // }
    // else{
    //   echo "not inserted";
    // }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign-Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="getinvolved.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <SCRIPT>
    //console.log($)
    $(document).ready(function(){
      $("#btn1").click(function(){
         //alert(1);
        ph=$(".phno").val();
        //alert(rec);
        $.post("otp_generator.php" , {"x1": ph} , function(res){
          console.log(res);
        })
      })
    });
    $(document).ready(function(){
      $("#btn2").click(function(){
         //alert(1)
        check=$(".otp_get").val();
        ph=$(".phno").val();
        //alert(rec)
        $.post("otp_checker.php" , {"otp_sub": check, "x1": ph} , function(tres){
          alert(tres);
          //console.log(tres);
        })
      })
    });
    
  </SCRIPT> 


  <!-- <img src="logo.png" alt="Government Of Sikkim"> -->
</head>
<body>
<!-- Box borders and content -->
<!-- SIGN UP FORM -->
<div class="container" style="border: 5px;">
    <h2>Sign Up</h2>
    <form method="post" action="">
      <div class="form-group">
        <label for="fname"><b>First Name:</b></label>
        <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" required>
      </div>
      <div class="form-group">
        <label for="lname"><b>Last Name:</b></label>
        <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" required>
      </div>
      <div class="form-group">
        <label for="dob" class="col-sm-0 control-label"><b>Date Of Birth:</b></label>
        <div class="col-sm-0">
          <input type="date" name="dob" id="dob" placeholder=" Date of Birth" required>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label" required><b>Gender:</b></label>
        <div class="col-sm-0">
          <label class="radio-inline">
          <input type="radio" name="gender" id="gender1" value="male"><b>Male</b>
          </label>
          <label class="radio-inline">
          <input type="radio" name="gender" id="gender2" value="female"><b>Female</b>
          </label>
        </div>
       <h2>Education Details</h2> 
      <div class="form-group">
        <label for="institute"><b>Institute:</b></label>
        <input type="text" class="form-control" id="institute" placeholder="Enter Institute" name="institute" required>
      </div>
      <div class="form-group">
        <label for="program"><b>Program:</b></label>
        <input type="text" class="form-control" id="program" placeholder="Enter Program" name="program" required>
      </div>
      <div class="form-group">
        <label for="year"><b>Year:</b></label>
        <input type="text" class="form-control" id="year" placeholder="Enter Current Year of Study" name="year" required>
      </div>
      <h2>Contact Details</h2>
      <!-- <div class="form-group">
        <label for="mobilenumber"><b>Mobile Number:</b></label>
        <input type="number" class="form-control phno" id="mobilenumber" placeholder="Enter Mobile Number" name="mobilenumber" required>
      </div> -->
      <div class="form-group">
        <label for="landlinenumber"><b>Landline Number:</b></label>
        <input type="number" class="form-control" id="lno" placeholder="Enter Landline Number" name="landlinenumber" required>
      </div>
      <h2>Address</h2>
      <div class="form-group">
        <label for="district"><b>District:</b></label>
        <select name="district" id="first-choice">
          <option selected value="base">Please Select District</option>
          <option value="north">North Sikkim</option>
          <option value="south">South Sikkim</option>
          <option value="east">East Sikkim</option>
          <option value="west">West Sikkim</option>
        </select>
      </div>
      <div class="form-group">
        <label for="subdivision"><b>Sub Division:</b></label>
        <select name="subdiv" id="second-choice">
          <option>Please choose from above</option>
        </select>
      </div>
      <div class="form-group">
        <label for="block"><b>Block:</b></label>
        <select name="block" id="third-choice">
          <option>Please choose from above</option>
        </select>
      </div>
      <!-- Script for dynamic dropdown -->
      <script>
      $("#first-choice").change(function() {
        $("#second-choice").load("gettersubdiv.php?choice1=" + $("#first-choice").val());
        $("#third-choice").load("");
      });

      $("#second-choice").change(function() {
        $("#third-choice").load("getterblock.php?choice2=" + $("#second-choice").val());
      });
      </script>
      <!-- Script ends -->
      <div class="form-group">
        <label for="add"><b>Address:</b></label><br>
        <textarea rows="4" cols="25" id="add" placeholder="Enter Address" name="add"></textarea><br>
      </div>
      <div class="form-group">
        <label for="pincode"><b>Pincode:</b></label>
        <input type="number" class="form-control" id="pincode" placeholder="Enter Pincode" name="pincode" required>
      </div>
      
      <div class="form-group">
        <label for="" class="control-label"><b>Interests:</b></label>
        <div class="row">
        <div class="col-sm-2">
          <label class="checkbox-inline">
          <input type="checkbox" name="interest" id="social" value="social"><b>&nbspSocial</b>
          </label>
        </div>  
        <div class="col-sm-2">
          <label class="checkbox-inline">
          <input type="checkbox" name="interest" id="cultural" value="cultural"><b>&nbspCultural</b>
          </label>
        </div>  
        <div class="col-sm-2">
          <label class="checkbox-inline">
          <input type="checkbox" name="interest" id="tech" value="tech"><b>&nbspTechnical</b>
          </label>
        </div>  
         <div class="col-sm-2">
          <label class="checkbox-inline">
          <input type="checkbox" name="interest" id="sports" value="sports"><b>&nbspSports</b>
          </label>
        </div>  
        <div class="col-sm-2">
          <label class="checkbox-inline">
          <input type="checkbox" name="interest" id="health" value="health"><b>&nbspHealth</b>
          </label>
        </div>  
        <div class="col-sm-2">
          <label class="checkbox-inline">
          <input type="checkbox" name="interest" id="womenempowerment" value="womenempowerment"><b>&nbspWomen Empowerment</b>
          </label>
        </div>
      </div>   
      <div class="form-group">
        <label for="email"><b>Email:</b></label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password"><b>Password:</b></label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
      </div>
      <div class="form-group">
          <label for="mobilenumber"><b>Mobile Number:</b></label>
          <input type="number" class="form-control phno" id="mobilenumber" placeholder="Enter Mobile Number" name="mobilenumber" required><br>
          <input type="button" value="Get OTP" class="btn1 btn btn-outline-primary" id='btn1'>
      </div>
      <div class="form-group">
          <label for="otp"><b>Enter OTP:</b></label>
          <input type="number" class="form-control otp_get" id="otp" placeholder="Enter OTP" name="otp" required><br>
          <input type="button" value="Verify" class="btn2 btn btn-outline-primary" id='btn2'>
      </div>
      <button class="btn btn-outline-primary" class="insert" name="insert">Submit</button>
      <div class="submit"><a href="login.html"><u>Already a member ? Log in Now!</u></a></div>
    </form>
  </div>
</div>
<!-- SIGN UP FORM ENDS -->


  
</body>
</html>