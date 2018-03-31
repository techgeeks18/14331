 <?php
require_once (dirname(__FILE__).'/../manage/inc/header.php') ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Style.css">
  <link href="devicons/css/devicons.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body{
      background-color: white;
      text-decoration-color: white; 
    }
  </style>
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
            <li><a href="assign-coordinators.php" target="_blank">Assign Event Co-Ordinators</a></li>
            <li><a href="view-volunteers.php">View Volunteers</a></li>
            <li><a href="view-coordinators.php">View Event Co-Ordinators</a></li>
            <li><a href="coordinatorsms.php">Contact Event Co-Ordinators</a></li>
            <li><a href="eventsms.php">Contact all Volunteers</a></li>
            <li><a href="message-a-volunteer.php">Contact a Volunteer</a></li>
            <li><a href="logout.php" class="float-right;">Sign Out</a></li>
         </ul>
         
      </div>
   </div></nav>
      

<div class="container-fluid"><br><br><br><br><br>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <p><b>Home</b>:<br>Displays the dashboard panel.</p><hr>
          <p><b>Add Programs</b>:<br>Add a new event.</p><hr>
          <p><b>List Programs</b>:<br>List all the present events.</p><hr>
          <p><b>Assign Event Co-ordinators</b>:<br>Assign Event Co-ordinators for different events.</p> <hr>
          <p><b>Contact Event Co-ordinators</b>:<br>Contact Event Co-ordinators of different events.</p> <hr>
          <p><b>Contact all volunteers</b>:<br>The user will be able to contact all the volunteers via SMS and/or he can view all their contact information.</p><hr>
            <div class="btn-toolbar mb-2 mb-md-0">
                  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="http://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script> -->
  </body>
</html>
