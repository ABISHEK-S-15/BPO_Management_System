<?php
session_start();
include('connection.php');



if (isset($_POST['edit'])) {
  $amount = $_POST['amount'];
  $task_id = $_POST['id'];

  // Fetch user_id from dashboard based on task_id
  $query = "SELECT user_id FROM dashboard WHERE id = $task_id";
  $query_run = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($query_run);

  if ($row) {
    $user_id = $row['user_id'];

    // Check if payment entry already exists for this user_id and task_id
    $check_query = "SELECT * FROM payment WHERE user_id='$user_id' AND task_id = '$task_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
      // Update payment entry
      $update_query = "UPDATE payment SET req_amt = '$amount' WHERE task_id = $task_id AND user_id = $user_id";
      $update_result = mysqli_query($conn, $update_query);

      if ($update_result) {
        echo "<script type='text/javascript'>
                          window.location.href = 'employee_dashboard.php';
                        </script>";
      } else {
        echo "<script type='text/javascript'>
                          alert('Failed to update payment information');
                          window.location.href = 'employee_dashboard.php';
                        </script>";
      }
    } else {
      // Insert new payment entry
      $insert_query = "INSERT INTO payment (user_id, task_id, req_amt) VALUES ('$user_id', '$task_id', '$amount')";
      $insert_result = mysqli_query($conn, $insert_query);

      if ($insert_result) {
        echo "<script type='text/javascript'>
                          window.location.href = 'employee_dashboard.php';
                        </script>";
      } else {
        echo "<script type='text/javascript'>
                          alert('Failed to insert payment information');
                          window.location.href = 'employee_dashboard.php';
                        </script>";
      }
    }
  } else {
    echo "<script type='text/javascript'>
                  alert('User or task not found');
                  window.location.href = 'employee_dashboard.php';
                </script>";
  }
}
