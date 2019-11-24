<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project2";
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_SESSION['Username'];



if(isset($_POST['submit']))
{
    $file = $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed = array('jpg', 'jpeg', 'png');
    
    if(in_array($fileActualExt, $allowed))
    {
        if($fileError === 0)
        {
            if($fileSize < 300000)
            {
                $fileNameNew = "profile".$id.".".jpg;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "UPDATE users SET imgStatus=1 WHERE username='$id';";
                $result = mysqli_query($conn, $sql);
                header("Location: myAccount.php");
            }
            else
            {
                echo "Your file is too big!";
            }
        }
        else
        {
            echo "There was an error uploading your file.";
        }
    }
    else
    {
        echo "You cannot upload files of this type!";
    }


}
