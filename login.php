<!DOCTYPE html>
<html>
    <head>
        <title>Tab name</title> 
        <link rel="StyleSheet" href="StyleSheet.css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"><!--online fonts to add-->
    </head>
    <body>
        <div class="grid-container">
        <div class="box a">
            <img src="samplelogo.jpg" style="width: 100px">
            Heading and Nav
        </div>
        <div class="box b">Sidebar
        </div>
        <div class="box d">Main area
        </div>
        <div class="box e">Footer
        </div>
            <form method="post" action="login.php">
            <h4>Log in</h4>
            Username: 
            <input type="text" name="username" placeholder="username" required><br><br>
            Password:
            <input type="password" name="password" placeholder="password" required><br><br>

            <input type="submit" value="Submit" action="">
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>

        <?php
            session_start();
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "assignment";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $myusername = $_POST["username"];
                $mypassword = $_POST["password"];

                $sql = "SELECT * FROM user WHERE username = '$myusername' AND password = '$mypassword'";

                $result = mysqli_query($conn, $sql) OR die(mysqli_error($conn));

                $numrows = mysqli_num_rows($result);

                if($numrows == 1)
                {
                    echo "Logged in successfully";
                    $_SESSION['id']=$myusername;
                    $_SESSION['logged']= true;
                    header("location: homepage.php");
                }
                else
                {
                    echo "Failed to log in";
                }


                $conn->close();
            }
        ?>
            
</div>
    </body>
</html>