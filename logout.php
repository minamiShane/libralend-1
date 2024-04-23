
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/95d194ff11.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="shortcut icon" href="./images/logo-ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style type="text/css" >
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        label{
            margin: 32px 0 12px 0;
            font-size: 20px;
        }
        #logout{
            background: #fafcff;
            display: flex;
            flex-direction: column;
            border-radius: 5px;
            align-items: center;
            width: 480px;
            box-shadow: 0 4px 8px 0 rgba(21, 3, 3, 0.2), 0 6px 20px 0 rgba(24, 24, 22, 0.19);
        }
        div{
            display: flex;
            flex-direction: row;
        }
        button{
            font-size: 16px;
            width: 200px;
            height: 36px;
            margin-bottom: 16px;
            background: #123499;
            border: none;
            border-radius: 5px;
            color: #fffafa;
            margin: 0 8px 16px 8px;
        }
    </style>
</head>
<body>
    <form method="POST" id="logout">
        <label for="">Are you sure you want to log out?</label>
        <div>
            <button type="submit" name="yes" id="yes">yes</button>
            <button type="submit" name="no" id="no" >cancel</button>
        </div>
    </form>
</body>
</html>
<?php
    session_start();

    if(isset($_POST['yes'])){
        $_SESSION['session_status'] = 0;
        unset($_SESSION['lid']);
        unset($_SESSION['admin_no']);
        unset($_SESSION['session_status']);
        session_destroy();
        ?>
        <script type="text/javascript" >
            window.location = "index.php";
        </script>
        <?php
    }elseif(isset($_POST['no'])){
        ?>
        <script type="text/javascript" >
            window.location = "dashb.php";
        </script>
        <?php
    }

?>
