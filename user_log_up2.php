<?php  
session_start();
?>

<?php

//Connect to database
require 'connectDB.php';


// $username = $_GET['username'];
$searchQuery = " ";
$Start_date = date("Y-m-d");
$End_date = date("Y-m-d");
$Start_time = " ";
$End_time = " ";
$Card_sel = " ";
$dev_uid = " ";

        
if (isset($_GET['log_date'])) {
    //Start date filter
    if ($_GET['date_sel_start'] != 0) {
        $Start_date = $_GET['date_sel_start'];
        $_SESSION['searchQuery'] = "checkindate='".$Start_date."'";
    }
    else{
        $Start_date = date("Y-m-d");
        $_SESSION['searchQuery'] = "checkindate='".date("Y-m-d")."'";
    }
    //End date filter
    if ($_GET['date_sel_end'] != 0) {
        $End_date = $_GET['date_sel_end'];
        $_SESSION['searchQuery'] = "checkindate BETWEEN '".$Start_date."' AND '".$End_date."'";
    }
    //Time-In filter
    if ($_GET['time_sel'] == "Time_in") {
    //Start time filter
    if ($_GET['time_sel_start'] != 0 && $_GET['time_sel_end'] == 0) {
        $Start_time = $_GET['time_sel_start'];
        $_SESSION['searchQuery'] .= " AND timein='".$Start_time."'";
    }
    elseif ($_GET['time_sel_start'] != 0 && $_GET['time_sel_end'] != 0) {
        $Start_time = $_GET['time_sel_start'];
    }
    //End time filter
    if ($_GET['time_sel_end'] != 0) {
        $End_time = $_GET['time_sel_end'];
        $_SESSION['searchQuery'] .= " AND timein BETWEEN '".$Start_time."' AND '".$End_time."'";
    }
    }
    //Time-out filter
    if ($_GET['time_sel'] == "Time_out") {
    //Start time filter
    if ($_GET['time_sel_start'] != 0 && $_GET['time_sel_end'] == 0) {
        $Start_time = $_GET['time_sel_start'];
        $_SESSION['searchQuery'] .= " AND timeout='".$Start_time."'";
    }
    elseif ($_GET['time_sel_start'] != 0 && $_GET['time_sel_end'] != 0) {
        $Start_time = $_GET['time_sel_start'];
    }
    //End time filter
    if ($_GET['time_sel_end'] != 0) {
        $End_time = $_GET['time_sel_end'];
        $_SESSION['searchQuery'] .= " AND timeout BETWEEN '".$Start_time."' AND '".$End_time."'";
    }
    }
    //Card filter
    if ($_GET['card_sel'] != 0) {
        $Card_sel = $_GET['card_sel'];
        $_SESSION['searchQuery'] .= " AND card_uid='".$Card_sel."'";
    }
    //Department filter
    if ($_GET['dev_uid'] != 0) {
        $dev_uid = $_GET['dev_uid'];
        $_SESSION['searchQuery'] .= " AND device_uid='".$dev_uid."'";
    }
}

if ($_GET['select_date'] == 1) {
    $Start_date = date("Y-m-d");
    $_SESSION['searchQuery'] = "checkindate='".$Start_date."'";
}

//$sql = "SELECT * FROM users_logs WHERE checkindate=? AND pic_date BETWEEN ? AND ? ORDER BY id ASC";
$sql = "SELECT username, COUNT(*) as count FROM users_logs WHERE ".$_SESSION['searchQuery']." GROUP BY username ORDER BY username";

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
    // http://localhost/rfidattendance/user_log_up2.php?select_date=0&log_date=2023-01-01&date_sel_start=2023-01-01&date_sel_end=2023-12-31&time_sel=&card_sel=0&dev_uid=0
    // Encode the array of rows into JSON
    echo json_encode($rows);
    }
// echo $sql;
?>
