<?php

$connection = mysqli_connect("localhost","root", "");
$db = mysqli_select_db($connection, 'qrcodedb');

if(isset($_POST['delete']))
{
    $id = $_POST['id'];
    
    $query = "DELETE FROM attendance WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("DATA DELETE"); </script>';
        header("location:student.php");

    }
    else
    {
        echo '<script> alert("DATA NOT DELETE"); </script>';

    }
}

?>