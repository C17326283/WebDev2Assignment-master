<!DOCTYPE html><!-- HTML5 -->
<html lang="en">
<!-- language-->

<head>
    <title>Contact</title>
    <meta charset="utf-8"><!-- character set -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile rendering and touch zooming -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="icon" href="res/TitleLogo.png" type="image/icon type">

    <script>
        $(document).ready(function() //waits for everything else to load
            {
                $("form").submit(function(event) //on submit
                    {
                        event.preventDefault(); //preventing the normal post action of the form
                        var name = $("#con-name").val();
                        var email = $("#con-email").val();
                        var message = $("#con-message").val();
                        var submit = $("#con-submit").val();
                        $(".form-message").load("contactSql.php", {
                            name: name,
                            email: email,
                            message: message,
                            submit: submit
                        }); //loading sql page and passing form results as parameters
                    });

            });

    </script>

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
                    <div class="col-sm-2 tab-box  current-box">
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
                <div class="card forms">
                    <h2>Contact Form</h2><br>
                    <h4><strong>Please enter your information and message below. </strong></h4>
                    <form method="post" action="contactSql.php">
                        <p>Name:</p>
                        <input type="text" id="con-name" name="name">
                        <p>Email:</p>
                        <input type="email" id="con-email" name="email" minlength="8" maxlength="50"><br>
                        <p>Message:</p>
                        <textarea id="con-message" name="message" rows="6" cols="100%"></textarea>
                        <input type="Submit" id="con-submit" value="Submit">
                        <p class="form-message" id="form-message"></p>
                    </form>
                </div>
            </div>
            <footer>
                <p>By Kyle Heffernan & Ryan Byrne</p>
                <p>TU Dublin</p>
            </footer>
        </div>
    </div>
</body>
