<?php
//session_start();
require_once (dirname(__FILE__).'/inc/header.php') ;
error_reporting(E_ALL & -E_NOTICE & -E_USER_NOTICE);

include_once '/page/pageClass.php';
$pageClass=new pageClass();
if ($_GET["did"]!="") {
    $did=$_GET["did"];
    $alert= "Are you sure you want to delete <a href='listPage.php?did=$did&status=yes'> Yes</a><a href='listPage.php'> No</a>";
}
if(($_GET["did"]!="")&&($_GET["status"]=="yes"))
{
     $alert=$pageClass->deletePage($_GET["did"]);
     header("location:listPage.php");
}
$pageList=$pageClass->listPage();

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
      

    <div class="container-fluid"><br><br><br><br><br>

         <h3>List Program</h3>
         <div class="container-fluid">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th><th>Name</th><th>Title</th><th></th>
                </tr>
                
                <?php
                if(count($pageList)>=1)
                {
                    foreach ($pageList as $value){
                        echo '<tr>
                        <td>'.$value["eid"].'</td> <td>'.$value["ename"].'</td> <td>'.$value["description"].'</td> <td><a href="editPage.php?id='.$value["eid"].'">Edit</a>
                            <a href="listPage.php?did='.$value["eid"].'">Delete</a></td>
                        </tr>';
                    }
                }
                ?>
            </thead>
            <tbody>
                
               </tbody>
               
        </table>
        </div>
          <?php echo $_SESSION[username]; ?>
        <?php echo $alert; ?>

    </div> <!-- /container --> 
  </body>
</html>