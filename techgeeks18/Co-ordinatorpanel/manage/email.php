 //PHP Script
<?php

mysql_connect("localhost","root","");
mysql_select_db("techgeeks18");

$eid=$_POST['x1'];
$subject=$_POST['x2'];
$message=$_POST['x3'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('PHPMailer/src/Exception.php');
require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');
/*if(isset($_POST['send']))
{*/
// Fetching data that is entered by the user
/*$email = $_POST['email'];
$password = $_POST['password'];
$to_id = $_POST['toid'];
$message = $_POST['message'];
$subject = $_POST['subject'];*/

$query=mysql_query("select * from volunteer v where v.vid=$eid");
$count=mysql_num_rows($query);
if ($count<1) {
	die(bye);
}

// Configuring SMTP server settings
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Username = "techgeeks2018@gmail.com";
$mail->Password = "Techgeeks@18";
$mail->setFrom('techgeeks2018@gmail.com');
// Email Sending Details

while ($row=mysql_fetch_array($query)) {
	$mail->addAddress("".$row['emailid']."");			
}
// $mail->addAddress("raj.patel@sakec.ac.in");
// $mail->addAddress("vatsal.sheth@sakec.ac.in");
// $mail->addAddress("monil.doshi@sakec.ac.in");
// $mail->addAddress("hiloni.mehta@sakec.ac.in");
// $mail->addAddress("dhruv.jani@sakec.ac.in");
// $mail->addAddress("poojan.sanghvi@sakec.ac.in");

$mail->Subject = "".$subject."";
$mail->msgHTML("".$message."");

// Success or Failure
if (!$mail->send()) {
	//echo "<pre>";
	//print_r($mail);
$error = "Mailer Error: " . $mail->ErrorInfo;
//echo '<p id="para">'.$error.'</p>';
}
else {
print '<p id="para">Message sent!</p>';
}
//}
/*else{
echo '<p id="para">Please enter valid data</p>';
}*/
?>