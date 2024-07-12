<?php
include('connection.php');
if (isset($_POST['usersignup'])) {

    $email = $_POST["email"];
    $error = array();
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = mysqli_query($conn, "select * from users where email='$email'");
    $num = mysqli_num_rows($sql);
    if ($num > 0) {
        $msg = "Email already Exist Try another.!";
                    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('alertMessage').classList.add('show');
            });

            function closeAlert() {
                document.getElementById('alertMessage').classList.remove('show');
            }
            </script>";
    } else {
        $query = "insert into users value(null,'$_POST[username]','$_POST[email]',$_POST[mobile],'$_POST[password]','$_POST[company]','$_POST[position]','$_POST[address]')";

        $querry_run = mysqli_query($conn, $query);
        if ($querry_run) {
            $msg = "You have Successfully  signed up !";
            echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('alt-alertMessage').classList.add('show');
        });
    
        function redirectToPage() {
            window.location.href = 'index.php';
        }
    
        function closeAlert() {
            document.getElementById('alt-alertMessage').classList.remove('show');
        }
        </script>";
        } else {
                    $msg = "Error... Plz Try Again.!";
                    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('alt-alertMessage').classList.add('show');
            });

            function closeAlert() {
                document.getElementById('alt-alertMessage').classList.remove('show');
            }
            </script>";
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="images/logo2.png" type="x-icon">
    <title>SIGNUP</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>

    <div id="alt-alertMessage" class="alert">
        <a class="close" onclick="closeAlert()">&times;</a>
        <p><?php echo $msg; ?></p><br>
        <button class="close-button" onclick="redirectToPage()">OK</button>
    </div>

    <div id="alertMessage" class="alert">
        <span class="close" onclick="closeAlert()">&times;</span>
        <p><?php echo $msg; ?></p><br>
        <button class="close-button" onclick="closeAlert()">OK</button>
    </div>
    

    <div>
        <div class="form">
            <form method="post">
                <h2>Welcome</h2>
                <div class="content">
                    <div style="text-align: start;">
                        <label class="label">User Name : </label>
                        <input type="text" name="username" placeholder="Enter username" required autocomplete="off">
                        <label class="label">Mobile : </label>
                        <input type="number" style="margin-left: 45px;" name="mobile" placeholder="Enter Mobile Number" required autocomplete="off">
                        <label class="label">Company : </label>
                        <input type="text" style="margin-left: 25px;" name="company" placeholder="Company Name" required autocomplete="off">

                    </div>
                    <div style="text-align: start;">
                        <label class="label">Email : </label>
                        <input type="email" style="margin-left: 59px;" name="email" placeholder="Enter Email" required autocomplete="off">
                        <label class="label">Password : </label>
                        <input type="password" style="margin-left: 30px;" name="password" placeholder="Enter Password" required autocomplete="off">
                        <label class="label">Position : </label>
                        <input type="position" style="margin-left: 40px;" name="position" placeholder="Enter Position" required autocomplete="off">

                    </div>

                </div>
                <div class="address-con">
                    <label class="label">Address : </label>
                    <input type="text" class="address-input" name="address" placeholder="Company Address" required autocomplete="off">
                </div>
                <br>
                <input type="submit" class="btnn" name="usersignup" value="Signup">

                <p class="link">Already have an account ?<br>
                    <a href="index.php" class="sign">login </a> here</a>
                </p>
                <p class="liw">signup or login with</p>

                <div class="icons">
                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>