
<?php 
session_start();
if ($_GET['source'] === 'client'){
    unset($_SESSION['USER_ID']);
    unset($_SESSION['USER_EMAIL']);

}
elseif($_GET['source'] === 'employee'){
    unset($_SESSION['EMPLOYEE_ID']);
    unset($_SESSION['EMPLOYEE_EMAIL']);
}

header("location:index.php");
die();
?>