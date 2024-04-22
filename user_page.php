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


<script>
      //for dashboard
    window.addEventListener('DOMContentLoaded', (event) => {
      var home = document.getElementById('home');
      var home_icon = document.getElementById('icon');
      if (window.location.href.indexOf("user_page.php") !== -1) {
         if (home) {
            home.style.backgroundColor = '#0b6317';
            home.style.color = '#fcfaff';
            home_icon.style.color = '#fcfaff';
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
            <a href="user_profile.php" id="users" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
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
               <span class="flex-1 ms-3 whitespace-nowrap">Borrowed Books</span>
            </a>
         </li>
         <li>
         <li>
            <a href="users_fine.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
              <i class="fa-solid fa-coins fa-xl mt-3 flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18 " id="reserve"></i>
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

<?php

?>
<div class="p-4 sm:ml-64 h-full grid justify-items-center">  
      <form class="sticky top-5 flex items-center w-1/2 mx-auto">   
         <label for="simple-search" class="sr-only">Search</label>
         <div class="relative w-full items-center">
            <div class="absolute inset-y-0 start-0 mt-5 flex items-center ps-3 pointer-events-none">
            <i class="fa-solid fa-book fa-xl w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21" id="books"></i>
            </div>
            <input type="text" name="srch_val" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Book..." required />
         </div>
         <button type="submit" name="search" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
         </button>
      </form>
      <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to borrow this book?</p>
            <label for="terms" class="mb-4 text-gray-500 flex items-center justify-center">
              <input type="checkbox" id="terms" class="mr-2" onchange="toggleButton()">
              <span class="text-gray-600 dark:text-gray-400">I agree to the <a href="borrow_tnc.php" class="underline">terms and conditions</a></span>
            </label>
            <div class="flex justify-center items-center space-x-4">

            </div>
        </div>
    </div>
    <script>
    function toggleButton() {
        var termsCheckbox = document.getElementById("terms");
        var yesButton = document.getElementById("yesButton");

          if (termsCheckbox.checked) {
              yesButton.disabled = false;
          } else {
              yesButton.disabledd = true;
        }
      }
    </script>
</div>
        <div class="mt-8 grid grid-cols-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <?php
            $name = $_SESSION['lid'];
            $sel = "SELECT * FROM admin WHERE name='$name'";
            $query = mysqli_query($con, $sel);

            if(mysqli_num_rows($query) == 1) {
                $result = mysqli_fetch_assoc($query);
                $name = $result['name'];
            }
         ?>
        <?php
        if(isset($_GET['srch_val'])) {
            $search = mysqli_real_escape_string($con, $_GET['srch_val']);
            $query = "SELECT * FROM books WHERE book_title LIKE '%$search%' OR book_author LIKE '%$search%' OR book_no LIKE '%$search%'";
        } else {
            $query = "SELECT * FROM books";
        }
          $result = mysqli_query($con, $query);

          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo '
                  <div class="bg-[#c3d3ff] rounded-lg shadow-md p-4 w-60 flex-column justify-items-center">
                  <form action="borrow_book.php" method="POST">
                    <div class="flex overflow-hidden">
                      <img src="uploads/' . $row['book_profile'] . '" class="w-28 bg-cover bg-center rounded mb-4" alt="' . $row['book_title'] . '">
                      <div class="ml-2 content-end mb-4">
                      <h3 class="text-lg font-semibold text-gray-900">' . $row['book_title'] . '</h3>
                      <p class="text-sm text-gray-600 mb-2">' . $row['book_author'] . '</p>
                      <p class="text-sm text-gray-600 mb-2">' . $row['book_no'] . '</p>
                      <input type="hidden" name="no" value="' . $row['no'] . '">';
                      echo '</div>';
                      echo '</div>';
                      $_SESSION['no'] = $row['no'];
                      if($row['book_type'] == 'ebook') {
                        echo '<a href="uploads/' . $row['pdf_file'] . '" class="bg-blue-500 hover:bg-blue-700 text-white mt-4 font-bold py-2 px-4 rounded" target="_blank">Read PDF</a>';
                      } else {
                        echo '<div class="flex">';
                        echo '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4" value="'. $row['no'] . '">Borrow</button>' ;
                        echo '<a href="borrow_tnc.php" class="underline place-self-center" target="_blank">terms and conditions</a>';
                        echo '</div>';
                      }
                  echo '</form></div>';
              }
              
          } else {
              echo "<p class='grid place-self-center'>No books found.</p>";
          }
        ?>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>