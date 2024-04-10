<?php


include('connection.php');


$task_id = $_GET['id'];

$query_user = mysqli_query($conn,"select * from dashboard where id = '$task_id'");
$query_row = mysqli_fetch_assoc($query_user);
$user_id = $query_row['user_id'];

if(isset($_GET['source'])) {
    $source = $_GET['source'];
    
    // Check the source of the request and delete task accordingly
    if($source === 'client') {
        delete_task('client_dashboard.php',$task_id,$user_id); // Pass the destination URL for client dashboard
    } elseif($source === 'employee') {
        delete_task('employee_dashboard.php',$task_id,$user_id); // Pass the destination URL for employee dashboard
    } else {
        // Invalid source provided, handle the error
        echo "Error: Invalid source provided.";
    }
} else {
    // Handle the case where the source parameter is not provided
    echo "Error: Source parameter is missing.";
}





function delete_task($redirect_page,$task_id,$user_id){

    global $conn;

    $delete = "delete from dashboard where id='$task_id' && user_id = '$user_id' ";
    $delete_payment = "delete from payment where task_id='$task_id' && user_id = '$user_id' ";
    $query = mysqli_query($conn,$delete);
    $delete_query = mysqli_query($conn,$delete_payment);

    if ($query && $delete_query) {
        
        header("location:$redirect_page");
        exit;
    }
    else{
        echo "unable to delete task";
    }
}



?>