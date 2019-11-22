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
    <script src="script.js"></script>
    <link rel="StyleSheet" href="stylesheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Google+Sans:400,500&lang=en" rel="stylesheet">
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
                    <div class="col-sm-2 tab-box">
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
                    <div class="col-sm-2 tab-box current-box">
                        <img src="res/ContactIcon.png">
                        <div class="navText">
                            <h6>Contact</h6>
                        </div>
                    </div>
                </a>
                <div class="col-sm-1 tab-box" style="visibility:hidden;">
                </div>


                <div class="col-sm-1 tab-box" onclick="slide()" style="padding:16px;">
                    <img class="login" src="res/DropIcon.png">
                </div>

            </div>
        </nav>

        <div class="mainBody">
            <div class="moreMenu" id="menuSlide">
                <ul>
                    <li><a href="loginUser.php">
                            <p>Login</p>
                        </a></li>
                    <li><a href="registerUser.php">
                            <p>Register</p>
                        </a></li>
                    <li><a href="https://www.google.com/">
                            <p>test3</p>
                        </a></li>
                </ul>
            </div>
            <div class="card forms">
                <h4><strong>Please enter your new name.</strong></h4>
                <form method="post" action="changeNameSql.php">
                    <p>New Name:</p>
                    <input type="text" id="Name" name="Name" minlength="3" maxlength="40" required><br>
                    <input type="Submit" value="Submit">
                </form>
            </div>
        </div>
        <footer>
            <p>By Kyle Heffernan & Ryan Byrne</p>
            <p>TU Dublin</p>
        </footer>
    </div>
</body>