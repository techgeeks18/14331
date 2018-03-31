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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">
    <style>
      p{
        font-size: 15px;
      }

      li a, b{
        font-size: 20px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Panel</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="admin.php">
                  <!-- <span data-feather="home"></span> -->
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="addPage.php">
                  <!-- <span data-feather="file"></span> -->
                  Add Programs
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" href="listPage.php">
                  <!-- <span data-feather="file"></span> -->
                  List Programs
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <!-- <span data-feather="shopping-cart"></span> -->
                  Assign Event Co-ordinators
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="view-volunteers.php">
                  <!-- <span data-feather="shopping-cart"></span> -->
                  View Volunteers
                </a>
              <li class="nav-item">
                <a class="nav-link" href="view-coordinators.php">
                  <!-- <span data-feather="shopping-cart"></span> -->
                  View Event Co-ordinators
                </a>
              
              <li class="nav-item">
                <a class="nav-link" href="coordinatorsms.php">
                  <!-- <span data-feather="users"></span> -->
                  Contact Event Co-ordinators
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="eventsms.php">
<!--                   <span data-feather="bar-chart-2"></span>
 -->            Contact all Volunteers
                </a>
              </li>
              </ul>

            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
           --></div>
        </nav>    <br><br>
    <div class="container" style="margin-left: 250px">

         <h3>List Program</h3>
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
          <?php echo $_SESSION[username]; ?>
        <?php echo $alert; ?>

    </div> <!-- /container --> 
  </body>
</html>