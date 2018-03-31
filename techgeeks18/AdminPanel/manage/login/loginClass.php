<?php
session_start();

require_once(dirname(__FILE__).'/../function/connectionClass.php') ;
class loginClass extends connectionClass{
    public function checkLogin($username, $password) {
        $select="select * from login where Username='$username' && Password=md5('$password')";
        $result=$this->query($select) or die($this->error);
        $count= $result->num_rows;
        if($count<1){
            return"Access Denied";
            }
        else
            {   
                $_SESSION["username"]=$username;
                $_SESSION["pass"]=md5($password);
                if($_SESSION["username"]==""||$_SESSION["pass"]=="")
                {
                    header("location:index.php");
                }
                else{
                    header("location:manage/admin.php");

                }
            }
    }
    public function sessionLogin(){
        $username=$_SESSION["username"];
        $password=$_SESSION["pass"];
        $select= "select * from login where Username='$username' && Password='$password'";
        $result= $this->query($select);
        $count=$result->num_rows;
        if($count<1)
        {
             header("location:index.php"); 
        }
        else{}
    }
}
