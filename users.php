
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="./css folder/style.css">
    <script src="https://kit.fontawesome.com/95d194ff11.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="shortcut icon" href="./images/logo-ico.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<style>
    .search{
        position: sticky;
        margin: 32px 0 0 300px;
    }
    .add-record-btn {
        position: sticky;
        margin-left: 100px;
    }
    .user{
        display: grid;
        place-self: center;
        margin-left: 300px;
        padding: 24px 16px 0 0;
        height: 100%;
    }
    .table, thead, tr, td, th{
        border: 1px solid #D1D5DB;
        color: #123499;
        padding: 8px;
        text-align: center;
        background-color: #F9FAFB;
    }
    td input{
            font-size: 16px;
            border: 1px solid #D1D5DB;
            border-radius: 5px;
            color: #123499;
            padding: 8px;
    }
    .up{
        margin-left: 8px;
    }
    a button{
        width: 100px;
    }
    #even{
        background-color: #f3f3f3;
    }
    @media screen and (min-width: 630px and min-width: 0){
        .user{
            margin-left: 0;
        }
    }
</style>
<body>
    <?php
        include("dashboard_f.php");
    ?>

    <div class="search">
    <form class="max-w-md mx-auto" method="POST"> 
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="srch_val" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search User" required />
                <button type="submit" name="search" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div> 
    </form>
    <a href='add_record.php'class="add-record-btn">
        <button type='button' class='text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>Add Record</button>
    </a> 
    </div>
    <div class="user">
    <?php
        include("db.php");

        // Check if the search form is submitted and the search value is set
        if(isset($_POST['search']) && isset($_POST['srch_val'])) {
            $search_value = $_POST['srch_val'];

            // Prepare the query to search for the entered value in the database
            $query = "SELECT * FROM register WHERE fname LIKE '%$search_value%' OR lname LIKE '%$search_value%' OR lid LIKE '%$search_value%'";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0) {
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr><th>#</th><th>Library ID</th><th>First Name</th><th>Last Name</th><th>Password</th><th>Action</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                $count = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    $count++;
                    $id = ($count % 2 == 0) ? "even" : "odd";
                    echo "<tr id='".$id."'>";
                    echo "<td>" . $row['student_no'] . "</td>";
                    echo "<td>" . $row['lid'] . "</td>";
                    echo "<td>" . $row['fname'] . "</td>";
                    echo "<td>" . $row['lname'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>";
                    echo " <a href='view.php?student_no=" . $row['student_no'] . "'><i class='fa-solid fa-eye fa-2x'></i></a>";
                    echo "<a href='update.php?student_no=" . $row['student_no'] . "' class='up'><i class='fa-solid fa-pen-to-square fa-2x'></i></a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No results found.";
            }
        } else {
            $query = "SELECT * FROM register";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) > 0) {
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr><th>#</th><th>Library ID</th><th>First Name</th><th>Last Name</th><th>Password</th><th>Action</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                $i = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row['lid'] . "</td>";
                    echo "<td>" . $row['fname'] . "</td>";
                    echo "<td>" . $row['lname'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>";
                    echo " <a href='view.php?student_no=" . $row['student_no'] . "'><i class='fa-solid fa-eye fa-2x'></i></a>";
                    echo "<a href='update.php?student_no=" . $row['student_no'] . "' class='up'><i class='fa-solid fa-pen-to-square fa-2x'></i></a>";
                    echo "</td>";
                    echo "</tr>";
                    $i++;
                } 
                echo "</tbody>";
                echo "</table>";
            }
        }
    ?>
    </div>
</body>
</html>