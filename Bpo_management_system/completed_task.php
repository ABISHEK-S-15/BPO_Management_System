<?php
session_start();
include('connection.php');

// if (!isset($_SESSION['USER_ID']) ||  !isset($_SESSION['EMPLOYEE_ID'])) {
//   header("location:index.php");
//   die();
// }
?>

<?php


if (isset($_GET['source']) && ($_GET['source'] === 'employee' || $_GET['source'] === 'client')) {
    // Include necessary files or connect to the database if required





        if ($_GET['source'] === 'employee') {

            $source = $_GET['source']; //it is the argument for the source to used in various places
            $redirect_page = "employee_dashboard.php"; //it is a argument which is used to redirect the page

            $user = $_SESSION['EMPLOYEE_EMAIL'];
            $query = mysqli_query($conn, "select * from admin where email = '$user'");
            $row1 = mysqli_fetch_array($query); //it  is the argument passed for the details on side menu

            $sql = "select * from dashboard where status = 'Completed'";
            $run = mysqli_query($conn, $sql); //it is the argument for the task detials to show

            if($row1 && $run ){
                completed_tasks($source,$redirect_page,$row1,$run);
            }


            
            
        } elseif ($_GET['source'] === 'client') {

            $source = $_GET['source']; //it is the argument for the source to used in various places
            $redirect_page = "client_dashboard.php"; //it is a argument which is used to redirect the page

            $user = $_SESSION['USER_EMAIL'];
            $query = mysqli_query($conn, "select * from users where email = '$user'");
            $row1 = mysqli_fetch_array($query);//it  is the argument passed for the details on side menu

            $user_id = $row1['id'];
            $sql = "select * from dashboard where user_id ='$user_id' && status = 'Completed'";
            $run = mysqli_query($conn, $sql); //it is the argument for the task detials to show

            if($row1 && $run ){
                completed_tasks($source,$redirect_page,$row1,$run);
            }
           
        }
    } 
     else {
    $msg = "Couldn't get Source !";
    echo "<script>
    alert('$msg');
    </script>";
}


?>

