<?php 
  require("database_connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>QRcode Attendance System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/mycss.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-image" style="background-image: url('img/batstate-u-govjobs.jpg'); backdrop-filter: blur(7px); background-repeat: no-repeat; background-size: 100% 100% ">
<div class="form-group">


<div class="container">
  <div class="row justify-content-center">
    <div class="row">
      <div class="col-md-4">
        <div class="col-md-4" style="margin-top:100px; margin-bottom:100px;">
        <div class="card">
          <div class="login-form">
            <h2>Admin Login Panel</h2>
            <form method="POST">
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Admin Name" name="AdminName">
              </div>
              <div class="input-field">
              <i class="fa fa-key"></i>
                <input type="password" placeholder="Admin Password" name="AdminPassword" id="admin_password" class="form-control" />
                <span id="error_admin_password" class="text-danger"></span>
              </div>
              <button type="submit" name="Signin">Sign in</button>
              <br>
              <div class="form-group">
                <a href="../index.php" class="btn btn-success">Go back</i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<?php 

if(isset($_POST['Signin']))
{
  $query="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPassword]'";
  $result=mysqli_query($con,$query);
  if(mysqli_num_rows($result)==1)
  {
    session_start();
    $_SESSION['AdminLoginId']=$_POST['AdminNAme'];
    header('location:index.php');
  }
  else
  {
    echo"<script>alert('incorrect');</script>";
  }
}

?>
</body>
</html>
