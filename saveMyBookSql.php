<html>

<body>

    <?php
        session_start();
    
            $id = $_GET['id'];/*dont fully understand get but only way ive gotten to work*/
            $user = $_SESSION['Username'];
    
            //Connect DB
            //Create query based on the ID passed from you table
            //query : delete where Staff_id = $id
            // on success delete : redirect the page to original page using header() method
            $conn = new mysqli("localhost", "root", "", "project2");
            // Check connection
            if (!$conn)
            {
            die("Connection failed: " . mysqli_connect_error());
            }
    
            $sqlcheck = "SELECT * FROM `userbooks`WHERE Username='$user' AND BookISBN='$id'";
            $result = mysqli_query($conn, $sqlcheck);
            $numrows = mysqli_num_rows($result);
            if($numrows > 0)
            {
                mysqli_close($conn);
                echo "<script> window.alert('Book already added!'); window.location.href='Results.php';</script>";
            }
            else
            {
                // sql to delete a record
                $sql = "INSERT INTO `userbooks`(`Username`, `BookISBN`) VALUES ('$user',$id)";

                if (mysqli_query($conn, $sql))
                {
                    mysqli_close($conn);
                    echo "<script> window.alert('Book added!'); window.location.href='Results.php';</script>";

                }
                else
                {
                    mysqli_close($conn);
                    echo "<script> window.alert('There was a problem adding your book!'); window.location.href='Results.php';</script>";
                }
                
            }
    
            
            
            ?>
</body>

</html>
