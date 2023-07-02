<?php     
  require 'data/database.php';
  
  if (!empty($_POST)) {
    $Stat = $_POST['Stat'];
    $id = $_POST['ID'];
    $set = $_POST['set'];

      
    // insert data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE command SET $set = ? WHERE ID = $id";
    $q = $pdo->prepare($sql);
    $q->execute(array($Stat));
    Database::disconnect();
    header("Location: contro.php");
  }
?>