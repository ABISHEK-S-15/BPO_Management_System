<?php
session_start();
include('connection.php');

if (!isset($_SESSION['USER_ID'])) {
    header("location:index.php");
    exit(); // Terminate script execution after redirection
}



$user_id = $_SESSION['USER_ID'];

if(isset($_GET['id'])) {
    $task_id = $_GET['id'];

    $query = "select * from dashboard where id = '$task_id' && user_id = '$user_id' ";
    $queryrun = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($queryrun);

        if ($row){

            $title = $row['title'];
            $description = $row['description'];
            $status = $row['status'];

        }

    $query1 = "select * from users where id = '$user_id' ";
    $queryrun1 = mysqli_query($conn,$query1);
    $row1 = mysqli_fetch_array($queryrun1);

        if ($row1){

            $name = $row1['username'];
            $email = $row1['email'];
            $mobile = $row1['mobile'];
            $company = $row1['company'];
            $position = $row1['position'];
            $address = $row1['address'];
    
        }


    $query2 = "select * from payment where user_id = '$user_id' && task_id = '$task_id' ";
    $queryrun2 = mysqli_query($conn,$query2);
    $row2 = mysqli_fetch_array($queryrun2);
    
        if ($row2){
            
            $pay_id = $row2['id'];
            $pay_name = $row2['name'];
            $pay_email = $row2['email'];
            $pay_address = $row2['address'];
            $pay_state = $row2['state'];
            $pay_city = $row2['city'];
            $pay_zipcode = $row2['zipcode'];
            $pay_name_on_card = $row2['name_on_card'];

            $pay_card_no = $row2['card_no'];
            
            $pay_req_amt = $row2['req_amt'];
            $pay_amt_pay = $row2['amt_pay'];

            $numberstr = (string)$pay_card_no;
            $length = strlen($numberstr);
            $first="";
            $last="";
            for ($i=0; $i<$length; $i++){
                if ($i >= $length-4){
                    $last .= $numberstr[$i];
                }else{
                    $first .= "X";
                }
            }

            $final_card_no = $first.$last;

            $tax = ($pay_amt_pay*10)/100;

            $subtotal = $pay_amt_pay-$tax;

            $grandtotal = $subtotal+$tax;

                    
        }



}

?>




<!DOCTYPE html>



<html lang="zxx">
<head>
    <title>INOVOICE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="images/logo2.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
</head>
<body>


<!-- Invoice 1 start -->
<div class="invoice-1 invoice-content">
<div class="back-btn-con">
                <a href="download.php?source=client&id=<?php echo $task_id; ?>"><button class="back-btn">Back</button></a>

            </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-headar">
                            <div class="row g-0">
                                <div class="col-sm-6">
                                    <div class="invoice-logo">
                                        <!-- logo started -->
                                        <div class="logo">
                                            <img src="images/logo2.png" alt="logo" class="ino.logo">
                                        </div>
                                        <!-- logo ended -->
                                    </div>
                                </div>
                                <div class="col-sm-6 invoice-id">
                                    <div class="info">
                                        <h1 class="color-white inv-header-1">Invoice</h1>
                                        <p class="color-white mb-1">Invoice Number :<span>#GIT <?php echo $pay_id; ?> </span></p>
                                        <p class="color-white mb-0">Invoice Date :<span><?php echo date('Y-m-d'); ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-number mb-30">
                                        <h4 class="inv-title-1">Invoice To</h4>
                                        <h2 class="name mb-10"><?php echo $pay_name; ?></h2>
                                        <p class="invo-addr-1">
                                            <?php echo $mobile; ?> <br/>
                                            <?php echo $pay_email; ?> <br/>
                                            <?php echo $pay_address; ?> <br/>
                                            <?php echo $pay_city; ?><?php echo'-';echo $pay_zipcode; ?> <br/>
                                            <?php echo $pay_state; ?> <br/>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="invoice-number mb-30">
                                        <div class="invoice-number-inner">
                                            <h4 class="inv-title-1">Invoice From</h4>
                                            <h2 class="name mb-10">GLOBAL INFOTECH</h2>
                                            <p class="invo-addr-1">
                                                9835694023  <br/>
                                                globalinfotech@gmail.com<br/>
                                                No. 13 Melvisharam , vellore - 632509 <br/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-center">
                            <div class="table-responsive">
                                <table class="table mb-0 table-striped invoice-table">
                                    <thead class="bg-active">
                                    <tr class="tr">
                                        <th>No.</th>
                                        <th class="pl0 text-start">Task Title</th>
                                        <th class="text-center">Task Description</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Req Amt</th>
                                        <th class="text-end">Amount </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="tr">
                                        <td>
                                            <div class="item-desc-1">
                                                <span>01</span>
                                            </div>
                                        </td>
                                        <td class="pl0"><?php echo $title; ?></td>
                                        <td class="text-center"><?php echo $description; ?></td>
                                        <td class="text-center"><?php echo $status; ?></td>
                                        <td class="text-center"><?php echo $pay_req_amt; ?></td>
                                        <td class="text-end"><?php echo $subtotal; ?></td>
                                    </tr>
                                   
                                    <tr class="tr2">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">SubTotal</td>
                                        <td class="text-end"><?php echo $subtotal; ?></td>
                                    </tr>
                                    <tr class="tr2">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">Tax (10%)</td>
                                        <td class="text-end"><?php echo $tax; ?></td>
                                    </tr>
                                    <tr class="tr2">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center f-w-600 active-color">Grand Total</td>
                                        <td class="f-w-600 text-end active-color"><?php echo $grandtotal; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <div class="row">
                                <div class="col-lg-6 col-md-8 col-sm-7">
                                    <div class="mb-30 dear-client">
                                        <h3 class="inv-title-1">Terms & Conditions</h3>
                                        <p>By doing task from our website, you agree to the following terms and conditions: All sales are final. 
                                            Payment is due upon receipt of invoice. After payment only you have downloaded your file. We reserve the right to cancel or modify Task
                                             at our discretion. Prices are subject to change without notice.The Completed files has been downloaded after payment.
                                              By submitting payment, you acknowledge that you have read and agree to these terms.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-4 col-sm-5">
                                    <div class="mb-30 payment-method">
                                        <h3 class="inv-title-1">Payment Method</h3>
                                        <ul class="payment-method-list-1 text-14">
                                            <li><strong>Card No:</strong><?php echo $final_card_no; ?> </li>
                                            <li><strong>Name on Card:</strong><?php echo $pay_name_on_card; ?></li>
                                            <li><strong>Branch Place:</strong> <?php echo $pay_city; ?> </li>
                                            <li><strong>Zipcode:</strong> <?php echo $pay_zipcode; ?> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-contact clearfix">
                            <div class="row g-0">
                                <div class="col-lg-9 col-md-11 col-sm-12">
                                    <div class="contact-info">
                                        <a href="#"><i class="fa fa-phone"></i> 9835694023</a>
                                        <a href="#"><i class="fa fa-envelope"></i> globalinfotech@gmail.com</a>
                                        <a href="#" class="mr-0 d-none-580"><i class="fa fa-map-marker"></i> No. 13 Melvisharam , vellore - 632509</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Invoice
                    
                        </a>
                        <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                            <i class="fa fa-download"></i> Download Invoice
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Invoice 1 end -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jspdf.min.js"></script>
<script src="assets/js/html2canvas.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>

