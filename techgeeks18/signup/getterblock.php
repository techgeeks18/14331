<?php

	$username = "root";
	$password = "";
	$hostname = "localhost";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
	$selected = mysql_select_db("techgeeks18", $dbhandle) or die("Could not select examples");
	$choice = mysql_real_escape_string($_GET['choice2']);
	
	$query = "SELECT block FROM geography WHERE subdivision='$choice'";
	
	$result = mysql_query($query);
		
	while ($row = mysql_fetch_array($result)) {
   		echo "<option>" . $row{'block'} . "</option>";
	}
?>