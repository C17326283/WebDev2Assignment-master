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
    
    <script>
        $(document).ready(function() 
        {
            $("form").submit(function(event)
            {
                event.preventDefault();//preventing the normal post action of the form
                var email = $("#change-email").val();
                var submit = $("#change-submit").val();
                $(".form-message").load("changeEmailSql.php", {
                    email: email,
                    submit: submit
                });
            });

        });
    </script>
    
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
                        <li><a href="loginUser.php">
                                <p>Login</p>
                            </a></li>
                        <li><a href="registerUser.php">
                                <p>Register</p>
                            </a></li>
                        <li><a href="logoutSql.php">
                                <p>Log out</p>
                            </a></li>
                        <li><a href="myAccount.php">
                                <p>My Account</p>
                            </a></li>
                        <li><a href="myBooks.php">
                                <p>My Books</p>
                            </a></li>
                    </ul>
                </div>
            <div class="card forms">
                <h4><strong>Please enter your new email.</strong></h4>
                <form method="post" action="changeEmailSql.php">
                    <p>New Email:</p>
                    <input type="email" id="change-email" name="email" minlength="8" maxlength="50" required><br>
                    <input type="Submit" id="change-submit" value="Submit">
                    <p class="form-message" id="form-message"></p>
                </form>
            </div>
        </div>
        <footer>
            <p>By Kyle Heffernan & Ryan Byrne</p>
            <p>TU Dublin</p>
        </footer>
    </div>
</body>