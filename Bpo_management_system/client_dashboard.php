<?php
session_start();
include('connection.php');

if (!isset($_SESSION['USER_ID'])) {
  header("location:index.php");
  die();
}
?>

<?php

$user = $_SESSION['USER_EMAIL'];
$query = mysqli_query($conn, "select * from users where email = '$user'");
$row = mysqli_fetch_array($query);
$id = $row['id'];
$user_name = $row['username'];
$mobile = $row['mobile'];
$company = $row['company'];
$position = $row['position'];
$address = $row['address'];
$email = $row['email'];



if (isset($_POST['Submit'])) {
  $title =   $_POST['title'];
  $description = $_POST['description'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];
  $targetDir = "uploads/";
  $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
  $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
  if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
    $filename = $_FILES['pdfFile']['name'];
    $folder_path = $targetDir;
  }
  mysqli_query($conn, "insert into dashboard(title,description,startdate,enddate,status,filename,folderpath,user_id)
    value ('$title','$description',Now(),'$enddate','Not started','$filename','$folder_path','$id')");

  header("location:client_dashboard.php");
}






?>


<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/logo2.png" type="x-icon">
  <title> CLIENT DASHBOARD </title>
  <link rel="stylesheet" href="client_dashboard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
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
      <div class="logout-container">
        <a href="logout.php"><button class="logout">Logout</button></a>
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
            <p style="font-size: 35px;"> &times;</p>
          </i>
        </label>
      </div>

      <div class="client-details">
        <h3>Client Profile</h3>
        <div class="details">
          <b>Name :</b><?php echo ucfirst($user_name) ?><br><br>
          <b>Email :</b> <?php echo ucfirst($email) ?><br><br>
          <b>Mobile :</b> <?php echo $mobile ?><br><br>
          <b>Company :</b> <?php echo ucfirst($company) ?><br><br>
          <b>Position :</b> <?php echo ucfirst($position) ?><br><br>
          <b>Address :</b> <?php echo ucfirst($address) ?><br><br>

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
      <h1>Task List</h1>
      <div class="task-container">
        <table>
          <thead>
            <tr class="column-head">
              <th>Task Id</th>
              <th>Task Title</th>
              <th style="width:25%;">Task Description</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Status</th>
              <th>Payment</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('connection.php');

            if (!isset($_SESSION['USER_ID'])) {
              header("location:index.php");
              die();
            }



            $user = $_SESSION['USER_EMAIL'];
            $query = mysqli_query($conn, "select * from users where email = '$user'");
            $rowr = mysqli_fetch_array($query);
            $id = $rowr['id'];


            $query1 = mysqli_query($conn, "select * from dashboard where user_id = '$id'");
            $result = mysqli_num_rows($query1);

            ?>

            <?php
            $count = 1;
            for ($i = 1; $i <= $result; $i++) {
              $row =  mysqli_fetch_array($query1)
            ?>

              <tr class="column-value">
                <td class="table-values"><?php echo $count ?></td>
                <td class="table-values"><?php echo $row['title']; ?></td>
                <td class="descrption-value"><?php echo $row['description']; ?></td>
                <td class="table-values"><?php echo $row['startdate']; ?></td>
                <td class="table-values"><?php echo $row['enddate']; ?></td>
                <td class="table-values"><?php echo $row['status']; ?></td>

                <td class="pay-btn-con"><a href="payment.php?id=<?php echo $row['id']; ?>"><button class="pay-btn">Pay</button></a></td>
                <td class="pay-btn-con"><a href="delete.php?source=client&id=<?php echo $row['id']; ?>"><img src="images/delete-img.png" class="delete-img"></a></td>
              </tr>
            <?php $count++;
            } ?>

          </tbody>
        </table>
      </div>
    </div>





    <div class="task-btn">
      <button class="assign-btn" onclick="openpopup()">Assign Task</button>

    </div>


    <div class="form-container" id="form-container">
      <form method="post" enctype="multipart/form-data">

        <h1 class="detail-heading">Details</h1>

        <div class="task-details">
          <div>
            <label for="title">Task Title:</label>
            <input type="text" name="title" required autocomplete="off">
          </div>
          <div>
            <label for="description">Task Description:</label>
            <input type="text" name="description" required autocomplete="off">
          </div>
          <div>
            <label>Start Date:</label>
            <input type="date" name="startdate" disabled>
          </div>
          <div>
            <label>End Date:</label>
            <input type="date" name="enddate" required autocomplete="off">
          </div>
        </div>
        <label for="fileUpload">File Upload:</label>
        <input type="file" id="pdfFile" name="pdfFile" required>
        <br>
        <input type="submit" name="Submit" value="Submit">
        <button class="back-btn" onclick="closepopup()">Cancel</button>

      </form>
    </div>
  </div>



  <script src="client_dashboard.js">
  </script>

</body>

</html>