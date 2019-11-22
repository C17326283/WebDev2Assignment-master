<html>

<body>
    <?php
            session_start();
        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project2";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

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
                //$sqlid = "SELECT userID FROM users WHERE Username = '$userUsername'"; 
                //$resultid = mysqli_query($conn, $sql) OR die(mysqli_error($conn));
                //$actualid = mysqli_fetch_row($resultid);
                
                
                echo "Logged in";
                $_SESSION['loggedin'] = true;
                $_SESSION['Username'] = $userUsername;
                $_SESSION['Password'] = $userPassword;
                //$_SESSION['UserID'] = $actualid;
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
