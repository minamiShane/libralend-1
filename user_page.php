<?php
    session_start();
    include("db.php");

    if (!isset($_SESSION['lid'])) {
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/95d194ff11.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="shortcut icon" href="./images/logo-ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>
    <?php
            $lid = $_SESSION['lid'];
            $sel = "SELECT * FROM register WHERE lid='$lid'";
            $query = mysqli_query($con, $sel);

            if(mysqli_num_rows($query) == 1) {
                $result = mysqli_fetch_assoc($query);
                $fname = $result['fname'];
                $lname = $result['lname'];
                echo $fname . " " . $lname;
            }
    ?>
    </title>
</head>
<body>
    
</body>
</html>