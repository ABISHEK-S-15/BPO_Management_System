

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo2.png" type="x-icon" >
    <title> EMPLOYEE DASHBOARD </title>
    <link rel="stylesheet" href="client_dashboard.css">
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

        <div class="client-details">
          <h3>Employee Profile</h3>
          <div class="details">
            <b>Name :</b> Admin<br><br>
            <b>Email :</b> bpoadmin@123<br><br>
            <b>Mobile :</b> 123457890<br><br>
            <b>Job :</b> Employee
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

                  $id=1;

                  while($row = mysqli_fetch_array($run))
                  {
                    
                  ?>

                      <tr class="column-value">
                        <td class="table-values"><?php echo $row['id']; ?></td>
                        <td class="table-values"><?php echo $row['title']; ?></td>
                        <td class="descrption-value"><?php echo $row['description']; ?></td>
                        <td class="table-values"><?php echo $row['startdate']; ?></td>
                        <td class="table-values"><?php echo $row['enddate']; ?></td>
                        <td class="table-values"><?php echo $row['status']; ?></td>
                        <?php
                        include('connection.php');
                        if(isset($_POST['update']))
                        {
                           $query = "update dashboard set status = '$_POST[status]' where id=$_GET[id]";
                           $query_run = mysqli_query($conn,$query);
                           if($query_run)
                           {
                            echo "<script tpe='text/javascript'>
                            window.location.href = 'employee_dashboard.php';
                            </script>
                            ";
                           }
                          }
                        ?>
                        <td><a href="uploads/'.$row['folderpath'].'" download><button class="download-btn">Download</button></a></td>
                        <td class="pay-btn-con"><a href="update_status.php?id=<?php echo $row['id'];
                        ?>"><button class="pay-btn">Update</button></a><span>  </span><a href="amount.php?id=<?php echo $row['id'];
                        ?>"><button class="pay-btn">Amount</button></a></td>
                        <td class="pay-btn-con"><a href="upload.php"><button class="pay-btn">Upload<button></a></td>
                        
                      </tr>

                      <?php $id++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

  

  <script src="client_dashboard.js">
</script>

  </body>

</html>

