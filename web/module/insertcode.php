<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'dbstatus');

if(isset($_POST['insertdata']))
{
    $label = $_POST['label'];
    $board = $_POST['board'];
    $type = $_POST['format'];
    $pin = $_POST['pin'];
    $IO = $_POST['option'];

    $query = "INSERT INTO box_func (`label`,`board`,`type`,`pin`,`IO`) VALUES ('$label','$board','$type','$pin','$IO')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location:../index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

if(isset($_POST['deletedata']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM `box_func` WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:../index.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

if(isset($_POST['updatedata']))
{   
    $id = $_POST['id'];
    
    $label = $_POST['label'];
    $board = $_POST['board'];
    $type = $_POST['format'];
    $pin = $_POST['pin'];
    $IO = $_POST['option'];

    $query = "UPDATE box_func SET label='$label', board='$board', type='$type', pin='$pin', IO=' $IO' WHERE id='$id'  ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Updated"); </script>';
        header("Location:../index.php");
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}

if(isset($_POST['subject']))
{   
    $board = $_POST['board'];
    
    $status = $_POST['status'];
    $set = $_POST['set'];

    $query = "UPDATE command SET $set='$status' WHERE board='$board' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Updated"); </script>';
        header("Location:../index.php");
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
?>