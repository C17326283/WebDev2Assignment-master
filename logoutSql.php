<html>

<body>
    <?php 
        session_start();
        session_destroy();/*Log out*/
        unset($_SESSION['loggedin']);
        unset($_SESSION['Username']);

        /*Go to page*/
        header('Location: index.php');
        exit;
     ?>
</body>

</html>
