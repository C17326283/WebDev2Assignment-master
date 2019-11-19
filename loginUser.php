
    
    
    
<!DOCTYPE html><!-- HTML5 -->
<html lang="en"><!-- language-->
<head>
    <title>Home</title>
    <meta charset="utf-8"><!-- character set -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile rendering and touch zooming -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="StyleSheet" href="stylesheet.css"/>
    <link href="https://fonts.googleapis.com/css?family=Google+Sans:400,500&lang=en" rel="stylesheet">
</head>

<body>
    <?php
            /*For logging in*/
            session_start();
        ?>
    <div class = "container-fluid wholePage">
        
        
        
        <nav>
            <div class = "row navRow">
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
                <a href="https://www.google.com/">
                <div class="col-sm-2 tab-box">
                        <img src="res/questionIcon.png">
                        <h6>How to use</h6>
                </div>
                    </a>
                <a href="https://www.google.com/">
                <div class="col-sm-2 tab-box">
                    <img src="res/aboutUsIcon.png"><h6>About Us</h6>
                </div>
                    </a> 
                <a href="https://www.google.com/">
                <div class="col-sm-2 tab-box">
                    <img src="res/ContactIcon.png"><h6>Contact</h6>
                </div>
                    </a>
                <div class="col-sm-1 tab-box">
                </div>
                    
                <a href="https://www.google.com/">
                <div class="col-sm-1 tab-box drop-box">
                    <div class="dropdown">
                        <img class="login" src="res/DropIcon.png" height="20px;">
                        <div class="dropdown-menu">cd
                            <a href="https://www.google.com/">Login</a>
                            <a href="registerUser.php">Register</a>
                            <a href="https://www.google.com/">test3</a>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </nav>
        
        <div class = "mainBody">
            <div class = "card forms">
                <h2>Login</h2><br> 
                <h4><strong>Enter your details to log in.</strong></h4><br>
                <form method="post" action="loginSql.php">
                    <p>Username:</p>
                    <input type="text" id="Username" name="Username" minlength="3" maxlength="40" required><br>
                    <p>Password:</p>
                    <input type="password" id="Password" name="Password" minlength="4" maxlength="40" required><br>
                    <input type="Submit" value="Log in">
                </form>
            </div>
        </div>
        <footer>
            <p>By Kyle Heffernan & Ryan Byrne</p>
            <p>TU Dublin</p>
        </footer>
    </div>
</body>