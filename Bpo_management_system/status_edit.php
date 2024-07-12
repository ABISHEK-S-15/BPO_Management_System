<?php
    session_start();
    include('connection.php');


    


    // $user_id = $_SESSION['USER_ID'];

    // Check if form is submitted
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];
    
        // Sanitize input to prevent SQL injection
        $id = mysqli_real_escape_string($conn, $id);
        $status = mysqli_real_escape_string($conn, $status);
    
        // Prepare the SQL query
        $query = "UPDATE dashboard SET status = '$status' WHERE id = $id ";
        $query_run = mysqli_query($conn, $query);
    
        // Check if the query was successful
        if ($query_run) {
            echo "<script type='text/javascript'>
            window.location.href = 'employee_dashboard.php';
            </script>";
        } else {
            echo "<script type='text/javascript'>
            alert('Please enter correct details');
            window.location.href = 'employee_dashboard.php';
            </script>";
        }
    }
    ?>