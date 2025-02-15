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
    <link rel="icon" href="res/TitleLogo.png" type="image/icon type">
</head>

<body>
    <?php
        /*For logging in*/
        session_start();
    ?>
    <div class="wholePage">
        <div class="container-fluid">

            <div class="row top">
                <div class="Welcome" style="text-align:center;">
                    <h1>Welcome to the Ry and Ky public Libary!</h1>
                </div>
                <div class="gallery">
                    <img src="res/sampletop.jpg">
                </div>
            </div>

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
                            <h2>Contact Us</h2>
                            <p>For any inqueries please feel free to get in contact with using the email or phone number below:
                            </p><br>
                            <p>Email: 123library@lib.com</p><br>
                            <p>Phone: 085 1234321</p><br>

                            <p>You can also submit a feedback <a href="contact.php">form</a></p>
                        </div>

                        <div class="card">
                            <h2>Opening Times</h2>
                            <p>Monday: 09:00 to 17:00</p>
                            <p>Tuesday: 09:00 to 17:00</p>
                            <p>Wednesday: 09:00 to 17:00</p>
                            <p>Thursday: 09:00 to 17:00</p>
                            <p>Friday: 09:00 to 17:00</p>
                            <p>Saturday: CLOSED</p>
                            <p>Sunday: CLOSED</p>
                        </div>
                    </div>
                    <div class="col-sm-9 rightMain">
                        <div class="card">
                            <h2>About Us</h2>
                            <p>Welcome to Library Services - TU Dublin City Centre
                                TU Dublin City Centre has six libraries, at Aungier Street, Bolton Street, Cathal Brugha Street, Grangegorman, Kevin Street, and Rathmines.</p>
                            <p>
                                We provide a wide range of services, including the Library Catalogue, databases, and online resources, access to computers, and support.
                            </p>
                            <p>
                                If you need information and guidance, have a look in particular at Using the Library and Get Started/Get Support.</p>
                        </div>

                        <div class="card">
                            <h2>News</h2>
                            <p>Paul Blart maul cop in cinemas now</p>
                            <p>Red hot chilly peppers arent even that hot</p>
                            <p>How many pages quanifies a book? 3?</p>
                            <p>You can only fold a regular sheet of paper 7 times</p>
                        </div>

                        <div class="card">
                            <h2>Our Location</h2>
                            <div class="mapCard" style="width:100%;overflow:hidden;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2382.3414580735366!2d-6.270425284193342!3d53.337143579977145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670c2089d84a1d%3A0x6e1d03e3d62489ae!2sTU%20Dublin%20Kevin%20Street!5e0!3m2!1sen!2sie!4v1573836416750!5m2!1sen!2sie" width="600" height="450" frameborder="1" style="border:0;" allowfullscreen=""></iframe>
                            </div>
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
