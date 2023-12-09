<?php  
session_start();
?>

      <?php

        //Connect to database
        require 'connectDB.php';

        $serialnumber = $_GET['serialnumber'];

        $sql = "SELECT t0.id, t1.username, t2.tool_name, t1.timein, t1.timeout, t1.checkindate
                FROM borrowed_tools t0 
                LEFT JOIN users_logs t1 on t1.id = t0.userid
                LEFT join tool t2 on t2.id = t0.toolid
                where t1.serialnumber = ".$serialnumber."";

        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo 'test';
        }
        else{
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if (mysqli_num_rows($resultl) > 0){
                while ($row = mysqli_fetch_assoc($resultl)){
                    $rows[] = $row; // Append each row to the array
                }
                echo json_encode($rows);
            }
            
            // echo json_encode($rows);
        }
        // echo $sql;
      ?>

