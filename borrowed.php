<?php
    session_start();
    include('db.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['borrow_no']){
            $borrow_no = $_POST['borrow_no'];
            $qry_cd = "SELECT * FROM borrow WHERE borrow_no = '$borrow_no'";
            $number = mysqli_query($con, $qry_cd);

            if(mysqli_num_rows($number) > 0){
            $number_created = mysqli_fetch_assoc($number);
            $num = $number_created['borrow_no'];

            $today = strtotime(date("Y-m-d"));
            $due = strtotime("+7 weekdays", $today);


            $today = date("Y-m-d", $today);
            $due = date("Y-m-d", $due);


            if($borrow_no == $num){
                $in = "UPDATE borrow SET date_borrow = '$today', due_date = '$due', status = 'borrowed' WHERE borrow_no = '$borrow_no'";
                mysqli_query($con, $in);

                $his = "UPDATE history SET date_borrow = '$today', due_date = '$due', status = 'borrowed' WHERE borrow_no = '$borrow_no'";
                mysqli_query($con, $his);
                echo"
                <script type='text/javascript'>
                    alert('Successfully borrowed this book.');
                    window.location = 'borrow.php';
                </script>
            ";
            }else{
            echo"
                <script type='text/javascript'>
                    alert('unsuccessfull transaction, please try again.');
                    window.location = 'borrow.php';
                </script>
            ";
            }
            }
        }
    }
?>