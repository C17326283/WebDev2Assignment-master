<html>

<body>
    <?php
        session_start();
    
        if(isset($_POST['submit']))
        {
            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");
            
            
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $id = $_SESSION['Username'];
            
            $errorEmpty = false;
            $errorDetails = false;
            
            
            
            //create a template
            $sqlcheck = "SELECT * FROM users WHERE username = ?;";
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
                    $row = $result->fetch_assoc();
                    $hashedpassword = $row["password"];
                    if(!password_verify($password, $hashedpassword))
                    {
                        echo "<span class='form-error'>Invalid account details!</span>";
                        $errorDetails = true;
                    }
                    else
                    {
                        $sql = "DELETE FROM users WHERE username='$id';";
                        $result = mysqli_query($conn, $sql);
                        
                        $sqlbook = "DELETE * FROM userbooks WHERE username='$id';";
                        $resultbook = mysqli_query($conn, $sql);

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
                
            }
            
            $conn->close();
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
            $("#del-username, #del-password").val("");
            window.location.href = "logoutSql.php";
        }
        
    </script>

</body>

</html>
