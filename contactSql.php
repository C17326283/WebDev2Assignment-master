<html>

<body>
    <?php
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
    
            
        
            $sql = "INSERT INTO contact (name, email, message)
            VALUES ('".$_POST["Name"]."','".$_POST["Email"]."', '".$_POST["Message"]."')";

            if ($conn->query($sql) === TRUE)
            {
                header("location: contact.php");
            }
            else
            {
                echo "Error: <br>".$conn->error;
            }

            $conn->close();
        ?>
</body>

</html>