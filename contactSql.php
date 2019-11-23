<html>

<body>
    <?php
    
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            
            $errorEmpty = false;
            $errorEmail = false;
            
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            if(empty($name) || empty($email) || empty($message))
            {
                echo "<span class='form-error'>Fill in all fields!</span>";
                $errorEmpty = true;
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))/*php fuction*/
            {
                echo "<span class='form-error'>Enter a valid email!</span>";
                $errorEmail = true;
            }
            else
            {
                $newname = mysqli_real_escape_string($conn, $name);
                $newemail = mysqli_real_escape_string($conn, $email);
                $newmessage = mysqli_real_escape_string($conn, $message);

                
                $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "SQL statement failed";
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sss", $newname, $newemail, $newmessage);
                    mysqli_stmt_execute($stmt);
                    
                    echo "<span class='form-success'>Contact sent successfully!</span>";
                }
                

                $conn->close();
            }
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

        
        if(errorEmpty == true)
        {
           $("#con-name, #con-email, #con-message").addClass("input-error");
        }
        if(errorEmail == true)
        {
            $("#con-email").addClass("input-error");
        }
        
        if(errorEmpty == false && errorEmail == false)
        {
            $("#con-name, #con-email, #con-message").val("");
        }
        
    </script>

</body>

</html>