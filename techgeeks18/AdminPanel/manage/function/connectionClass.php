<?php

class connectionClass extends mysqli {
    private $host="localhost",$password="",$database="techgeeks18",$username="root";
    public $con;
    function __construct(){
        $this->con= $this->connect($this->host, $this->username, $this->password, $this->database);
    }
    
}
