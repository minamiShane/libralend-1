
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

   <title>Dashboard</title>

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
   include("db.php");
   ?>
   <div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <div class="grid grid-cols-3 gap-4 mb-4">
         <div class="flex items-center justify-center h-24 rounded bg-[#123499] dark:bg-gray-800 hover:bg-[#0b6317]">
          <a href="users.php" class="flex items-center justify-center">
          <svg class="flex-shrink-0 w-8 h-8 mr-5 text-[#fcfaff]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
              <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
            </svg>
            <p class="text-2xl text-[#fcfaff] dark:text-gray-500">
              <?php 
                $query = "SELECT COUNT(*) AS total_users FROM register WHERE role = 'user'";
                $result = mysqli_query($con, $query);

                if($result) {
                    $row = mysqli_fetch_assoc($result);
                    $total_users = $row['total_users'];
                    echo "total users :" . " <p class='text-2xl ml-5 bg-[#fcfaff] text-center rounded-md p-1 text-[#123499] hover:text-[#0b6317] '> $total_users </p>";
                } else {
                    echo "Error: Unable to fetch the total number of users";
                }
              ?>
            </p>
          </a>
         </div>
         <div class="flex items-center justify-center h-24 rounded bg-[#123499] dark:bg-gray-800 hover:bg-[#0b6317] " >
            <a href="books.php" class="flex items-center justify-center">
            <i class="fa-solid fa-e fa-2xl text-[#fcfaff]"></i>
            <p class="text-2xl ml-5 text-[#fcfaff] dark:text-gray-500">
               
            <?php 
                $query = "SELECT COUNT(*) AS total_ebook FROM books WHERE book_type = 'ebook'";
                $result = mysqli_query($con, $query);

                if($result) {
                    $row = mysqli_fetch_assoc($result);
                    $total_ebook = $row['total_ebook'];
                    echo "total ebook :" . " <p class='text-2xl ml-5 bg-[#fcfaff] text-center rounded-md p-1 text-[#123499] hover:text-[#0b6317] '> $total_ebook </p>";
                } else {
                    echo "Error: Unable to fetch the total number of users";
                }
              ?>
            </p>
            </a>
         </div>
         <div class="flex items-center justify-center h-24 rounded bg-[#123499] dark:bg-gray-800 hover:bg-[#0b6317]">
            <i class="fa-solid fa-book fa-2xl w-5 h-5 text-[#fcfaff] transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21" id="books"></i>
            <p class="text-2xl ml-5 text-[#fcfaff] dark:text-gray-500"> 
               <?php 
                   $query = "SELECT COUNT(*) AS total_ebook FROM books WHERE book_type = 'book'";
                   $result = mysqli_query($con, $query);
   
                   if($result) {
                       $row = mysqli_fetch_assoc($result);
                       $total_ebook = $row['total_ebook'];
                       echo "total no. of book :" . " <p class='text-2xl ml-5 bg-[#fcfaff] text-center rounded-md p-1 text-[#123499] hover:text-[#0b6317] '> $total_ebook </p>";
                   } else {
                       echo "Error: Unable to fetch the total number of users";
                   }
                 ?>
               </p>   
         </div>
      </div>
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-[#123499] hover:bg-[#0b6317]">
         <p class="text-2xl text-[#fcfaff]">
                  <?php 
                   $query = "SELECT COUNT(*) AS total_borrow FROM borrow WHERE borrow_no";
                   $result = mysqli_query($con, $query);
   
                   if($result) {
                       $row = mysqli_fetch_assoc($result);
                       $total_ebook = $row['total_borrow'];
                       echo "total no. of borrowed books:" . " <p class='text-2xl ml-5 bg-[#fcfaff] text-center rounded-md p-1 text-[#123499] hover:text-[#0b6317] '> $total_ebook </p>";
                   } else {
                       echo "Error: Unable to fetch the total number of users";
                   }
                 ?>
         </p>
      </div>
      <div class="grid grid-cols-2 gap-4 mb-4">
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
      </div>
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
         <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
         </p>
      </div>
      <div class="grid grid-cols-2 gap-4">
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>
         <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
               <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
               </svg>
            </p>
         </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>