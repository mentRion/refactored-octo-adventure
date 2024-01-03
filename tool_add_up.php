<?php
	session_start();
?>

<?php

	require 'connectDB.php';

	$userid = $_POST['userid'];
	$tool = $_POST['tool'];

    if (empty($userid)) {
        echo '<p class="alert alert-danger">Please, Set the device name!!</p>';
    }
    elseif (empty($tool)) {
        echo '<p class="alert alert-danger">Please, Set the device department!!</p>';
    }
    else{

        $sql = "INSERT INTO borrowed_tools(userid, toolid) VALUES (?, ?)";
        $result = mysqli_stmt_init($conn);
        if ( !mysqli_stmt_prepare($result, $sql)){
            echo '<p class="alert alert-danger">SQL Error</p>';
        }
        else{
            mysqli_stmt_bind_param($result, "ss", $userid, $tool);
            mysqli_stmt_execute($result);
            echo 1;
        }
        mysqli_stmt_close($result); 


        $sql2 = "UPDATE `tool` SET `borrow_qty` = borrow_qty + 1 WHERE id = ?";
        $result2 = mysqli_stmt_init($conn);
    
        if (!mysqli_stmt_prepare($result2, $sql2)) {
            echo '<p class="alert alert-danger">SQL Error</p>';
        } else {
            mysqli_stmt_bind_param($result2, "i", $tool);  // Assuming $tool is an integer
            mysqli_stmt_execute($result2);
            echo 1;
        }
    
        mysqli_stmt_close($result2);
        mysqli_close($conn);
    }




    

    // //query
    // $sql = "SELECT *, (quantity - borrow_qty) as curr_qty FROM tool WHERE id = 22";
    // //init connection
    // $result = mysqli_stmt_init($conn);
    
    // if (!mysqli_stmt_prepare($result, $sql)) {
    //     echo 'test';
    // } else {
    //     mysqli_stmt_execute($result);
    //     $resultl = mysqli_stmt_get_result($result);
    
    //     if (mysqli_num_rows($resultl) > 0) {

            
            
    //     } else {
    //         echo 'Error: No records found for the given tool ID.';
    //     }
    
    //     // Encode the array of rows into JSON
    //     echo json_encode($rows);
    // }
    
    // mysqli_stmt_close($result);
    



	

?>