<?php
include('connection.php');
$sql = "select * from dashboard";
$result=$conn->query($sql);

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo2.png" type="x-icon" >
    <title>DOWNLOAD</title>
    <link rel="stylesheet" href="download.css">   
</head>
<body>
    <div>
        <div class="back-btn-con">
            <a href="client_dashboard.php"><button class="back-btn">Back</button></a>
        </div>
        <div class="head-con">
            <h1 class="heading">Download Files</h1>
        </div>
        <div class="table-container">
            <table>
                <thead >
                    <tr class="column-head">
                        <th>S.No</th>
                        <th>File Name</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count=1;
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            echo "<tr class='column-value'>";
                            echo "<td>".$count."</td>";
                            echo "<td>".$row['filename']."</td>";
                            echo '<td><a href="uploads/'.$row['folderpath'].'" download"><button class="download-btn">Download</button></a></td>';
                            echo "</tr>";
                            $count++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>