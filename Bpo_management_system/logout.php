
<?php 
session_start();
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_EMAIL']);
header("location:index.php");
die();
?>