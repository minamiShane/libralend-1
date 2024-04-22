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
    <link rel="shortcut icon" href="./images/logo-ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

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
    <title>
        Book Borrow
    </title>
    <style>
        th, td{
            padding: 12px;
        }
        .even-row {
          background-color: #f3f3f3;
        }
        form {
    background: #fafcff;

    align-items: center;
    transition: opacity 0.4s ease;
}
.content input {
    font-size: 16px;
    width: 226px;
    height: 32px;
    border: #c9ccd1 1px solid;
    border-radius: 5px;
}
.log-in input {
    font-size: 16px;
    width: 230px;
    height: 36px;
    margin-bottom: 16px;
    background: #123499;
    border: none;
    border-radius: 5px;
    color: #fffafa;
}.content label, .content input{
    margin: 16px 0;
}
.content {
    justify-content: center;
    display: flex;
    flex-direction: column;
    margin: 8px 0;
}
    </style>
</head>
<body>


<script>
      //for dashboard
    window.addEventListener('DOMContentLoaded', (event) => {
      var user = document.getElementById('user');
      var userlogo = document.getElementById('userlogo');
      if (window.location.href.indexOf("user_profile.php") !== -1) {
         if (home) {
            user.style.backgroundColor = '#0b6317';
            user.style.color = '#fcfaff';
            userlogo.style.color = '#fcfaff';
         }
       }
   });
   </script>
   <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
  </button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
        <li>
            <a href="" class="flex items-center text-xl text-gray-900">
                <img src="./images/logo-nobg.png" alt="" width="70px">
                <span>
                <?php
                  $lid = $_SESSION['lid'];
                  $sel = "SELECT * FROM register WHERE lid='$lid'";
                  $query = mysqli_query($con, $sel);

                  if(mysqli_num_rows($query) == 1) {
                    $result = mysqli_fetch_assoc($query);
                    $fname = $result['fname'];
                    $lname = $result['lname'];
                    echo "<p class='flex-1 ms-3' >".$fname." ".$lname."</p>";
                  }
                ?>
                </span>
            </a>
        </li>
        <li>
            <a href="user_profile.php" id="user" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
               <svg id="userlogo" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
            </a>
         </li>
         <li>
            <a href="user_page.php" id="home" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
              <i id="icon" class="fa-solid fa-house fa-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white"></i>
              <span class="ms-3">Home</span>
            </a>
         </li>
         <li>
            <a href="borrow_book.php" id="users" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
            <i id="i-borrow" class="fa-solid fa-address-book fa-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21" id="books"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Book Borrow</span>
            </a>
         </li>
         <li>
         <li>
            <a href="users_fine.php" id="fine" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
              <i id="fines" class="fa-solid fa-coins fa-xl mt-3 flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18 " id="reserve"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Fines</span>
            </a>
         </li>
         <li>
            <a href="logout.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
<div style="margin-left: 300px" id="div" class="flex align-center justify-center">
                  <?php
                  if($_SERVER['REQUEST_METHOD'] == "POST"){
                        if(isset($_POST['student_no'])){
                            $s_n = $_POST['student_no'];
                            $q_cust = $con->query("SELECT * FROM register WHERE lid = '$s_n'");
                            $r_cust = $q_cust->fetch_assoc();
                  ?>
        <form action="" method="POST" id="reg" class="mt-16 flex-column w-2/3 ">
        <div><h1 class="text-4xl font-bold text-gray-900">UPDATE</h1></div>
        <div class="grid grid-cols-2 gap 4">
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
                <div class="content">
                <label for="lid">contact no</label>
                <input type="text" name="lid" value="<?=$r_cust['contact_no'];?>" autocomplete="off" required>
                    <label for="lid">barangay</label>
                    <input type="text" name="brgy" value="<?=$r_cust['barangay'];?>" autocomplete="off" required>
                    <label for="lid">municipality</label>
                    <input type="text" name="muni" value="<?=$r_cust['municipality'];?>" autocomplete="off" required>
                    <label for="lid">province</label>
                    <input type="text" name="prov" value="<?=$r_cust['province'];?>" autocomplete="off" required>
                </div>
                <div class="log-in">
                    <input type="submit" name="submit" value="Update">
                </div>
                <?php
                        }
                  }
                ?>
        </form>
        <?php
                    if(isset($_POST['submit'])) {
                        $lid = mysqli_real_escape_string($con, $_POST['lid']);
                        $fname = mysqli_real_escape_string($con, $_POST['fname']);
                        $lname = mysqli_real_escape_string($con, $_POST['lname']);
                        $password = $_POST['password'];
                        $brgy = mysqli_real_escape_string($con, $_POST['brgy']);
                        $muni = mysqli_real_escape_string($con, $_POST['muni']);
                        $prov = mysqli_real_escape_string($con, $_POST['prov']);

                        $query = "UPDATE register 
                        SET lid = '$lid', 
                        fname = '$fname', 
                        lname = '$lname', 
                        password = '$password',  
                        barangay = '$brgy',
                        municipality = '$muni',
                        province = '$prov'
                        WHERE student_no = '$lid'";

                        if(mysqli_query($con, $query)) {
                            ?>
                                <script type="text/javascript">
                                    alert("Successfully Updated!");
                                    window.location = "user_profile.php";
                                </script>
                            <?php
                            exit();
                        } else {
                            ?>
                            <script type="text/javascript">
                                alert("Failed to update!");
                                window.location = "user_profile.php";
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert("Failed to update!");
                            window.location = "user_profile.php";
                        </script>
                        <?php  
                    }
                ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>