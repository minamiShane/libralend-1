<?php
    include("db.php");
    #if (!isset($_SESSION['admin_no'])) {
    #    header("Location: index.php");
    #    exit();
    #}
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
    <script>
            module.exports = {
            theme: {
                extend: {
                    margin: {
                    '300px': '300px',
                    }
                }
            }
            }
    </script>
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
        form{
            box-shadow: none;
            border: 1px solid #D1D5DB;
        }
    </style>
    <title>Update</title>
</head>
<body class="w-full">
    <?php
        include("dashboard_f.php");
    ?>
    <div style="mx-auto mt-12 ml-300px">
        <form action="" method="POST" id="reg">
        <div><h1>ADD RECORD</h1></div>
                <div class="content">
                    <label for="fname">first name</label>
                    <input type="text" name="fname" value="" autocomplete="off" required>
                    <label for="lname">last name</label>
                    <input type="text" name="lname" value="" autocomplete="off" required>
                    <label for="lid">library ID</label>
                    <input type="text" name="lid" value="" autocomplete="off" required>
                    <label for="password">password</label>
                    <input type="password" name="password" value="" autocomplete="off" required>
                </div>
                <div class="log-in">
                    <input type="submit" name="submit" value="Add Record">
                </div>
                <?php
                    if(isset($_POST['submit'])) {
                        $lid = mysqli_real_escape_string($con, $_POST['lid']);
                        $fname = mysqli_real_escape_string($con, $_POST['fname']);
                        $lname = mysqli_real_escape_string($con, $_POST['lname']);
                        $password = $_POST['password'];

                        if(!empty($lid) && !empty($password)){
                            $query = "INSERT INTO register (fname, lname, lid, password) 
                            values ('$fname', '$lname','$lid', '$password')";
                
                            mysqli_query($con, $query);
                
                            echo " <script type='text/javascript'> alert('Succesfully Added!');
                            window.location = 'users.php'</script> ";
                        } else {
                            echo " <script type='text/javascript'> alert('Enter a valid information')</script> ";
                        }
                    }
                ?>
        </form>
    </div>
</body>
</html>
