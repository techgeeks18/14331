<?php
require_once (dirname(__FILE__).'/../manage/inc/header.php') ;

error_reporting(E_ALL & -E_NOTICE & -E_USER_NOTICE);
include_once './page/pageclass.php';
$pageClass= new pageClass();
$id=$_GET["id"];
$alert="";
if(isset($_POST["submit"])){
    if(($_POST["PageName"]=="")||($_POST["PageTitle"]=="")||($_POST["Pagedetails"]==""))
    {
        $alert="Please enter all the fields";
        
    }
    else
    {
      
        $alert=$pageClass->updatePage($_POST["PageName"],$_POST["Pagedetails"],$_POST["Sdate"],$_POST["Edate"],$_POST["Cdate"],$_POST["Rdate"], $_POST["District"], $_POST["Subdivision"], $_POST["address"],$_POST["pin"],$id);
    }

    
}
$pageDetails=$pageClass->particularPage($id);


?>
<!--
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Program </title>
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/signin.css" rel="stylesheet">
  </head>

  <body>
-->

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
                <a class="nav-link active" href="#">
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
                <a class="nav-link" href="listPage.php">
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
                </a></li>
              <li class="nav-item">
                <a class="nav-link" href="view-coordinators.php">
                  <!-- <span data-feather="shopping-cart"></span> -->
                  View Event Co-ordinators
                </a>
              </li>
              
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
        </nav>
    <div class="container" style="margin-left: 250px;">
        <h3>Edit Program</h3>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]."?id=$id"; ?>">
        <?php echo $alert; ?>

        <div class="form-group">
          <label for="example1">Program Name</label>
          <input type="text" class="form-control" id="example1" value="<?php echo $pageDetails['ename']; ?>" name="PageName"  placeholder="Enter Page name">
        </div>
       
        <div class="form-group">
          <label for="example3">Program Description</label>
          <textarea class="form-control" id="example3" name="Pagedetails" placeholder="Enter Page Description" rows="10"><?php echo $pageDetails['description']; ?></textarea>
        </div>
        
            
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group ">
                    <label class="control-label " for="date">
                    Start Date
                    </label>
                    <div class="input-group">
                        <input class="form-control" id="date" name="Sdate"  type="date" value="<?php echo $pageDetails['startdate']; ?>">
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
                        <input class="form-control" id="date" name="Edate"  type="date" value="<?php echo $pageDetails['enddate']; ?>">
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
                        <input class="form-control" id="date" name="Cdate"  type="date" value="<?php echo $pageDetails['createdate']; ?>">
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
                        <input class="form-control" id="date" name="Rdate"  type="date" value="<?php echo $pageDetails['removedate']; ?>">
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
        <input type="text" class="form-control" id="example1" value="<?php echo $pageDetails['district']; ?>" name="District" placeholder="Enter District">
        </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
        <label for="example1">Sub-Division</label>
        <input type="text" class="form-control" id="example1" value="<?php echo $pageDetails['subdivision']; ?>" name="Subdivision" placeholder="Enter Sub-Division">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
        <label for="addr">Address</label>
        <textarea class="form-control" id="addr" name="address" placeholder="address" rows="5"><?php echo $pageDetails['address']; ?></textarea>
        </div> 
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="pin">Pincode</label>
            <input type="number" class="form-control" id="pin" value="<?php echo $pageDetails['pincode10']; ?>" name="pin"  placeholder="Enter Pinnumber" min="737101" max="737139">
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

    </div> <!-- /container -->


    
  </body>
</html>
