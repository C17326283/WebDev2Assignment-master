<html>

<body>
    <?php
        session_start();
        
        if(isset($_POST['submit']))
        {
            $username = $_SESSION['Username'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            
            $errorEmpty = false;
            $errorPassword = false;
            
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
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
                $sql = "UPDATE users SET password='$password' WHERE username='$username';";
                $result = mysqli_query($conn, $sql);

                if ($conn->query($sql) === TRUE)
                {
                    echo "<span class='form-success'>Password changed!</span>";

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
