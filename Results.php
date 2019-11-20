<!DOCTYPE html><!-- HTML5 -->
<html lang="en"><!-- language-->
<head>
    <title>Results</title>
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
    <div class = "wholePage">
        <div class = "container-fluid">  
        
        
        <nav>
            <div class = "row navRow">
                <a href="index.php">
                    <div class="col-sm-2 tab-box">
                        <img src="res/HomeWhite.png">
                        <h6>Home</h6>
                    </div>
                </a>
                
                <a href="Results.php">
                    <div class="col-sm-2 tab-box current-box">
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
                        <img src="res/aboutUsIcon.png"><h6>About Us</h6>
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
                <div class="col-sm-1 tab-box" style="visibility:hidden;">
                </div>
                    
                
                <div class="col-sm-1 tab-box" onclick=slide() style="padding:16px;  cursor:pointer">
                    <img class="login" src="res/DropIcon.png">
                </div>

            </div>
        </nav>
        
        <div class = "mainBody">
            <div class="moreMenu" id="menuSlide">
                <ul>
                    <li><a href="loginUser.php"><p>Login</p></a></li>
                    <li><a href="registerUser.php"><p>Register</p></a></li>
                    <li><a href="https://www.google.com/"><p>test3</p></a></li>
                </ul>
            </div>
            <div class = "gallery">
                <img src="res/sampletop.jpg">
            </div>
            
            <div class="row">
                <div class="col-sm-3 leftMain">
                    <div class="card">
                        <h2>Filters</h2>
                        <h3>Department</h3>
                        <p>Children</p>
                        <p>Thriller</p>
                        <h3>Author</h3>
                        <h3>Language</h3>
                        <h3>Age range</h3>
                        <h3>In stock</h3>
                        <h3>Book format</h3>
                    </div>
                </div>
                <div class="col-sm-9 rightMain">
                    <div class="card">
                        <input type="button" value="Filter">
                        <input type="search" id="quickSearchBox" placeholder="Quick Search">
                        <input type="button" value="Go!">
                        <input type="button" value="Sort By ">
                        
                    </div>
                    <div class="card">
                        <div class="result">
                            <div class="col-sm-3">
                                <img src="res/bookCover.jpg" style="height: 15em;">
                            </div>
                            <div class="col-sm-9">
                                <br>
                                <p>Name</p>
                                <p>Author</p>
                                <p>Description</p>
                                <br><br><br><br><br><br>
                            </div>
                        </div>
                        <div class="result">
                            <div class="col-sm-3">
                                <img src="res/bookCover.jpg" style="height: 15em;">
                            </div>
                            <div class="col-sm-9">
                                <br>
                                <p>Name</p>
                                <p>Author</p>
                                <p>Description</p>
                                <br><br><br><br><br><br>
                            </div>
                        </div>
                        <div class="result">
                            <div class="col-sm-3">
                                <img src="res/bookCover.jpg" style="height: 15em;">
                            </div>
                            <div class="col-sm-9">
                                <br>
                                <p>Name</p>
                                <p>Author</p>
                                <p>Description</p>
                                <br><br><br><br><br><br>
                            </div>
                        </div>
                        <div class="result">
                            <div class="col-sm-3">
                                <img src="res/bookCover.jpg" style="height: 15em;">
                            </div>
                            <div class="col-sm-9">
                                <br>
                                <p>Name</p>
                                <p>Author</p>
                                <p>Description</p>
                                <br><br><br><br><br><br>
                            </div>
                        </div>
                        <div class="result">
                            <div class="col-sm-3">
                                <img src="res/bookCover.jpg" style="height: 15em;">
                            </div>
                            <div class="col-sm-9">
                                <br>
                                <p>Name</p>
                                <p>Author</p>
                                <p>Description</p>
                                <br><br><br><br><br><br>
                            </div>
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
    