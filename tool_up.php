<?php 
session_start();
?>

			<?php  
		    	require 'connectDB.php';
		    	$sql = "SELECT * FROM tool ORDER BY id DESC";
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