<?php
    session_start();
    include("db.php");
                    if(isset($_POST['update'])) {
                        $lid = $_SESSION['lid'];
                        $library = mysqli_real_escape_string($con, $_POST['lid']);
                        $fname = mysqli_real_escape_string($con, $_POST['fname']);
                        $lname = mysqli_real_escape_string($con, $_POST['lname']);
                        $password = $_POST['password'];
                        $contact = $_POST['contact'];
                        $brgy = mysqli_real_escape_string($con, $_POST['brgy']);
                        $muni = mysqli_real_escape_string($con, $_POST['muni']);
                        $prov = mysqli_real_escape_string($con, $_POST['prov']);

                        $query = "UPDATE register 
                        SET lid = '$library', 
                        fname = '$fname', 
                        lname = '$lname', 
                        password = '$password',
                        contact_no = '$contact',  
                        barangay = '$brgy',
                        municipality = '$muni',
                        province = '$prov'
                        WHERE lid = '$lid'";

                        if(mysqli_query($con, $query)) {
                            mysqli_query($con, $query);
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
                            alert("There was an error!");
                            window.location = "user_profile.php";
                        </script>
                        <?php  
                    }
                ?>