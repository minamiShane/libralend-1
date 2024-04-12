<?php
    session_start();
    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $lid = $_POST['lid'];
        $password = $_POST['password'];

        if(!empty($lid) && !empty($password)){
            $query = "INSERT INTO register (fname, lname, lid, password) 
            values ('$fname', '$lname','$lid', '$password')";

            mysqli_query($con, $query);

            echo " <script type='text/javascript'> alert('Succesfully Registered!');
            window.location = 'index.php'</script> ";
        } else {
            echo " <script type='text/javascript'> alert('Enter a valid information')</script> ";
        }
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
    <link rel="stylesheet" href="css.css">
    <title>Register</title>
</head>
<body>
    <style>
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
    </style>
    <div class="style_head">
        <img src="./images/logo-nobg.png" alt="logo" width="100px">
        <h1>Libra<span>Lend</span></h1>
    </div>
    <div class="cover" id="id">
        <form action="" method="POST" id="reg">
            <div><h1>Register</h1></div>
                <div class="content">
                    <label for="fname">first name</label>
                    <input type="text" name="fname" autocomplete="off" required>
                    <label for="lname">last name</label>
                    <input type="text" name="lname" autocomplete="off" required>
                    <label for="lid">library ID</label>
                    <input type="text" name="lid" autocomplete="off" required>
                    <label for="password">password</label>
                    <input type="password" name="password" autocomplete="off" required>
                </div>
                <div class="log-in">
                    <input type="submit" value="Register">
                </div>
                <div class="labels">
                    <label for="" class="dont">Already have an account? <a href="index.php">Login</a></label>
                </div>
        </form>
    </div>
</body>
</html>