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

    <div class="wholePage">
        <div class="container-fluid">


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

                <div class="resultsMain">
                    <div class="allCards">
                        <div class="card" style=" padding:1px;">


                            <?php
                            //setting db details:
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "project2";
                            //establish a connection:
                            $connection = new mysqli($servername, $username, $password, $dbname);
                            //run a query and store results in variable $result:
                            $i = 0;
                            $sql = "SELECT * FROM userBooks WHERE Username = '".$_SESSION['Username']."'";
                            $result = $connection->query($sql) OR die(mysqli_error($connection));
                            while($row = $result ->fetch_assoc())
                            {
                                $sqlBook = "SELECT * FROM books WHERE ISBN LIKE ".$row["BookISBN"];
                                
                                $resultBook = $connection->query($sqlBook) OR die(mysqli_error($connection));
                                while($rowBook = $resultBook ->fetch_assoc())
                                {
                                    $i++;
                                echo "
                                <div class='col-lg-6 col-md-12'>
                                    <div class='resultCard'>
                                        <div class='leftResult'>
                                            <img src='res/bookCover.jpg'>
                                        </div>
                                        <div class='rightResult'>
                                            <h3>".$i.". ".$rowBook["Title"]."</h3>
                                            <p><strong>Author: </strong>".$rowBook["Authors"]."</p>
                                            <p><strong>Average Rating: </strong>".$rowBook["AverageRating"]."</p>
                                            <p><strong>Num of pages: </strong>".$rowBook["NumPages"]."</p>
                                            <p><strong>Isbn: </strong>".$rowBook["ISBN"]."</p>
                                            <p><strong>Language: </strong>".$rowBook["Language"]."</p>
                                            <a href='delMyBookSql.php?id=".$rowBook["ISBN"]."'>Remove from My Books</a>
                                        </div>
                                    </div>
                                </div>
                                ";
                                }
                                
                            }
                            if($i == 0)
                            {
                                echo"
                                <div class='Card''>
                                <h3 style='text-align: center; margin:2em'>You have not saved any books.</h3>
                                </div>";
                            }
                        ?>
                        </div>
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
