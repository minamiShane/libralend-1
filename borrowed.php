<?php
    session_start();
    include('db.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['codes']) && isset($_POST['borrow_no']) && isset($_POST['number_created'])) {
            $input_code = $_POST['codes'];
            $borrow_no = $_POST['borrow_no'];
            $number_created = $_POST['number_created'];

            // Fetch the number_created from the database for the given borrow_no
            $qry_cd = "SELECT number_created FROM borrow WHERE borrow_no = '$borrow_no'";
            $result = mysqli_query($con, $qry_cd);

            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $stored_code = $row['number_created'];

                // Compare the inputted code with the stored one
                if($input_code === $stored_code) {
                    // Codes match, update the borrow status and display dates
                    $today = date("Y-m-d");
                    $due = date("Y-m-d", strtotime("+7 weekdays"));

                    $update_query = "UPDATE borrow SET date_borrow = '$today', due_date = '$due', status = 'borrowed' WHERE borrow_no = '$borrow_no'";
                    if(mysqli_query($con, $update_query)) {
                        echo "<script type='text/javascript'>
                                alert('Successfully borrowed this book.');
                                window.location = 'borrow.php';
                              </script>";
                    } else {
                        echo "<script type='text/javascript'>
                                alert('Error updating borrow status.');
                                window.location = 'borrow.php';
                              </script>";
                    }
                } else {
                    // Codes don't match, show error message
                    echo "<script type='text/javascript'>
                            alert('Incorrect code.');
                            window.location = 'borrow.php';
                          </script>";
                }
            } else {
                // Borrow number not found in the database
                echo "<script type='text/javascript'>
                        alert('Invalid borrow number.');
                        window.location = 'borrow.php';
                      </script>";
            }
        } else {
            // Form fields are not properly set
            echo "<script type='text/javascript'>
                    alert('Form fields are missing.');
                    window.location = 'borrow.php';
                  </script>";
        }
    }
?>
