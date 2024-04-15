<?php
session_start();
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <script src="https://kit.fontawesome.com/95d194ff11.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="shortcut icon" href="./images/logo-ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style type="text/css" >

    </style>
</head>
<body>
    
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
      include("dashboard_f.php");
      ?>
   <div class="p-4 sm:ml-64 h-full grid justify-items-center border-2 border-gray-200 border-dashed rounded-lg" >
    <div class="w-full flex justify-evenly bg-[#c3d3ff] p-5">
      <form action="upload.php" method="post" enctype="multipart/form-data" class="shadow-none w-60 justify-center">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="pdf_file">Upload file</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="pdf_file" type="file" accept=".pdf" required>

        <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white" for="book_profile">Upload image</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg mb-2 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="book_profile" name="book_profile" id="book_profile" type="file" accept=".png, .jpeg, .jpg" required>

        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg mb-2" id="book_title" name="book_title" type="text" placeholder="book title" required>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg mb-2" id="book_author" name="book_author" type="text" placeholder="book author" required>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg mb-2" id="book_no" name="book_no" type="number" placeholder="book number" required>
        <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload PDF</button>
      </form>
      <form action="upload.php" method="post" enctype="multipart/form-data" class="shadow-none w-60 content-evenly">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="book_title">Add Book</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg mb-2 cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="book_profile" name="book_profile" id="book_profile" type="file" accept=".png, .jpeg, .jpg" required>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg mb-2" id="book_title" name="book_title" type="text" placeholder="book title" required>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg mb-2" id="book_author" name="book_author" type="text" placeholder="book author" required>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg mb-2" id="book_no" name="book_no" type="text" placeholder="library book number" required>
            <button type="submit" name="submit_traditional" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Book</button>
         </form>
    </div>
   </div>

   <div class="p-4 sm:ml-64 h-full grid justify-items-center">  
      <form class="sticky top-5 flex items-center w-1/2 mx-auto">   
         <label for="simple-search" class="sr-only">Search</label>
         <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <i class="fa-solid fa-book fa-xl w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-[#fcfaff] dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21" id="books"></i>
            </div>
            <input type="text" name="srch_val" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Book Here" required />
         </div>
         <button type="submit" name="search" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
         </button>
      </form>

        <div class="mt-8 grid grid-cols-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php
            $name = $_SESSION['admin_no'];
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
            $query = "SELECT * FROM books WHERE book_title LIKE '%$search%' OR book_author LIKE '%$search%'";
        } else {
            $query = "SELECT * FROM books";
        }

        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="bg-[#c3d3ff] rounded-lg shadow-md p-4">
                    <img src="uploads/' . $row['book_profile'] . '" class="w-56 h-60 bg-cover bg-center rounded mb-4" alt="' . $row['book_title'] . '">
                    <h3 class="text-lg font-semibold text-gray-900">' . $row['book_title'] . '</h3>
                    <p class="text-sm text-gray-600 mb-2">' . $row['book_author'] . '</p>
                    <p class="text-sm text-gray-600 mb-2">' . 'From: ' . ucfirst($name) . '</p>
                    <a href="uploads/' . $row['pdf_file'] . '" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Read PDF</a>
                </div>';
            }
        } else {
            echo '<p>No books found.</p>';
        }
        ?>
        </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
</body>
</html>

