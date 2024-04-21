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
    </style>
</head>
<body>


<script>
      //for dashboard
    window.addEventListener('DOMContentLoaded', (event) => {
      var home = document.getElementById('users');
      var home_icon = document.getElementById('i-borrow');
      if (window.location.href.indexOf("borrow_book.php") !== -1) {
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
            <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
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
            <a href="" id="users" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
            <i id="i-borrow" class="fa-solid fa-address-book fa-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21" id="books"></i>
               <span class="flex-1 ms-3 whitespace-nowrap">Book Borrow</span>
            </a>
         </li>
         <li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-[#123499] hover:text-[#fcfaff] dark:hover:bg-gray-700 group">
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
<div class="ml-72 mr-12">
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['no']){
            $s_n = $_POST['no'];
            $q_cust = $con->query("SELECT * FROM books WHERE no = '$s_n'");
            $r_cust = $q_cust->fetch_assoc();
            $no = $r_cust['no'];
            $book_title = $r_cust['book_title'];
            $book_author = $r_cust['book_author'];
            $book_no = $r_cust['book_no'];
            $number_created = rand(1000,9999);

            $lid = $_SESSION['lid'];
            $sel = "SELECT * FROM register WHERE lid='$lid'";
            $query = mysqli_query($con, $sel);
        
            if(mysqli_num_rows($query) == 1) {
              $result = mysqli_fetch_assoc($query);
              $fname = $result['fname'];
              $lname = $result['lname'];
              $name = $fname . " " . $lname;

            $_sel = "INSERT INTO borrow (book_title, book_author, book_no, number_created, from_who)  
            values ('$book_title', '$book_author', '$book_no', '$number_created', '$name')";
            $_qry = mysqli_query($con, $_sel);

            $history = "INSERT INTO history (book_title, book_author, book_no, number_created, from_who)  
            values ('$book_title', '$book_author', '$book_no', '$number_created', '$name')";
            $hstry_qry = mysqli_query($con, $history);

            if($_qry && $history){
                echo'
                    <script type="text/javascript">
                        alert("Please present the 4 digit code to your Library Administrator.");
                        window.location = "borrow_book.php";
                    </script>
                ';
                exit();
            }
            exit();
        }
        exit();
    }
    }
    $lid = $_SESSION['lid'];
    $sel = "SELECT * FROM register WHERE lid='$lid'";
    $query = mysqli_query($con, $sel);

    if(mysqli_num_rows($query) == 1) 
        $result = mysqli_fetch_assoc($query);
        $fname = $result['fname'];
        $lname = $result['lname'];
        $name = $fname . " " . $lname;

    $q_y = "SELECT * FROM borrow WHERE from_who LIKE '%$name%'";
    $r_t = mysqli_query($con, $q_y);

    if(mysqli_num_rows($r_t) > 0) {
      echo "<table class='border-dashed border-2 w-full mt-12 py-2'>";
      echo "<thead class='border-dashed border-2 bg-[#c3d3ff]'>";
      echo "<tr><th class='border-dashed border-2'>Book No.</th><th class='border-dashed border-2'>Book Title</th><th class='border-dashed border-2'>Book Author</th><th class='border-dashed border-2'>Date Borrow</th><th class='border-dashed border-2'>Due Date</th><th class='border-dashed border-2'>Code</th><th class='border-dashed border-2'>Fines</th></tr>";
      echo "</thead>";
      echo "<tbody class='border-dashed border-2'>";
      $count = 0;
      while($_row = mysqli_fetch_assoc($r_t)) {
          $count++;
          $row_class = ($count % 2 == 0) ? "even-row" : "odd-row";
          echo "<tr class='".$row_class."'>";
          echo "<td class='border-dashed border-2'>" . $_row['book_no'] . "</td>";
          echo "<td class='border-dashed border-2'>" . $_row['book_title'] . "</td>";
          echo "<td class='border-dashed border-2'>" . $_row['book_author'] . "</td>";
          if($_row['status']=='pending'){
            echo "<td class='border-dashed border-2'>pending...</td>";
            echo "<td class='border-dashed border-2'>pending...</td>";
          }else{
            echo "<td class='border-dashed border-2'>" . $_row['date_borrow'] . "</td>";
            echo "<td class='border-dashed border-2'>" . $_row['due_date'] . "</td>";
          }
          echo "<td class='border-dashed border-2 bg-[#c3d3ff]'>" . $_row['number_created'] . "</td>";
          if($_row['status']=='pending'){
            echo "<td class='border-dashed border-2'>";
            echo "pending...";
            echo "</td>";
          }else{
            echo "<td class='border-dashed border-2'>";
              echo $_row['fines'];
            echo "</td>";
          }
          echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
  } else {
      echo "You don't have any transaction here.";
  }
?>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>