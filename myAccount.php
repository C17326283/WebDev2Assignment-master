<!DOCTYPE html><!-- HTML5 -->
<html lang="en">
<!-- language-->

<head>
    <title>Home</title>
    <meta charset="utf-8"><!-- character set -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile rendering and touch zooming -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="script.js"></script>
    <link rel="StyleSheet" href="StyleSheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Google+Sans:400,500&lang=en" rel="stylesheet">
    <link rel="icon" href="res/sampleTitleLogo.png" type="image/icon type">
</head>

<body>
    <?php
        /*Use Details accross pages with session*/
        session_start();
        /*Prevent logged out user from accessing this page through url */
        if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true)
        {
            echo"<script language='javascript'>
                window.confirm('sometext');
            </script>";

             header('Location: loginUser.php');
        }
        ?>
    <div class="container-fluid wholePage">

        <nav>
                <div class="row navRow">
                    <a href="index.php">
                        <div class="col-sm-2 logoBox current-box">
                            <img src="res/logo.png">
                        </div>
                    </a>

                    <a href="Results.php">
                        <div class="col-sm-2 tab-box">
                            <img src="res/magnifyingGlassIcon.png">
                            <h6>Search</h6>
                        </div>
                    </a>
                    <a href="howToUse.php">
                        <div class="col-sm-2 tab-box">
                            <img src="res/questionIcon.png">
                            <h6>How to use</h6>
                        </div>
                    </a>
                    <a href="aboutUs.php">
                        <div class="col-sm-2 tab-box">
                            <img src="res/aboutUsIcon.png">
                            <h6>About Us</h6>
                        </div>
                    </a>
                    <a href="contact.php">
                        <div class="col-sm-2 tab-box">
                            <img src="res/ContactIcon.png">
                            <div class="navText">
                                <h6>Contact</h6>
                            </div>
                        </div>
                    </a>


                    <div class="col-sm-2 tab-box" onclick="slide()">
                        <?php
                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                        {
                            $conn = new mysqli("localhost", "root", "", "project2");

                            $id = $_SESSION['Username'];
                            $sqlImg = "SELECT * FROM users WHERE username='$id' AND imgStatus='1'";
                            $result = mysqli_query($conn, $sqlImg) OR die(mysqli_error($conn));
                            $numrows = mysqli_num_rows($result);

                            echo '<div class="login">';

                            if($numrows == 0)
                            {
                                echo "<img src='res/default.PNG'>";
                            }
                            else if($numrows == 1)
                            {
                                echo "<img src='uploads/profile".$id.".jpg'>";
                            }
                            echo '</div>';
                            $conn->close();

                            echo '<h6>'.$_SESSION['Username'].'</h6>';
                        }
                        else
                        {
                            echo'<img class="login" src="res/personIcon.png">';
                            echo"<h6>Account</h6>";
                        }
                        ?>
                    </div>

                </div>
            </nav>

            <div class="mainBody">
                <div class="moreMenu" id="menuSlide">
                    <ul>
                        <?php
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                            {
                                echo'
                                <li><a href="myAccount.php">
                                        <p>My Account Details</p>
                                    </a></li>
                                <li><a href="myBooks.php">
                                        <p>My Saved Books</p>
                                    </a></li>
                                <li><a href="logoutSql.php">
                                        <p>Log out</p>
                                    </a></li>
                                ';
                            }
                            else
                            {
                                echo ' <li><a href="loginUser.php">
                                    <p>Login</p>
                                </a></li>
                                <li><a href="registerUser.php">
                                    <p>Register</p>
                                </a></li>
                                ';
                            }
                        ?>
                    </ul>

                </div>

            <div class="row">
                <div class="col-sm-3 leftMain">
                    <div class="card">
                        <?php
                            $conn = new mysqli("localhost", "root", "", "project2");
                        
                            
                            $id = $_SESSION['Username'];
                            $sqlImg = "SELECT * FROM users WHERE username='$id' AND imgStatus='1'";
                            $result = mysqli_query($conn, $sqlImg) OR die(mysqli_error($conn));
                            $numrows = mysqli_num_rows($result);
                            
                            echo "<div class='profCard' style='text-align: center'>";
                        
                                if($numrows == 0)
                                {
                                    echo "<img class='img-circle profImg' src='res/default.PNG' >";
                                }
                                else if($numrows == 1)
                                {
                                    echo "<img class='img-circle profImg' src='uploads/profile".$id.".jpg'>";
                                }
                            echo '<h3>'.$_SESSION['Username'].'</h3>';
                            echo "</div>";
                        ?>
                        <div class="card" style="text-align:center"><p><a href="myBooks.php">My Books</a></p></div>
                        <div class="card" style="text-align:center"><p><a href="logoutSql.php">log out</a></p></div>

                    </div>
                </div>
                <div class="col-sm-9 rightMain">
                    <div class="card">
                        <h2>My Details</h2>
                        <?php
                            
                            //establish a connection:
                            $connection = new mysqli("localhost", "root", "", "project2");
                            //run a query and store results in variable $result:
                            $sql = "SELECT name, username, email FROM users WHERE username ='".$_SESSION['Username']."' ";
                        
                            $result = $connection->query($sql);
                        
                            // output data of each row
                            while($row = $result->fetch_assoc())
                            {
                            echo
                            "
                            <table>
                            <tr>
                                <th><h4>Name: </h4></th>
                                <td><p>".$row["name"]."</p></td>
                                <td><p><a href='changeName.php'>Change Name</p></a></td>
                            </tr>
                            <tr>
                                <th><h4>Email: </h4></th>
                                <td><p>".$row["email"]."<p></td>
                                <td><p><a href='changeEmail.php'>Change Email<p></a></td>
                            </tr>
                            <tr>
                                <th><h4>Username: </h4></th>
                                <td><p>".$row["username"]."</p></td>
                                <td><p><a href='deleteAccount.php'>Delete Account</p></a></td>
                            </tr>
                            <tr>
                                <th><h4>Password: </h4></th>
                                <td><p>HIDDEN</p></td>
                                <td><p><a href='changePassword.php'>Change Password</a></td>
                                
                            </tr>
                            <tr>
                            <br>
                            </table>
                            ";
                            }
                            ?>
                        <br><hr><br>
                        <table>
                        <tr>
                            <form method="post" action="upload.php" enctype="multipart/form-data">
                                <th ><h4>Change profile picture</h4></th>
                                <td><input type="file" name="file" style="color:transparent; width:90px; margin-left:auto;margin-right:auto;"  required></td>
                                <td><button type="Submit" name="submit">Upload image</button></td>
                            </form>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <footer>
            <p>By Kyle Heffernan & Ryan Byrne</p>
            <p>TU Dublin</p>
        </footer>
    </div>
</body>
