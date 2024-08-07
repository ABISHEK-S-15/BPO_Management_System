<?php
session_start();
include('connection.php');

$msg = "";

if (isset($_POST['userlogin'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $sql = mysqli_query($conn, "select * from users where email='$email' && password='$password'");
  $num = mysqli_num_rows($sql);
  if ($num > 0) {
    $row = mysqli_fetch_assoc($sql);
    $_SESSION['USER_ID'] = $row['id'];
    $_SESSION['USER_EMAIL'] = $row['email'];
    header("location:client_dashboard.php");
  } else {
    $msg = "Please Enter Valid Details !";
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('alertMessage').classList.add('show');
    });

    function closeAlert() {
        document.getElementById('alertMessage').classList.remove('show');
    }
    </script>";
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="images/logo2.png" type="x-icon">
  <title>Global infotech</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>

  <div id="alertMessage" class="alert">
    <span class="close" onclick="closeAlert()">&times;</span>
    <p><?php echo $msg; ?></p>
    <br>
    <button class="close-button" onclick="closeAlert()">OK</button>
  </div>


  <div class="main">
    <div class="navbar">
      <div class="icon">
        <h2 class="logo"><img class="logo-img" src="images/logo2.png" /></h2>
      </div>

      <div class="menu">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="service.php">SERVICE</a></li>
          <li><a href="credits.php">CREDITS</a></li>
          <li><a href="contacts.php">CONTACT</a></li>
        </ul>
      </div>

      <div class="search">
        <input class="srch" type="search" name="" placeholder="Type To text">
        <a href="#"> <button class="btn">Search</button></a>
      </div>

    </div>
    <div class="content">
      <h1>Welcome to <br><span> GLOBAL INFOTECH </span><br>Data Entry Services</h1>
      <br><br><br>
      <p class="par">At GLOBAL SERVICES, we understand the importance of accurate <br>
        and efficient data management for the success of your business. <br>
        Our comprehensive BPO (Business Process Outsourcing) services encompass <br>
        a wide range of data entry solutions designed to streamline your operations,<br>
        enhance productivity, and drive growth. <br></p>

      <button class="cn"><a href="signup.php">JOIN US</a></button>

      <div class="form">
        <form action="" method="post">
          <h2>Login Here</h2>
          <input class="login-input" type="email" name="email" placeholder="Enter Email Here" required autocomplete="off">
          <input class="login-input" type="password" name="password" placeholder="Enter Password Here" required autocomplete="off">
          <input type="submit" class="btnn" name="userlogin" value="Login">

          <p class="link">Don't have an account<br>
            <a href="signup.php">Sign up </a> here</a>
          </p>
          <p class="liw">Log in with</p>

          <div class="icons">
            <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
            <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
            <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
            <a href="#"><ion-icon name="logo-google"></ion-icon></a>
            <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
          </div>
          <p class="link"><a href="employee_login.php"> >>Employee Login<< </a>
          </p>
        </form>
      </div>
    </div>
  </div>
  <div class="des">

    <h2 class="des-head"> Our Data Entry Services </h2>
    <br><br><br>
    <div class="des-par">
      <div class="des-img">
        <img class="img" src="images/1.jpg" />
      </div>
      <p> <span class="bold-text">1. Manual Data :</span>
        <br>
        Our team of skilled data entry professionals meticulously input data from <br>
        various sources, including physical documents, digital files, and online <br>
        forms, into your preferred format. Whether it's invoices, forms,<br>
        surveys, or handwritten documents, we ensure accuracy and completeness in every entry. <br>
        <br><br>
        <span class="bold-text">2. Online Data Entry:</span>
        <br>
        We specialize in extracting and entering data from online sources,<br>
        such as websites, databases, and web applications. From product information to <br>
        customer details, we handle online data entry tasks efficiently,<br>
        enabling you to access and utilize valuable digital information with ease.
        <br>
        <br><br>
        <span class="bold-text">3. Data Processing:</span>
        <br>
        Beyond simple data entry, we offer comprehensive data processing services <br>
        to organize, validate, clean, and enrich your datasets. Our advanced data <br>
        processing techniques ensure data accuracy, consistency, and relevance,<br>
        empowering you to make informed business decisions and gain actionable insights. <br>
        <br><br>
        <span class="bold-text">4. Data Conversion: <br></span>
        Need to convert data from one format to another? We've got you
        Whether it's converting PDFs to Excel spreadsheets, images to text, or legacy
        data to modern formats, our data conversion experts utilize cutting-edge
        tools and techniques to seamlessly transfer data while preserving its integrity and
        <br>
        <br><br>
        <span class="bold-text">5. Data Verification and Cleansing: </span>
        <br>
        Maintaining clean and accurate data is crucial for effective decision-making
        and business operations. Our data verification and cleansing services
        involve identifying and rectifying errors, inconsistencies, and redundancies
        in your datasets, ensuring data quality and reliability at all.
        <br>
        <br><br>
        <span class="why-choose">Why Choose GLOBAL SERVICES? </span>
        <br> <br>
        <span class="bold-text">Accuracy and Quality Assurance: </span>We prioritize accuracy, quality, and attention
        to detail in every data entry task we undertake, ensuring error-free
        results that meet your specifications and standards.
        <br>
        <br><br>
        <span class="bold-text">Customized Solutions: </span>We understand that every business has unique data management
        needs. That's why we offer customizable data entry solutions tailored
        to your specific requirements, industry regulations, and workflow processes.
        <br>
        <br><br>
        <span class="bold-text">Timely Delivery: </span>We value your time and strive to deliver prompt and efficient
        data entry services without compromising on quality. Our streamlined
        processes and dedicated team enable us to meet tight deadlines and turnaround times.
        <br>
        <br><br>
        <span class="bold-text">Cost-Effective Pricing: </span>Our competitive pricing models and flexible payment
        options make our data entry services accessible to businesses of all sizes,
        helping you reduce overhead costs and maximize ROI.
        <br>
        <br><br>
        <span class="bold-text">Data Security and Confidentiality: </span>We adhere to strict data security protocols
        and confidentiality agreements to safeguard your sensitive information
        throughout the data entry process, ensuring complete peace of mind.
        <br>
        <br><br>
        <span class="get-ready">Get Started Today!</span>
        <br> <br>
        Ready to optimize your data management processes and unlock the full potential
        of your business data? Contact GLOBAL SOLUTIONS today to learn
        more about our data entry services and how we can support your data management
        needs. Let us be your trusted partner in driving
        efficiency, accuracy, and success through superior data entry solutions.
      </p>
    </div>
  </div>
  <div class="about-end">
    <ion-icon name="mail-outline"></ion-icon><span class="end-content">Email:globalinfotech@gmail.com</span> <br> <br>
    <ion-icon name="call-outline"></ion-icon><span class="end-content">Conatct:9835694023</span><br> <br>
    <ion-icon name="logo-facebook"></ion-icon><span class="end-content">facebook:GlobalinfoTech</span><br> <br>
    <ion-icon name="logo-instagram"></ion-icon><span class="end-content">Instagram:Global_infoTech</span><br> <br>
    <ion-icon name="logo-twitter"></ion-icon><span class="end-content">Twitter:@Global_infoTecH</span><br> <br>
    <ion-icon name="logo-skype"></ion-icon><span class="end-content">Skype:Global_info_TecH12</span><br> <br>
  </div>
  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

  
  </body>

</html>