<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/logo2.png" type="x-icon">
  <title> EMPLOYEE DASHBOARD </title>
  <link rel="stylesheet" href="employee_dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>

<body>
  <div class="main_box">




    <div class="top_navbar">
      <!--here top_navbar-->


      <div>
        <h2 class="bpo-logo"><img class="bpo-logo-img" src="images/logo2.png" /></h2>
      </div>
      <div class="head-container">
        <h1 class="heading">GLOBAL INFOTECH</h1>
      </div>
      <div class="completed-container">
          <a href="completed_task.php?source=employee"><button class="logout">Completed Task</button></a>
        </div>
      <div class="logout-container">
        <a href="logout.php?source=employee"><button class="logout">Logout</button></a>
      </div>
    </div>




    <input type="checkbox" id="check">
    <div class="btn_one">
      <label for="check">
        <i><img src="images/Hamburger_icon.png" style="width: 35px;margin-top: 12px; " /></i>


      </label>
    </div>
    <div class="sidebar_menu" >
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
      <?php
      session_start();
      include('connection.php');

      if (!isset($_SESSION['EMPLOYEE_ID'])) {
        header("location:employee_login.php");
        die();
      }
      ?>

      <?php

      $user = $_SESSION['EMPLOYEE_EMAIL'];
      $query = mysqli_query($conn, "select * from admin where email = '$user'");
      $row = mysqli_fetch_array($query);
      $id = $row['id'];
      $name = $row['username'];
      $mobile = $row['mobile'];
      //  $company = $row['company'];
      $position = $row['position'];
      //  $address = $row['address'];
      $email = $row['email'];




                
          // the below is for the live dashboard to show the number of tasks

          $user_id = $id;
          // this is to count the the completed task
          $complete_query = "select * from dashboard where status = 'Completed' ";
          $complete_con = mysqli_query($conn,$complete_query);
          $completed_count = mysqli_num_rows($complete_con);
          // this is to count the ongoing task
          $ongoing_query = "select * from dashboard where status != 'Completed' ";
          $ongoing_con = mysqli_query($conn,$ongoing_query);
          $ongoing_count = mysqli_num_rows($ongoing_con);

          // this is to count the total number of taskassigned by user
          $total_query = "select * from dashboard where id ";
          $total_con = mysqli_query($conn,$total_query);
          $total_count = mysqli_num_rows($total_con);

          // this is to calculate the percentage of completed task on total task

          if ($total_count > 0) {
            $percentage_completed = round(($completed_count / $total_count) * 100);
          } else {
            $percentage_completed = 0; // Handle division by zero error
          }




      ?>

      <div class="client-details">
        <h3>Employee Profile</h3>
        <div class="details">
          <b>Name :</b> <?php echo ucfirst($name) ?><br><br>
          <b>Email :</b> <?php echo ucfirst($email) ?><br><br>
          <b>Mobile :</b> <?php echo ($mobile) ?><br><br>
          <b>Position :</b> <?php echo ucfirst($position) ?>
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





    <div class="task-body" style="margin-left: 20px;margin-right:10px;">

            <!-- this section is for the live dash board in the client dashboard -->

          <div class="live-dashboard">

            <div class="total-no-task" id="total-no-task1">
              <h4 class="total-task-head">Total Tasks</h4>
                  <div class="inner-content">
                    <img src="images/total.png" alt="" class="total-img" id="img1">
                      <div class="num-container">
                          <h7 class="Totaltask-number"><?php echo $total_count ?></h7>
                      </div>
                  </div>
            </div>

            <div class="total-no-task" id="total-no-task2">
              <h4 class="total-task-head">Ongoing Tasks</h4>
                <div class="inner-content">
                  <img src="images/ongoing1.png" alt="" class="total-img" id="img2">
                    <div class="num-container">
                        <h7 class="Totaltask-number"><?php echo $ongoing_count ?></h7>
                      </div>
                </div>
            </div>

            <div class="total-no-task" id="total-no-task3">
              <h4 class="total-task-head">Completed Tasks</h4>
                <div class="inner-content">
                  <img src="images/completed.png" alt="" class="total-img" id="img3">
                  <div class="num-container">
                      <h7 class="Totaltask-number"><?php echo $completed_count ?></h7>
                  </div>
                </div>
            </div>

            <div class="total-no-task" id="total-no-task4">
             <h4 class="total-task-head">Task Percentage</h4>
              <div class="percentage-container">
                <h3 class="task-num"><?php echo $percentage_completed,"%" ?></h3>
              </div>

            </div>

          </div><br>


      <h1>Task List</h1>
      <div class="task-container">
        <table>
          <thead class="text-center">
            <tr class="column-head ">
              <th class="table-head">Task no.</th>
              <th class="table-head">Task Title</th>
              <th class="table-head" style="width:25%;">Task Description</th>
              <th class="table-head">Start Date</th>
              <th class="table-head">End Date</th>
              <th class="table-head">Status</th>
              <th class="table-head">Download</th>
              <th class="table-head">Action</th>
              <th class="table-head">Upload</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="column-value">
            <?php
            $connection = mysqli_connect("localhost", "root", "");


            $db = mysqli_select_db($connection, "bpo_management");

            $sql = "select * from dashboard where status != 'Completed'";
            $run = mysqli_query($connection, $sql);
            $count = 1;


            while ($row = mysqli_fetch_array($run)) {

            ?>

              <tr class="column-value">
                <td class="table-values"><?php echo $count ?></td>
                <td class="table-values"><?php echo $row['title']; ?></td>
                <td class="descrption-value"><?php echo $row['description']; ?></td>
                <td class="table-values"><?php echo $row['startdate']; ?></td>
                <td class="table-values"><?php echo $row['enddate']; ?></td>
                <td class="table-values"><?php echo $row['status']; ?></td>

                <td class="pay-btn-con"><a href="download.php?source=employee&id=<?php echo $row['id']; ?>"><button class="download-btn">Download</button></a></td>
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
                <td class="pay-btn-con"><a href="delete.php?source=employee&id=<?php echo $row['id']; ?>"><img src="images/delete-img.png" class="delete-img"></a></td>

              </tr>

            <?php
              $count++;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>




  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>