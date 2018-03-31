<?php
require_once (dirname(__FILE__).'/../manage/inc/header.php') ;
error_reporting(E_ALL & -E_NOTICE & -E_USER_NOTICE);
$alert="";
if(isset($_POST["submit"])){
    if(($_POST["PageName"]=="")||($_POST["Pagedetails"]==""))
    {
        $alert="Please enter all the fields";
        
    }
    else
    {
        include_once './page/pageclass.php';
         $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      

        $pageClass= new pageClass();
        $alert=$pageClass->addPage($_POST["PageName"],$_POST["Pagedetails"],$_POST["Sdate"],$_POST["Edate"],$_POST["Cdate"],$_POST["Rdate"], $file, $_POST["District"], $_POST["Subdivision"], $_POST["address"],$_POST["pin"] );
    }

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      

    <div class="container-fluid"><br><br><br><br>
        <h3>Add Program</h3>
        <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data" >
        <?php echo $alert; ?>

        <div class="form-group">
          <label for="example1">Program Name</label>
          <input type="text" class="form-control" id="example1" value="<?php echo $_POST['PageName']; ?>" name="PageName"  placeholder="Enter Program name">
        </div>
        <div class="form-group">
          <label for="example3">Program Description</label>
          <textarea class="form-control" id="example3" name="Pagedetails" placeholder="Enter Program Description" rows="10"><?php echo $_POST['Pagedetails']; ?></textarea>
        </div>
        
       <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ">
                    <label class="control-label " for="date">
                    Start Date
                    </label>
                    <div class="input-group">
                        <input class="form-control" id="date" name="Sdate"  type="date"/>
                        <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                        </div>
                    </div>
                </div>
     
 
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ">
                    <label class="control-label " for="date">
                    End Date:
                    </label>
                    <div class="input-group">
                        <input class="form-control" id="date" name="Edate"  type="date"/>
                        <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                        </div>
                    </div>
                </div>
     
 
            </div>
        </div>
            
               <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ">
                    <label class="control-label " for="date">
                    Create Date
                    </label>
                    <div class="input-group">
                        <input class="form-control" id="date" name="Cdate"  type="date"/>
                        <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                        </div>
                    </div>
                </div>
     
 
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ">
                    <label class="control-label " for="date">
                    Remove Date:
                    </label>
                    <div class="input-group">
                        <input class="form-control" id="date" name="Rdate"  type="date"/>
                        <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                        </div>
                    </div>
                </div>
     
 
            </div>
        </div>    
            
        <input type="file" name="image" id="image" />  
         <br />  
         <hr>
        <span style="font-size: 20px">Address details</br></span>
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12"> 
        <div class="form-group">
        <label for="example1">District</label>
        <input type="text" class="form-control" id="example1" value="<?php echo $_POST['District']; ?>" name="District" placeholder="Enter District">
        </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
        <label for="example1">Sub-Division</label>
        <input type="text" class="form-control" id="example1" value="<?php echo $_POST['Subdivision']; ?>" name="Subdivision" placeholder="Enter Sub-Division">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
        <label for="addr">Address</label>
        <textarea class="form-control" id="addr" name="address" placeholder="address" rows="5"><?php echo $_POST['address']; ?></textarea>
        </div> 
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="pin">Pincode</label>
            <input type="number" class="form-control" id="pin" value="<?php echo $_POST['pin']; ?>" name="pin"  placeholder="Enter Pinnumber" min="737101" max="737139">
        </div>
        </div>
        </div>
        <hr>
        <div class="form-group">
        <label for="" class="control-label"><b>Interests Applicable:</b></label>
        <div class="row">
        <div class="col-sm-2">
        <label class="checkbox-inline">
        <input type="checkbox" name="check_list[]" id="social" value="social"><b>&nbspSocial</b>
        </label>
        </div> 
        <div class="col-sm-2">
        <label class="checkbox-inline">
        <input type="checkbox" name="check_list[]" id="cultural" value="cultural"><b>&nbspCultural</b>
        </label>
        </div> 
        <div class="col-sm-2">
        <label class="checkbox-inline">
        <input type="checkbox" name="check_list[]" id="tech" value="tech"><b>&nbspTechnical</b>
        </label>
        </div> 
        <div class="col-sm-2">
        <label class="checkbox-inline">
        <input type="checkbox" name="check_list[]" id="sports" value="sports"><b>&nbspSports</b>
        </label>
        </div> 
        <div class="col-sm-2">
        <label class="checkbox-inline">
        <input type="checkbox" name="check_list[]" id="health" value="health"><b>&nbspHealth</b>
        </label>
        </div> 
        <div class="col-sm-2">
        <label class="checkbox-inline">
        <input type="checkbox" name="check_list[]" id="womenempowerment" value="womenempowerment"><b>&nbspWomen Empowerment</b>
        </label>
        </div>
        </div> 
        
       
        
        
        
        </div>  
           <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </form>
        <hr
    </div> <!-- /container -->
 
    
  </body>
</html>
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
 
 