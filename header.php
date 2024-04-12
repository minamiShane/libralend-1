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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <div id="logo">
            <img src="./images/logo-nobg.png" alt="logo" width="100px">
            <h1>Libra<span>Lend</span></h1>
        </div>
        <div id="menu">
            <ul>
                <li><a href="#home" class="elements">Home</a></li>
                <li><a href="#abt" class="elements">About</a></li>
                <li><a href="#contact" class="elements">Contacts</a></li>
            </ul>
        </div>
        <div class="nav">
            <div id="r-menu">
                <ul>
                    <li><button type="button" onclick="navback()"><i class="fa-solid fa-greater-than fa-2x"></i></button></li>
                    <li><a href="#home" class="elements">Home</a></li>
                    <li><a href="#abt" class="elements">About</a></li>
                    <li><a href="#contact" class="elements">Contacts</a></li>
                </ul>
            </div>
        </div>
        <button type="button" onclick="nav()"><i class="fa-solid fa-bars fa-2x"></i></button>
    </header>
</body>
</html>