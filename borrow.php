<?php
session_start();
    include("db.php");

    // if (!isset($_SESSION['lid'])) {
    //     header("Location: index.php");
    //     exit();
    // }
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
    <style>
        #table{
            padding: 12px;
        }
    </style>
    <style type="text/tailwindcss">
    @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
    }
    </style>
    <title>
        Borrowed Books
    </title>
    <style type="text/css">
        .even-row {
          background-color: #f3f3f3;
        }
    </style>
</head>
<body>
    <?php
    include("dashboard_f.php");
    ?>
    <div class="ml-72 mr-12">
        <?php
        $q_y = "SELECT * FROM borrow";
        $r_t = mysqli_query($con, $q_y);

        if(mysqli_num_rows($r_t) > 0) {
            $count = 0;
            echo "
                <table class='border-dashed border-2 w-full mt-12' id='table'>
                <thead class='border-dashed border-2 bg-[#c3d3ff]'>
                <tr><th class='border-dashed border-2'>From</th><th class='border-dashed border-2'>Book Title</th><th class='border-dashed border-2'>Book Author</th><th class='border-dashed border-2'>Date Borrow</th><th class='border-dashed border-2'></th><th class='border-dashed border-2'>Due Date</th><th class='border-dashed border-2'>Fines</th></tr>
                </thead>";
            echo "<tbody class='border-dashed border-2 p-2'>";

            while($_row = mysqli_fetch_assoc($r_t)) {
                $count++;
                $row_class = ($count % 2 == 0) ? "even-row" : "odd-row";
                echo "<tr>";
                echo "<td class='border-dashed border-2'>" . $_row['from_who'] . "</td>";
                echo "<td class='border-dashed border-2'>" . $_row['book_title'] . "</td>";
                echo "<td class='border-dashed border-2'>" . $_row['book_author'] . "</td>";
                $_SESSION['borrow_no'] = $_row['borrow_no'];
                if($_row['status']=='pending'){
                    echo " <td class='border-dashed border-2'>pending...</td>";  
                }elseif($_row['status'] == 'borrowed'){
                    echo "<td class='border-dashed border-2'>" . $_row['date_borrow'] . "</td>";
                }else{
                    echo "<td class='border-dashed border-2'>" . $_row['date_borrow'] . "</td>";
                }
                $_SESSION['number_created'] = $_row['number_created'];
                if($_row['status'] == 'pending'){
                    echo " <td class='border-dashed border-2'><form action='borrowed.php' method='POST'>
                    <input type='hidden' name='borrow_no' value=" . $_row["borrow_no"] . ">
                    <input type='hidden' name='number_created' value=" . $_row["number_created"] . ">
                    <input type='text' placeholder='type code here' name='codes'>
                    <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded' >send</button>
                    </form></td>";
                }elseif($_row['status'] == 'borrowed'){
                    echo "<td class='border-dashed border-2'>Borrowed</td>";
                }elseif($_row['status'] == 'returned'){
                    echo "<td class='border-dashed border-2'>Done</td>";
                }
                
                if($_row['status'] == 'borrowed'){
                    echo "<td class='border-dashed border-2'>" . $_row['due_date'] . "</td>";
                }else{ 
                    echo "<td class='border-dashed border-2'>Please enter the code</td>";
                }
                if($_row['status'] == 'pending'){
                    echo "<td class='border-dashed border-2'>pending...</td>";
                }elseif($_row['status'] == 'borrowed'){
                    echo "<td class='border-dashed border-2'>" . $_row['fines'] . "</td>";
                }else{
                    echo "<td class='border-dashed border-2'>Book Returned</td>";
                }
                echo "</tr>";
            }
        echo "</tbody>";
        echo "</table>";
        } else {
        echo "No borrowers.";
        }
    ?>
    </div>
</body>
</html>