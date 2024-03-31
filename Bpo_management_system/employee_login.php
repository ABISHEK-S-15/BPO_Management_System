<?php
    include('connection.php');
    if(isset($_POST['adminlogin']))
    {
       $query = "select email,password from admin where email = '$_POST[email]' 
       AND password = '$_POST[password]'";
       $query_run = mysqli_query($conn,$query);
       if(mysqli_num_rows($query_run))
       {
        echo "<script tpe='text/javascript'>
        window.location.href = 'employee_dashboard.php';
        </script>
        ";
       }
       else
       {
        echo "<script tpe='text/javascript'>
        alert('Please enter correct details');
        window.location.href = 'employee_login.php';
        </script>
        ";
       }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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