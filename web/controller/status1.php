<?php
  class dht11{
    public $link='';
    function __construct($temperature, $humidity){
     $this->connect();
     $this->storeInDB($temperature, $humidity);
    }
    
    function connect(){
     $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
     mysqli_select_db($this->link,'dbstatus') or die('Cannot select the DB');
    }
    
    function storeInDB($temperature, $humidity){
     $query = "insert into espdata_1 set humidity='".$humidity."', temperature='".$temperature."'";
     $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
    }
    
  }
  if($_POST['temp'] != '' and  $_POST['hum'] != ''){
    $dht11=new dht11($_POST['temp'],$_POST['hum']);
  }
?>