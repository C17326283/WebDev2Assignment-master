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
    <div class = "container-fluid wholePage">
        
        <div class = "row top">
            <div class="col-sm-4 banner-box">
                <a href="index.php">
                <img class ="topLogo" src="res/logosample.png">
                </a>
            </div>
            <div class="col-sm-8 banner-box">
                <div class="top-medias">
                </div>
                <div class="top-search">
                    <input type="search" id="quickSearchBox" placeholder="Quick Search" style="margin-top: 1em">
                    <input type="button" value="Go!">
                    <a href="Results.html"><h4>Go to advanced search</h4></a>
                </div>
            </div>
        </div>
        
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
                            <a href="https://www.google.com/">test1</a>
                            <a href="https://www.google.com/">test2</a>
                            <a href="https://www.google.com/">test3</a>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </nav>
        
        <div class = "mainBody">
            <div class = "gallery">
                <img src="res/sampletop.jpg">
            </div>
            <div class = "Welcome">
                <h1>Welcome to the Ry and Ky public Libary!</h1>
                <?php
                ?>
            </div>
            
            <form method="post" action="addUserSql.php">
                Name:<br>
                <input type="text" id="Name" name="Name" minlength="3" maxlength="40" required><br>
                Email:<br>
                <input type="email" id="Email" name="Email" minlength="8" maxlength="50" required><br>
                Password:<br>
                <input type="password" id="Pass" name="Password" minlength="4" maxlength="40" required><br>
                <input type="Submit" value="Submit" >
            </form>
            
        </div>
        <footer>
            <p>By Kyle Heffernan & Ryan Byrne</p>
            <p>TU Dublin</p>
        </footer>
    </div>
</body>