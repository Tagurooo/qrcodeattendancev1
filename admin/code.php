<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_ID = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM student WHERE ID='$student_ID'";
    $query_run= mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: view-student.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: view-student.php");
        exit(0);
    }

}

if(isset($_POST['update_student']))
{
    $student_ID = mysqli_real_escape_string($con, $_POST['student_ID']);

    $STUDENTID = mysqli_real_escape_string($con, $_POST['STUDENTID']);
    $FIRSTNAME = mysqli_real_escape_string($con, $_POST['FIRSTNAME']);
    $MNAME = mysqli_real_escape_string($con, $_POST['MNAME']);
    $LASTNAME = mysqli_real_escape_string($con, $_POST['LASTNAME']);
    $AGE = mysqli_real_escape_string($con, $_POST['AGE']);
    $GENDER = mysqli_real_escape_string($con, $_POST['GENDER']);

    $query = "UPDATE student SET STUDENTID='$STUDENTID', FIRSTNAME='$FIRSTNAME', MNAME='$MNAME', LASTNAME='$LASTNAME', AGE='$AGE', GENDER='$GENDER' 
                WHERE ID= '$student_ID' ";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: view-student.php");
        exit(0);

    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: view-student.php");
        exit(0);

    }
}

if(isset($_POST['save_student']))
{
    $STUDENTID = mysqli_real_escape_string($con, $_POST['STUDENTID']);
    $FIRSTNAME = mysqli_real_escape_string($con, $_POST['FIRSTNAME']);
    $MNAME = mysqli_real_escape_string($con, $_POST['MNAME']);
    $LASTNAME = mysqli_real_escape_string($con, $_POST['LASTNAME']);
    $AGE = mysqli_real_escape_string($con, $_POST['AGE']);
    $GENDER = mysqli_real_escape_string($con, $_POST['GENDER']);

    $query = "INSERT INTO student (STUDENTID,FIRSTNAME,MNAME,LASTNAME,AGE,GENDER) VALUES 
        ('$STUDENTID','$FIRSTNAME','$MNAME','$LASTNAME','$AGE','$GENDER')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>