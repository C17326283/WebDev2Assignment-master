<html>

<body>
    <?php
            session_start();

            // Create connection
            $conn = new mysqli("localhost", "root", "", "project2");

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            echo "Connected successfully <br>";
        
            $userUsername = $_POST["Username"];
            $userPassword = $_POST["Password"];
        
            $sql = "SELECT * FROM users WHERE Username = '$userUsername' AND password ='$userPassword'"; 
        
            $result = mysqli_query($conn, $sql) OR die(mysqli_error($conn));
        
            $numrows = mysqli_num_rows($result);

            if ($numrows == 1)
            {
                echo "Logged in";
                $_SESSION['loggedin'] = true;
                
                $row = $result->fetch_assoc();
                $_SESSION['Username'] = $row["username"];//Sets the session username to the username of the account that just logged in
                header("location: index.php");
            }
            else
            {
                echo "<script type='text/javascript'>alert('Incorrect login details')</script>";
                echo '<script>window.location.href = "index.php";</script>';
            }
            $conn->close();
        ?>
</body>

</html>
