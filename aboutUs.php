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
                        <h2>Our Libraries</h2>
                        <br>
                        <p>
                            Our Libraries form part of the Community and Cultural Development Department in Dún Laoghaire-Rathdown County Council. The county has eight branch libraries serving the educational and recreational needs of all who live, work or study in the Dún Laoghaire-Rathdown area. Current library membership is 58,000 and continues to grow. 1.4 million books were issued last year.
                        </p>
                    </div>
                </div>
                <div class="col-sm-9 rightMain">
                    <div class="card">
                        <h2>Code of Conduct and the Customers Role</h2>
                        <p>
                            We welcome your comments and suggestions on how we can improve our services in the future. 
                            If you would like to comment or make a suggestion please email 123library@lib.com.
                        </p>
                        <p>
                            Just as the customer is entitled to the highest level of customer service, Library staff should receive the same levels of respect and courtesy from the customer. The following conduct is not acceptable: -
                        </p>
                        <p>
                            <br>Behaviour that is disruptive and interferes with the use and enjoyment of Library facilities.
                          
                            <br>Harassment of staff or members of the public by use of abusive, racist, obscene or threatening language.

                            <br>Use of violence or threat of violence towards staff and/or members of the public.

                            <br>Malicious damage to and/or theft of Library property.

                            <br>Food and drink (with the exception of bottled water) may not be consumed in the Library.

                            <br>The use of alcohol or illicit drugs while using Library facilities.

                            <br>Smoking/vaping on Library premises.

                            <br>Leaving personal property unattended in any Library.
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