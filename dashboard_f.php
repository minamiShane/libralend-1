<?php
   include("db.php");

//    if (!isset($_SESSION['admin_no'])) {
//       header("Location: index.php");
//       exit();
//   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Dashboard
    </title>
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
            'blue': '#123499';
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
    #books, #reserve, #report{
      padding-top: 10px;
    }
    </style>
</head>
<body>
   <script>
      //for dashboard
    window.addEventListener('DOMContentLoaded', (event) => {
      var dashboardLink = document.getElementById('dashboard');
      var dblogo = document.getElementById('db');
      if (window.location.href.indexOf("dashb.php") !== -1) {
         if (dashboardLink) {
            dashboardLink.style.backgroundColor = '#0b6317';
            dashboardLink.style.color = '#fcfaff';
            dblogo.style.color = '#fcfaff';
         }
       }
   });
    window.addEventListener('DOMContentLoaded', (event) => {
      var users = document.getElementById('users');
      var userlogo = document.getElementById('userlogo');
      if(window.location.href.indexOf("users.php") !== -1 || window.location.href.indexOf("add_record.php") !== -1 || window.location.href.indexOf("update.php") !== -1){
         if (users) {
            users.style.backgroundColor = '#0b6317';
            users.style.color = '#fcfaff';
            userlogo.style.color = '#fcfaff';
         }
      }
   });
   window.addEventListener('DOMContentLoaded', (event) => {
      var books = document.getElementById('books');
      var i = document.getElementById('i');
      if (window.location.href.indexOf("books.php") !== -1) {
         if (books) {
            books.style.backgroundColor = '#0b6317';
            books.style.color = '#fcfaff';
            if (i) {
            i.style.color = '#fcfaff';
            }
         }
       }
   });
   window.addEventListener('DOMContentLoaded', (event) => {
      var borrowed = document.getElementById('borrowed');
      var bar = document.getElementById('borrowed');
      if (window.location.href.indexOf("borrow.php") !== -1) {
            borrowed.style.backgroundColor = '#0b6317';
            borrowed.style.color = '#fcfaff';
            bar.style.color = '#fcfaff';
       }
   });
   window.addEventListener('DOMContentLoaded', (event) => {
      var icoo = document.getElementById('ico');
      var iconn = document.getElementById('ico');
      if (window.location.href.indexOf("fines.php") !== -1) {
            icoo.style.backgroundColor = '#0b6317';
            icoo.style.color = '#fcfaff';
            iconn.style.color = '#fcfaff';
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
   <div class="h-full px-3 py-4 overflow-y-auto bg-[#c3d3ff]">
      <ul class="space-y-2 font-medium">
        <li>
            <a href="dashb.php" class="flex items-center text-2xl">
                <img src="./images/logo-nobg.png" alt="" width="70px">
            </a>
        </li>
         <li>
            <a href="dashb.php" id="dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
               <svg id="db" class="w-5 h-5 text-gray-500 transition duration-75 dark:text-[#fcfaff] group-hover:text-[#fcfaff] dark:group-hover:text-[#fcfaff]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="users.php" id="users" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
               <svg id="userlogo" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
            </a>
         </li>
         <li>
            <a href="books.php" id="books" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
            <i id="i" class="fa-solid fa-book fa-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21" id="books"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Books</span>
            </a>
         </li>
         <li>
            <a href="borrow.php" id="borrowed" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
            <i id="borrowed" class="fa-solid fa-address-book fa-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21" id="books"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Borrowed Books</span>
            </a>
         </li>
         <li>
         <li>
            <a href="fines.php" id="ico" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
            <i id="ico" class="fa-solid fa-coins fa-xl flex-shrink-0 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18 " id="reserve"></i>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>