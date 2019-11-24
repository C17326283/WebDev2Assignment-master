<html>

<body>
    <?php
        session_start();
    
        if(isset($_POST['submit']))
        {
            $username = $_SESSION['Username'];
            $name = $_POST['name'];
            
            $errorEmpty = false;
            
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            
            if(empty($name))
            {
                echo "<span class='form-error'>Please enter a valid name!</span>";
                $errorEmpty = true;
            }
            else
            {
                $sql = "UPDATE users SET name='$name' WHERE username='$username';";
                $result = mysqli_query($conn, $sql);

                if ($conn->query($sql) === TRUE)
                {
                    echo "<span class='form-success'>Name changed!</span>";

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
        $("#change-name").removeClass("input-error");
        
        var errorEmpty = "<?php echo $errorEmpty; ?>";

        if(errorEmpty == true)
        {
            $("#change-name").addClass("input-error");
        }
        if(errorEmpty == false)
        {
            $("#change-name").val("");
            window.location.href = "myAccount.php";
        }
        
    </script>

</body>

</html>
