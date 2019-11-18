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
        
            $sql = "INSERT INTO project2 (Name, Email, Password)
            VALUES ('".$_POST["Name"]."','".$_POST["Email"]."', '".$_POST["Password"]."')";

            if ($conn->query($sql) === TRUE)
            {
                echo "<br>New entry entered.";
                header("location: index.php");
            }
            else
            {
                echo "Error: ".$carlogin."<br>".$conn->error;
            }

            $conn->close();
        ?>
    </body>
</html>