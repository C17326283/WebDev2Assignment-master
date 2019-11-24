<!DOCTYPE html><!-- HTML5 -->
<html lang="en">
<!-- language-->

<head>
    <title>Home</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!-- character set -->
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

        <nav>
            <div class="row navRow">
                <a href="index.php">
                    <div class="col-sm-2 logoBox">
                        <img src="res/logo.png">
                    </div>
                </a>

                <a href="Results.php">
                    <div class="col-sm-2 tab-box  current-box">
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

            <div class="resultsBody">
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

                        <div class="searchFilter" style="float:left; margin-right:10px;">
                            <p>Language: &nbsp</p>
                            <select name="filterLan" id="filterLan">
                                <!--values are used to compare to DB row-->
                                <option value="">No Filter</option>
                                <option value="en">English</option>
                                <option value="dan">Danish</option>
                                <option value="fre">French</option>
                                <option value="ger">Germany</option>
                                <option value="grc">Greek</option>
                                <option value="ita">Italian</option>
                                <option value="jpn">Japanese</option>
                                <option value="lat">Latin</option>
                                <option value="nl">Dutch</option>
                                <option value="por">Portugese</option>
                                <option value="rus">Russian</option>
                                <option value="spa">Spanish</option>
                                <option value="srp">Serbian</option>
                            </select>
                        </div>
                        <div class="searchFilter" style="float:left">
                            <p>Num of Rows: &nbsp</p>
                            <select name="MaxNumResults" id="searchMaxResults">
                                <option value=10>10</option>
                                <option value=100>100</option>
                                <option value=1000>1000</option>
                                <option value=100000>All</option>
                            </select>
                        </div>
                        <div class="searchFilter" style="float:right">
                            <p>Sort By:&nbsp</p>
                            <select name="Sort" id="searchSort">
                                <option value="Title">Title (Alphabetical)</option>
                                <option value="Authors">Authors (Alphabetical)</option>
                                <option value="ISBN">Isbn (Increasing)</option>
                                <option value="NumPages">Pages(Increasing)</option>
                                <option value="AverageRating">Rating (Increasing)</option>
                                <option value="Language">Language (Alphabetical)</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="card">
                    <?php
                            //establish a connection:
                            $connection = new mysqli("localhost", "root", "", "project2");
                            //run a query and store results in variable $result:
                            
                           
                            if (!empty($_POST['searchQuery']))
                            {
                                $searchQuery = $_POST['searchQuery'];
                                $searchType = $_POST['Type'];
                                $searchSort = $_POST['Sort'];
                                $MaxNumResults = $_POST['MaxNumResults'];
                                $filterLan = $_POST['filterLan'];

                                if ($_POST['searchQuery'] == '*' or $_POST['searchQuery'] == ' ')/*if they have submitted*/
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
                                
                                echo "<div class='card' style='margin: 1em;'><p>Returning results for <strong style='color:#006500'>".$searchQuery."</strong> in <strong style='color:#006500'>".$searchType."</strong>";
                            }
                            else
                            {
                                $MaxNumResults = 100;

                                $sql = "SELECT * FROM books ORDER BY Title";
                                echo "<div class='card' style='margin: 1em;'><p>Displaying all books";
                            }
                            
                            $result = $connection->query($sql) or die($connection->error);/*store all rows in result*/
                            echo "
                            (".mysqli_num_rows($result)." results found.)</p></div>
                            ";
                            
                                
                            $i = 0;
                            while($row = $result->fetch_assoc() and $i < $MaxNumResults)/*print all rows that are stored in result*/
                            {
                            $i++;
                            echo "
                            <div class='col-lg-6 col-md-12'>
                                <div class='resultCard'> 
                                    <div class='leftResult'>
                                        <img src='res/bookCover.jpg'>
                                    </div>
                                    <div class='rightResult'>
                                        <h3>".$i.". ".$row["Title"]."</h3>
                                        <p><strong>Author: </strong>".$row["Authors"]."</p>
                                        <p><strong>Average Rating: </strong>".$row["AverageRating"]."</p>
                                        <p><strong>Num of pages: </strong>".$row["NumPages"]."</p>
                                        <p><strong>Isbn: </strong>".$row["ISBN"]."</p>
                                        <p><strong>Language: </strong>".$row["Language"]."</p>";
                                
                                        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                                        {
                                            echo"<a href='saveMyBookSql.php?id=".$row["ISBN"]."'>Add to My Books</a>";
                                        }
                            echo "
                                    </div>
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
            <footer>
                <p>By Kyle Heffernan & Ryan Byrne</p>
                <p>TU Dublin</p>
            </footer>
        </div>
    </div>
</body>
