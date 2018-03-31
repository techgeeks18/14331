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
    $otp_entered = $_POST['otp_sub'];
	$mob = $_POST['x1'];
	
	/*echo "$otp_entered";
	echo "$mob";*/
	
    /*$query = mysql_query("SELECT otp FROM otp_record WHERE otp_number = ".$mob.";");
    $otp_real = mysql_query($query);*/
	$otp_real = mysqli_query($conn,"SELECT otp FROM otp_record WHERE otp_number = ".$mob.";");
	
	
/*	if ($result->otp_real > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id:".$row['  otp'];
    }
} else {
    echo "0 results";
}*/
	
	/*$value = mysql_fetch_object($otp_real);*/
	$otp = mysqli_fetch_assoc($otp_real);
	
	if ($otp_entered == $otp['otp']) {
		//$_SESSION["otpv"]=1;
		print "Verified!";

	}
	else {
		//$_SESSION["otpv"]=0;
		print "Wrong!";
	}
	
	mysqli_close($conn);
}
?>
