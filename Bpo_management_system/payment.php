<?php

session_start();
include('connection.php');

if (!isset($_SESSION['USER_ID'])) {
    header("location:index.php");
    exit(); // Terminate script execution after redirection
}

$user_id = $_SESSION['USER_ID'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$row = mysqli_fetch_array($query);


$task_id = $_GET['id'];

if (isset($_POST['Submit'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $name_on_card = $_POST['name_on_card'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];
    $amount = $_POST['amount'];

    // Using prepared statement to prevent SQL injection
    $check_query = "SELECT * FROM payment WHERE user_id=? AND task_id=? AND req_amt=?";
    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, "iii", $user_id, $task_id, $amount);
    mysqli_stmt_execute($stmt);
    $check_result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($check_result) > 0) {
        // Update payment details
        $update_query = "UPDATE payment SET name=?, email=?, address=?, city=?, state=?, zipcode=?, name_on_card=?, card_no=?, exp_month=?, exp_year=?, cvv=?, amt_pay=? WHERE user_id=? AND task_id=? AND req_amt=?";
        $stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($stmt, "ssssssssssssiii", $full_name, $email, $address, $city, $state, $zipcode, $name_on_card, $card_number, $exp_month, $exp_year, $cvv, $amount, $user_id, $task_id, $amount);
        mysqli_stmt_execute($stmt);

        // Redirect after successful update
        header("Location: download.php?source=client&id=" . $_GET['id']);

        exit(); // Terminate script execution after redirection
    } else {
        $msg = "Invalid Amount or Details,please Retry!!.";
        echo "<script type='text/javascript'>
        alert('$msg');
        window.location.href = unset('payment.php');
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
                <input type="text" placeholder="Enter Name" name="full_name" required>
            </div>
            <div class="inputbox">
                <span>Email:</span>
                <input type="email" placeholder="Enter Email" name="email" required>
            </div>
            <div class="inputbox">
                <span>Address:</span>
                <input type="text" placeholder="Enter Address" name="address"required>
            </div>
            <div class="inputbox">
                <span>City:</span>
                <input type="text" placeholder="Enter City" name="city"required>
            </div>
            <div class="flex">
                <div class="inputbox">
                    <span>State:</span>
                    <input type="text" placeholder="Enter State" name="state" required>
                </div>
                <div class="inputbox">
                    <span>zip Code:</span>
                    <input type="text" placeholder="Enter Zip Code" name="zipcode" required>
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
                <input type="text" placeholder="Enter Name  " name="name_on_card" required>
            </div>
            <div class="inputbox">
                <span>Card Number:</span>
                <input type="number" placeholder="Enter Number" name="card_number"required>
            </div>
            
            <div class="inputbox">
                <span>Exp Month:</span>
                <input type="number" placeholder="Enter Month" name="exp_month" required>
            </div>
            <div class="flex">
                <div class="inputbox">
                    <span>Exp Year:</span>
                    <input type="number" placeholder="Enter Year" name="exp_year" required>
                </div>
                <div class="inputbox">
                    <span>CVV:</span>
                    <input type="number" placeholder="Enter CVV"  name="cvv"required>
                </div>
            </div>
            <div class="flex">
                <div class="inputbox">
                <?php
                    include('connection.php');

                    // Assuming session has already been started
                    $user_email = $_SESSION['USER_EMAIL'];

                    // Retrieve user's ID from the database
                    $query = "SELECT * FROM users WHERE email = ?";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, "s", $user_email);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    // Check if the query returned any results
                    if ($row = mysqli_fetch_assoc($result)) {
                        $user_id = $row['id'];

                        // Fetch payment information using prepared statement
                        $query = "SELECT * FROM payment WHERE task_id = ? AND user_id = ?";
                        $stmt = mysqli_prepare($conn, $query);
                        $task_id = $_GET['id']; // Assuming 'id' is passed via GET parameter
                        mysqli_stmt_bind_param($stmt, "ii", $task_id, $user_id);
                        mysqli_stmt_execute($stmt);
                        $payment_result = mysqli_stmt_get_result($stmt);

                        // Display payment information
                        while ($row = mysqli_fetch_assoc($payment_result)) {
                            $req_amt = $row['req_amt'];
                    ?>
                            <span>Requested Amount:</span>
                            <input type="number" placeholder="<?php echo $req_amt; ?>" disabled required>
                    <?php
                        }
                    } else {
                        echo "User not found";
                    }
                ?>

                </div>
                <div class="inputbox">
                    <span>Amount:</span>
                    <input type="number" placeholder="Enter Amount" name="amount" required>
                </div>
            </div>

        </div>

    </div>
    <input type="submit" name="Submit" class="submit-btn" >
    </form>
</div>
</body>
</html>