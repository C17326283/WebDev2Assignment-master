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
            /*For logging in*/
            session_start();
        ?>
    <div class="container-fluid wholePage">

        <nav>
            <div class="row navRow">
                <a href="index.php">
                    <div class="col-sm-2 tab-box current-box">
                        <img src="res/HomeWhite.png">
                        <h6>Home</h6>
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
                    <img class="login" src="res/personIcon.png">
                    <?php
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                            {
                                echo '<h6>'.$_SESSION['Username'].'</h6>';
                            }
                            else
                            {
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
                                    <p>My Account</p>
                                </a></li>
                            <li><a href="myBooks.php">
                                    <p>My Books</p>
                                </a></li>
                            <li><a href="logoutSql.php">
                                    <p>Log out</p>
                                </a></li>
                            ';
                        }
                        else
                        {
                            echo '                            <li><a href="loginUser.php">
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
                        <?php echo '<h2>'.$_SESSION['Username'].'</h2>'; ?>

                        <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "project2";
                            $conn = new mysqli($servername, $username, $password, $dbname);
                        
                            
                            $id = $_SESSION['Username'];
                            $sqlImg = "SELECT * FROM users WHERE username='$id' AND imgStatus='1'";
                            $result = mysqli_query($conn, $sqlImg) OR die(mysqli_error($conn));
                            $numrows = mysqli_num_rows($result);
                            
                            echo "<div>";
                        
                                if($numrows == 0)
                                {
                                    echo "<img src='res/default.PNG' style='width:100px;height:100px;'>";
                                }
                                else if($numrows == 1)
                                {
                                    echo "<img src='uploads/profile".$id.".jpg' style='width:100px;height:100px;'>";
                                }
                            echo "</div>";
                      
                        ?>
                        <h4>Change profile picture</h4><br>
                        <form method="post" action="upload.php" enctype="multipart/form-data">
                            <input type="file" name="file" required>
                            <button type="Submit" name="submit">Upload image</button><br>
                        </form>



                        <p><a href="logoutSql.php">log out</a></p><br>

                        <br>
                        <a href='changePassword.php'>Change Password</a>

                    </div>
                </div>
                <div class="col-sm-9 rightMain">
                    <div class="card">
                        <h2>My Details</h2>
                        <?php
                            //setting db details:
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "project2";
                            //establish a connection:
                            $connection = new mysqli($servername, $username, $password, $dbname);
                            //run a query and store results in variable $result:
                        
                        
                        
                        $sql = "SELECT name, username, email FROM users WHERE username ='".$_SESSION['Username']."' ";
                        
                        $result = $connection->query($sql);
                        
                            // output data of each row
                            while($row = $result->fetch_assoc())
                            {
                            echo 
                            "<table>
                            <tr>
                                <th>Username: </th>
                                <td>".$row["username"]."</td>
                                <td><a href='deleteAccount.php'>Delete Account</a></td>
                            </tr>
                            <br>
                            
                            <tr>
                                <th>Name: </th>
                                <td>".$row["name"]."</td>
                                <td><a href='changeName.php'>Change Name</a></td>
                            </tr>
                            <br>
                            
                            <tr>
                                <th>Email: </th>
                                <td>".$row["email"]."</td>
                                <td><a href='changeEmail.php'>Change Email</a></td>
                            </tr>
                            </table>";
                            
                            }
                            echo "</table>";

                        ?>
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
