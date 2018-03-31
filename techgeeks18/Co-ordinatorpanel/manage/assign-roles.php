<?php
require_once (dirname(__FILE__).'/../manage/inc/header.php') ;
$uid=$_SESSION[username];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<form method="post">
      <div class="form-group">
        <!-- <div class="form-group"> -->
        <label for="lname"><b>Enter  Eid(<a href="volunteerindex.html" target="_blank">Click here for the volunteers and id</a>):</b></label>
        <input type="text" class="form-control" id="eid" placeholder="Enter Event Id" name="eid">
      <!-- </div> -->
      </div>
      <div class="form-group">
        <label for="vid"><b>Enter  Vid:</b></label>
        <input type="text" class="form-control" id="vid" placeholder="Enter Volunteer Id" name="vid">
      </div>
      <div class="form-group">
        <label for="roles"><b>Roles:</b></label>
        <select id="first-choice">
          <option name="role" selected value="Hospitality">Hospitality</option>
          <option name="role" value="Anchoring">Anchoring</option>
          <option name="role" value="Registration">Registration</option>
          <option name="role" value="Photography">Photography</option>
          <option name="role" value="Publicity">Publicity</option>
        </select>
      </div>
      <div class="form-group">
        <label for="date"><b>Enter  Date:</b></label>
        <input type="date" class="form-control" id="date" placeholder="Enter date" name="date">
      </div>
      <button type="submit" name="insert" class="btn">Submit</button>
</form>
<!-- <?php

// query=mysqli_query($con,"select * from register r,volunteer v,event e where r.vid=v.vid and e.eid=r.eid");

?> -->
</body>
</html>