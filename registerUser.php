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
    
    <script>
        $(document).ready(function() //waits for everything else to load
        {
            $("form").submit(function(event) //on submit
            {
                event.preventDefault();//preventing the normal post action of the form
                var name = $("#register-name").val();
                var username = $("#register-username").val();
                var email = $("#register-email").val();
                var password = $("#register-password").val();
                var confirmpassword = $("#register-confirmpassword").val();
                var submit = $("#register-submit").val();
                $(".form-message").load("registerUserSql.php", {
                    name: name,
                    username: username,
                    email: email,
                    password: password,
                    confirmpassword: confirmpassword,
                    submit: submit
                }); //loading sql page and passing form results as parameters
            });
            
        });
    
    </script>
    
    <link rel="icon" href="res/sampleTitleLogo.png" type="image/icon type">
</head>

<body>
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
            <div class="card forms">
                <h2>Register Form</h2><br>
                <h4><strong>Please enter your details below to make an account.</strong></h4><br>
                <form method="post" action="registerUserSql.php">
                    <p>Name:</p>
                    <input type="text" id="register-name" name="name" minlength="3" maxlength="40" ><br>
                    <p>Username:</p>
                    <input type="text" id="register-username" name="username" minlength="3" maxlength="40" ><br>
                    <p>Email:</p>
                    <input type="email" id="register-email" name="email" minlength="8" maxlength="50" ><br>
                    <p>Password:</p>
                    <input type="password" id="register-password" name="password" minlength="4" maxlength="40" ><br>
                    <p>Confirm Password:</p>
                    <input type="password" id="register-confirmpassword" name="confirmpassword" minlength="4" maxlength="40" ><br>
                    <input type="submit" id="register-submit" value="Register">
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
