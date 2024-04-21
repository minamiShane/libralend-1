<?php
session_start();
include("db.php");

function calculateFines($due_date) {
    $current_date = date('Y-m-d');
    $date_diff = strtotime($current_date) - strtotime($due_date);
    $days_diff = floor($date_diff / (60 * 60 * 24));
    if ($days_diff > 0) {
        $fines = $days_diff * 10;
        return $fines;
    }
    return 0; 
}

if (isset($_POST['calculate_fines'])) {
    $query = "SELECT borrow_no, due_date FROM borrow";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $borrow_no = $row['borrow_no'];
            $due_date = $row['due_date'];
            $fines = calculateFines($due_date);
            
            $update_query = "UPDATE borrow SET fines = $fines WHERE borrow_no = $borrow_no";
            mysqli_query($con, $update_query);
        }
    }
    header("Location: borrow.php");
    exit();
}
?>
