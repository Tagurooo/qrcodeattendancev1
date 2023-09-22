<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "qrcodedb");
$output = '';
$cnt=1;
if(isset($_POST["export"]))
{
 $query ="SELECT a.*, s.FIRSTNAME,MNAME,LASTNAME FROM attendance a, student s WHERE a.STUDENTID = s.STUDENTID AND DATE(LOGDATE)=CURDATE()";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
  <table border="1">
  <thead>
      <tr>
        <th>#</th>
        
        <th>FIRST NAME</th>
        <th>MIDDLE</th>
        <th>LASTNAME</th>
        <th>TIME IN</th>
        <th>TIME OUT</th>
        <th>LOGDATE</th>
        <th>STATUS</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
    if($row['STATUS'] == '1'){$STATUS = "Present"; $colour="#00FF00";}else{$STATUS = "Absent";$colour="#FF0000";}
   $output .= '
    <tr>  
                         <td>'.$cnt.'</td>  
                         
                         <td>'.$row["FIRSTNAME"].'</td>
                         <td>'.$row["MNAME"].'</td>
                         <td>'.$row["LASTNAME"].'</td>  
                         <td>'.$row["TIMEIN"].'</td>  
                         <td>'.$row["TIMEOUT"].'</td>  
                         <td>'.$row["LOGDATE"].'</td>
                         <td>'.$STATUS=$STATUS.'</td>
     </tr>
   ';
   $cnt++;
  }
  $output .= '</table>';
  header("Content-type: application/octet-stream");
  header('Content-Disposition: attachment; filename=Attendance_Report.xls');
  header("Pragma: no-cache");
  header("Expires: 0");
  echo $output;
 }
}
?>