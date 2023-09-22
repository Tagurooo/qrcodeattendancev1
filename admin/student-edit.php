<?php
require 'dbcon.php';

//student.php

include('header.php');

?>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
  <title>Attendance Monitorring System - BSU</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup",function(){
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
<div class="container" style="margin-top:30px">
  <div class="card">
  	<div class="card-header">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit 
                            <a href="view-student.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['ID']))
                        {
                            $student_ID = mysqli_real_escape_string($con,$_GET['ID']);
                            $query = "SELECT * FROM student WHERE ID='$student_ID'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                
                            <form action="code.php" method="POST">
                                <input type="hidden" name="student_ID" value="<?= $student['ID']; ?>">

                                <div class="mb-3">
                                    <label>Student ID</label>
                                    <input type="text" name="STUDENTID" value="<?= $student['STUDENTID']; ?>"class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Student FirstName</label>
                                    <input type="text" name="FIRSTNAME" value="<?= $student['FIRSTNAME']; ?> "class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Student Middle</label>
                                    <input type="text" name="MNAME" value="<?= $student['MNAME']; ?> "class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Student LastName</label>
                                    <input type="text" name="LASTNAME" value="<?= $student['LASTNAME']; ?> " class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Student Age</label>
                                    <input type="text" name="AGE" value="<?= $student['AGE']; ?> " class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Student Gender</label>
                                    <input type="text" name="GENDER" value="<?= $student['GENDER']; ?> " class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                </div>

                            </form>
                            <?php
                                

                            }
                            else
                            {
                                echo "<h4> No Such ID Found </h4>";

                            }

                        }
                        ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>