<?php function completed_tasks($source,$redirect_page,$row1,$run){ ?> 

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/logo2.png" type="x-icon">
  <title> COMPLETED TASK </title>
  <link rel="stylesheet" href="client_dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <style>
    .back-btn {
      background-color: #ff7200;
      color: #000000;
      padding: 10px 15px;
      margin-top: 20px;
      border: none;
      font-weight: bold;
      border-radius: 4px;
      cursor: pointer;
      width: 120px;
      text-align: center;
    }

    .back-btn:hover {
      background-color: #ffffff;
      box-shadow: 0 1px 10px rgb(144, 138, 138);
    }
  </style>
</head>

<body>
  <div class="main_box">


    
            <div class="top_navbar">
            <!--here top_navbar-->


            <div class="icon">
                <h2 class="bpo-logo"><img class="bpo-logo-img" src="images/logo2.png" /></h2>
            </div>
            <div class="head-container">
                <h1 class="heading">GLOBAL INFOTECH</h1>
            </div>
            <div class="completed-container">
                <a href="completed_task.php?source=<?php echo $source; ?>"><button class="logout">Completed Task</button></a>
                </div>
            <div class="logout-container">
                <a href="logout.php?source=<?php echo $source; ?>"><button class="logout">Logout</button></a>
            </div>
            </div>




            <input type="checkbox" id="check">
            <div class="btn_one">
            <label for="check">
                <i><img src="images/Hamburger_icon.png" style="width: 35px;margin-top: 12px; " /></i>
            </label>
            </div>

            <div class="sidebar_menu">
            <div class="logo">
                <a href="#"><img src="images/download (2).png" alt="profile_picture"></a>
            </div>
            <div class="btn_two">
                <label for="check">
                <i>
                    <p class="x-sym"> &times;</p>
                </i>
                </label>
            </div>

            <div class="client-details">
                <h3>Client Profile</h3>
                <div class="details">
                <b>Name :</b><?php echo ucfirst($row1['username']); ?><br><br>
                <b>Email :</b> <?php echo ucfirst($row1['email']); ?><br><br>
                <b>Mobile :</b> <?php echo $row1['mobile']; ?><br><br>
                <?php if ($source !== 'employee' ){ ?><b>Company :</b> <?php echo ucfirst($row1['company']); ?><br><br> <?php }?>
                <b>Position :</b> <?php echo ucfirst($row1['position']); ?><br><br>
                <b>Address :</b> <?php echo ucfirst($row1['address']); ?><br><br>

                </div>
            </div>


            <div class="social_media">
                <ul>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                </ul>
            </div>
            </div>


        

            <div class="task-body">

            <div class="back-btn-con">
                <a href="<?php echo $redirect_page; ?>"><button class="back-btn">Back</button></a>
            </div>
                
            <h1>Task List</h1>
            <div class="task-container">
                <table>
                <thead>
                    <tr class="column-head">
                    <th class="table-head">Task Id</th>
                    <th class="table-head">Task Title</th>
                    <th style="width:25%;" class="table-head">Task Description</th>
                    <th class="table-head">Start Date</th>
                    <th class="table-head">End Date</th>
                    <th class="table-head">Status</th>
                    <?php if($source !== 'employee'){?> <th class="table-head">Payment</th><?php } ?> 
                    <?php if($source !== 'client'){ ?><th class="table-head">Download</th>
                    <th class="table-head">Action</th>
                    <th class="table-head">Upload</th><?php } ?>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php



                    $count = 1;


                    while ($row = mysqli_fetch_array($run)) {

                    ?>

                    <tr class="column-value">
                        <td class="table-values"><?php echo $count; ?></td>
                        <td class="table-values"><?php echo $row['title']; ?></td>
                        <td class="descrption-value"><?php echo $row['description']; ?></td>
                        <td class="table-values"><?php echo $row['startdate']; ?></td>
                        <td class="table-values"><?php echo $row['enddate']; ?></td>
                        <td class="table-values"><?php echo $row['status']; ?></td>

                        <?php if($source !== 'employee') { ?><td class="pay-btn-con"><a href="payment.php?id=<?php echo $row['id']; ?>"><button class="pay-btn">Pay</button></a></td> <?php } ?>

                        <?php if($source !== 'client'){ ?> 

                        <td class="pay-btn-con"><a href="download.php?source=<?php echo $source; ?>&id=<?php echo $row['id']; ?>"><button class="download-btn">Download</button></a></td>
                        <td class="pay-btn-con">



                        <button type="button" class="pay-btn" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>"> Update</button>

                        <div class="modal fade" id="edit<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="status_edit.php">
                                <div class="modal-header">
                                    <h3 class="model-title">STATUS</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                    <div>
                                        <label></label>
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id" />
                                        <select class="select-css" name="status" required>
                                        <option>Pending</option>
                                        <option>In-Progress</option>
                                        <option>Completed</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <br style="clear:both;" /><br>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
                                    <button class="btn btn-warning" name="edit"> Update</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>

                        <span>

                        </span>
                        <button type="button" class="pay-btn" data-toggle="modal" data-target="#edit_amount<?php echo $row['id']; ?>"> Amount</button>
                        <div class="modal fade" id="edit_amount<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="amount_edit.php">
                                <div class="modal-header">
                                    <h3 class="model-title">AMOUNT</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                    <div>
                                        <label></label>
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id" />
                                        <div>
                                        <input type="number" name="amount" placeholder="Enter Amount">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <br style="clear:both;" /><br>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
                                    <button class="btn btn-warning" name="edit"> Update</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        </td>
                        <td class="pay-btn-con">
                        <button type="button" class="pay-btn" data-toggle="modal" data-target="#edit_upload<?php echo $row['id']; ?>"> Upload</button>
                        <div class="modal fade" id="edit_upload<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" enctype="multipart/form-data" action="upload_edit.php">
                                <div class="modal-header">
                                    <h3 class="model-title">FILE UPLOAD</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                    <div>
                                        <label></label>
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id" />
                                        <div>
                                        <input type="file" id="pdfFile" name="pdfFile" required>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <br style="clear:both;" />
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
                                    <button class="btn btn-warning" name="edit"> Update</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        </td>

                        <?Php } ?>

                        <td class="pay-btn-con"><a href="delete.php?source=<?php echo $source; ?>&id=<?php echo $row['id']; ?>"><img src="images/delete-img.png" class="delete-img"></a></td>
                    </tr>
                    <?php $count++;
                    } ?>

                </tbody>
                </table>
            </div>
            </div>


   

    
  </div>



  <script src="client_dashboard.js">
  </script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>

<?php } ?>
