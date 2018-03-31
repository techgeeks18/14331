<?php
session_start();
error_reporting(E_ALL & -E_NOTICE & -E_USER_NOTICE);

if(($_SESSION["username"])==""||($_SESSION["pass"]==""))
{
    header("location:/index.php");
}
else{
    include_once 'login/loginClass.php';
    $loginClass=new loginClass();
    $loginClass->sessionLogin();
    
}

?>
