<?php
session_start();
    include('connection.php');

   
  //  Eidt for status

    if(isset($_POST['edit']))
    {
		$id=$_POST['id'];
       $query = "update dashboard set status = '$_POST[status]' where id=$id";
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