<?php
    include('connection.php');
    if(isset($_POST['update']))
    {
       $query = "update dashboard set status = '$_POST[status]' where id=$_GET[id]";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            $query = "select * from dashboard where id = $_GET[id]";
            $query_run = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($query_run))
            {
                ?>
        <form method="post">
            <div>
                <input type="hidden" name="id" class="" value="" required>
            </div>
            <div>
                <label></label>
                <select name="status" required>
                    <option>-Select-</option>
                    <option>In-Progress</option>
                    <option>Completed</option>
                </select>
            </div>
            <input type="submit" class="" name="update" value="update">
        </form>
        <?php
            }
            ?>
    </div>
</body>
</html>
