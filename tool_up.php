<?php
session_start();
?>

<?php
require 'connectDB.php';
$sql = "SELECT
		t3.id,
		t3.device_date,
		t3.tool_name,
		t3.tool_descrip,
		t3.quantity - COALESCE((
		SELECT DISTINCT COUNT(t0.toolid)
		FROM borrowed_tools t0
		LEFT JOIN users_logs t1 ON t1.id = t0.userid
		LEFT JOIN tool t2 ON t2.id = t0.toolid
		WHERE t1.timeout = '00:00:00' AND t0.toolid = t3.id
		GROUP BY t0.toolid, t2.tool_name
		), 0) AS quantity
		FROM
		tool t3";

//$sql = "SELECT * FROM tool";

$result = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($result, $sql)) {
	echo 'test';
} else {
	mysqli_stmt_execute($result);
	$resultl = mysqli_stmt_get_result($result);
	if (mysqli_num_rows($resultl) > 0) {
		while ($row = mysqli_fetch_assoc($resultl)) {
			$rows[] = $row; // Append each row to the array
		}
	}

	// Encode the array of rows into JSON
	echo json_encode($rows);
}
?>