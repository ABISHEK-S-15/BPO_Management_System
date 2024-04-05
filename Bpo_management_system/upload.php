<?php
session_start();
include('connection.php');

if (isset($_POST['Submit'])) {
    $user_id = $_SESSION['USER_ID'];
    $task_id = $_GET['id'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
        $final_filename = $_FILES['pdfFile']['name'];
        $folder_path = $targetDir;

        // Prevent SQL Injection using prepared statements
        $stmt = $conn->prepare("UPDATE dashboard SET final_filename=?, final_folderpath=? WHERE id=? AND user_id=?");
        $stmt->bind_param("ssii", $final_filename, $folder_path, $task_id, $user_id);
        $stmt->execute();
        $stmt->close();

        header("Location: employee_dashboard.php");
        exit(); // Always exit after header redirect
    } else {
        echo "Failed to upload file.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo2.png" type="x-icon" >
    <title>UPLOAD</title>
    <link rel="stylesheet" href="upload.css">
</head>
<body>
    <div class="main-container">
        <div style="margin-bottom: 40px;">
            <h1 class="head">File Upload</h1>
        </div>
        <form method="post" enctype="multipart/form-data">
        <label class="file-text">File Upload:</label>
        <input type="file" id="pdfFile" name="pdfFile" required>
        <br>
        <input type="submit"  name="Submit" value="Upload"><br>
        </form>
        <a href="employee_dashboard.php"><button class="cancle-btn">Cancel</button></a>
    </div>
</body>
</html>