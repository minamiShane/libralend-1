<?php
session_start();
include("db.php");

if(isset($_POST['return']) && isset($_POST['borrow_no'])) {
    $borrow_no = $_POST['borrow_no'];

    $update_query = "UPDATE borrow SET status = 'returned' WHERE borrow_no = $borrow_no";
    mysqli_query($con, $update_query);

    header("Location: fines.php");
    exit();
} else {
    header("Location: fines.php");
    exit();
}
?>
