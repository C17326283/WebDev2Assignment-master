<html>

<body>
    <?php
        session_start();
    
        if(isset($_POST['submit']))
        {
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            
            $username = $_SESSION['Username'];
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            
            $errorEmail = false;
            
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo "<span class='form-error'>Enter a valid email!</span>";
                $errorEmail = true;
            }
            else
            {
                //create a template
                $sql = "UPDATE users SET email=? WHERE username='$username';";
                //create a prepared statement
                $stmt = mysqli_stmt_init($conn);
                //prepare the prepared statement
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "SQL statement failed";
                }
                else
                {
                    //bind parameters to the placeholder
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    //run parameters inside database
                    mysqli_stmt_execute($stmt);
                    
                    echo "<span class='form-success'>Email changed!</span>";
                }
                
            }
            $conn->close();
        }
        else
        {
            echo "There was an error!";
        }
    ?>

    <script>
        $("#change-email").removeClass("input-error");

        var errorEmail = "<?php echo $errorEmail; ?>";

        if (errorEmail == true) {
            $("#change-email").addClass("input-error");
        }
        if (errorEmail == false) {
            $("#change-email").val("");
            window.location.href = "myAccount.php";

        }

    </script>

</body>

</html>
