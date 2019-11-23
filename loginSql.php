<html>

<body>
    <?php
        session_start();
    
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $errorEmpty = false;
            $errorDetails = false;
            
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            $sql = "SELECT * FROM users WHERE username = '$username' AND password ='$password'";
            $result = mysqli_query($conn, $sql) OR die(mysqli_error($conn));
            $numrows = mysqli_num_rows($result);
            
            
            if(empty($username) || empty($password))
            {
                echo "<span class='form-error'>Fill in all fields!</span>";
                $errorEmpty = true;
            }
            elseif(!$numrows > 0)
            {
                echo "<span class='form-error'>Invalid login details!</span>";
                $errorDetails = true;
            }
            else
            {
                $_SESSION['loggedin'] = true;
                
                $row = $result->fetch_assoc();
                $_SESSION['Username'] = $row["username"];//Sets the session username to the username of the account that just logged in
                echo "<span class='form-success'>Logged in successfully!</span>";
                
                $conn->close();
            }
        }
        else
        {
            echo "There was an error!";
        }
    ?>
    
    <script>
        $("#log-username, #log-password").removeClass("input-error");
        
        var errorEmpty = "<?php echo $errorEmpty; ?>";
        var errorDetails = "<?php echo $errorDetails; ?>";

        
        if(errorEmpty == true)
        {
           $("#log-username, #log-password").addClass("input-error");
        }
        if(errorDetails == true)
        {
            $("#log-email, #log-password").addClass("input-error");
        }
        if(errorEmpty == false && errorDetails == false)
        {
            $("#log-username, #log-password, #form-succes").val("");
            window.location.href = "index.php";
        }
        
    </script>

</body>

</html>
