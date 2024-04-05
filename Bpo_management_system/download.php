<?php
session_start();
include('connection.php');

if (!isset($_SESSION['USER_ID'])) {
    header("location:index.php");
    exit(); // Terminate script execution after redirection
}

$user_id = $_SESSION['USER_ID'];


// Check if the 'source' parameter is set and valid
if(isset($_GET['source']) && ($_GET['source'] === 'employee' || $_GET['source'] === 'client')) {
    // Include necessary files or connect to the database if required
    
    
    if(isset($_GET['id'])) {
        $task_id = $_GET['id'];
        
        
        
        if($_GET['source'] === 'employee') {

            $query = "select * from dashboard where id = '$task_id' && user_id = '$user_id' ";
            $queryrun = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($queryrun);

                if ($row){
                    $filename = $row['filename'];
                    $folderpath = $row['folderpath'];
                    download_file('employee_dashboard.php',$filename,$folderpath);
                }
            



        } 
        elseif ($_GET['source'] === 'client') {

            $query1 = "select * from dashboard where id = '$task_id' && user_id = '$user_id' ";
            $queryrun1 = mysqli_query($conn,$query1);
            $row1 = mysqli_fetch_array($queryrun1);

                if ($row1){
                    $filename = $row1['final_filename'];
                    $folderpath = $row1['final_folderpath'];
                    download_file('client_dashboard.php',$filename,$folderpath);
                }
           


        }
    }
    
    else {
        $msg="Couldn't get Task Id";
        echo"<script>
        alert('$msg');
        </script>";
    }
}

else {
    $msg="Couldn't get Source !";
    echo"<script>
    alert('$msg');
    </script>";
}





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
<?php
    function download_file($redirect_Page,$filename, $folderpath){

       ?> 
    <div>
        <div class="back-btn-con">
        <a href="<?php echo $redirect_Page; ?>"><button class="back-btn">Back</button></a>

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
                        <th>Innovoice</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        static $count = 1; // Static variable to maintain count across function calls
                        echo "<tr class='column-value'>";
                        echo "<td>".$count."</td>";
                        echo "<td>".$filename."</td>";
                        echo '<td><a href="uploads/'.$filename.'" download><button class="download-btn">Download</button></a></td>';
                        echo "</tr>";
                        $count++;
                 ?>
                </tbody>
            </table>
        </div>
    
       
        </div>

        
    <?Php  }   ?>


</body>
</html>