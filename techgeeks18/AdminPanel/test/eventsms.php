<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact Volunteers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">
    <SCRIPT type="text/javascript">
    console.log($)
    $(document).ready(function(){
      $(".btn").click(function(){
         //alert(1)
        msg=$(".msg").val();
        id=$(".event").val();
        //alert(rec)
        $.post("test_sms_api.php" , {"x1": msg , "x2": id} , function(res){
          console.log(res);
        })
      })
    });
  </SCRIPT>
  
    <style>
      p{
        font-size: 15px;
      }

      li a, b{
        font-size: 20px;
      }
    </style>
  
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Panel</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="admin.php">
                  <!-- <span data-feather="home"></span> -->
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="addPage.php">
                  <!-- <span data-feather="file"></span> -->
                  Add Programs
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="listPage.php">
                  <!-- <span data-feather="file"></span> -->
                  List Programs
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <!-- <span data-feather="shopping-cart"></span> -->
                  Assign Event Co-ordinators
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="view-volunteers.php">
                  <!-- <span data-feather="shopping-cart"></span> -->
                  View Volunteers
                </a>
              <li class="nav-item">
                <a class="nav-link" href="view-coordinators.php">
                  <!-- <span data-feather="shopping-cart"></span> -->
                  View Event Co-ordinators
                </a>
              
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <!-- <span data-feather="users"></span> -->
                  Contact Event Co-ordinators
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
<!--                   <span data-feather="bar-chart-2"></span>
 -->            Contact all Volunteers
                </a>
              </li>
              </ul>

            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
           --></div>
        </nav>    <br><br>
<div class="container" style="margin-left: 250px;">    
<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
  <div class="form-group right">
          <label for="msg">Enter Message&nbsp&nbsp&nbsp&nbsp&nbsp(<a href="eventindex.html" target="_blank">Click here for the events and id</a>)</label>
          <input type="text" class="form-control msg" id="msg" name="msg"  placeholder="Enter Message" required>
    </div>
  <div class="form-group">
          <label for="id">Enter Event</label>
          <input type="number" class="form-control event" id="eid" name="event"  placeholder="Enter Event" required>
    </div>
  <input type="button" value="Send SMS" id="insert" class="btn">
</form></div>
</body>
</html>

