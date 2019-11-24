<html>

<body>
    <?php
    
        if(isset($_POST['submit']))
        {
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);
            
            $errorEmpty = false;
            $errorEmail = false;
            
            
            if(empty($name) || empty($email) || empty($message))
            {
                echo "<span class='form-error'>Fill in all fields!</span>";
                $errorEmpty = true;
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) //php function
            {
                echo "<span class='form-error'>Enter a valid email!</span>";
                $errorEmail = true;
            }
            else
            {
                //create a template
                $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?);";
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
                    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
                    //run parameters inside database
                    mysqli_stmt_execute($stmt);
                    
                    echo "<span class='form-success'>Contact sent successfully!</span>";
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
        $("#con-name, #con-email, #con-message").removeClass("input-error");

        var errorEmpty = "<?php echo $errorEmpty; ?>";
        var errorEmail = "<?php echo $errorEmail; ?>";


        if (errorEmpty == true) {
            $("#con-name, #con-email, #con-message").addClass("input-error");
        }
        if (errorEmail == true) {
            $("#con-email").addClass("input-error");
        }

        if (errorEmpty == false && errorEmail == false) {
            $("#con-name, #con-email, #con-message").val(""); //clearing text fields
        }

    </script>

</body>

</html>
