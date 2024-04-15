<?php
session_start();
include("db.php");

if(isset($_POST['submit_traditional'])){
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_no = $_POST['book_no'];
    $book_type = "book";
    
    if(!empty($book_title) && !empty($book_author)){

        $target_dir = rand(1000, 10000);
        $target_file_profile = $target_dir . "-" . basename($_FILES["book_profile"]["name"]);

        $upload_dir = __DIR__ . "/uploads";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        if (move_uploaded_file($_FILES["book_profile"]["tmp_name"], $upload_dir.'/'.$target_file_profile)) {
            // Files uploaded successfully, now insert into database
            $query = "INSERT INTO books (book_title, book_author, book_profile, book_no, book_type) VALUES ('$book_title', '$book_author', '$target_file_profile', '$book_no', '$book_type')";
            if(mysqli_query($con, $query)){
                ?>
                <script type='text/javascript'>
                    alert('The Image file had been uploaded.');
                    window.location = "books.php";
                </script>
                <?php
            } else{
                ?>
                <script type='text/javascript'>
                    alert("It has an error while uploading your file.");
                    window.location = "books.php";
                </script>
                <?php
            }
        } else {
            ?>
            <script type='text/javascript'>
            alert('Sorry, there was an error uploading your file.');
            // window.location = "books.php";
            </script>
            <?php
        }
    }

}  elseif(isset($_POST['submit'])) {
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

    if (file_exists($upload_dir . '/' . $target_file_pdf)) {
        ?>
            <script type='text/javascript'>
                alert('Sorry, PDF file already exists.');
                window.location = "books.php";
            </script>
        <?php
        $uploadOk = 0;
    }

    // Check if Profile file already exists
    if (file_exists($upload_dir . '/' . $target_file_profile)) {
        ?>
        <script type='text/javascript'>
            alert('Sorry, Profile file already exists.');
            window.location = "books.php";
        </script>
        <?php
        $uploadOk = 0;
    }

    // Check PDF file size
    if ($_FILES["pdf_file"]["size"] > 5000000) { // Adjust file size limit as needed
        ?>
        <script type='text/javascript'>
            alert('Sorry, your PDF file is too large.');
            window.location = "books.php";
        </script>
        <?php
        $uploadOk = 0;
    }

    // Check Profile file size
    if ($_FILES["book_profile"]["size"] > 5000000) { // Adjust file size limit as needed
        ?>
        <script type='text/javascript'>
            alert('Sorry, your Profile file is too large.');
            window.location = "books.php";
        </script>
        <?php
        $uploadOk = 0;
    }

    // Allow only PDF files
    $pdfFileType = pathinfo($target_file_pdf, PATHINFO_EXTENSION);
    if($pdfFileType != "pdf") {
        ?>
        <script type='text/javascript'>
            alert('Sorry, only PDF files are allowed for PDF.');
            window.location = "books.php";
        </script>
        <?php
        $uploadOk = 0;
    }

    // Allow only image files for profile
    $profileFileType = pathinfo($target_file_profile, PATHINFO_EXTENSION);
    if(!in_array($profileFileType, array("jpg", "png", "jpeg", "gif"))) {
        ?>
        <script type='text/javascript'>
            alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed for profile.');
            window.location = "books.php";
        </script>
        <?php
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        ?>
        <script type='text/javascript'>
        alert('Sorry, your file was not uploaded.');
        window.location = "books.php";
        </script>
        <?php
    } else {
        if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $upload_dir.'/'.$target_file_pdf) && move_uploaded_file($_FILES["book_profile"]["tmp_name"], $upload_dir.'/'.$target_file_profile)) {
            // Files uploaded successfully, now insert into database
            $query = "INSERT INTO books (book_title, book_author, book_profile, pdf_file, book_no) VALUES ('$book_title', '$book_author', '$target_file_profile', '$target_file_pdf', '$book_no')";
            if(mysqli_query($con, $query)){
                ?>
                <script type='text/javascript'>
                    alert('The PDF and Image file had been uploaded.');
                    window.location = "books.php";
                </script>
                <?php
            } else{
                ?>
                <script type='text/javascript'>
                    alert("It has an error while uploading your file.");
                    window.location = "books.php";
                </script>
                <?php
            }
        } else {
            ?>
            <script type='text/javascript'>
            alert('Sorry, there was an error uploading your file.');
            window.location = "books.php";
            </script>
            <?php
        }
    }
}
?>
