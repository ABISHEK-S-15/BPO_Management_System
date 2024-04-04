<?php
include('connection.php');


if(isset($_GET['source'])) {
    $source = $_GET['source'];
    
    // Check the source of the request and delete task accordingly
    if($source === 'client') {
        delete_task('client_dashboard.php'); // Pass the destination URL for client dashboard
    } elseif($source === 'employee') {
        delete_task('employee_dashboard.php'); // Pass the destination URL for employee dashboard
    } else {
        // Invalid source provided, handle the error
        echo "Error: Invalid source provided.";
    }
} else {
    // Handle the case where the source parameter is not provided
    echo "Error: Source parameter is missing.";
}






function delete_task($redirect_page){
    global $conn;

    $delete = "delete from dashboard where id=$_GET[id]";
    $query = mysqli_query($conn,$delete);

    if ($query) {
        
        header("location:$redirect_page");
        exit;
    }
    else{
        echo "unable to delete task";
    }
}



?>