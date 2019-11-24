<html>

<body>
    <?php
        session_start();
    
        if(isset($_POST['submit']))
        {
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            $username = $_SESSION['Username'];
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            
            $errorEmpty = false;
            
            
            if(empty($name))
            {
                echo "<span class='form-error'>Please enter a valid name!</span>";
                $errorEmpty = true;
            }
            else
            { 
                //create a template
                $sql = "UPDATE users SET name=? WHERE username='$username';";
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
                    mysqli_stmt_bind_param($stmt, "s", $name);
                    //run parameters inside database
                    mysqli_stmt_execute($stmt);
                    
                    echo "<span class='form-success'>Name changed!</span>";
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
