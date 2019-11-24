<html>

<body>
    <?php
        session_start();
        
        if(isset($_POST['submit']))
        {
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            $username = $_SESSION['Username'];
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
            
            $errorEmpty = false;
            $errorPassword = false;
            
            
            if(empty($password) || empty($confirmpassword))
            {
                echo "<span class='form-error'>Fill in all fields!</span>";
                $errorEmpty = true;
            }
            elseif($password != $confirmpassword)
            {
                echo "<span class='form-error'>Passwords do not match!</span>";
                $errorPassword = true;
            }
            else
            {
                //create a template
                $sql = "UPDATE users SET password=? WHERE username='$username';";
                //create a prepared statement
                $stmt = mysqli_stmt_init($conn);
                //prepare the prepared statement
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "SQL statement failed";
                }
                else
                {
                    $newpassword = password_hash("$password", PASSWORD_DEFAULT);
                    
                    //bind parameters to the placeholder
                    mysqli_stmt_bind_param($stmt, "s", $newpassword);
                    //run parameters inside database
                    mysqli_stmt_execute($stmt);
                    
                    echo "<span class='form-success'>Password changed!</span>";
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
        $("#change-password, #change-confirmpassword").removeClass("input-error");
        
        var errorEmpty = "<?php echo $errorEmpty; ?>";
        var errorPassword = "<?php echo $errorPassword; ?>";
        
        if(errorEmpty == true)
        {
           $("#change-password, #change-confirmpassword").addClass("input-error");
        }
        if(errorPassword == true)
        {
            $("#change-password, #change-confirmpassword").addClass("input-error");
        }
        
        if(errorEmpty == false && errorPassword == false)
        {
            $("#change-password, #change-confirmpassword").val("");
            window.location.href = "myAccount.php";
        }
        
    </script>

</body>

</html>
