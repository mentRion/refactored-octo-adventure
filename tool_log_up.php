<?php 
session_start();
?>

<?php  
	require 'connectDB.php';
	
	$sql = "SELECT DISTINCT t1.username, count(t0.toolid) count, t1.serialnumber
	FROM borrowed_tools t0 
	LEFT JOIN users_logs t1 on t1.id = t0.userid
	LEFT join tool t2 on t2.id = t0.toolid
	GROUP BY t0.userid";

	$result = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($result, $sql)) {
		echo '<p class="error">SQL Error</p>';
	} 
	else{
		mysqli_stmt_execute($result);
		$resultl = mysqli_stmt_get_result($result);
	
		$rows = array(); // Create an empty array to store the rows
	
		if (mysqli_num_rows($resultl) > 0) {
			while ($row = mysqli_fetch_assoc($resultl)) {
				$rows[] = $row; // Append each row to the array
			}
		}
	
		// Encode the array of rows into JSON
		echo json_encode($rows);
	}
?>