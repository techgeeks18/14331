<?php

	$username = "root";
	$password = "";
	$hostname = "localhost";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
	$selected = mysql_select_db("techgeeks18", $dbhandle) or die("Could not select examples");
	$choice = mysql_real_escape_string($_GET['choice1']);
	
	$query = "SELECT  DISTINCT subdivision FROM geography WHERE district='$choice'";
	
	$result = mysql_query($query);
		
	echo "<option>Please Select Subdivision</option>";
	
	while ($row = mysql_fetch_array($result)) {
   		echo "<option>" . $row{'subdivision'} . "</option>";
	}
?>