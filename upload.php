<?php
echo"
<script type='text/javascript'>
    window.location = 'books.php';
</script>
";
session_start();
include("db.php");

// if(isset($_POST['submit'])) {
//     $book_title = $_POST['book_title'];
//     $pdf_file = $_FILES['pdf_file'];
//     $book_author = $_POST['book_author'];
//     $book_profile = $_FILES['book_profile']; // Change $_POST to $_FILES
//     $book_no = $_POST['book_no'];

//     // File upload
//     $target_dir = rand(1000, 10000);
//     $target_file = $target_dir . "-" . $_FILES["pdf_file"]["name"];
//     $b_name = $_FILES["pdf_file"]["tmp_name"]; // Change $_FILES["files"] to $_FILES["pdf_file"]
//     # $up_dr = "/uploads";


//     $upload_dir = __DIR__ . "/uploads";
//     if (!is_dir($upload_dir)) {
//         mkdir($upload_dir, 0777, true);
//     }
//     $up_dr = __DIR__ . "/uploads";

//     $uploadOk = 1;

//     // Check if file already exists
//     if (file_exists($target_file)) {
//         echo "Sorry, file already exists.";
//         $uploadOk = 0;
//     }

//     // Check file size
//     if ($_FILES["pdf_file"]["size"] > 5000000) { // Adjust file size limit as needed
//         echo "Sorry, your file is too large.";
//         $uploadOk = 0;
//     }

//     // Allow only PDF files
//     $fileType = pathinfo($_FILES["pdf_file"]["name"], PATHINFO_EXTENSION);
//     if($fileType != "pdf") {
//         echo "Sorry, only PDF files are allowed.";
//         $uploadOk = 0;
//     }

//     if ($uploadOk == 0) {
//         echo "Sorry, your file was not uploaded.";
//     } else {
//         if (move_uploaded_file($b_name, $up_dr.'/'.$target_file)) {
//             // File uploaded successfully, now insert into database
//             $query = "INSERT INTO books (book_title, book_author, book_profile, pdf_file, book_no) VALUES ('$book_title', '$book_author', '$book_profile', '$target_file', '$book_no')";
//             if(mysqli_query($con, $query)){
//                 echo "The file ". htmlspecialchars( basename( $_FILES["pdf_file"]["name"])). " has been uploaded and inserted into database.";
//             } else{
//                 echo "Error inserting data into database: " . mysqli_error($con);
//             }
//         } else {
//             echo "Sorry, there was an error uploading your file.";
//         }
//     }
// }

if(isset($_POST['submit'])) {
    $book_title = $_POST['book_title'];
    $pdf_file = $_FILES['pdf_file'];
    $book_author = $_POST['book_author'];
    $book_no = $_POST['book_no'];

    // File upload
    $target_dir = rand(1000, 10000);
    $target_file_pdf = $target_dir . "-" . basename($_FILES["pdf_file"]["name"]);
    $target_file_profile = $target_dir . "-" . basename($_FILES["book_profile"]["name"]);

    $upload_dir = __DIR__ . "/uploads";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $uploadOk = 1;

    // Check if PDF file already exists
    if (file_exists($upload_dir . '/' . $target_file_pdf)) {
        echo "
            <script type='text/javascript'>
                alert('Sorry, PDF file already exists.');
                window.history.back();
            <script>
        ";
        $uploadOk = 0;
    }

    // Check if Profile file already exists
    if (file_exists($upload_dir . '/' . $target_file_profile)) {
        echo "
        <script type='text/javascript'>
            alert('Sorry, Profile file already exists.');
            window.history.back();
        <script>
        ";
        $uploadOk = 0;
    }

    // Check PDF file size
    if ($_FILES["pdf_file"]["size"] > 5000000) { // Adjust file size limit as needed
        echo "
        <script type='text/javascript'>
            alert('Sorry, your PDF file is too large.');
            window.history.back();
        <script>
        ";
        $uploadOk = 0;
    }

    // Check Profile file size
    if ($_FILES["book_profile"]["size"] > 5000000) { // Adjust file size limit as needed
        echo "
        <script type='text/javascript'>
            alert('Sorry, your Profile file is too large.');
            window.history.back();
        <script>
        ";
        $uploadOk = 0;
    }

    // Allow only PDF files
    $pdfFileType = pathinfo($target_file_pdf, PATHINFO_EXTENSION);
    if($pdfFileType != "pdf") {
        echo "
        <script type='text/javascript'>
            alert('Sorry, only PDF files are allowed for PDF.');
            window.history.back();
        <script>
        ";
        $uploadOk = 0;
    }

    // Allow only image files for profile
    $profileFileType = pathinfo($target_file_profile, PATHINFO_EXTENSION);
    if(!in_array($profileFileType, array("jpg", "png", "jpeg", "gif"))) {
        echo "
        <script type='text/javascript'>
            alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed for profile.');
            window.history.back();
        <script>
        ";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "
        <script type='text/javascript'>
        alert('Sorry, your file was not uploaded.');
        window.history.back();
        <script>
        ";
    } else {
        if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $upload_dir.'/'.$target_file_pdf) && move_uploaded_file($_FILES["book_profile"]["tmp_name"], $upload_dir.'/'.$target_file_profile)) {
            // Files uploaded successfully, now insert into database
            $query = "INSERT INTO books (book_title, book_author, book_profile, pdf_file, book_no) VALUES ('$book_title', '$book_author', '$target_file_profile', '$target_file_pdf', '$book_no')";
            if(mysqli_query($con, $query)){
                echo "
                <script type='text/javascript'>
                    alert('The PDF and Image file had been uploaded.');
                    window.history.back();
                <script>
                ";
            } else{
                echo "
                <script type='text/javascript'>
                alert('The PDF and Image file had been uploaded. " . ($error ? "\\nError inserting data into database: " . mysqli_error($con) : "") . "');
                window.history.back();
                <script>
                ";
            }
        } else {
            echo "
            <script type='text/javascript'>
            alert('Sorry, there was an error uploading your file.');
            window.history.back();
            <script>
            ";
        }
    }
}
?>
