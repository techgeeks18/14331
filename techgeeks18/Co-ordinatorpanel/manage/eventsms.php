<!DOCTYPE html>
<html lang="en">
<head>
  <title>Co-ordinator Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <style>
    body{
      background-color: white;
      text-decoration-color: white; 
    }

  </style>
  <SCRIPT>
    console.log($)
    $(document).ready(function(){
      $(".btn1").click(function(){
         //alert(1)
        msg=$(".msg").val();
        // id=$(".event").val();
        vid=$(".event").val();
        //alert(rec)
        $.post("test_sms_api.php" , {"x1": msg , "x2": vid  } , function(res){
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
         <ul class="nav navbar-nav ">
            <li class="active"><a href="admin.php">Home</a></li>
            <li><a href="view-volunteers.php">View Volunteers</a></li>
            <li><a href="#">Assign Roles</a></li>
            <li><a href="#">Mark Attendance</a></li>
            <li><a href="eventsms.php">Contact all Volunteers</a></li>
            <li><a href="message-a-volunteer.php">Contact a Volunteer</a></li>
            <li><a href="logout.php" class="float-right;">Sign Out</a></li>
         </ul>
         
      </div>
   </div></nav>
      

          <div class="container-fluid" style="margin-top: -60px;">
      
<div class="container-fluid" style="margin-top: 25px;"><br><br><br><br><br>
<h2> Message Volunteers</h2>   
<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
    <div class="form-group">
          <label for="id">Enter Event Id</label>
          <input type="number" class="form-control event" id="event" name="event"  placeholder="Enter Event Id" required>
    </div>
    <div class="form-group right">
          <label for="msg">Enter Message&nbsp&nbsp&nbsp&nbsp&nbsp(<a href="eventindex.html" target="_blank">Click here for the events and id</a>)</label>
          <input type="text" class="form-control msg" id="msg" name="msg"  placeholder="Enter Message" required>
    </div>
  
  <input type="button" value="Send SMS" id="insert" class="btn btn1">
</form></div>
</body>
</html>

