<html>

<body>
    <?php
    
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errorEmpty = false;
            $errorEmail = false;
            $errorUsername = false;
            
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
            elseif(empty($name) || empty($email) || empty($username) || empty($password))
            {
                echo "<span class='form-error'>Fill in all fields!</span>";
                $errorEmpty = true;
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
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
        $("#register-name, #register-username, #register-email, #register-password").removeClass("input-error");
        
        var errorEmpty = "<?php echo $errorEmpty; ?>";
        var errorEmail = "<?php echo $errorEmail; ?>";
        var errorUsername = "<?php echo $errorUsername; ?>";

        
        if(errorEmpty == true)
        {
           $("#register-name, #register-username, #register-email, #register-password").addClass("input-error");
        }
        if(errorEmail == true)
        {
            $("#register-email").addClass("input-error");
        }
        if(errorUsername == true)
        {
            $("#register-username").addClass("input-error");
        }
        
        if(errorEmpty == false && errorEmail == false && errorUsername == false)
        {
            $("#register-name, #register-username, #register-email, #register-password, #form-succes").val("");
        }
        
    </script>

</body>

</html>
