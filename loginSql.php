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
        
            $userEmail = $_POST["Email"];
            $userPassword = $_POST["Password"];
        
            $sql = "SELECT * FROM drivingschoolusers WHERE email = '$userEmail' AND password ='$userPassword'"; 
        
            $result = mysqli_query($conn, $sql) OR die(mysqli_error($conn));
        
            $numrows = mysqli_num_rows($result);

            if ($numrows == 1)
            {
                echo "Logged in";
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $userEmail;
                $_SESSION['Password'] = $userPassword;
                header("location: index.php");
            }
            else
            {
                echo "<script type='text/javascript'>alert('Incorrect login details')</script>";
                echo '<script>window.location.href = "login.php";</script>';
            }
            $conn->close();
        ?>
    </body>
</html>