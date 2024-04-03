<?php 
 include('connection.php');

 $msg="";
  
if (isset($_POST['submit'])) {
    header("location:download.php");
    
  }
  else{
    $msg="Please Enter Valid Details !";
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo2.png" type="x-icon" >
    <title>PAYMENT</title>
    <link rel="stylesheet" href="payment.css">

</head>
<body>
<div class="back-btn-con">
            <a href="client_dashboard.php"><button class="back-btn">Back</button></a>
        </div>
<div class="container">

    <form action="" method="post">
    <div class="row">
        <div class="col">
            <h3 class="title">Billing Address</h3>

            <div class="inputbox">
                <span>Full Name:</span>
                <input type="text" placeholder="Enter Name">
            </div>
            <div class="inputbox">
                <span>Email:</span>
                <input type="email" placeholder="Enter Email">
            </div>
            <div class="inputbox">
                <span>Address:</span>
                <input type="text" placeholder="Enter Address">
            </div>
            <div class="inputbox">
                <span>City:</span>
                <input type="text" placeholder="Enter City">
            </div>
            <div class="flex">
                <div class="inputbox">
                    <span>State:</span>
                    <input type="text" placeholder="Enter State">
                </div>
                <div class="inputbox">
                    <span>zip Code:</span>
                    <input type="text" placeholder="Enter Zip Code">
                </div>
            </div>

        </div>

        <div class="col">
            <h3 class="title">Payment</h3>
            <div class="inputbox">
                <span>Cards Accepted:</span>
                <img style="height:200px; width: 200px;" src="images/payment-img.png" alt="">
            </div>
            <div class="inputbox">
                <span>Name on card:</span>
                <input type="text" placeholder="Enter Name  ">
            </div>
            <div class="inputbox">
                <span>Card Number:</span>
                <input type="number" placeholder="Enter Number">
            </div>
            <div class="inputbox">
                <span>Address:</span>
                <input type="text" placeholder="Enter Address">
            </div>
            <div class="inputbox">
                <span>Exp Month:</span>
                <input type="text" placeholder="Enter Month">
            </div>
            <div class="flex">
                <div class="inputbox">
                    <span>Exp Year:</span>
                    <input type="number" placeholder="Enter Year">
                </div>
                <div class="inputbox">
                    <span>CVV:</span>
                    <input type="text" placeholder="Enter CVV">
                </div>
            </div>
            <div class="flex">
                <div class="inputbox">
                <?php
                session_start();
                    include('connection.php');

                    if (!isset($_SESSION['USER_ID'])) {
                      header("location:index.php");
                      die();
                    }



                    $user = $_SESSION['USER_EMAIL'];
                    $query = mysqli_query($conn,"select * from users where email = '$user'");
                    $rowr =mysqli_fetch_array($query);
                    $id = $rowr['id'];


                    $query1 = mysqli_query($conn,"select * from dashboard where user_id = '$id'");
                    $result = mysqli_num_rows($query1);

                ?>
                <?php 
                      for($i=1; $i<=$result;$i++)
                  {
                      $row =  mysqli_fetch_array($query1)
                    ?>


                    <span>Requested Amount:</span>
                    <input type="number" placeholder="<?php echo $row['amount']; ?>" disabled>
                    <?php 
                    
                } ?>
                </div>
                <div class="inputbox">
                    <span>Amount:</span>
                    <input type="number" placeholder="Enter Amount">
                </div>
            </div>

        </div>

    </div>
    <input type="submit" name="submit" class="submit-btn">
    </form>
</div>
</body>
</html>