<html>

<body>
    <?php
    
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            
            $errorEmpty = false;
            $errorEmail = false;
            $errorUsername = false;
            $errorPassword = false;
            
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            
            $check = "SELECT * FROM users WHERE Username = '$username'"; 
            $result = mysqli_query($conn, $check) OR die(mysqli_error($conn));
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

                $sql = "INSERT INTO Users (name, username, email, password)
                VALUES ('$name','$username','$email', '$password')";

                if ($conn->query($sql) === TRUE)
                {
                    echo "<span class='form-success'>Account created!</span>";
                }
                else
                {
                    echo "Error: <br>".$conn->error;
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
            $("#register-name, #register-username, #register-email, #register-password, #register-confirmpassword").val("");
            window.location.href = "loginUser.php";
        }
        
    </script>

</body>

</html>
