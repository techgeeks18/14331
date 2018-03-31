<?php
session_start();
$alert="";
if(isset($_POST["submit"]))
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    if($username==""||$password=="")
    {
        $alert="Please enter the credentials";
    }
    else
    {
        include_once './manage/login/loginClass.php';
        $loginClass= new loginClass();
        $alert=$loginClass->checkLogin($username, $password);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Signin </title>
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

        <form class="form-signin" method="post" action="<?php echo $_SERVER["PHP_SELF"];  ?>">
        <?php echo $alert; ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Enter Username"  autofocus>
        <label for="inputPassword" class="sr-only">Enter Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
        
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    
  </body>
</html>
