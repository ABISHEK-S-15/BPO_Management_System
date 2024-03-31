<?php
include('connection.php');

?>

<?php 



 if (isset($_POST['Submit'])) 
 {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename ($_FILES["pdfFile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
      $filename=$_FILES['pdfFile']['name'];
      $folder_path = $targetDir;}
    mysqli_query($conn,"insert into dashboard(filename,folderpath)
    value ('$filename','$folder_path')");

    header("location:employee_dashboard.php");
  }

    
    
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
</head>
<body>
    <div class="main-container">
        <div style="margin-bottom: 40px;">
            <h1 class="head">File Upload</h1>
        </div>
        <form method="post" enctype="multipart/form-data">
        <label class="file-text">File Upload:</label>
        <input type="file" id="pdfFile" name="pdfFile">
        <br>
        <input type="submit"  name="Submit" value="Submit"><br>
        <a href=""><button class="cancle-btn">Cancel</button></a>
        </form>
    </div>
</body>
</html>