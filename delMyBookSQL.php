<html>

<body>

    <?php
        session_start();
    
            $id = $_GET['id'];/*dont fully understand get but only way ive gotten to work*/
            $user = $_SESSION['Username'];
    
            $conn = new mysqli("localhost", "root", "", "project2");
            // Check connection
            if (!$conn)
            {
            die("Connection failed: " . mysqli_connect_error());
            }
            // sql to delete a record
            $sql = "DELETE FROM `userbooks` WHERE BookISBN = '$id' AND Username = '$user'";

            if (mysqli_query($conn, $sql))
            {
                mysqli_close($conn);
                header('Location: MyBooks.php');
            }
            else
            {
                header('Location: Results.php');
            }
            ?>
</body>

</html>
