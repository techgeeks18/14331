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
      

<div class="container-fluid"><br><br><br><br><br>
<h2>Volunteers List</h2>    
<?php

mysql_connect('localhost','root','');
mysql_select_db('techgeeks18');
$query=mysql_query('select * from volunteer');
$output='';
if ($query<1) {
	echo "no data";
}
else{
	$count=mysql_num_rows($query);
	$output.= '
		<div class="table-responsive">
    	<table class="table table-striped table-bordered">
	      <thead>
	        <tr>
		        <th>#</th>
		        <th>First name</th>
		        <th>Last name</th>
		        <th>Age</th>
		        <th>Gender</th>
		        <th>Institute</th>
		        <th>Phone Number</th>
		        <th>District</th>
		        <th>Address</th>
		        <th>Pincode</th>
		        <th>E-mail Id</th>
		        <th>Interests</th>
	        </tr>
	      </thead>
	      <tbody>
	      ';
	while($row=mysql_fetch_array($query)){
		//$age=date_diff(date_create("$row["dob"]"), date_create('today'))->y;
		$from = new DateTime($row['dob']);
		$to   = new DateTime('today');
		$age = $from->diff($to)->y;
		$output.="
		<tr>
          <td>".$row['vid']."</td>
          <td>".$row['fname']."</td>
          <td>".$row['lname']."</td>
          <td>".$age."</td>
          <td>".$row['gender']."</td>
          <td>".$row['institute']."</td>
          <td>".$row['mobilenumber']."</td>
          <td>".$row['district']."</td>
          <td>".$row['address']."</td>
          <td>".$row['pincode']."</td>
          <td>".$row['emailid']."</td>
          <td>".$row['interests']."</td>
        </tr>";
	}
	$output.= "</tbody>
    </table>
  </div>";
  echo "$output";
}

?>
</div>
</body>
</html>

