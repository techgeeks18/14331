<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techgeeks18";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else { 
		
    $mob = $_POST['x1'];


	// Authorisation details.
	$username = "andrewdawn2018@gmail.com";
	$hash = "e1f3e327d65b4fcb7ca8c909b0b037570114ffefbd9b0abd3c453fa22bd38667";
	
	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = "91$mob"; // A single number or a comma-seperated list of numbers
	
	
	/*$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';*/
	$string = '0123456789012345678901234567890123456789';
    $string_shuffled = str_shuffle($string);
    $password = substr($string_shuffled, 1, 6);
	
	echo "$password";
	
	$message = "$password";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);

	print_r($result);
	
	/*$password = base64_encode($password);*/
    /*$query = mysql_query("INSERT INTO otp_record values ('".$password."',".$mob.",now());");
    $qry_run = mysql_query($query);*/
	mysqli_query($conn,"INSERT INTO otp_record values ('".$password."',".$mob.");");
	
	mysqli_close($conn);
}
?>