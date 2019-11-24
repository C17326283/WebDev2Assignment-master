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
    
    <script>
        $(document).ready(function() //waits for everything else to load
        {
            $("form").submit(function(event) //on submit
            {
                event.preventDefault();//preventing the normal post action of the form
                var username = $("#del-username").val();
                var password = $("#del-password").val();
                var submit = $("#del-submit").val();
                $(".form-message").load("deleteAccountSql.php", {
                    username: username,
                    password: password,
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
            <div class="card forms">
                <h4><strong>Please re-enter your username and password</strong></h4>
                <h5>Case sensitive!</h5>
                <form method="post" action="deleteAccountSql.php">
                    <p>Username:</p>
                    <input type="text" id="del-username" name="username" minlength="3" maxlength="40" ><br>
                    <p>Password:</p>
                    <input type="password" id="del-password" name="password" minlength="4" maxlength="40" ><br>
                    <input type="Submit" id="del-submit" value="Delete Account">
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
