<HTML>
<HEAD>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<SCRIPT type="text/javascript">
		console.log($)
		$(document).ready(function(){
			$(".mail").click(function(){
				 //alert(1)
				msg=$(".msg").val();
				sub=$(".sub").val();
				id=$(".event").val();
				//alert(rec)
				$.post("email.php" , {"x3": msg , "x1": id, "x2": sub} , function(res){
				 	console.log(res);
				})
			})
		});
	</SCRIPT>
	<TITLE>Email</TITLE>
</HEAD>
<BODY>
	<form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
	<div class="form-group">
        <label for="id">Enter Event Id&nbsp&nbsp&nbsp&nbsp&nbsp(<a href="eventindex.html" target="_blank">Click here for the events and id</a>)</label>
        <input type="number" class="form-control event" id="vid" name="event"  placeholder="Enter Volunteer Id" required>
    </div>
	<div class="form-group right">
        <label for="sub">Enter Subject</label>
        <input type="text" class="form-control sub" id="sub" name="sub"  placeholder="Enter Subject" required>
    </div>
    <div class="form-group right">
        <label for="msg">Enter Message</label>
        <input type="text" class="form-control msg" id="msg" name="msg"  placeholder="Enter Message" required>
    </div>
	<input type="button" value="Send E-mail" id="insert" class="mail btn" id="mail">
</form>
</BODY>
</HTML>