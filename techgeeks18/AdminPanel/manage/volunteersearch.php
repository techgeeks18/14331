<?php
mysql_connect("localhost","root","") or die("Connect error");
mysql_select_db("techgeeks18") or die("DB error");

$output= '';

if (isset($_POST['searchVal'])){
	$searchq = $_POST['searchVal'];
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

	$query = mysql_query("select * from volunteer where fname like '%$searchq%'") or die("Error in query");
	$count = mysql_num_rows($query);
	#print($count);
	$output.= '
		<div class="table-responsive">
    	<table class="table table-striped table-bordered">
	      <thead>
	        <tr>
		        <th>#ID</th>
		        <th>First Name</th>
		        <th>Last Name</th>
		        <th>District</th>
		        <th>Subdivision</th>
		        <th>Email</th>
		        <th>Mobile Number</th>
	        </tr>
	      </thead>
	      <tbody>
	      ';
	 
		while ($row = mysql_fetch_array($query)) {
			# code...
			/*$fn = $row['fname'];
			$ln = $row['lname'];
			$output.= '<div>'.$fn.' '.$ln.'</div>';*/
			/*$from = new DateTime($row['dateofbirth']);
			$to   = new DateTime('today');
			$age = $from->diff($to)->y;*/
			$output.="
			<tr>
	          <td>".$row['vid']."</td>
	          <td>".$row['fname']."</td>
	          <td>".$row['lname']."</td>
	          <td>".$row['district']."</td>
	          <td>".$row['subdivision']."</td>
	          <td>".$row['emailid']."</td>
	          <td>".$row['mobilenumber']."</td>
	        </tr>";
		}
		$output.= "</tbody>
    </table>
  </div>";
}
echo ($output);
?>