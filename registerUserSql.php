<html>

<body>
    <?php
    
        if(isset($_POST['submit']))
        {
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
            
            $errorEmpty = false;
            $errorEmail = false;
            $errorUsername = false;
            $errorPassword = false;
            
            
            //create a template
            $sqlcheck = "SELECT * FROM users WHERE Username = ?;";
            //create a prepared statement
            $stmtcheck = mysqli_stmt_init($conn);
            //prepare the prepared statement
            if(!mysqli_stmt_prepare($stmtcheck, $sqlcheck))
            {
                echo "SQL statement failed";
            }
            else
            {
                //bind parameters to the placeholder
                mysqli_stmt_bind_param($stmtcheck, "s", $username);
                //run parameters inside database
                mysqli_stmt_execute($stmtcheck);
                $result = mysqli_stmt_get_result($stmtcheck);
                $numrows = mysqli_num_rows($result);
                
                
                if ($numrows > 0)
                {
                    echo "<span class='form-error'>This username has been taken!</span>";
                    $errorUsername = true;
                }
                elseif(empty($name) || empty($email) || empty($username) || empty($password) || empty($confirmpassword))
                {
                    echo "<span class='form-error'>Fill in all fields!</span>";
                    $errorEmpty = true;
                }
                elseif($password != $confirmpassword)
                {
                    echo "<span class='form-error'>Passwords do not match!</span>";
                    $errorPassword = true;
                }
                elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))/*php fuction*/
                {
                    echo "<span class='form-error'>Enter a valid email!</span>";
                    $errorEmail = true;
                }
                else
                {
                    //create a template
                    $sql = "INSERT INTO Users (name, username, email, password) VALUES (?, ?, ?, ?);";
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
                        mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $email, $password);
                        //run parameters inside database
                        mysqli_stmt_execute($stmt);

                        echo "<span class='form-success'>Account created!</span>";
                    }

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
        $("#register-name, #register-username, #register-email, #register-password, #register-confirmpassword").removeClass("input-error");
        
        var errorEmpty = "<?php echo $errorEmpty; ?>";
        var errorEmail = "<?php echo $errorEmail; ?>";
        var errorUsername = "<?php echo $errorUsername; ?>";
        var errorPassword = "<?php echo $errorPassword; ?>";

        
        if(errorEmpty == true)
        {
           $("#register-name, #register-username, #register-email, #register-password, #register-confirmpassword").addClass("input-error");
        }
        if(errorEmail == true)
        {
            $("#register-email").addClass("input-error");
        }
        if(errorUsername == true)
        {
            $("#register-username").addClass("input-error");
        }
        if(errorPassword == true)
        {
            $("#register-password, #register-confirmpassword").addClass("input-error");
        }
        
        if(errorEmpty == false && errorEmail == false && errorUsername == false && errorPassword == false)
        {
            //clearing text fields then redirecting to login page
            $("#register-name, #register-username, #register-email, #register-password, #register-confirmpassword").val("");
            window.location.href = "loginUser.php";
        }
        
    </script>

</body>

</html>
