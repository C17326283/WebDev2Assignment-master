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
            
            $errorEmpty = false;
            $errorDetails = false;
            
            
            //create a template
            $sqlcheck = "SELECT * FROM users WHERE username = ? AND password = ?;";
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
                mysqli_stmt_bind_param($stmtcheck, "ss", $username, $password);
                //run parameters inside database
                mysqli_stmt_execute($stmtcheck);
                $result = mysqli_stmt_get_result($stmtcheck);
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
        $("#log-username, #log-password").removeClass("input-error");
        
        var errorEmpty = "<?php echo $errorEmpty; ?>";
        var errorDetails = "<?php echo $errorDetails; ?>";

        
        if(errorEmpty == true)
        {
           $("#log-username, #log-password").addClass("input-error");
        }
        if(errorDetails == true)
        {
            $("#log-username, #log-password").addClass("input-error");
        }
        if(errorEmpty == false && errorDetails == false)
        {
            $("#log-username, #log-password").val("");
            window.location.href = "index.php";
        }
        
    </script>

</body>

</html>
