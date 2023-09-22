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
      <div class="row">
        <div class="col-md-9">Student List</div>
      </div>
      <?php include('message.php'); ?>
      <br>
    </div>
    <div class="col-md-4">
    <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" id="myInput" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
    </div>
    <div class="card-body">
    <div class="card-header">
                        <h4>Student List 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <br>
  		<div class="table-responsive">
        	<span id="message_operation"></span>
        	<table class="table table-bordered align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            
                            <th>FIRST NAME</th>
                            <th>MIDDLE</th>
                            <th>LASTNAME</th>
                            <th>AGE</th>
                            <th>GENDER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $query = "SELECT * FROM student";
                        $query_run = mysqli_query($con, $query);
                        $cnt=1;

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $student)
                            {
                                //echo $student['STUDENTID'];
                                ?>
                                <tr>
                                    <td><?= $cnt; ?></td>
                                    
                                    <td><?= $student['FIRSTNAME']; ?></td>
                                    <td><?= $student['MNAME']; ?></td>
                                    <td><?= $student['LASTNAME']; ?></td>
                                    <td><?= $student['AGE']; ?></td>
                                    <td><?= $student['GENDER']; ?></td>
                                    <td>
                                        <a href ="student-edit.php?ID=<?=$student['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                        <form action="code.php" method="POST" class="d-inline">
                                            <button type ="submit" name="delete_student" value="<?= $student['ID'];?>"class="btn btn-danger btn-sm">Delete</a>
                                        </form>
                                    </td>
                                </tr>

                                <?php
                                $cnt++;

                            }
                        }
                        else
                        {
                            echo "<h5> No Record Found </h5>";
                        }
                        ?>
                    </tbody>
            </table>
        </div>
    </div>
