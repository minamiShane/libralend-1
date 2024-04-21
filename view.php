<?php
session_start();
include("db.php");
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
    <title>View</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
            'blue': '#123499',
            '300':'75rem',
          }
        }
      }
    }
    </script>
    <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
    </style>
</head>
<body>
   <?php
   include('dashboard_f.php');
   if(isset($_GET['student_no'])){
    $s_n = $_GET['student_no'];
    $q_cust = $con->query("SELECT * FROM register WHERE student_no = '$s_n'");
    $r_cust = $q_cust->fetch_assoc();
  }
   ?>
   <div class="ml-72 mt-12 border-dashed border-2 mr-12">
      <div class="my-2 p-4">
        <h1 class="text-2xl font-semibold ml-8 text-[#123499]">USER PERSONAL INFORMATION</h1>
      </div>
      <div class="my-2 p-4">
        <h1 class="text-xl font-semibold my-1 text-[#123499]">First Name</h1>
        <p class="text-xl ml-4"><?=$r_cust['fname'];?></p>
      </div>
      <div class="my-2 p-4">
        <h1 class="text-xl font-semibold my-1 text-[#123499]">Last Name</h1>
        <p class="text-xl ml-4"><?=$r_cust['lname'];?></p>
      </div>
      <div class="my-2 p-4">
        <h1 class="text-xl font-semibold my-1 text-[#123499]">Library ID</h1>
        <p class="text-xl ml-4"><?=$r_cust['lid'];?></p>
      </div>
      <div class="my-2 p-4">
        <h1 class="text-xl font-semibold my-1 text-[#123499]">Contact No.</h1>
        <p class="text-xl ml-4"><?=$r_cust['contact_no'];?></p>
      </div>
      <div class="my-2 p-4">
        <h1 class="text-2xl font-semibold my-1 ml-8 text-[#123499]">ADDRESS</h1>
        <h1 class="text-xl font-semibold text-[#123499]">Barangay</h1>
        <p class="text-xl ml-4"><?=$r_cust['barangay'];?></p>
        <h1 class="text-xl font-semibold my-1 text-[#123499]">Municipality</h1>
        <p class="text-xl ml-4"><?=$r_cust['municipality'];?></p>
        <h1 class="text-xl font-semibold my-1 text-[#123499]">Province</h1>
        <p class="text-xl ml-4"><?=$r_cust['province'];?></p>
      </div>
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
</body>
</html>

