<!DOCTYPE html><!-- HTML5 -->
<html lang="en">
<!-- language-->

<head>
    <title>How to Use</title>
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
    <link rel="icon" href="res/TitleLogo.png" type="image/icon type">
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
                    <div class="col-sm-2 logoBox">
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
                    <div class="col-sm-2 tab-box current-box">
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
                        <h2>Did you know?</h2>
                        <br>
                        <p>
                            Books were invented by Thomas Book in 1789 when he spoke
                            to a piece of paper.
                        </p>
                    </div>
                    <br>
                    <div class="card">
                        <h2>Did you know?</h2>
                        <br>
                        <p>
                            The first ever library to be opened was originally supposed
                            to be a restaurant, but when they ran out of chicken, it was
                            decided that they would store books from there on out.
                        </p>
                    </div>
                </div>
                <div class="col-sm-9 rightMain">
                    <div class="card">
                        <br>
                        <h2>Becoming a member</h2>
                        <br>
                        <p>
                            You can create an account <a href="registerUser.php">here.</a>
                            Once you register, you can log in and favourite any books you like.
                            You can then view your favourite books and change your account details.
                            It only takes 30 seconds to make an account and it's completely free!
                        </p>
                        <br>
                        <h2>Searching for books</h2>
                        <br>
                        <p>
                            You can search for books <a href="Results.php">here.</a>
                            There are many ways to filter your search to find exactly the book you need,
                            such as sorting by title, author, language or ISBN. You can even change the order
                            the results are displayed in! If you're logged in, you will also have the option
                            to save a book to your favourites so you won't forget it anytime soon!
                        </p>
                        <br>
                        <h2>Account details</h2>
                        <br>
                        <p>
                            Even after you make your account, you can still change your details to whatever you
                            prefer, so there's no need to stress if you entered in the wrong name! Simply go to
                            the myAccount page and you will be prompted with the option to change most of your details.
                            Just make sure to use a valid email address!
                        </p>
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
