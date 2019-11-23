<html>

<body>
    <?php
        session_start();
    
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $id = $_SESSION['Username'];
            
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
            elseif(!$numrows > 0 || $username != $id)
            {
                echo "<span class='form-error'>Invalid account details!</span>";
                $errorDetails = true;
            }
            else
            {
                $sql = "DELETE FROM users WHERE username='$id';";
                $result = mysqli_query($conn, $sql);
                
                if ($conn->query($sql) === TRUE)
                {
                    echo "<span class='form-success'>Account deleted!</span>";

                }
                else
                {
                    echo "Error: <br>".$conn->error;
                }

            }
        }
        else
        {
            echo "There was an error!";
        }
    ?>
    
    <script>
        $("#del-username, #del-password").removeClass("input-error");
        
        var errorEmpty = "<?php echo $errorEmpty; ?>";
        var errorDetails = "<?php echo $errorDetails; ?>";

        
        if(errorEmpty == true)
        {
           $("#del-username, #del-password").addClass("input-error");
        }
        if(errorDetails == true)
        {
            $("#del-username, #del-password").addClass("input-error");
        }
        if(errorEmpty == false && errorDetails == false)
        {
            $("#del-username, #del-password, #form-succes").val("");
            window.location.href = "logoutSql.php";
        }
        
    </script>

</body>

</html>
