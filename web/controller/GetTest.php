<?php
    header("Content-Type: application/json");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbstatus";
    $TT = $_GET["ID"];

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $a = $conn->query("SELECT * FROM command WHERE ID = '$TT'");
    $row = $a->fetch_assoc();

    $data = array("D0" => $row['d0'], "D1" => $row['d1'], "D2" => $row['d2'], "D3" => $row['d3'], "D4" => $row['d4'], "A0" => $row['A0']);
    echo json_encode($data);
?>