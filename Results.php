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

    <div class="wholePage">
        <div class="container-fluid">


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
                            <h2>Filters</h2>
                            <h3>Rating</h3>
                            <p>1 and up</p>
                            <p>2 and up</p>
                            <p>3 and up</p>
                            <p>4 and up</p>
                            <h3>Language</h3>
                            <p>English</p>
                            <p>Spanish</p>
                            <p>French</p>
                            <h3>Num pages</h3>
                            sliders
                            <h3>Num of ratings</h3>
                            <p>Over 100</p>
                            <p>Over 1000</p>
                            <p>Over 10000</p>
                            <p>Over 100000</p>
                        </div>
                    </div>
                    <div class="col-sm-9 rightMain">
                        <div class="card">
                            <form action="" method="post" name="searchForm">
                                <div class="searchBubble">
                                    <select name="Type" id="searchType">
                                        <!--values are used to compare to DB row-->
                                        <option value="Title">Title</option>
                                        <option value="Authors">Authors</option>
                                        <option value="ISBN">Isbn</option>
                                    </select>
                                    <input type="text" class="searchBox" name="searchQuery" id="searchBar" />
                                    <input type="submit" class="searchButton" value="Search" />
                                </div>
                                <p>Sort By:</p>
                                <select name="Sort" id="searchSort">
                                    <option value="Title">Title (Alphabetical)</option>
                                    <option value="Authors">Authors (Alphabetical)</option>
                                    <option value="ISBN">Isbn (Increasing)</option>
                                    <option value="NumPages">Pages(Increasing)</option>
                                    <option value="AverageRating">Rating (Increasing)</option>
                                    <option value="Language">Language (Alphabetical)</option>
                                </select>
                                <p>Num of results to show:</p>
                                <select name="MaxNumResults" id="searchMaxResults">
                                    <option value=10>10</option>
                                    <option value=100>100</option>
                                    <option value=1000>1000</option>
                                    <option value=100000>All</option>
                                </select>
                                <p>Language:</p>
                                <select name="filterLan" id="filterLan">
                                        <!--values are used to compare to DB row-->
                                        <option value="en">English</option>
                                        <option value="">no filter</option>
                                        <option value="ara">arabic?</option>
                                        <option value="dan">Danish</option>
                                        <option value="fre">French</option>
                                        <option value="ger">Germany</option>
                                        <option value="grc">Greek</option>
                                        <option value="ita">Italian</option>
                                        <option value="jpn">Japanese</option>
                                        <option value="lat">Latin</option>
                                        <option value="nl">Dutch?</option>
                                        <option value="por">Portugese</option>
                                        <option value="rus">Russian</option>
                                        <option value="spa">Spanish</option>
                                        <option value="srp">Serbian</option>
                                        <option value="zho">Chinese</option>
                                        <option value="mul">*Multiple*</option>
                                    </select>
                            </form>
                        </div>

                        <div class="card" style=" padding:1px;">
                            <div class='resultCard'>
                                ".$i."
                                    <br>
                                    <h2>".$row["Title"]."</h2><br>
                                    <p><strong>Author:</strong> ".$row["Authors"]."</p>
                                    <p><strong>Isbn:</strong> ".$row["ISBN"]."</p>
                                    <p><strong>Num of pages:</strong> ".$row["NumPages"]."</p>
                                    <p><strong>Average Rating:</strong> ".$row["AverageRating"]."</p>
                                    <p><strong>Num of Ratings:</strong> ".$row["NumRatings"]."</p>
                                    <p><strong>Language:</strong> ".$row["Language"]."</p>
                                    <a href='saveBookSql.php?id=".$row["ISBN"]."'>click</a>
                            </div>
                            
                            <?php
                            //setting db details:
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "project2";
                            //establish a connection:
                            $connection = new mysqli($servername, $username, $password, $dbname);
                            //run a query and store results in variable $result:
                            
                           
                            if (!empty($_POST['searchQuery']))
                            {
                                $searchQuery = $_POST['searchQuery'];
                                $searchType = $_POST['Type'];
                                $searchSort = $_POST['Sort'];
                                $MaxNumResults = $_POST['MaxNumResults'];
                                $filterLan = $_POST['filterLan'];

                                if ($_POST['searchQuery'] == '*')/*if they have submitted*/
                                {
                                    $sql = "SELECT * FROM books WHERE Language LIKE '%".$filterLan."%'
                                    ORDER BY ".$searchSort;
                                }
                                else
                                {
                                    $sql = "SELECT * FROM books WHERE
                                    ".$searchType." LIKE '%".$searchQuery."%'
                                    AND 
                                    Language LIKE '%".$filterLan."%'
                                    ORDER BY ".$searchSort;
                                }
                                
                                echo "<p>Returning results for <strong>".$searchQuery."</strong> in <strong>".$searchType."</strong>";
                            }
                            else
                            {
                                $MaxNumResults = 10;

                                $sql = "SELECT * FROM books ORDER BY Title";
                                echo "<p>Displaying all books";
                            }
                            
                            $result = $connection->query($sql) or die($connection->error);/*store all rows in result*/
                            echo " (".mysqli_num_rows($result)." results found.)</p>";
                            
                                
                            $i = 0;
                            while($row = $result->fetch_assoc() and $i < $MaxNumResults)/*print all rows that are stored in result*/
                            {
                            $i++;
                            echo 
                            "
                            <div class='resultCard'>
                                ".$i."
                                <div class='col-sm-3'>
                                    <img src='res/bookCover.jpg' style='height: 15em;'>
                                </div>
                                <div class='col-sm-9'>
                                    <br>
                                    <h2>".$row["Title"]."</h2><br>
                                    <p><strong>Author:</strong> ".$row["Authors"]."</p>
                                    <p><strong>Isbn:</strong> ".$row["ISBN"]."</p>
                                    <p><strong>Num of pages:</strong> ".$row["NumPages"]."</p>
                                    <p><strong>Average Rating:</strong> ".$row["AverageRating"]."</p>
                                    <p><strong>Num of Ratings:</strong> ".$row["NumRatings"]."</p>
                                    <p><strong>Language:</strong> ".$row["Language"]."</p>
                                    <a href='saveBookSql.php?id=".$row["ISBN"]."'>click</a>
                                </div>
                            </div>
                            ";
                            }
                        ?>
                            <!--keep values in search-->
                            <script type="text/javascript">
                                document.getElementById('searchBar').value = "<?php echo $searchQuery; ?>";
                                document.getElementById('searchType').value = "<?php echo $searchType; ?>";
                                document.getElementById('searchSort').value = "<?php echo $searchSort; ?>";
                                document.getElementById('searchMaxResults').value = "<?php echo $MaxNumResults; ?>";
                                document.getElementById('filterLan').value = "<?php echo $filterLan; ?>";
                            </script>
                            
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
