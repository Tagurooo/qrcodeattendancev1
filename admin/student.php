<?php

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
        <div class="col-md-9">Attendance List</div>
      </div>
      <br>
    </div>
    <div class="col-md-4">
                <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" id="myInput" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
    </div>
                <div class="card-body">
                    
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>From Date</label>
                                    <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>To Date</label>
                                    <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Click to Filter</label> <br>
                                  <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
    <div class="table-responsive">
        	<span id="message_operation"></span>
        	<table class="table table-bordered align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            
                            <th>NAME</th>
                            
                            <th>TIME IN</th>
                            <th>TIME OUT</th>
                            <th>LOGDATE</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $server = "localhost";
                        $username="root";
                        $password="";
                        $dbname="qrcodedb";
                    
                        $conn = mysqli_connect($server,$username,$password,$dbname);
                        $cnt=1;
                        $date = date('Y-m-d');
                        
						
                        if($conn->connect_error){
                            die("Connection failed" );
                        }

                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                              $from_date = $_GET['from_date'];
                              $to_date = $_GET['to_date'];

                              //$posts ="SELECT a.*, s.FIRSTNAME,MNAME,LASTNAME FROM attendance a, student s WHERE a.LOGDATE  BETWEEN '$from_date' AND '$to_date'";
                              $posts ="SELECT * FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.STUDENTID WHERE LOGDATE BETWEEN '$from_date' AND '$to_date'";
                            }
                            else
                            {
                              $posts ="SELECT a.*, s.FIRSTNAME,MNAME,LASTNAME FROM attendance a, student s WHERE a.STUDENTID = s.STUDENTID AND DATE(LOGDATE)=CURDATE()";
                              //$posts ="SELECT * FROM attendance LEFT JOIN student ON attendance.STUDENTID=student.STUDENTID WHERE LOGDATE='$date'";
                            }
                          // $posts ="SELECT * FROM attendance WHERE DATE(LOGDATE)=CURDATE()";
                           //$posts ="SELECT a.*, s.FIRSTNAME,MNAME,LASTNAME FROM attendance a, student s WHERE a.STUDENTID = s.STUDENTID AND DATE(LOGDATE)=CURDATE()";
                           $posts_run = mysqli_query($conn,$posts);
                        
                           if(mysqli_num_rows($posts_run) > 0)
                           {
                            foreach($posts_run as $post)
                            {
                                ?>
                                <tr>
                                <td><?php echo $cnt;?></td>
                                
                                <td><?php echo $post['LASTNAME'].', '.$post['FIRSTNAME'].' '.$post['MNAME'];?></td>
                                
                                <td><?php echo $post['TIMEIN'];?></td>
                                <td><?php echo $post['TIMEOUT'];?></td>
                                <td><?php echo $post['LOGDATE'];?></td>
                                <td><?php echo $post['STATUS'];?></td>
                                <td>
                                  <form action="delete.php" method="POST">
                                    <input type="hidden" name="id"  value="<?php echo $post['ID'] ?>">
                                    <input type="submit" name="delete" class="btn btn-danger" value="DELETE">
                                  </form>
                                </td>
                                </tr>
                                <?php
                                $cnt++;
                            }

                           }
                           else
                           {
                            ?>
                            <tr>
                                <td colspan="6">No Record Found</td>
                            </tr>
                            <?php

                           }
                        ?>
                    </tbody>
                  </table>
                </div>
            </div>
    
</body>
</html>
                <center>
        <form method="post" action="export.php">
            <input type="submit" name="export" class="btn btn-success" value="Export to Excel" />
        </form>
        </center>
        <script>
        function Export()
        {
            var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
            if(conf == true)
            {
                window.open("export.php",'_blank');
            }
        }
        </script>
  			
  		</div>
  	</div>
  </div>
</div>
