<?php
session_start();
    include('connection.php');

    $user_id = $_SESSION['USER_ID'];
  //  Eidt for status

    if(isset($_POST['edit']))
    {
		$id=$_POST['id'];
       $query = "update dashboard set status = '$_POST[status]' where id=$id && user_id=$user_id";
       $query_run = mysqli_query($conn,$query);
       if($query_run)
       {
        echo "<script tpe='text/javascript'>
        window.location.href = 'employee_dashboard.php';
        </script>
        ";
       }
       else
       {
        echo "<script tpe='text/javascript'>
        alert('Please enter correct details');
        window.location.href = 'employee_dashboard.php';
        </script>
        ";
       }
    }

 


?>