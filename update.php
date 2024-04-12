<?php
    include("db.php");
    if(isset($_GET['student_no'])){
        $s_n = $_GET['student_no'];
        $q_cust = $con->query("SELECT * FROM register WHERE student_no = '$s_n'");
        $r_cust = $q_cust->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <script src="https://kit.fontawesome.com/95d194ff11.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="shortcut icon" href="./images/logo-ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body{
            height: 100vh;
        }
        #div{
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .style_head{
            display: flex;
            justify-content: center;
            align-items: center;
            position: sticky;
        }
        .style_head h1{
            color: #123499;
        }
        h1 span {
            color: #0b6317;
        }
        form div h1 {
            color: #123499;
        }
        label {
            color: #123499;
        }
        .log-in input{
            background-color: #123499;
        }
        label a {
            color: #0b6317;
            text-decoration: none;
        }
        form
        {
            box-shadow: none;
            border: 1px solid #D1D5DB;
        }
    </style>
    <title>Update</title>
</head>
<body>
    <?php
        include("dashboard_f.php");
    ?>
    <div style="margin-left: 300px" id="div">
        <form action="" method="POST" id="reg">
        <div><h1>UPDATE</h1></div>
                <div class="content">
                    <label for="fname">first name</label>
                    <input type="text" name="fname" value="<?=$r_cust['fname'];?>" autocomplete="off" required>
                    <label for="lname">last name</label>
                    <input type="text" name="lname" value="<?=$r_cust['lname'];?>" autocomplete="off" required>
                    <label for="lid">library ID</label>
                    <input type="text" name="lid" value="<?=$r_cust['lid'];?>" autocomplete="off" required>
                    <label for="password">password</label>
                    <input type="text" name="password" value="<?=$r_cust['password'];?>" autocomplete="off" required>
                </div>
                <div class="log-in">
                    <input type="submit" name="submit" value="Update">
                </div>
                <?php
                    if(isset($_POST['submit'])) {
                        $lid = mysqli_real_escape_string($con, $_POST['lid']);
                        $fname = mysqli_real_escape_string($con, $_POST['fname']);
                        $lname = mysqli_real_escape_string($con, $_POST['lname']);
                        $password = $_POST['password'];

                        $query = "UPDATE register 
                        SET lid = '$lid', 
                        fname = '$fname', 
                        lname = '$lname', 
                        password = '$password' 
                        WHERE student_no = '$s_n'";

                        if(mysqli_query($con, $query)) {
                            ?>
                                <script type="text/javascript">
                                    alert("Successfully Updated!");
                                    window.location = "users.php";
                                </script>
                            <?php
                            exit();
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert("Failed to update!");
                                window.location = "update.php?student_no=<?=$s_n;?>";
                            </script>
                            <?php
                        }
                    }
                ?>
        </form>
    </div>
</body>
</html>
