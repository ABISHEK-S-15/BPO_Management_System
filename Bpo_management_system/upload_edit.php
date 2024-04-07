<?php
session_start();
    include('connection.php');

   
    if (isset($_POST['edit'])) {
        $user_id = $_SESSION['USER_ID'];
        $task_id = $_POST['id'];
    
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            $final_filename = $_FILES['pdfFile']['name'];
            $folder_path = $targetDir;
    
            // Prevent SQL Injection using prepared statements
            $stmt = $conn->prepare("UPDATE dashboard SET final_filename=?, final_folderpath=? WHERE id=? AND user_id=?");
            $stmt->bind_param("ssii", $final_filename, $folder_path, $task_id,$user_id);
            $stmt->execute();
            $stmt->close();
    
            header("Location: employee_dashboard.php");
            exit(); // Always exit after header redirect
        } else {
            echo "Failed to upload file.";
        }
    }
 


?>