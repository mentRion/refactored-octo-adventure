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
    mysqli_close($conn);
    }
	

?>