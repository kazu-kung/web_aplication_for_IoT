<?php
  class dht11{
    public $link='';
    function __construct($light){
     $this->connect();
     $this->storeInDB($light);
    }
    
    function connect(){
     $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
     mysqli_select_db($this->link,'dbstatus') or die('Cannot select the DB');
    }
    
    function storeInDB($light){
     $query = "insert into espdata_2 set light='".$light."'";
     $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
    }
    
  }
  if($_POST['light'] != ''){
    $dht11=new dht11($_POST['light']);
  }
?>