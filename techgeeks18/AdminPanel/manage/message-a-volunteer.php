<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body{
      background-color: white;
      text-decoration-color: white; 
    }
  </style>
    <SCRIPT type="text/javascript">
    console.log($)
    $(document).ready(function(){
      $(".btn1").click(function(){
         //alert(1)
        msg=$(".msg").val();
        // id=$(".event").val();
        vid=$(".vid").val();
        //alert(rec)
        $.post("sms-a-volunteer.php" , {"x1": msg , "x2": vid  } , function(res){
          console.log(res);
        })
      })
    });
    $(document).ready(function(){
      $(".mail").click(function(){
         //alert(1)
        msg=$(".message").val();
        sub=$(".subj").val();
        id=$(".volid").val();
        //alert(rec)
        $.post("email.php" , {"x3": msg , "x1": id, "x2": sub} , function(res){
          console.log(res);
        })
      })
    });
  </SCRIPT>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" id="header">
  <div class="container-fluid" >
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button> 
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="admin.php">Home</a></li>
            <li><a href="addPage.php">Add Programs</a></li>
            <li><a href="listPage.php">List Programs</a></li>
            <li><a href="#" target="_blank">Assign Event Co-Ordinators</a></li>
            <li><a href="view-volunteers.php">View Volunteers</a></li>
            <li><a href="view-coordinators.php">View Event Co-Ordinators</a></li>
            <li><a href="coordinatorsms.php">Contact Event Co-Ordinators</a></li>
            <li><a href="eventsms.php">Contact all Volunteers</a></li>
            <li><a href="message-a-volunteer.php">Contact a Volunteer</a></li>
            <li><a href="logout.php" class="float-right;">Sign Out</a></li>
         </ul>
         
      </div>
   </div></nav>
      

          <div class="container-fluid" style="margin-top: 25px;"><br><br><br><br><br>
<h2> Message a Volunteer</h2>    
<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
  <!-- <div class="form-group">
          <label for="id">Enter Event Id</label>
          <input type="number" class="form-control event" id="eid" name="event"  placeholder="Enter Event Id" required>
 </div>
   --><div class="form-group">
          <label for="vid">Enter Volunteer Id(<a href="volunteerindex.html" target="_blank">Click here for the volunteers and id</a>)</label>
          <input type="number" class="form-control vid" id="vid" name="vid"  placeholder="Enter Volunteer Id">
 </div>
    <div class="form-group right">
          <label for="msg">Enter Message&nbsp;&nbsp&nbsp&nbsp&nbsp</label>
          <input type="text" class="form-control msg" id="msg" name="msg"  placeholder="Enter Message">
    </div>
  <input type="button" value="Send SMS" id="insert" class="btn1 btn">
</form></div>
<hr>
<br>
<div class="container-fluid" style="margin-top: 25px;"><br>
<SCRIPT type="text/javascript">
    console.log($)
    
  </SCRIPT>

<h2> Email a Volunteer</h2>
<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
  <div class="form-group">
        <label for="id">Enter Volunteer Id&nbsp&nbsp&nbsp&nbsp&nbsp(<a href="volunteerindex.html" target="_blank">Click here for the volunteers and id</a>)</label>
        <input type="number" class="form-control volid" id="volid" name="volid"  placeholder="Enter Volunteer Id">
    </div>
  <div class="form-group right">
        <label for="sub">Enter Subject</label>
        <input type="text" class="form-control subj" id="subj" name="subj"  placeholder="Enter Subject">
    </div>
    <div class="form-group right">
        <label for="msg">Enter Message</label>
        <input type="text" class="form-control message" id="message" name="message"  placeholder="Enter Message">
    </div>
  <input type="button" value="Send E-mail" id="insert" class="btn mail" id="mail">
<div>
</body>
</html>

