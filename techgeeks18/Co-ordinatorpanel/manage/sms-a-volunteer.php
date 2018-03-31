
<?php
		// print_r($_POST);
		mysql_connect("localhost","root","") or die("Connect error");
		mysql_select_db("techgeeks18") or die("DB error");

			$message= $_POST['x1'];
			// $id= $_POST['x2'];
			$vid= $_POST['x2'];
			//echo "$message";
			//echo "$id";

			$query=mysql_query("select * from volunteer v where v.vid=$vid");
			$count=mysql_num_rows($query);

			if($count<1){
				die("bye");
				//echo "no data";
			}
			// Authorisation details.
			$username = "andrewdawn2018@gmail.com";
			$hash = "e1f3e327d65b4fcb7ca8c909b0b037570114ffefbd9b0abd3c453fa22bd38667";
			// Config variables. Consult http://api.textlocal.in/docs for more info.
			$test = "0";
			// Data for text message. This is the text message data.
			$sender = "TXTLCL"; // This is who the message appears to be from.
			while ($row=mysql_fetch_array($query)) {
			
				$numbers = "91".$row['mobilenumber']."";
				//echo "$numbers"; // A single number or a comma-seperated list of numbers
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
			}
?>