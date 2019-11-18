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
        
            $sql = "INSERT INTO Users (name, username, email, password)
            VALUES ('".$_POST["Name"]."','".$_POST["Username"]."','".$_POST["Email"]."', '".$_POST["Password"]."')";

            if ($conn->query($sql) === TRUE)
            {
                echo "<br>New entry entered.";
                header("location: registerUser.php");
            }
            else
            {
                echo "Error: <br>".$conn->error;
            }

            $conn->close();
        ?>
    </body>
</html>