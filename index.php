<?php
    session_start();
    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $lid = $_POST['lid'];
        $password = $_POST['password'];

        $username = $_POST['lid'];
        $a_pass = $_POST['password'];

        if(!empty($lid) && !empty($password)){
            $query = "SELECT * FROM register WHERE lid='$lid' AND password='$password'";
            $result = mysqli_query($con, $query);

            $q_admin = "SELECT * FROM admin WHERE username='$lid' AND password='$password'";
            $r_admin = mysqli_query($con, $q_admin);
            
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if($row['lid']== $lid && $row['password']== $password){
                    $_SESSION['lid'] = $lid;
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    header("Location: user_page.php");
                }
            } elseif(mysqli_num_rows($r_admin) == 1){
                $row = mysqli_fetch_assoc($r_admin);
                if($row['username']== $lid && $row['password']== $password){
                    $_SESSION['admin_no'] = $lid;
                    $_SESSION['name'] = $row['name'];
                    header("Location: dashb.php");
                }
            }else{
                echo "<script type='text/javascript'>
                    alert('Invalid library ID or password');
                    window.location = 'index.php';
                </script>";
                exit();
            }
        } else {
            echo "<script type='text/javascript'>
                alert('Please enter library ID and password');
                window.location = 'index.php';
            </script>";
            exit();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css folder/style.css">
    <script src="https://kit.fontawesome.com/95d194ff11.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="shortcut icon" href="./images/logo-ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <title>LibraLend</title>
</head>
<body>
    <div class="cover" id="home">
        <?php
            include("header.php");
        ?>
        <div class="login-form">
            <div class="banner">
                <h1>Borrowing Made Simple, <span>Reading Made Rich</span>.</h1>
                <p>LibraLend transforms the borrowing experience, making it effortless and efficient. Our user-friendly platform makes it easy to access a vast library of books with a single click.
                </p>
            </div>
            <form action="" method="POST" id="log">
                <div>
                    <h1>Log In</h1>
                </div>
                <div class="content">
                    <label for="lid">library ID</label>
                    <input type="text"  name="lid" class="user" autocomplete="off" required>
                    <p id="em"></p>
                    <label for="password">password</label>
                    <input type="password" name="password"  autocomplete="off" required>
                    <p id="pw"></p>
                </div>
                <div class="log-in">
                    <input type="submit" value="Log in">
                </div>
                <div class="labels">
                    <label for="" class="dont">Don't have an account? <a href="register.php">Register</a></label>
                    <a href="" class="fp">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>
    <div class="about" id="abt">
        <h1 id="about" class="reveal">About</h1>
        <div class="info reveal">
            <div class="container">
                <img src="./images/mission.png" alt="mission">
                <h1>Mission</h1>
                <p><b>LibraLend</b> is to promote literacy and lifelong learning by providing easy access to a diverse range of reading materials for our users. We believe that everyone should have the opportunity to explore the world of literature and expand their knowledge through reading.</p>
            </div>
            <div class="container">
                <img src="./images/overview.png" class="m" alt="overview">
                <h1>Overview</h1>
                <p><b>LibraLend</b> is a user-friendly platform designed to simplify the borrowing process for readers of all ages. With our extensive collection of books spanning various genres and subjects, users can easily <u>discover</u>,<u> borrow</u> , and <u>enjoy</u> their favorite reads from the comfort of their own homes.</p>
            </div>
            <div class="container">
                <img src="./images/history.png" alt="history">
                <h1>History</h1>
                <p>Established in <u>2024</u>, LibraLend has been dedicated to connecting readers with books since its inception. What started as a passion project has evolved into a comprehensive borrowing system, serving thousands of users across <b>Occidental Mindoro State College - Mamburao Campus</b>.</p>
            </div>
        </div>
        <div class="reveal">
            <h1>Team</h1>
        </div>
        <div class="creator reveal" >
            <div class="crtr">
                <img src="./images/mypic-fotor-20240322103239.jpg" alt="">
                <div class="icons">
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                </div>
                <h1>Shane Rey Nepomuceno</h1>
            </div>
            <div class="crtr">
                <img src="./images/lennox-fotor-20240322103023.jpg" alt="">
                <div class="icons">
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                </div>
                <h1>Lennox Pedraza</h1>
            </div>
            <div class="crtr">
                <img src="./images/jera-fotor-20240322101745.jpg" alt="">
                <div class="icons">
                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-square-instagram"></i>
                </div>
                <h1>Jera Rejane Cassandra Corteza</h1>
            </div>
        </div>
    </div>
    <div id="contact">
        <form action="https://api.web3forms.com/submit" method="POST" id="cntct" class="reveal">
            <h1>Contact</h1>
            <div class="cntnt">
                <input type="hidden" name="access_key" value="302be584-3f4d-48db-92b0-59f1224241f6">
                <label for="">name</label>
                <input type="text" name="name" autocomplete="off" required>
                <label for="">email</label>
                <input type="email" name="email" autocomplete="off" required>
                <label for="">message</label>
                <textarea name="message" id="txtarea" cols="30" rows="10"></textarea>
                <button type="submit" value="send message" id="btnn" ><i class="fa-solid fa-paper-plane" style="margin-right: 12px;"></i>send message</button>
            </div>
        </form>
    </div>
    <footer class="information">
        <div class="p">
            <i class="fa-solid fa-user"></i>
            <p>LibraLend : Shane Rey Nepomuceno</p>
        </div>
        <div class="p">
            <i class="fa-solid fa-envelope"></i>
            <p>nshanerey@gmail.com</p>
        </div>
        <div class="p">
            <i class="fa-solid fa-phone"></i>
            <p>+63-995-8714-009</p>
        </div>
        <div class="p">
            <i class="fa-solid fa-location-dot"></i>
            <p>Mamburao, Occidental Mindoro</p>
        </div>
    </footer>
    <footer class="bottom">
        <p>Copyright © 2024 All rights reserved.</p>
    </footer>
</body>
</html>
