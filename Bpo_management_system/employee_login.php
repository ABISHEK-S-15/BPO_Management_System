<?php 
session_start();
 include('connection.php');

 $msg="";
  
if (isset($_POST['adminlogin'])) {
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $sql = mysqli_query($conn,"select * from admin where email='$email' && password='$password'");
  $num=mysqli_num_rows($sql);
  if ($num>0) {
    $row=mysqli_fetch_assoc($sql);
    $_SESSION['EMPLOYEE_ID']=$row['id'];
    $_SESSION['EMPLOYEE_EMAIL']=$row['email'];
    header("location:employee_dashboard.php");
  }
  else{
    $msg="Please Enter Valid Details !";
    echo"<script>
    alert('$msg');
    </script>";

  }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo2.png" type="x-icon" >
    <title>Employee_login</title>
    <link rel="stylesheet" href="employee_login.css">
</head>
<body>
    <div>    
        <div class="form">
            <form method="post">
                <h2>Welcome</h2>
            
                <label class="label" style="margin-left: 0px;">Email : </label>
                <input type="email" style="margin-left: 45px;" name="email" placeholder="Enter Email" required autocomplete="off"><br>
                <label class="label">Password : </label>
                <input type="password" name="password" placeholder="Enter Password" required autocomplete="off"><br>
        
                <br>
                <!--<button class="btnn"><a href="#">Login</a></button>-->
                <input type="submit" class="btnn" name="adminlogin" value="Login">
                <br><br>
                <p class="message">NOTE:Only Employee have to login</p>
                <div style="padding-top: 20px;">
                <a href="index.php" >Home</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>