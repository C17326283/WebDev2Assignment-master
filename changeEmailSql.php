<html>

<body>
    <?php
        session_start();
    
        if(isset($_POST['submit']))
        {
            $username = $_SESSION['Username'];
            $email = $_POST['email'];
            
            $errorEmail = false;
            
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                echo "<span class='form-error'>Enter a valid email!</span>";
                $errorEmail = true;
            }
            else
            {
                $sql = "UPDATE users SET email='$email' WHERE username='$username';";
                $result = mysqli_query($conn, $sql);

                if ($conn->query($sql) === TRUE)
                {
                    echo "<span class='form-success'>Email changed!</span>";

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
        $("#change-email").removeClass("input-error");
        
        var errorEmail = "<?php echo $errorEmail; ?>";

        if(errorEmail == true)
        {
            $("#register-email").addClass("input-error");
        }
        if(errorEmail == false)
        {
            $("#change-email").val("");
            window.location.href = "myAccount.php";

        }
        
    </script>

</body>

</html>
