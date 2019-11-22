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
    
            $id = $_SESSION['Username'];
        
            $sql = "DELETE * FROM users WHERE username='$id';";
            $result = mysqli_query($conn, $sql);
            header("Location: logoutSql.php");     

            $conn->close();
        ?>
</body>

</html>