

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo2.png" type="x-icon" >
    <title> EMPLOYEE DASHBOARD </title>
    <link rel="stylesheet" href="employee_dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> 
  </head>
<body>
  <div class="main_box">




    <div class="top_navbar">
        <!--here top_navbar-->
        
        
        <div class="icon">
            <h2 class="bpo-logo"><img class="bpo-logo-img" src="images/logo2.png"/></h2>
        </div>
        <div class="head-container"><h1 class="heading">GLOBAL INFOTECH</h1></div>
        <div class="logout-container">
        <a href="logout.php"><button class="logout" >Logout</button></a>
        </div>
    </div>




    <input type="checkbox" id="check">
    <div class="btn_one">
      <label for="check">
        <i><img src="images/Hamburger_icon.png" style="width: 35px;margin-top: 12px; "/></i>
        
        
      </label>
    </div>
    <div class="sidebar_menu" style=" background-color: #2927a8;">
      <div class="logo">
        <a href="#"><img src="images/download (2).png" alt="profile_picture"></a>
          </div>
        <div class="btn_two">
          <label for="check">
            <i> <p style="font-size: 35px;"> &times;</p></i>
            
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
                          $query = mysqli_query($conn,"select * from admin where email = '$user'");
                          $row =mysqli_fetch_array($query);
                          $id = $row['id'];
                          $name = $row['name'];
                          $mobile = $row['mobile'];
                        //  $company = $row['company'];
                          $position = $row['position'];
                        //  $address = $row['address'];
                          $email = $row['email'];


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
        <h1>Task List</h1>
        <div class="task-container" >
            <table>
              <thead>
                <tr class="column-head">
                    <th>Task no.</th>
                    <th>Task Title</th>
                    <th style="width:25%;">Task Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Download</th>
                    <th>Action</th>
                    <th>Upload</th>
                </tr>
              </thead>
                <tbody class="column-value">
                  <?php
                  $connection = mysqli_connect("localhost","root","");
    
  
                  $db = mysqli_select_db($connection,"bpo_management");

                  $sql = "select * from dashboard";
                  $run = mysqli_query($connection, $sql);
                  $count=1;
                  

                  while($row = mysqli_fetch_array($run))
                  {
                    
                  ?>

                      <tr class="column-value">
                        <td class="table-values"><?php echo $count ?></td>
                        <td class="table-values"><?php echo $row['title']; ?></td>
                        <td class="descrption-value"><?php echo $row['description']; ?></td>
                        <td class="table-values"><?php echo $row['startdate']; ?></td>
                        <td class="table-values"><?php echo $row['enddate']; ?></td>
                        <td class="table-values"><?php echo $row['status']; ?></td>
  
                        <td class="pay-btn-con"><a href="download.php?source=employee&id=<?php echo $row['id'];?>"><button class="download-btn">Download<button></a></td>
                        <td class="pay-btn-con">
                          <a href="update_status.php?id=<?php echo $row['id'];?>">
                          <button class="pay-btn">Update</button></a><span>  

                          </span><a href="amount.php?id=<?php echo $row['id'];?>">
                          <button class="pay-btn">Amount</button></a>
                      </td>
                        <td class="pay-btn-con"><a href="upload.php?source=employee&id=<?php echo $row['id'];?>"><button class="pay-btn">Upload<button></a></td>
                        <td class="pay-btn-con"><a href="delete.php?source=employee&id=<?php echo $row['id'];?>"><img src="images/delete-img.png" class="delete-img"></a></td>
                        
                      </tr>

                      <?php 
                            $count++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

  

  <script src="client_dashboard.js">
</script>

  </body>

</html>

